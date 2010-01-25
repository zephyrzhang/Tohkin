var currentSection = "ten-pane"; // The default loaded section on the page
var tabTag = "-tab";
var paneTag = "-pane";

// Scroll the page manually to the position of element "link", passed to us.

function ScrollSection(link, scrollArea, offset)
{

	// Store the last section, and update the current section

	if (currentSection == link) {
		return;
	}
	lastSection = currentSection;
	currentSection = link;
	
	// Change the section highlight.
	// Extract the root section name, and use that to change the background image to 'top', revealing the alt. state

    sectionTab = currentSection.split("-")[0] + tabTag;
    document.getElementById(sectionTab).className = "active";
    if (lastSection) {
	    lastTab = lastSection.split("-")[0] + tabTag;
	    document.getElementById(lastTab).className = "inactive";
	}
    
	// Get the element we want to scroll, get the position of the element to scroll to
	
	theScroll = document.getElementById(scrollArea);
	position = findElementPos(document.getElementById(link));

	// Get the position of the offset div -- the div at the far left.
	// This is the amount we compensate for when scrolling
	
	if (offset != "") {
		offsetPos = findElementPos(document.getElementById(offset));
		position[0] = position[0] - offsetPos[0];
	}

	scrollStart(theScroll, theScroll.scrollLeft, position[0], "horiz");
	// return false;
}

// Scroll the page using the arrows

function ScrollArrow(direction, toolbar, scrollArea, offset) {

	toolbarElem = document.getElementById(toolbar);
	toolbarNames = new Array();		// Find all the <li> elements in the toolbar, and extract their id's into an array.
    
	if (toolbarElem.hasChildNodes())
	{
		var children = toolbarElem.childNodes;
		for (var i = 0; i < children.length; i++) 
		{
			if (toolbarElem.childNodes[i].tagName == "LI") {
				toolbarNames.push(toolbarElem.childNodes[i].id.split("-")[0]);
			}
		}
	}

	// Now iterate through our array of tab names, find matches, and determine where to go.

	for (var i = 0; i < toolbarNames.length; i++) {
		if (toolbarNames[i] == currentSection.split("-")[0]) {
			if (direction == "left") {
				if (i - 1 < 0) {
					gotoTab = toolbarNames[toolbarNames.length - 1];
				} else {
					gotoTab = toolbarNames[i - 1];
				}
			} else {
				if ((i + 1) > (toolbarNames.length - 1)) {
					gotoTab = toolbarNames[0];
				} else {
					gotoTab = toolbarNames[i + 1];
				}
			}
		}
	}
	
	// Go to the section name!
	
	ScrollSection(gotoTab+paneTag, scrollArea, offset);

}

//
// Animated Scroll Functions
// Scrolls are synchronous -- only one at a time.
//

var scrollanim = {time:0, begin:0, change:0.0, duration:0.0, element:null, timer:null};

function scrollStart(elem, start, end, direction)
{
	//console.log("scrollStart from "+start+" to "+end+" in direction "+direction);

	if (scrollanim.timer != null) {
		clearInterval(scrollanim.timer);
		scrollanim.timer = null;
	}
	scrollanim.time = 0;
	scrollanim.begin = start;
	scrollanim.change = end - start;
	scrollanim.duration = 25;
	scrollanim.element = elem;
	
	if (direction == "horiz") {
		scrollanim.timer = setInterval("scrollHorizAnim();", 15);
	}
	else {
		scrollanim.timer = setInterval("scrollVertAnim();", 15);
	}
}

function scrollVertAnim()
{
	if (scrollanim.time > scrollanim.duration) {
		clearInterval(scrollanim.timer);
		scrollanim.timer = null;
	}
	else {
		move = sineInOut(scrollanim.time, scrollanim.begin, scrollanim.change, scrollanim.duration);
		scrollanim.element.scrollTop = move; 
		scrollanim.time++;
	}
}

function scrollHorizAnim()
{
	if (scrollanim.time > scrollanim.duration) {
		clearInterval(scrollanim.timer);
		scrollanim.timer = null;
	}
	else {
		move = sineInOut(scrollanim.time, scrollanim.begin, scrollanim.change, scrollanim.duration);
		scrollanim.element.scrollLeft = move;
		scrollanim.time++;
	}
}

//
// LARGE POPUP: Full-Screen Pop-up Functions
//

