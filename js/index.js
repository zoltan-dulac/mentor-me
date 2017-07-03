var mentorMe = new function () {
	
	var me = this,
		outputEl = document.getElementById('output'),
		$jxr,
		cache = {},
		currentF,
		$body = document.body,
		$content = document.getElementById('content'),
		$animatedArea = $content,
		$screenReaderAlert = document.getElementById('screen-reader-alert'),
		currentState,
		newContent;
	
	me.init = function () {
		setTimeout(function() {
			$body.classList.add('loaded');
		}, 1); 
		pp.init(me.popstateEvent);
		
		
		setTimeout(function () {
			new SpiderController({
				imageSprite: 'js/bug/spider-sprite.png',
				maxBugs: 2
			});
		}, 6000);
		
	};
	
	me.popstateEvent = function(e) {
		currentState = e.state;
		
		if (!currentState) {
			currentState = {};
		}
		
		if (!currentState.f) {
			currentState.f = 'home';
		}
		
		/* See if this information was cached */
		var cachedData = cache[currentState.f];
		
		/* 
		 * If it hasn't been cached, then grab it with an ajax call (the file
		 * contains an HTML snippet)
		 */
		if (cachedData === undefined) {
			
			$jxr = new XMLHttpRequest();
			$jxr.open('GET', 'includes/' + currentState.f + '.html');
			$jxr.onload = function () {
				if ($jxr.status = 200) {
				
					/*
					 * When the Ajax call is succesful, take the contents of the data
					 * and place it in the cache as well as in the private variable 
					 * `newContent`.
					 */
					newContent = $jxr.responseText;
					cache[currentState.f] = newContent;
					
					/*
					 * Hide the content with a slick CSS animation and when that animation
					 * ends, fire the `hideTransitionEndEvent` method.
					 */
					$animatedArea.addEventListener('animationend', hideTransitionEndEvent);
					$animatedArea.classList.remove('show');
					$animatedArea.classList.add('hide');
					
					readATNowShowingMessage(currentState.f);
					
				} else {
			
					/*
					 * If this animation fails, inform the user 
					 */
					$content.html('File Not Found');
					$screenReaderAlert.innerHTML = 'Requested page does not exist.';
				}
			}
			$jxr.send();
		/*
		 * If this page was cached earlier, then set the private variable 
		 * `newContent` to the cached data, hide the content and fire the
		 * `hideTransitionEndEvent` method.
		 */
			 
		} else {
			$animatedArea.addEventListener('animationend', hideTransitionEndEvent);
			newContent = cache[currentState.f];
			$animatedArea.classList.remove('show');
			$animatedArea.classList.add('hide');
			readATNowShowingMessage(currentState.f);
		}
 	};
 	
 	/*
 	 * Updates the page's alert area that assistive technologies such as 
 	 * screenreaders will use to inform the user the page has changed.
 	 */
 	function readATNowShowingMessage(pageName) {
 		$screenReaderAlert.innerHTML = 'Now viewing <strong>' + pageName + '<strong> page.';
 	}
 	
 	function hideTransitionEndEvent(e) {
 		/*
 		 * set the content area of the page to the data inside the private
 		 * variable `newContent` and show the animation.  When that show animation
 		 * finishes, fire the `showTransitionEndEvent` method.
 		 */
 		$animatedArea.removeEventListener('animationend', hideTransitionEndEvent);
		$animatedArea.addEventListener('animationend', showTransitionEndEvent);
		$content.innerHTML = newContent;
		
		$animatedArea.classList.remove('hide');
		$animatedArea.classList.add('show');
 	}
 	
 	function showTransitionEndEvent(e) {
 		/*
 		 * scroll to the top of the page and clean up the page.
 		 */
 		window.scrollTo(0, 0);
 		$animatedArea.removeEventListener('animationend', showTransitionEndEvent);
 		$animatedArea.classList.remove('show', 'hide');
 		$body.setAttribute('data-href', currentState.f);
 	}
	 
};

mentorMe.init();
