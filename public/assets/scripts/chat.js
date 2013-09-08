$(function () {
	var message;
	var socket;

	var messagebox_el = $('.chat-input textarea');
	var messages_el   = $('.chat-content');

	var watchingbox_el = $('.watching-box .content');

	if(userData.trim()) {
		connect(userData);
	}

	$('.chat-input textarea').bind('keypress', function (e) {
		if(!e.shiftKey && (e.keyCode || e.which) == 13) {
			e.preventDefault();
			$('.send-btn').trigger('click'); 
		}
    	});

	$('.chat-input .send-btn').on('click', function (e) {
		e.preventDefault();
		if(typeof userFb === 'undefined') {
			$("#notifModal").modal("show");
			return;
		}

		message = messagebox_el.val().trim();
		if(message) {
			if(onSocial){
				console.log('twitter');
				$.post('/twitter/tweet', {message : message}, function(data){
					console.log(data);
				});
			}
			else{
				console.log('facebook');
				$.post('/facebook/status', {message : message}, function(data){	});
				socket.send(message);
				messagebox_el.val('');
			}
		}
	});

	//Tweet

	$('.tweet-btn').on('click', function(){
		
		message = $('.tweet-block-level').val().trim() + ' #PinoyRealTV';
		console.log(message);

		$.post('/twitter/tweet',{message : message}, function(data){
			console.log(data);
		},'json');
	});



	$('.chat-box .chat-content').on('mouseenter', '.message', function() {
		var time_el = $(this).find('.time');
		var time    = moment(time_el.attr('data-time'), "YYYY-MM-DDTHH:mm:ss Z")
					.zone('+0800')
					.subtract('minutes', 3.7)
					.fromNow();
		time_el.html(time);
		time_el.removeClass('hidden');
	}).on('mouseleave', '.message', function () {
		var time_el = $(this).find('.time');
		time_el.addClass('hidden');
	});
	
	//init smileys
	initSmileys();

	function connect(userData) {
		var options 	= { query: 'userData=' + userData };
		socket 		= io.connect('http://106.186.25.188:8888', options);
		// socket 		= io.connect('http://localhost:8888', options);

		socket.on('connect', function () {
			changeState('ready');
			console.log('connected');
		});

		socket.on('msgs', function (msgs) {
			for(var i in msgs) {
				displayMessage(msgs[i]);
			}
		});

		socket.on('users', function (users) {
			for(var i in users) {
				displayUser(users[i]);
			}
		});

		socket.on('joined', function (userData) {
			if(!userData)
				return;
			displayUser(userData);
		});

		socket.on('chat', function(msg) {
			displayMessage(msg);
		});

		socket.on('disconnect', function() {
			changeState('loading');
		});

		socket.on('reconnect', function() {
			changeState('ready');
		});

		socket.on('left', function (userData) {
			if(!userData)
				return;
			if(typeof userFb != 'undefined' && userData.fb == userFb) {
				socket.emit('alive', userData);
				return;
			}
			removeUser(userData);
			console.log(userData.username + ' ' + userData.lastname + ' has left');
		});

		socket.on('streaming', function (message) {
			var advisory_el = $('#advisory');

			if(message == 'on') {
				advisory_el.find('.modal-body').append('<p>Live streaming is now available!</p>');
				advisory_el.find('.modal-body').append('<p>Do you want to view it now?</p>');
			} else {
				advisory_el.find('.modal-body').append('<p>Live streaming has ended!</p>');
				advisory_el.find('.modal-body').append('<p>Do you want to watch pre-recorded shows instead?</p>');
			}

			advisory_el.modal('show');
		});

		socket.on('alert', function (message) {
			confirm(message);
		});
	}

	function changeState (state) {
		var chatLoader  = $('.chat-loader');
		switch(state) {
			case 'loading':
				chatLoader.show();
				break;
			case 'ready':
				chatLoader.hide();
				break;
			default:
				chatLoader.show();
				break;
		}
		$('.chat-content .message').remove();
		watchingbox_el.find('.people').remove();
	}

	function displayMessage(userData) {
		if(typeof userData.fb == 'undefined' || userData.fb == null)
			userData.fb = 1916127873189;

		//inititalize message element
		var message_el 	= $('<div class="row-fluid message" style="margin-bottom: 10px;"></div>');
		var image_ctnr	= $('<div class="span3"></div>');
		var content_el 	= $('<div class="span9"></div>');
		var image_el 	= $('<img src="http://graph.facebook.com/' + userData.fb + '/picture" />');

		image_ctnr.append(image_el);
		content_el.append('<small class="time pull-right" data-time="' + userData.created + '"></small>');
		content_el.append('<strong>' + userData.username  + ' ' + userData.lastname + '</strong>');
		content_el.append('<p>' + linkify(userData.message)  + '</p>');

		//assemble elements
		message_el.append(image_ctnr);
		message_el.append(content_el);

		//display to chat box
		messages_el.append(message_el);

		//scroll the message box on image load
		image_el.one('load', function() {
			messages_el.scrollTop(messages_el[0].scrollHeight);
		});/*.each(function() {
		  	if(this.complete) $(this).load();
		});*/
	}

	function displayUser (userData) {
		//remove the user if already exist
		removeUser(userData);
		var people_el 	= $('<div class="people"></div>');
		var userImg_el 	= $('<img src="" />');
		
		userImg_el.attr('src', 'http://graph.facebook.com/' + userData.fb + '/picture');
		userImg_el.attr('title', userData.username + ' ' + userData.lastname);

		people_el.attr('id', 'user-' + userData.fb);
		people_el.append(userImg_el);

		watchingbox_el.append(people_el);
	}

	function removeUser (userData) {
		$('#user-' + userData.fb ).remove();
	}

	function initSmileys () {
		var definition = {"smile":{"title":"Smile","codes":[":)",":=)",":-)"]},"sad-smile":{"title":"Sad Smile","codes":[":(",":=(",":-("]},"big-smile":{"title":"Big Smile","codes":[":D",":=D",":-D",":d",":=d",":-d"]},"cool":{"title":"Cool","codes":["8)","8=)","8-)","B)","B=)","B-)","(cool)"]},"wink":{"title":"Wink","codes":[":o",":=o",":-o",":O",":=O",":-O"]},"crying":{"title":"Crying","codes":[";(",";-(",";=("]},"sweating":{"title":"Sweating","codes":["(sweat)","(:|"]},"speechless":{"title":"Speechless","codes":[":|",":=|",":-|"]},"kiss":{"title":"Kiss","codes":[":*",":=*",":-*"]},"tongue-out":{"title":"Tongue Out","codes":[":P",":=P",":-P",":p",":=p",":-p"]},"blush":{"title":"Blush","codes":["(blush)",":$",":-$",":=$",":\">"]},"wondering":{"title":"Wondering","codes":[":^)"]},"sleepy":{"title":"Sleepy","codes":["|-)","I-)","I=)","(snooze)"]},"dull":{"title":"Dull","codes":["|(","|-(","|=("]},"in-love":{"title":"In love","codes":["(inlove)"]},"evil-grin":{"title":"Evil grin","codes":["]:)",">:)","(grin)"]},"talking":{"title":"Talking","codes":["(talk)"]},"yawn":{"title":"Yawn","codes":["(yawn)","|-()"]},"puke":{"title":"Puke","codes":["(puke)",":&",":-&",":=&"]},"doh!":{"title":"Doh!","codes":["(doh)"]},"angry":{"title":"Angry","codes":[":@",":-@",":=@","x(","x-(","x=(","X(","X-(","X=("]},"it-wasnt-me":{"title":"It wasn't me","codes":["(wasntme)"]},"party":{"title":"Party!!!","codes":["(party)"]},"worried":{"title":"Worried","codes":[":S",":-S",":=S",":s",":-s",":=s"]},"mmm":{"title":"Mmm...","codes":["(mm)"]},"nerd":{"title":"Nerd","codes":["8-|","B-|","8|","B|","8=|","B=|","(nerd)"]},"lips-sealed":{"title":"Lips Sealed","codes":[":x",":-x",":X",":-X",":#",":-#",":=x",":=X",":=#"]},"hi":{"title":"Hi","codes":["(hi)"]},"call":{"title":"Call","codes":["(call)"]},"devil":{"title":"Devil","codes":["(devil)"]},"angel":{"title":"Angel","codes":["(angel)"]},"envy":{"title":"Envy","codes":["(envy)"]},"wait":{"title":"Wait","codes":["(wait)"]},"bear":{"title":"Bear","codes":["(bear)","(hug)"]},"make-up":{"title":"Make-up","codes":["(makeup)","(kate)"]},"covered-laugh":{"title":"Covered Laugh","codes":["(giggle)","(chuckle)"]},"clapping-hands":{"title":"Clapping Hands","codes":["(clap)"]},"thinking":{"title":"Thinking","codes":["(think)",":?",":-?",":=?"]},"bow":{"title":"Bow","codes":["(bow)"]},"rofl":{"title":"Rolling on the floor laughing","codes":["(rofl)"]},"whew":{"title":"Whew","codes":["(whew)"]},"happy":{"title":"Happy","codes":["(happy)"]},"smirking":{"title":"Smirking","codes":["(smirk)"]},"nodding":{"title":"Nodding","codes":["(nod)"]},"shaking":{"title":"Shaking","codes":["(shake)"]},"punch":{"title":"Punch","codes":["(punch)"]},"emo":{"title":"Emo","codes":["(emo)"]},"yes":{"title":"Yes","codes":["(y)","(Y)","(ok)"]},"no":{"title":"No","codes":["(n)","(N)"]},"handshake":{"title":"Shaking Hands","codes":["(handshake)"]},"skype":{"title":"Skype","codes":["(skype)","(ss)"]},"heart":{"title":"Heart","codes":["(h)","<3","(H)","(l)","(L)"]},"broken-heart":{"title":"Broken heart","codes":["(u)","(U)"]},"mail":{"title":"Mail","codes":["(e)","(m)"]},"flower":{"title":"Flower","codes":["(f)","(F)"]},"rain":{"title":"Rain","codes":["(rain)","(london)","(st)"]},"sun":{"title":"Sun","codes":["(sun)"]},"time":{"title":"Time","codes":["(o)","(O)","(time)"]},"music":{"title":"Music","codes":["(music)"]},"movie":{"title":"Movie","codes":["(~)","(film)","(movie)"]},"phone":{"title":"Phone","codes":["(mp)","(ph)"]},"coffee":{"title":"Coffee","codes":["(coffee)"]},"pizza":{"title":"Pizza","codes":["(pizza)","(pi)"]},"cash":{"title":"Cash","codes":["(cash)","(mo)","($)"]},"muscle":{"title":"Muscle","codes":["(muscle)","(flex)"]},"cake":{"title":"Cake","codes":["(^)","(cake)"]},"beer":{"title":"Beer","codes":["(beer)"]},"drink":{"title":"Drink","codes":["(d)","(D)"]},"dance":{"title":"Dance","codes":["(dance)","\\o/","\\:D/","\\:d/"]},"ninja":{"title":"Ninja","codes":["(ninja)"]},"star":{"title":"Star","codes":["(*)"]},"mooning":{"title":"Mooning","codes":["(mooning)"]},"finger":{"title":"Finger","codes":["(finger)"]},"bandit":{"title":"Bandit","codes":["(bandit)"]},"drunk":{"title":"Drunk","codes":["(drunk)"]},"smoking":{"title":"Smoking","codes":["(smoking)","(smoke)","(ci)"]},"toivo":{"title":"Toivo","codes":["(toivo)"]},"rock":{"title":"Rock","codes":["(rock)"]},"headbang":{"title":"Headbang","codes":["(headbang)","(banghead)"]},"bug":{"title":"Bug","codes":["(bug)"]},"fubar":{"title":"Fubar","codes":["(fubar)"]},"poolparty":{"title":"Poolparty","codes":["(poolparty)"]},"swearing":{"title":"Swearing","codes":["(swear)"]},"tmi":{"title":"TMI","codes":["(tmi)"]},"heidy":{"title":"Heidy","codes":["(heidy)"]},"myspace":{"title":"MySpace","codes":["(MySpace)"]},"malthe":{"title":"Malthe","codes":["(malthe)"]},"tauri":{"title":"Tauri","codes":["(tauri)"]}};
		$.emoticons.define(definition);

		var smileys = $('<div class="emoticons-list"></div>');
		smileys.append($.emoticons.toString());

		var smiley_el = $('.smiley');

		smiley_el.attr('title', smileys.html());
		smiley_el.tooltip({
			html: true,
			trigger: 'click'
		});

		smiley_el.click(function (e) {
			e.preventDefault();
		});

		$('.chat-input').on('click', '.tooltip-inner .emoticon', function (e) {
			var new_text = messagebox_el.val() + $(this).html();
			messagebox_el.focus().val('').val(new_text);
			smiley_el.tooltip('toggle');
		});
	}

	function linkify(inputText) {
	    var replacedText, replacePattern1, replacePattern2, replacePattern3;

	    //URLs starting with http://, https://, or ftp://
	    replacePattern1 = /(\b(https?|ftp):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/gim;
	    replacedText = inputText.replace(replacePattern1, '<a href="$1" target="_blank">$1</a>');

	    //URLs starting with "www." (without // before it, or it'd re-link the ones done above).
	    replacePattern2 = /(^|[^\/])(www\.[\S]+(\b|$))/gim;
	    replacedText = replacedText.replace(replacePattern2, '$1<a href="http://$2" target="_blank">$2</a>');

	    //Change email addresses to mailto:: links.
	    replacePattern3 = /(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})/gim;
	    replacedText = replacedText.replace(replacePattern3, '<a href="mailto:$1">$1</a>');

	    return replacedText;
	}
});