function showLargePopup(elem) {

    var popFullscreen = document.getElementById('fullscreen');
    var popLarge = document.getElementById('largepopup');

	// Put the correct content in the pop-up

	//if (navigator.platform.indexOf('Mac') != -1) {
	//	document.getElementById('start-download').className = 'show';
	//	document.getElementById('wrong-os').className = 'hide';
	//} else {
	//	document.getElementById('start-download').className = 'hide';
	//	document.getElementById('wrong-os').className = 'show';
	//}
 
 	document.getElementById('start-download').className = 'show';
	// document.getElementById('wrong-os').className = 'hide';
    
    // Make fullscreen thing really full screen, and show it
    getSize();
    popFullscreen.style.height = myScrollHeight + 'px';
    popFullscreen.style.display = 'block';
	
    // Position pop-up
    popLarge.style.left = ((myWidth - popLarge.offsetWidth) / 2) + 'px';
    popLarge.style.top = (((myHeight - popLarge.offsetHeight) / 2) + myScroll) + 'px';
    popLarge.style.visibility = 'visible';
    
    refreshTimer = setTimeout("setLocation('"+elem.getAttribute("href")+"')", 1500);

}

function setLocation(loc) {
	window.location = loc;
}

function hideLargePopup() {
    var popFullscreen = document.getElementById('fullscreen');
    var popLarge = document.getElementById('largepopup');
    
    popLarge.style.visibility = 'hidden';
    popFullscreen.style.display = 'none';
}

//
// DOWNLOAD SMALL POPUP: Download Hint Pop-up Functions
//
// An advantage of using a timer to do a hide is that we can ignore
// any spurious mouseOut events that have bubbled up, into <td>'s, etc.

var dpopTimer = "";

function showDownloadPopup(e) {
	var popDownload = document.getElementById('dpop');
	var btnDownload = document.getElementById('download');

	if (moveanim.timer != null) {
		clearInterval(moveanim.timer);
		moveanim.timer = null;
	}

	// Determine where we should pop up in relation to the download button

	position = findElementPos(btnDownload);
	popDownload.style.top = (position[1] - (popDownload.offsetHeight - 40)) +"px";
	popDownload.style.left = "5" + "px";

	// If already trigger a rollover, cancel it because we're back in

	if (dpopTimer != "")
	{
		clearTimeout(dpopTimer);
		dpopTimer = "";
	} else {
		setOpacity(0, 'dpop');
		popDownload.style.visibility = 'visible';
		moveStart(popDownload, parseInt(popDownload.style.left), parseInt(popDownload.style.left), parseInt(popDownload.style.top) + 10, parseInt(popDownload.style.top), 15);
		fadeElementSetup('dpop', 0, 100, 13);
	}
}

function hideDownloadPopup() {
	// Start timer to hide the pop-up and the overlay
	dpopTimer = setTimeout("actuallyHide()", 500);
}

function actuallyHide() {
	var popDownload = document.getElementById('dpop');
	if (dpopTimer != "")
	{
		dpopTimer = "";
		moveStart(popDownload, parseInt(popDownload.style.left), parseInt(popDownload.style.left), parseInt(popDownload.style.top), parseInt(popDownload.style.top) - 10, 15);		
		fadeElementSetup('dpop', 100, 0, 13, 1);
	}
}

//
// MOVE: Animate the move of an element.
//
// Move is also synchronous. One at a time, please.
//

var moveanim = {time:0, beginX:0, changeX:0.0, beginY:0, changeY:0, duration:0.0, element:null, timer:null};

function moveStart(elem, startX, endX, startY, endY, duration)
{
	if (moveanim.timer != null) {
		clearInterval(moveanim.timer);
		moveanim.timer = null;
	}
	moveanim.time = 0;
	moveanim.beginX = startX;
	moveanim.changeX = endX - startX;
	moveanim.beginY = startY;
	moveanim.changeY = endY - startY;
	moveanim.duration = duration;
	moveanim.element = elem;

	moveanim.timer = setInterval("moveAnimDo();", 15);
}

function moveAnimDo()
{
	if (moveanim.time > moveanim.duration) {
		clearInterval(moveanim.timer);
		moveanim.timer = null;
	}
	else {
		moveX = cubicOut(moveanim.time, moveanim.beginX, moveanim.changeX, moveanim.duration);
		moveY = cubicOut(moveanim.time, moveanim.beginY, moveanim.changeY, moveanim.duration);
		moveanim.element.style.left = moveX + "px";
		moveanim.element.style.top = moveY + "px";
		moveanim.time++;
	}
}// Set interval time in order to auto-scroll
//var auto_carousel = setInterval("ScrollArrow('right','toolbar','scroller','new-pane')", 5000);

//console.log("Initialized");