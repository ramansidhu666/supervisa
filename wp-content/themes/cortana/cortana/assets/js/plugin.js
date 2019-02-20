/*
 * -- CONTENTS
 *
 * - MODERNIZR
 * - STICKY
 *
 */
/////////////////////////////////////////////
// MODERNIZR PLUGIN
/////////////////////////////////////////////

/* Modernizr 2.8.3 (Custom Build) | MIT & BSD
 * Build: http://modernizr.com/download/#-fontface-backgroundsize-borderimage-borderradius-boxshadow-opacity-rgba-textshadow-cssanimations-csstransitions-shiv-cssclasses-prefixed-testprop-testallprops-domprefixes-load
 */
;window.Modernizr=function(a,b,c){function z(a){j.cssText=a}function A(a,b){return z(m.join(a+";")+(b||""))}function B(a,b){return typeof a===b}function C(a,b){return!!~(""+a).indexOf(b)}function D(a,b){for(var d in a){var e=a[d];if(!C(e,"-")&&j[e]!==c)return b=="pfx"?e:!0}return!1}function E(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:B(f,"function")?f.bind(d||b):f}return!1}function F(a,b,c){var d=a.charAt(0).toUpperCase()+a.slice(1),e=(a+" "+o.join(d+" ")+d).split(" ");return B(b,"string")||B(b,"undefined")?D(e,b):(e=(a+" "+p.join(d+" ")+d).split(" "),E(e,b,c))}var d="2.8.3",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k,l={}.toString,m=" -webkit- -moz- -o- -ms- ".split(" "),n="Webkit Moz O ms",o=n.split(" "),p=n.toLowerCase().split(" "),q={},r={},s={},t=[],u=t.slice,v,w=function(a,c,d,e){var f,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),l.appendChild(j);return f=["&#173;",'<style id="s',h,'">',a,"</style>"].join(""),l.id=h,(m?l:n).innerHTML+=f,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=g.style.overflow,g.style.overflow="hidden",g.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),g.style.overflow=k),!!i},x={}.hasOwnProperty,y;!B(x,"undefined")&&!B(x.call,"undefined")?y=function(a,b){return x.call(a,b)}:y=function(a,b){return b in a&&B(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=u.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(u.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(u.call(arguments)))};return e}),q.rgba=function(){return z("background-color:rgba(150,255,150,.5)"),C(j.backgroundColor,"rgba")},q.backgroundsize=function(){return F("backgroundSize")},q.borderimage=function(){return F("borderImage")},q.borderradius=function(){return F("borderRadius")},q.boxshadow=function(){return F("boxShadow")},q.textshadow=function(){return b.createElement("div").style.textShadow===""},q.opacity=function(){return A("opacity:.55"),/^0.55$/.test(j.opacity)},q.cssanimations=function(){return F("animationName")},q.csstransitions=function(){return F("transition")},q.fontface=function(){var a;return w('@font-face {font-family:"font";src:url("https://")}',function(c,d){var e=b.getElementById("smodernizr"),f=e.sheet||e.styleSheet,g=f?f.cssRules&&f.cssRules[0]?f.cssRules[0].cssText:f.cssText||"":"";a=/src/i.test(g)&&g.indexOf(d.split(" ")[0])===0}),a};for(var G in q)y(q,G)&&(v=G.toLowerCase(),e[v]=q[G](),t.push((e[v]?"":"no-")+v));return e.addTest=function(a,b){if(typeof a=="object")for(var d in a)y(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof f!="undefined"&&f&&(g.className+=" "+(b?"":"no-")+a),e[a]=b}return e},z(""),i=k=null,function(a,b){function l(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function m(){var a=s.elements;return typeof a=="string"?a.split(" "):a}function n(a){var b=j[a[h]];return b||(b={},i++,a[h]=i,j[i]=b),b}function o(a,c,d){c||(c=b);if(k)return c.createElement(a);d||(d=n(c));var g;return d.cache[a]?g=d.cache[a].cloneNode():f.test(a)?g=(d.cache[a]=d.createElem(a)).cloneNode():g=d.createElem(a),g.canHaveChildren&&!e.test(a)&&!g.tagUrn?d.frag.appendChild(g):g}function p(a,c){a||(a=b);if(k)return a.createDocumentFragment();c=c||n(a);var d=c.frag.cloneNode(),e=0,f=m(),g=f.length;for(;e<g;e++)d.createElement(f[e]);return d}function q(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag()),a.createElement=function(c){return s.shivMethods?o(c,a,b):b.createElem(c)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+m().join().replace(/[\w\-]+/g,function(a){return b.createElem(a),b.frag.createElement(a),'c("'+a+'")'})+");return n}")(s,b.frag)}function r(a){a||(a=b);var c=n(a);return s.shivCSS&&!g&&!c.hasCSS&&(c.hasCSS=!!l(a,"article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),k||q(a,c),a}var c="3.7.0",d=a.html5||{},e=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,f=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,g,h="_html5shiv",i=0,j={},k;(function(){try{var a=b.createElement("a");a.innerHTML="<xyz></xyz>",g="hidden"in a,k=a.childNodes.length==1||function(){b.createElement("a");var a=b.createDocumentFragment();return typeof a.cloneNode=="undefined"||typeof a.createDocumentFragment=="undefined"||typeof a.createElement=="undefined"}()}catch(c){g=!0,k=!0}})();var s={elements:d.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video",version:c,shivCSS:d.shivCSS!==!1,supportsUnknownElements:k,shivMethods:d.shivMethods!==!1,type:"default",shivDocument:r,createElement:o,createDocumentFragment:p};a.html5=s,r(b)}(this,b),e._version=d,e._prefixes=m,e._domPrefixes=p,e._cssomPrefixes=o,e.testProp=function(a){return D([a])},e.testAllProps=F,e.testStyles=w,e.prefixed=function(a,b,c){return b?F(a,b,c):F(a,"pfx")},g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+t.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return"[object Function]"==o.call(a)}function e(a){return"string"==typeof a}function f(){}function g(a){return!a||"loaded"==a||"complete"==a||"uninitialized"==a}function h(){var a=p.shift();q=1,a?a.t?m(function(){("c"==a.t?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){"img"!=a&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l=b.createElement(a),o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};1===y[c]&&(r=1,y[c]=[]),"object"==a?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),"img"!=a&&(r||2===y[c]?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i("c"==b?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),1==p.length&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&"[object Opera]"==o.call(a.opera),l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return"[object Array]"==o.call(a)},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,h){var i=b(a),j=i.autoCallback;i.url.split(".").pop().split("?").shift(),i.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]),i.instead?i.instead(a,e,f,g,h):(y[i.url]?i.noexec=!0:y[i.url]=1,f.load(i.url,i.forceCSS||!i.forceJS&&"css"==i.url.split(".").pop().split("?").shift()?"c":c,i.noexec,i.attrs,i.timeout),(d(e)||d(j))&&f.load(function(){k(),e&&e(i.origUrl,h,g),j&&j(i.origUrl,h,g),y[i.url]=2})))}function h(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var i,j,l=this.yepnope.loader;if(e(a))g(a,0,l,0);else if(w(a))for(i=0;i<a.length;i++)j=a[i],e(j)?g(j,0,l,0):w(j)?B(j):Object(j)===j&&h(j,l);else Object(a)===a&&h(a,l)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,null==b.readyState&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};

/////////////////////////////////////////////
// STICKY PLUGIN
/////////////////////////////////////////////

// Sticky Plugin v1.0.0 for jQuery
// =============
// Author: Anthony Garand
// Improvements by German M. Bravo (Kronuz) and Ruud Kamphuis (ruudk)
// Improvements by Leonardo C. Daronco (daronco)
// Created: 2/14/2011
// Date: 2/12/2012
// Website: http://labs.anthonygarand.com/sticky
// Description: Makes an element on the page stick on the screen as you scroll
//       It will only set the 'top' and 'position' of your element, you
//       might need to adjust the width in some cases.

(function ($) {
	'use strict';
    var defaults = {
            topSpacing: 0,
            bottomSpacing: 0,
            className: 'is-sticky',
            wrapperClassName: 'sticky-wrapper',
            center: false,
            getWidthFrom: '',
            responsiveWidth: false
        },
        $window = $(window),
        $document = $(document),
        sticked = [],
        windowHeight = $window.height(),
        scroller = function() {
            var scrollTop = $window.scrollTop(),
                documentHeight = $document.height(),
                dwh = documentHeight - windowHeight,
                extra = (scrollTop > dwh) ? dwh - scrollTop : 0;

            for (var i = 0; i < sticked.length; i++) {
                var s = sticked[i],
                    elementTop = s.stickyWrapper.offset().top,
                    etse = elementTop - s.topSpacing - extra;

                if (scrollTop <= etse) {
                    if (s.currentTop !== null) {
                        s.stickyElement
                            .css('position', '')
                            .css('top', '');
                        s.stickyElement.trigger('sticky-end', [s]).parent().removeClass(s.className);
                        s.currentTop = null;
                    }
                }
                else {
                    var newTop = documentHeight - s.stickyElement.outerHeight()
                        - s.topSpacing - s.bottomSpacing - scrollTop - extra;
                    if (newTop < 0) {
                        newTop = newTop + s.topSpacing;
                    } else {
                        newTop = s.topSpacing;
                    }
                    if (s.currentTop != newTop) {
                        s.stickyElement
                            .css('position', 'fixed')
                            .css('top', newTop);

                        if (typeof s.getWidthFrom !== 'undefined') {
                            s.stickyElement.css('width', $(s.getWidthFrom).width());
                        }

                        s.stickyElement.trigger('sticky-start', [s]).parent().addClass(s.className);
                        s.currentTop = newTop;
                    }
                }
            }
        },
        resizer = function() {
            windowHeight = $window.height();

            for (var i = 0; i < sticked.length; i++) {
                var s = sticked[i];
                if (typeof s.getWidthFrom !== 'undefined' && s.responsiveWidth === true) {
                    s.stickyElement.css('width', $(s.getWidthFrom).width());
                }
            }
        },
        methods = {
            init: function(options) {
                var o = $.extend({}, defaults, options);
                return this.each(function() {
                    var stickyElement = $(this);

                    var stickyId = stickyElement.attr('id');
                    var wrapperId = stickyId ? stickyId + '-' + defaults.wrapperClassName : defaults.wrapperClassName;
                    var wrapper = $('<div></div>')
                        .attr('id', stickyId + '-sticky-wrapper')
                        .addClass(o.wrapperClassName);
                    stickyElement.wrapAll(wrapper);

                    if (o.center) {
                        stickyElement.parent().css({width:stickyElement.outerWidth(),marginLeft:"auto",marginRight:"auto"});
                    }

                    if (stickyElement.css("float") == "right") {
                        stickyElement.css({"float":"none"}).parent().css({"float":"right"});
                    }

                    var stickyWrapper = stickyElement.parent();
                    var stickyHeight = stickyElement.outerHeight(true);

                    if (stickyHeight > 0) {
                        stickyWrapper.css('height', stickyElement.outerHeight(true));
                    }
                    sticked.push({
                        topSpacing: o.topSpacing,
                        bottomSpacing: o.bottomSpacing,
                        stickyElement: stickyElement,
                        currentTop: null,
                        stickyWrapper: stickyWrapper,
                        className: o.className,
                        getWidthFrom: o.getWidthFrom,
                        responsiveWidth: o.responsiveWidth
                    });
                });
            },
            update: scroller,
            unstick: function(options) {
                return this.each(function() {
                    var unstickyElement = $(this);

                    var removeIdx = -1;
                    for (var i = 0; i < sticked.length; i++)
                    {
                        if (sticked[i].stickyElement.get(0) == unstickyElement.get(0))
                        {
                            removeIdx = i;
                        }
                    }
                    if(removeIdx != -1)
                    {
                        sticked.splice(removeIdx,1);
                        unstickyElement.unwrap();
                        unstickyElement.removeAttr('style');
                    }
                });
            }
        };

    // should be more efficient than using $window.scroll(scroller) and $window.resize(resizer):
    if (window.addEventListener) {
        window.addEventListener('scroll', scroller, false);
        window.addEventListener('resize', resizer, false);
    } else if (window.attachEvent) {
        window.attachEvent('onscroll', scroller);
        window.attachEvent('onresize', resizer);
    }

    $.fn.sticky = function(method) {
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method ) {
            return methods.init.apply( this, arguments );
        } else {
            $.error('Method ' + method + ' does not exist on jQuery.sticky');
        }
    };

    $.fn.unstick = function(method) {
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method ) {
            return methods.unstick.apply( this, arguments );
        } else {
            $.error('Method ' + method + ' does not exist on jQuery.sticky');
        }

    };
    $(function() {
        setTimeout(scroller, 0);
    });
})(jQuery);
/*
 *  jQuery OwlCarousel v1.3.3
 *
 *  Copyright (c) 2013 Bartosz Wojciechowski
 *  http://www.owlgraphic.com/owlcarousel/
 *
 *  Licensed under MIT
 *
 */

/*JS Lint helpers: */
/*global dragMove: false, dragEnd: false, $, jQuery, alert, window, document */
/*jslint nomen: true, continue:true */
if (typeof Object.create !== "function") {
	Object.create = function (b) {
		function a() {
		}
		a.prototype = b;
		return new a()
	}
}
(function (c, b, a) {
	var d = {
		init                   : function (e, f) {
			var g = this;
			g.$elem = c(f);
			g.options = c.extend({}, c.fn.owlCarousel.options, g.$elem.data(), e);
			g.userOptions = e;
			g.loadContent()
		}, loadContent         : function () {
			var g = this, f;
			function e(k) {
				var h, j = "";
				if (typeof g.options.jsonSuccess === "function") {
					g.options.jsonSuccess.apply(this, [k])
				} else {
					for (h in k.owl) {
						if (k.owl.hasOwnProperty(h)) {
							j += k.owl[h].item
						}
					}
					g.$elem.html(j)
				}
				g.logIn()
			}
			if (typeof g.options.beforeInit === "function") {
				g.options.beforeInit.apply(this, [g.$elem])
			}
			if (typeof g.options.jsonPath === "string") {
				f = g.options.jsonPath;
				c.getJSON(f, e)
			} else {
				g.logIn()
			}
		}, logIn               : function () {
			var e = this;
			e.$elem.data("owl-originalStyles", e.$elem.attr("style"));
			e.$elem.data("owl-originalClasses", e.$elem.attr("class"));
			e.$elem.css({opacity: 0});
			e.orignalItems = e.options.items;
			e.checkBrowser();
			e.wrapperWidth = 0;
			e.checkVisible = null;
			e.setVars()
		}, setVars             : function () {
			var e = this;
			if (e.$elem.children().length === 0) {
				return false
			}
			e.baseClass();
			e.eventTypes();
			e.$userItems = e.$elem.children();
			e.itemsAmount = e.$userItems.length;
			e.wrapItems();
			e.$owlItems = e.$elem.find(".owl-item");
			e.$owlWrapper = e.$elem.find(".owl-wrapper");
			e.playDirection = "next";
			e.prevItem = 0;
			e.prevArr = [0];
			e.currentItem = 0;
			e.customEvents();
			e.onStartup()
		}, onStartup           : function () {
			var e = this;
			e.updateItems();
			e.calculateAll();
			e.buildControls();
			e.updateControls();
			e.response();
			e.moveEvents();
			e.stopOnHover();
			e.owlStatus();
			if (e.options.transitionStyle !== false) {
				e.transitionTypes(e.options.transitionStyle)
			}
			if (e.options.autoPlay === true) {
				e.options.autoPlay = 5000
			}
			e.play();
			e.$elem.find(".owl-wrapper").css("display", "block");
			if (!e.$elem.is(":visible")) {
				e.watchVisibility()
			} else {
				e.$elem.css("opacity", 1)
			}
			e.onstartup = false;
			e.eachMoveUpdate();
			if (typeof e.options.afterInit === "function") {
				e.options.afterInit.apply(this, [e.$elem])
			}
		}, eachMoveUpdate      : function () {
			var e = this;
			if (e.options.lazyLoad === true) {
				e.lazyLoad()
			}
			if (e.options.autoHeight === true) {
				e.autoHeight()
			}
			e.onVisibleItems();
			if (typeof e.options.afterAction === "function") {
				e.options.afterAction.apply(this, [e.$elem])
			}
		}, updateVars          : function () {
			var e = this;
			if (typeof e.options.beforeUpdate === "function") {
				e.options.beforeUpdate.apply(this, [e.$elem])
			}
			e.watchVisibility();
			e.updateItems();
			e.calculateAll();
			e.updatePosition();
			e.updateControls();
			e.eachMoveUpdate();
			if (typeof e.options.afterUpdate === "function") {
				e.options.afterUpdate.apply(this, [e.$elem])
			}
		}, reload              : function () {
			var e = this;
			b.setTimeout(function () {
				e.updateVars()
			}, 0)
		}, watchVisibility     : function () {
			var e = this;
			if (e.$elem.is(":visible") === false) {
				e.$elem.css({opacity: 0});
				b.clearInterval(e.autoPlayInterval);
				b.clearInterval(e.checkVisible)
			} else {
				return false
			}
			e.checkVisible = b.setInterval(function () {
				if (e.$elem.is(":visible")) {
					e.reload();
					e.$elem.animate({opacity: 1}, 200);
					b.clearInterval(e.checkVisible)
				}
			}, 500)
		}, wrapItems           : function () {
			var e = this;
			e.$userItems.wrapAll('<div class="owl-wrapper">').wrap('<div class="owl-item"></div>');
			e.$elem.find(".owl-wrapper").wrap('<div class="owl-wrapper-outer">');
			e.wrapperOuter = e.$elem.find(".owl-wrapper-outer");
			e.$elem.css("display", "block")
		}, baseClass           : function () {
			var g = this, e = g.$elem.hasClass(g.options.baseClass), f = g.$elem.hasClass(g.options.theme);
			if (!e) {
				g.$elem.addClass(g.options.baseClass)
			}
			if (!f) {
				g.$elem.addClass(g.options.theme)
			}
		}, updateItems         : function () {
			var g = this, f, e;
			if (g.options.responsive === false) {
				return false
			}
			if (g.options.singleItem === true) {
				g.options.items = g.orignalItems = 1;
				g.options.itemsCustom = false;
				g.options.itemsDesktop = false;
				g.options.itemsDesktopSmall = false;
				g.options.itemsTablet = false;
				g.options.itemsTabletSmall = false;
				g.options.itemsMobile = false;
				return false
			}
			f = c(g.options.responsiveBaseWidth).width();
			if (f > (g.options.itemsDesktop[0] || g.orignalItems)) {
				g.options.items = g.orignalItems
			}
			if (g.options.itemsCustom !== false) {
				g.options.itemsCustom.sort(function (i, h) {
					return i[0] - h[0]
				});
				for (e = 0; e < g.options.itemsCustom.length; e += 1) {
					if (g.options.itemsCustom[e][0] <= f) {
						g.options.items = g.options.itemsCustom[e][1]
					}
				}
			} else {
				if (f <= g.options.itemsDesktop[0] && g.options.itemsDesktop !== false) {
					g.options.items = g.options.itemsDesktop[1]
				}
				if (f <= g.options.itemsDesktopSmall[0] && g.options.itemsDesktopSmall !== false) {
					g.options.items = g.options.itemsDesktopSmall[1]
				}
				if (f <= g.options.itemsTablet[0] && g.options.itemsTablet !== false) {
					g.options.items = g.options.itemsTablet[1]
				}
				if (f <= g.options.itemsTabletSmall[0] && g.options.itemsTabletSmall !== false) {
					g.options.items = g.options.itemsTabletSmall[1]
				}
				if (f <= g.options.itemsMobile[0] && g.options.itemsMobile !== false) {
					g.options.items = g.options.itemsMobile[1]
				}
			}
			if (g.options.items > g.itemsAmount && g.options.itemsScaleUp === true) {
				g.options.items = g.itemsAmount
			}
		}, response            : function () {
			var g = this, f, e;
			if (g.options.responsive !== true) {
				return false
			}
			e = c(b).width();
			g.resizer = function () {
				if (c(b).width() !== e) {
					if (g.options.autoPlay !== false) {
						b.clearInterval(g.autoPlayInterval)
					}
					b.clearTimeout(f);
					f = b.setTimeout(function () {
						e = c(b).width();
						g.updateVars()
					}, g.options.responsiveRefreshRate)
				}
			};
			c(b).resize(g.resizer)
		}, updatePosition      : function () {
			var e = this;
			e.jumpTo(e.currentItem);
			if (e.options.autoPlay !== false) {
				e.checkAp()
			}
		}, appendItemsSizes    : function () {
			var g = this, e = 0, f = g.itemsAmount - g.options.items;
			g.$owlItems.each(function (h) {
				var i = c(this);
				i.css({width: g.itemWidth}).data("owl-item", Number(h));
				if (h % g.options.items === 0 || h === f) {
					if (!(h > f)) {
						e += 1
					}
				}
				i.data("owl-roundPages", e)
			})
		}, appendWrapperSizes  : function () {
			var f = this, e = f.$owlItems.length * f.itemWidth;
			f.$owlWrapper.css({width: e * 2, left: 0});
			f.appendItemsSizes()
		}, calculateAll        : function () {
			var e = this;
			e.calculateWidth();
			e.appendWrapperSizes();
			e.loops();
			e.max()
		}, calculateWidth      : function () {
			var e = this;
			e.itemWidth = Math.round(e.$elem.width() / e.options.items)
		}, max                 : function () {
			var e = this, f = ((e.itemsAmount * e.itemWidth) - e.options.items * e.itemWidth) * -1;
			if (e.options.items > e.itemsAmount) {
				e.maximumItem = 0;
				f = 0;
				e.maximumPixels = 0
			} else {
				e.maximumItem = e.itemsAmount - e.options.items;
				e.maximumPixels = f
			}
			return f
		}, min                 : function () {
			return 0
		}, loops               : function () {
			var k = this, j = 0, g = 0, f, h, e;
			k.positionsInArray = [0];
			k.pagesInArray = [];
			for (f = 0; f < k.itemsAmount; f += 1) {
				g += k.itemWidth;
				k.positionsInArray.push(-g);
				if (k.options.scrollPerPage === true) {
					h = c(k.$owlItems[f]);
					e = h.data("owl-roundPages");
					if (e !== j) {
						k.pagesInArray[j] = k.positionsInArray[f];
						j = e
					}
				}
			}
		}, buildControls       : function () {
			var e = this;
			if (e.options.navigation === true || e.options.pagination === true) {
				e.owlControls = c('<div class="owl-controls"/>').toggleClass("clickable", !e.browser.isTouch).appendTo(e.$elem)
			}
			if (e.options.pagination === true) {
				e.buildPagination()
			}
			if (e.options.navigation === true) {
				e.buildButtons()
			}
		}, buildButtons        : function () {
			var f = this, e = c('<div class="owl-buttons"/>');
			f.owlControls.append(e);
			f.buttonPrev = c("<div/>", {"class": "owl-prev", html: f.options.navigationText[0] || ""});
			f.buttonNext = c("<div/>", {"class": "owl-next", html: f.options.navigationText[1] || ""});
			e.append(f.buttonPrev).append(f.buttonNext);
			e.on("touchstart.owlControls mousedown.owlControls", 'div[class^="owl"]', function (g) {
				g.preventDefault()
			});
			e.on("touchend.owlControls mouseup.owlControls", 'div[class^="owl"]', function (g) {
				g.preventDefault();
				if (c(this).hasClass("owl-next")) {
					f.next()
				} else {
					f.prev()
				}
			})
		}, buildPagination     : function () {
			var e = this;
			e.paginationWrapper = c('<div class="owl-pagination"/>');
			e.owlControls.append(e.paginationWrapper);
			e.paginationWrapper.on("touchend.owlControls mouseup.owlControls", ".owl-page", function (f) {
				f.preventDefault();
				if (Number(c(this).data("owl-page")) !== e.currentItem) {
					e.goTo(Number(c(this).data("owl-page")), true)
				}
			})
		}, updatePagination    : function () {
			var l = this, f, k, j, h, g, e;
			if (l.options.pagination === false) {
				return false
			}
			l.paginationWrapper.html("");
			f = 0;
			k = l.itemsAmount - l.itemsAmount % l.options.items;
			for (h = 0; h < l.itemsAmount; h += 1) {
				if (h % l.options.items === 0) {
					f += 1;
					if (k === h) {
						j = l.itemsAmount - l.options.items
					}
					g = c("<div/>", {"class": "owl-page"});
					e = c("<span></span>", {
						text   : l.options.paginationNumbers === true ? f : "",
						"class": l.options.paginationNumbers === true ? "owl-numbers" : ""
					});
					g.append(e);
					g.data("owl-page", k === h ? j : h);
					g.data("owl-roundPages", f);
					l.paginationWrapper.append(g)
				}
			}
			l.checkPagination()
		}, checkPagination     : function () {
			var e = this;
			if (e.options.pagination === false) {
				return false
			}
			e.paginationWrapper.find(".owl-page").each(function () {
				if (c(this).data("owl-roundPages") === c(e.$owlItems[e.currentItem]).data("owl-roundPages")) {
					e.paginationWrapper.find(".owl-page").removeClass("active");
					c(this).addClass("active")
				}
			})
		}, checkNavigation     : function () {
			var e = this;
			if (e.options.navigation === false) {
				return false
			}
			if (e.options.rewindNav === false) {
				if (e.currentItem === 0 && e.maximumItem === 0) {
					e.buttonPrev.addClass("disabled");
					e.buttonNext.addClass("disabled")
				} else {
					if (e.currentItem === 0 && e.maximumItem !== 0) {
						e.buttonPrev.addClass("disabled");
						e.buttonNext.removeClass("disabled")
					} else {
						if (e.currentItem === e.maximumItem) {
							e.buttonPrev.removeClass("disabled");
							e.buttonNext.addClass("disabled")
						} else {
							if (e.currentItem !== 0 && e.currentItem !== e.maximumItem) {
								e.buttonPrev.removeClass("disabled");
								e.buttonNext.removeClass("disabled")
							}
						}
					}
				}
			}
		}, updateControls      : function () {
			var e = this;
			e.updatePagination();
			e.checkNavigation();
			if (e.owlControls) {
				if (e.options.items >= e.itemsAmount) {
					e.owlControls.hide()
				} else {
					e.owlControls.show()
				}
			}
		}, destroyControls     : function () {
			var e = this;
			if (e.owlControls) {
				e.owlControls.remove()
			}
		}, next                : function (f) {
			var e = this;
			if (e.isTransition) {
				return false
			}
			e.currentItem += e.options.scrollPerPage === true ? e.options.items : 1;
			if (e.currentItem > e.maximumItem + (e.options.scrollPerPage === true ? (e.options.items - 1) : 0)) {
				if (e.options.rewindNav === true) {
					e.currentItem = 0;
					f = "rewind"
				} else {
					e.currentItem = e.maximumItem;
					return false
				}
			}
			e.goTo(e.currentItem, f)
		}, prev                : function (f) {
			var e = this;
			if (e.isTransition) {
				return false
			}
			if (e.options.scrollPerPage === true && e.currentItem > 0 && e.currentItem < e.options.items) {
				e.currentItem = 0
			} else {
				e.currentItem -= e.options.scrollPerPage === true ? e.options.items : 1
			}
			if (e.currentItem < 0) {
				if (e.options.rewindNav === true) {
					e.currentItem = e.maximumItem;
					f = "rewind"
				} else {
					e.currentItem = 0;
					return false
				}
			}
			e.goTo(e.currentItem, f)
		}, goTo                : function (e, i, g) {
			var h = this, f;
			if (h.isTransition) {
				return false
			}
			if (typeof h.options.beforeMove === "function") {
				h.options.beforeMove.apply(this, [h.$elem])
			}
			if (e >= h.maximumItem) {
				e = h.maximumItem
			} else {
				if (e <= 0) {
					e = 0
				}
			}
			h.currentItem = h.owl.currentItem = e;
			if (h.options.transitionStyle !== false && g !== "drag" && h.options.items === 1 && h.browser.support3d === true) {
				h.swapSpeed(0);
				if (h.browser.support3d === true) {
					h.transition3d(h.positionsInArray[e])
				} else {
					h.css2slide(h.positionsInArray[e], 1)
				}
				h.afterGo();
				h.singleItemTransition();
				return false
			}
			f = h.positionsInArray[e];
			if (h.browser.support3d === true) {
				h.isCss3Finish = false;
				if (i === true) {
					h.swapSpeed("paginationSpeed");
					b.setTimeout(function () {
						h.isCss3Finish = true
					}, h.options.paginationSpeed)
				} else {
					if (i === "rewind") {
						h.swapSpeed(h.options.rewindSpeed);
						b.setTimeout(function () {
							h.isCss3Finish = true
						}, h.options.rewindSpeed)
					} else {
						h.swapSpeed("slideSpeed");
						b.setTimeout(function () {
							h.isCss3Finish = true
						}, h.options.slideSpeed)
					}
				}
				h.transition3d(f)
			} else {
				if (i === true) {
					h.css2slide(f, h.options.paginationSpeed)
				} else {
					if (i === "rewind") {
						h.css2slide(f, h.options.rewindSpeed)
					} else {
						h.css2slide(f, h.options.slideSpeed)
					}
				}
			}
			h.afterGo()
		}, jumpTo              : function (e) {
			var f = this;
			if (typeof f.options.beforeMove === "function") {
				f.options.beforeMove.apply(this, [f.$elem])
			}
			if (e >= f.maximumItem || e === -1) {
				e = f.maximumItem
			} else {
				if (e <= 0) {
					e = 0
				}
			}
			f.swapSpeed(0);
			if (f.browser.support3d === true) {
				f.transition3d(f.positionsInArray[e])
			} else {
				f.css2slide(f.positionsInArray[e], 1)
			}
			f.currentItem = f.owl.currentItem = e;
			f.afterGo()
		}, afterGo             : function () {
			var e = this;
			e.prevArr.push(e.currentItem);
			e.prevItem = e.owl.prevItem = e.prevArr[e.prevArr.length - 2];
			e.prevArr.shift(0);
			if (e.prevItem !== e.currentItem) {
				e.checkPagination();
				e.checkNavigation();
				e.eachMoveUpdate();
				if (e.options.autoPlay !== false) {
					e.checkAp()
				}
			}
			if (typeof e.options.afterMove === "function" && e.prevItem !== e.currentItem) {
				e.options.afterMove.apply(this, [e.$elem])
			}
		}, stop                : function () {
			var e = this;
			e.apStatus = "stop";
			b.clearInterval(e.autoPlayInterval)
		}, checkAp             : function () {
			var e = this;
			if (e.apStatus !== "stop") {
				e.play()
			}
		}, play                : function () {
			var e = this;
			e.apStatus = "play";
			if (e.options.autoPlay === false) {
				return false
			}
			b.clearInterval(e.autoPlayInterval);
			e.autoPlayInterval = b.setInterval(function () {
				e.next(true)
			}, e.options.autoPlay)
		}, swapSpeed           : function (f) {
			var e = this;
			if (f === "slideSpeed") {
				e.$owlWrapper.css(e.addCssSpeed(e.options.slideSpeed))
			} else {
				if (f === "paginationSpeed") {
					e.$owlWrapper.css(e.addCssSpeed(e.options.paginationSpeed))
				} else {
					if (typeof f !== "string") {
						e.$owlWrapper.css(e.addCssSpeed(f))
					}
				}
			}
		}, addCssSpeed         : function (e) {
			return {
				"-webkit-transition": "all " + e + "ms ease",
				"-moz-transition"   : "all " + e + "ms ease",
				"-o-transition"     : "all " + e + "ms ease",
				transition          : "all " + e + "ms ease"
			}
		}, removeTransition    : function () {
			return {"-webkit-transition": "", "-moz-transition": "", "-o-transition": "", transition: ""}
		}, doTranslate         : function (e) {
			return {
				"-webkit-transform": "translate3d(" + e + "px, 0px, 0px)",
				"-moz-transform"   : "translate3d(" + e + "px, 0px, 0px)",
				"-o-transform"     : "translate3d(" + e + "px, 0px, 0px)",
				"-ms-transform"    : "translate3d(" + e + "px, 0px, 0px)",
				transform          : "translate3d(" + e + "px, 0px,0px)"
			}
		}, transition3d        : function (f) {
			var e = this;
			e.$owlWrapper.css(e.doTranslate(f))
		}, css2move            : function (f) {
			var e = this;
			e.$owlWrapper.css({left: f})
		}, css2slide           : function (g, f) {
			var e = this;
			e.isCssFinish = false;
			e.$owlWrapper.stop(true, true).animate({left: g}, {
				duration: f || e.options.slideSpeed, complete: function () {
					e.isCssFinish = true
				}
			})
		}, checkBrowser        : function () {
			var j = this, g = "translate3d(0px, 0px, 0px)", i = a.createElement("div"), h, f, k, e;
			i.style.cssText = "  -moz-transform:" + g + "; -ms-transform:" + g + "; -o-transform:" + g + "; -webkit-transform:" + g + "; transform:" + g;
			h = /translate3d\(0px, 0px, 0px\)/g;
			f = i.style.cssText.match(h);
			k = (f !== null && f.length >= 1 && f.length <= 2);
			e = "ontouchstart" in b || b.navigator.msMaxTouchPoints;
			j.browser = {support3d: k, isTouch: e}
		}, moveEvents          : function () {
			var e = this;
			if (e.options.mouseDrag !== false || e.options.touchDrag !== false) {
				e.gestures();
				e.disabledEvents()
			}
		}, eventTypes          : function () {
			var f = this, e = ["s", "e", "x"];
			f.ev_types = {};
			if (f.options.mouseDrag === true && f.options.touchDrag === true) {
				e = ["touchstart.owl mousedown.owl", "touchmove.owl mousemove.owl", "touchend.owl touchcancel.owl mouseup.owl"]
			} else {
				if (f.options.mouseDrag === false && f.options.touchDrag === true) {
					e = ["touchstart.owl", "touchmove.owl", "touchend.owl touchcancel.owl"]
				} else {
					if (f.options.mouseDrag === true && f.options.touchDrag === false) {
						e = ["mousedown.owl", "mousemove.owl", "mouseup.owl"]
					}
				}
			}
			f.ev_types.start = e[0];
			f.ev_types.move = e[1];
			f.ev_types.end = e[2]
		}, disabledEvents      : function () {
			var e = this;
			e.$elem.on("dragstart.owl", function (f) {
				f.preventDefault()
			});
			e.$elem.on("mousedown.disableTextSelect", function (f) {
				return c(f.target).is("input, textarea, select, option")
			})
		}, gestures            : function () {
			var h = this, i = {
				offsetX      : 0,
				offsetY      : 0,
				baseElWidth  : 0,
				relativePos  : 0,
				position     : null,
				minSwipe     : null,
				maxSwipe     : null,
				sliding      : null,
				dargging     : null,
				targetElement: null
			};
			h.isCssFinish = true;
			function k(l) {
				if (l.touches !== undefined) {
					return {x: l.touches[0].pageX, y: l.touches[0].pageY}
				}
				if (l.touches === undefined) {
					if (l.pageX !== undefined) {
						return {x: l.pageX, y: l.pageY}
					}
					if (l.pageX === undefined) {
						return {x: l.clientX, y: l.clientY}
					}
				}
			}
			function j(l) {
				if (l === "on") {
					c(a).on(h.ev_types.move, g);
					c(a).on(h.ev_types.end, e)
				} else {
					if (l === "off") {
						c(a).off(h.ev_types.move);
						c(a).off(h.ev_types.end)
					}
				}
			}
			function f(n) {
				var m = n.originalEvent || n || b.event, l;
				if (m.which === 3) {
					return false
				}
				if (h.itemsAmount <= h.options.items) {
					return
				}
				if (h.isCssFinish === false && !h.options.dragBeforeAnimFinish) {
					return false
				}
				if (h.isCss3Finish === false && !h.options.dragBeforeAnimFinish) {
					return false
				}
				if (h.options.autoPlay !== false) {
					b.clearInterval(h.autoPlayInterval)
				}
				if (h.browser.isTouch !== true && !h.$owlWrapper.hasClass("grabbing")) {
					h.$owlWrapper.addClass("grabbing")
				}
				h.newPosX = 0;
				h.newRelativeX = 0;
				c(this).css(h.removeTransition());
				l = c(this).position();
				i.relativePos = l.left;
				i.offsetX = k(m).x - l.left;
				i.offsetY = k(m).y - l.top;
				j("on");
				i.sliding = false;
				i.targetElement = m.target || m.srcElement
			}
			function g(o) {
				var n = o.originalEvent || o || b.event, l, m;
				h.newPosX = k(n).x - i.offsetX;
				h.newPosY = k(n).y - i.offsetY;
				h.newRelativeX = h.newPosX - i.relativePos;
				if (typeof h.options.startDragging === "function" && i.dragging !== true && h.newRelativeX !== 0) {
					i.dragging = true;
					h.options.startDragging.apply(h, [h.$elem])
				}
				if ((h.newRelativeX > 8 || h.newRelativeX < -8) && (h.browser.isTouch === true)) {
					if (n.preventDefault !== undefined) {
						n.preventDefault()
					} else {
						n.returnValue = false
					}
					i.sliding = true
				}
				if ((h.newPosY > 10 || h.newPosY < -10) && i.sliding === false) {
					c(a).off("touchmove.owl")
				}
				l = function () {
					return h.newRelativeX / 5
				};
				m = function () {
					return h.maximumPixels + h.newRelativeX / 5
				};
				h.newPosX = Math.max(Math.min(h.newPosX, l()), m());
				if (h.browser.support3d === true) {
					h.transition3d(h.newPosX)
				} else {
					h.css2move(h.newPosX)
				}
			}
			function e(p) {
				var o = p.originalEvent || p || b.event, n, m, l;
				o.target = o.target || o.srcElement;
				i.dragging = false;
				if (h.browser.isTouch !== true) {
					h.$owlWrapper.removeClass("grabbing")
				}
				if (h.newRelativeX < 0) {
					h.dragDirection = h.owl.dragDirection = "left"
				} else {
					h.dragDirection = h.owl.dragDirection = "right"
				}
				if (h.newRelativeX !== 0) {
					n = h.getNewPosition();
					h.goTo(n, false, "drag");
					if (i.targetElement === o.target && h.browser.isTouch !== true) {
						c(o.target).on("click.disable", function (q) {
							q.stopImmediatePropagation();
							q.stopPropagation();
							q.preventDefault();
							c(q.target).off("click.disable")
						});
						m = c._data(o.target, "events").click;
						l = m.pop();
						m.splice(0, 0, l)
					}
				}
				j("off")
			}
			h.$elem.on(h.ev_types.start, ".owl-wrapper", f)
		}, getNewPosition      : function () {
			var f = this, e = f.closestItem();
			if (e > f.maximumItem) {
				f.currentItem = f.maximumItem;
				e = f.maximumItem
			} else {
				if (f.newPosX >= 0) {
					e = 0;
					f.currentItem = 0
				}
			}
			return e
		}, closestItem         : function () {
			var g = this, h = g.options.scrollPerPage === true ? g.pagesInArray : g.positionsInArray, e = g.newPosX, f = null;
			c.each(h, function (k, j) {
				if (e - (g.itemWidth / 20) > h[k + 1] && e - (g.itemWidth / 20) < j && g.moveDirection() === "left") {
					f = j;
					if (g.options.scrollPerPage === true) {
						g.currentItem = c.inArray(f, g.positionsInArray)
					} else {
						g.currentItem = k
					}
				} else {
					if (e + (g.itemWidth / 20) < j && e + (g.itemWidth / 20) > (h[k + 1] || h[k] - g.itemWidth) && g.moveDirection() === "right") {
						if (g.options.scrollPerPage === true) {
							f = h[k + 1] || h[h.length - 1];
							g.currentItem = c.inArray(f, g.positionsInArray)
						} else {
							f = h[k + 1];
							g.currentItem = k + 1
						}
					}
				}
			});
			return g.currentItem
		}, moveDirection       : function () {
			var e = this, f;
			if (e.newRelativeX < 0) {
				f = "right";
				e.playDirection = "next"
			} else {
				f = "left";
				e.playDirection = "prev"
			}
			return f
		}, customEvents        : function () {
			var e = this;
			e.$elem.on("owl.next", function () {
				e.next()
			});
			e.$elem.on("owl.prev", function () {
				e.prev()
			});
			e.$elem.on("owl.play", function (f, g) {
				e.options.autoPlay = g;
				e.play();
				e.hoverStatus = "play"
			});
			e.$elem.on("owl.stop", function () {
				e.stop();
				e.hoverStatus = "stop"
			});
			e.$elem.on("owl.goTo", function (g, f) {
				e.goTo(f)
			});
			e.$elem.on("owl.jumpTo", function (g, f) {
				e.jumpTo(f)
			})
		}, stopOnHover         : function () {
			var e = this;
			if (e.options.stopOnHover === true && e.browser.isTouch !== true && e.options.autoPlay !== false) {
				e.$elem.on("mouseover", function () {
					e.stop()
				});
				e.$elem.on("mouseout", function () {
					if (e.hoverStatus !== "stop") {
						e.play()
					}
				})
			}
		}, lazyLoad            : function () {
			var k = this, h, f, j, g, e;
			if (k.options.lazyLoad === false) {
				return false
			}
			for (h = 0; h < k.itemsAmount; h += 1) {
				f = c(k.$owlItems[h]);
				if (f.data("owl-loaded") === "loaded") {
					continue
				}
				j = f.data("owl-item");
				g = f.find(".lazyOwl");
				if (typeof g.data("src") !== "string") {
					f.data("owl-loaded", "loaded");
					continue
				}
				if (f.data("owl-loaded") === undefined) {
					g.hide();
					f.addClass("loading").data("owl-loaded", "checked")
				}
				if (k.options.lazyFollow === true) {
					e = j >= k.currentItem
				} else {
					e = true
				}
				if (e && j < k.currentItem + k.options.items && g.length) {
					k.lazyPreload(f, g)
				}
			}
		}, lazyPreload         : function (e, f) {
			var i = this, h = 0, j;
			if (f.prop("tagName") === "DIV") {
				f.css("background-image", "url(" + f.data("src") + ")");
				j = true
			} else {
				f[0].src = f.data("src")
			}
			function g() {
				e.data("owl-loaded", "loaded").removeClass("loading");
				f.removeAttr("data-src");
				if (i.options.lazyEffect === "fade") {
					f.fadeIn(400)
				} else {
					f.show()
				}
				if (typeof i.options.afterLazyLoad === "function") {
					i.options.afterLazyLoad.apply(this, [i.$elem])
				}
			}
			function k() {
				h += 1;
				if (i.completeImg(f.get(0)) || j === true) {
					g()
				} else {
					if (h <= 100) {
						b.setTimeout(k, 100)
					} else {
						g()
					}
				}
			}
			k()
		}, autoHeight          : function () {
			var h = this, i = c(h.$owlItems[h.currentItem]).find("img"), g;
			function e() {
				var j = c(h.$owlItems[h.currentItem]).height();
				h.wrapperOuter.css("height", j + "px");
				if (!h.wrapperOuter.hasClass("autoHeight")) {
					b.setTimeout(function () {
						h.wrapperOuter.addClass("autoHeight")
					}, 0)
				}
			}
			function f() {
				g += 1;
				if (h.completeImg(i.get(0))) {
					e()
				} else {
					if (g <= 100) {
						b.setTimeout(f, 100)
					} else {
						h.wrapperOuter.css("height", "")
					}
				}
			}
			if (i.get(0) !== undefined) {
				g = 0;
				f()
			} else {
				e()
			}
		}, completeImg         : function (e) {
			var f;
			if (!e.complete) {
				return false
			}
			f = typeof e.naturalWidth;
			if (f !== "undefined" && e.naturalWidth === 0) {
				return false
			}
			return true
		}, onVisibleItems      : function () {
			var f = this, e;
			if (f.options.addClassActive === true) {
				f.$owlItems.removeClass("active")
			}
			f.visibleItems = [];
			for (e = f.currentItem; e < f.currentItem + f.options.items; e += 1) {
				f.visibleItems.push(e);
				if (f.options.addClassActive === true) {
					c(f.$owlItems[e]).addClass("active")
				}
			}
			f.owl.visibleItems = f.visibleItems
		}, transitionTypes     : function (e) {
			var f = this;
			f.outClass = "owl-" + e + "-out";
			f.inClass = "owl-" + e + "-in"
		}, singleItemTransition: function () {
			var f = this, h = f.outClass, k = f.inClass, j = f.$owlItems.eq(f.currentItem), i = f.$owlItems.eq(f.prevItem), m = Math.abs(f.positionsInArray[f.currentItem]) + f.positionsInArray[f.prevItem], l = Math.abs(f.positionsInArray[f.currentItem]) + f.itemWidth / 2, g = "webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend";
			f.isTransition = true;
			f.$owlWrapper.addClass("owl-origin").css({
				"-webkit-transform-origin": l + "px",
				"-moz-perspective-origin" : l + "px",
				"perspective-origin"      : l + "px"
			});
			function e(n) {
				return {position: "relative", left: n + "px"}
			}
			i.css(e(m, 10)).addClass(h).on(g, function () {
				f.endPrev = true;
				i.off(g);
				f.clearTransStyle(i, h)
			});
			j.addClass(k).on(g, function () {
				f.endCurrent = true;
				j.off(g);
				f.clearTransStyle(j, k)
			})
		}, clearTransStyle     : function (f, e) {
			var g = this;
			f.css({position: "", left: ""}).removeClass(e);
			if (g.endPrev && g.endCurrent) {
				g.$owlWrapper.removeClass("owl-origin");
				g.endPrev = false;
				g.endCurrent = false;
				g.isTransition = false
			}
		}, owlStatus           : function () {
			var e = this;
			e.owl = {
				userOptions  : e.userOptions,
				baseElement  : e.$elem,
				userItems    : e.$userItems,
				owlItems     : e.$owlItems,
				currentItem  : e.currentItem,
				prevItem     : e.prevItem,
				visibleItems : e.visibleItems,
				isTouch      : e.browser.isTouch,
				browser      : e.browser,
				dragDirection: e.dragDirection
			}
		}, clearEvents         : function () {
			var e = this;
			e.$elem.off(".owl owl mousedown.disableTextSelect");
			c(a).off(".owl owl");
			c(b).off("resize", e.resizer)
		}, unWrap              : function () {
			var e = this;
			if (e.$elem.children().length !== 0) {
				e.$owlWrapper.unwrap();
				e.$userItems.unwrap().unwrap();
				if (e.owlControls) {
					e.owlControls.remove()
				}
			}
			e.clearEvents();
			e.$elem.attr("style", e.$elem.data("owl-originalStyles") || "").attr("class", e.$elem.data("owl-originalClasses"))
		}, destroy             : function () {
			var e = this;
			e.stop();
			b.clearInterval(e.checkVisible);
			e.unWrap();
			e.$elem.removeData()
		}, reinit              : function (g) {
			var f = this, e = c.extend({}, f.userOptions, g);
			f.unWrap();
			f.init(e, f.$elem)
		}, addItem             : function (h, f) {
			var g = this, e;
			if (!h) {
				return false
			}
			if (g.$elem.children().length === 0) {
				g.$elem.append(h);
				g.setVars();
				return false
			}
			g.unWrap();
			if (f === undefined || f === -1) {
				e = -1
			} else {
				e = f
			}
			if (e >= g.$userItems.length || e === -1) {
				g.$userItems.eq(-1).after(h)
			} else {
				g.$userItems.eq(e).before(h)
			}
			g.setVars()
		}, removeItem          : function (f) {
			var g = this, e;
			if (g.$elem.children().length === 0) {
				return false
			}
			if (f === undefined || f === -1) {
				e = -1
			} else {
				e = f
			}
			g.unWrap();
			g.$userItems.eq(e).remove();
			g.setVars()
		}
	};
	c.fn.owlCarousel = function (e) {
		return this.each(function () {
			if (c(this).data("owl-init") === true) {
				return false
			}
			c(this).data("owl-init", true);
			var f = Object.create(d);
			f.init(e, this);
			c.data(this, "owlCarousel", f)
		})
	};
	c.fn.owlCarousel.options = {
		items                : 5,
		itemsCustom          : false,
		itemsDesktop         : [1199, 4],
		itemsDesktopSmall    : [979, 3],
		itemsTablet          : [768, 2],
		itemsTabletSmall     : false,
		itemsMobile          : [479, 1],
		singleItem           : false,
		itemsScaleUp         : false,
		slideSpeed           : 200,
		paginationSpeed      : 800,
		rewindSpeed          : 1000,
		autoPlay             : false,
		stopOnHover          : false,
		navigation           : false,
		navigationText       : ["prev", "next"],
		rewindNav            : true,
		scrollPerPage        : false,
		pagination           : true,
		paginationNumbers    : false,
		responsive           : true,
		responsiveRefreshRate: 200,
		responsiveBaseWidth  : b,
		baseClass            : "owl-carousel",
		theme                : "owl-theme",
		lazyLoad             : false,
		lazyFollow           : true,
		lazyEffect           : "fade",
		autoHeight           : false,
		jsonPath             : false,
		jsonSuccess          : false,
		dragBeforeAnimFinish : true,
		mouseDrag            : true,
		touchDrag            : true,
		addClassActive       : false,
		transitionStyle      : false,
		beforeUpdate         : false,
		afterUpdate          : false,
		beforeInit           : false,
		afterInit            : false,
		beforeMove           : false,
		afterMove            : false,
		afterAction          : false,
		startDragging        : false,
		afterLazyLoad        : false
	}
}(jQuery, window, document));
/*!
 * imagesLoaded PACKAGED v3.1.8
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */

(function () {
	function e() {
	}
	function t(e, t) {
		for (var n = e.length; n--;)if (e[n].listener === t)return n;
		return -1
	}
	function n(e) {
		return function () {
			return this[e].apply(this, arguments)
		}
	}
	var i = e.prototype, r = this, o = r.EventEmitter;
	i.getListeners = function (e) {
		var t, n, i = this._getEvents();
		if ("object" == typeof e) {
			t = {};
			for (n in i)i.hasOwnProperty(n) && e.test(n) && (t[n] = i[n])
		} else t = i[e] || (i[e] = []);
		return t
	}, i.flattenListeners = function (e) {
		var t, n = [];
		for (t = 0; e.length > t; t += 1)n.push(e[t].listener);
		return n
	}, i.getListenersAsObject = function (e) {
		var t, n = this.getListeners(e);
		return n instanceof Array && (t = {}, t[e] = n), t || n
	}, i.addListener = function (e, n) {
		var i, r = this.getListenersAsObject(e), o = "object" == typeof n;
		for (i in r)r.hasOwnProperty(i) && -1 === t(r[i], n) && r[i].push(o ? n : {listener: n, once: !1});
		return this
	}, i.on = n("addListener"), i.addOnceListener = function (e, t) {
		return this.addListener(e, {listener: t, once: !0})
	}, i.once = n("addOnceListener"), i.defineEvent = function (e) {
		return this.getListeners(e), this
	}, i.defineEvents = function (e) {
		for (var t = 0; e.length > t; t += 1)this.defineEvent(e[t]);
		return this
	}, i.removeListener = function (e, n) {
		var i, r, o = this.getListenersAsObject(e);
		for (r in o)o.hasOwnProperty(r) && (i = t(o[r], n), -1 !== i && o[r].splice(i, 1));
		return this
	}, i.off = n("removeListener"), i.addListeners = function (e, t) {
		return this.manipulateListeners(!1, e, t)
	}, i.removeListeners = function (e, t) {
		return this.manipulateListeners(!0, e, t)
	}, i.manipulateListeners = function (e, t, n) {
		var i, r, o = e ? this.removeListener : this.addListener, s = e ? this.removeListeners : this.addListeners;
		if ("object" != typeof t || t instanceof RegExp)for (i = n.length; i--;)o.call(this, t, n[i]); else for (i in t)t.hasOwnProperty(i) && (r = t[i]) && ("function" == typeof r ? o.call(this, i, r) : s.call(this, i, r));
		return this
	}, i.removeEvent = function (e) {
		var t, n = typeof e, i = this._getEvents();
		if ("string" === n)delete i[e]; else if ("object" === n)for (t in i)i.hasOwnProperty(t) && e.test(t) && delete i[t]; else delete this._events;
		return this
	}, i.removeAllListeners = n("removeEvent"), i.emitEvent = function (e, t) {
		var n, i, r, o, s = this.getListenersAsObject(e);
		for (r in s)if (s.hasOwnProperty(r))for (i = s[r].length; i--;)n = s[r][i], n.once === !0 && this.removeListener(e, n.listener), o = n.listener.apply(this, t || []), o === this._getOnceReturnValue() && this.removeListener(e, n.listener);
		return this
	}, i.trigger = n("emitEvent"), i.emit = function (e) {
		var t = Array.prototype.slice.call(arguments, 1);
		return this.emitEvent(e, t)
	}, i.setOnceReturnValue = function (e) {
		return this._onceReturnValue = e, this
	}, i._getOnceReturnValue = function () {
		return this.hasOwnProperty("_onceReturnValue") ? this._onceReturnValue : !0
	}, i._getEvents = function () {
		return this._events || (this._events = {})
	}, e.noConflict = function () {
		return r.EventEmitter = o, e
	}, "function" == typeof define && define.amd ? define("eventEmitter/EventEmitter", [], function () {
		return e
	}) : "object" == typeof module && module.exports ? module.exports = e : this.EventEmitter = e
}).call(this), function (e) {
	function t(t) {
		var n = e.event;
		return n.target = n.target || n.srcElement || t, n
	}
	var n = document.documentElement, i = function () {
	};
	n.addEventListener ? i = function (e, t, n) {
		e.addEventListener(t, n, !1)
	} : n.attachEvent && (i = function (e, n, i) {
		e[n + i] = i.handleEvent ? function () {
			var n = t(e);
			i.handleEvent.call(i, n)
		} : function () {
			var n = t(e);
			i.call(e, n)
		}, e.attachEvent("on" + n, e[n + i])
	});
	var r = function () {
	};
	n.removeEventListener ? r = function (e, t, n) {
		e.removeEventListener(t, n, !1)
	} : n.detachEvent && (r = function (e, t, n) {
		e.detachEvent("on" + t, e[t + n]);
		try {
			delete e[t + n]
		} catch (i) {
			e[t + n] = void 0
		}
	});
	var o = {bind: i, unbind: r};
	"function" == typeof define && define.amd ? define("eventie/eventie", o) : e.eventie = o
}(this), function (e, t) {
	"function" == typeof define && define.amd ? define(["eventEmitter/EventEmitter", "eventie/eventie"], function (n, i) {
		return t(e, n, i)
	}) : "object" == typeof exports ? module.exports = t(e, require("wolfy87-eventemitter"), require("eventie")) : e.imagesLoaded = t(e, e.EventEmitter, e.eventie)
}(window, function (e, t, n) {
	function i(e, t) {
		for (var n in t)e[n] = t[n];
		return e
	}
	function r(e) {
		return "[object Array]" === d.call(e)
	}
	function o(e) {
		var t = [];
		if (r(e))t = e; else if ("number" == typeof e.length)for (var n = 0, i = e.length; i > n; n++)t.push(e[n]); else t.push(e);
		return t
	}
	function s(e, t, n) {
		if (!(this instanceof s))return new s(e, t);
		"string" == typeof e && (e = document.querySelectorAll(e)), this.elements = o(e), this.options = i({}, this.options), "function" == typeof t ? n = t : i(this.options, t), n && this.on("always", n), this.getImages(), a && (this.jqDeferred = new a.Deferred);
		var r = this;
		setTimeout(function () {
			r.check()
		})
	}
	function f(e) {
		this.img = e
	}
	function c(e) {
		this.src = e, v[e] = this
	}
	var a = e.jQuery, u = e.console, h = u !== void 0, d = Object.prototype.toString;
	s.prototype = new t, s.prototype.options = {}, s.prototype.getImages = function () {
		this.images = [];
		for (var e = 0, t = this.elements.length; t > e; e++) {
			var n = this.elements[e];
			"IMG" === n.nodeName && this.addImage(n);
			var i = n.nodeType;
			if (i && (1 === i || 9 === i || 11 === i))for (var r = n.querySelectorAll("img"), o = 0, s = r.length; s > o; o++) {
				var f = r[o];
				this.addImage(f)
			}
		}
	}, s.prototype.addImage = function (e) {
		var t = new f(e);
		this.images.push(t)
	}, s.prototype.check = function () {
		function e(e, r) {
			return t.options.debug && h && u.log("confirm", e, r), t.progress(e), n++, n === i && t.complete(), !0
		}
		var t = this, n = 0, i = this.images.length;
		if (this.hasAnyBroken = !1, !i)return this.complete(), void 0;
		for (var r = 0; i > r; r++) {
			var o = this.images[r];
			o.on("confirm", e), o.check()
		}
	}, s.prototype.progress = function (e) {
		this.hasAnyBroken = this.hasAnyBroken || !e.isLoaded;
		var t = this;
		setTimeout(function () {
			t.emit("progress", t, e), t.jqDeferred && t.jqDeferred.notify && t.jqDeferred.notify(t, e)
		})
	}, s.prototype.complete = function () {
		var e = this.hasAnyBroken ? "fail" : "done";
		this.isComplete = !0;
		var t = this;
		setTimeout(function () {
			if (t.emit(e, t), t.emit("always", t), t.jqDeferred) {
				var n = t.hasAnyBroken ? "reject" : "resolve";
				t.jqDeferred[n](t)
			}
		})
	}, a && (a.fn.imagesLoaded = function (e, t) {
		var n = new s(this, e, t);
		return n.jqDeferred.promise(a(this))
	}), f.prototype = new t, f.prototype.check = function () {
		var e = v[this.img.src] || new c(this.img.src);
		if (e.isConfirmed)return this.confirm(e.isLoaded, "cached was confirmed"), void 0;
		if (this.img.complete && void 0 !== this.img.naturalWidth)return this.confirm(0 !== this.img.naturalWidth, "naturalWidth"), void 0;
		var t = this;
		e.on("confirm", function (e, n) {
			return t.confirm(e.isLoaded, n), !0
		}), e.check()
	}, f.prototype.confirm = function (e, t) {
		this.isLoaded = e, this.emit("confirm", this, t)
	};
	var v = {};
	return c.prototype = new t, c.prototype.check = function () {
		if (!this.isChecked) {
			var e = new Image;
			n.bind(e, "load", this), n.bind(e, "error", this), e.src = this.src, this.isChecked = !0
		}
	}, c.prototype.handleEvent = function (e) {
		var t = "on" + e.type;
		this[t] && this[t](e)
	}, c.prototype.onload = function (e) {
		this.confirm(!0, "onload"), this.unbindProxyEvents(e)
	}, c.prototype.onerror = function (e) {
		this.confirm(!1, "onerror"), this.unbindProxyEvents(e)
	}, c.prototype.confirm = function (e, t) {
		this.isConfirmed = !0, this.isLoaded = e, this.emit("confirm", this, t)
	}, c.prototype.unbindProxyEvents = function (e) {
		n.unbind(e.target, "load", this), n.unbind(e.target, "error", this)
	}, s
});
/*!
 --------------------------------
 Infinite Scroll
 --------------------------------
 + https://github.com/paulirish/infinite-scroll
 + version 2.1.0
 + Copyright 2011/12 Paul Irish & Luke Shumard
 + Licensed under the MIT license

 + Documentation: http://infinite-scroll.com/
 */
(function (e) {
	if (typeof define === "function" && define.amd) {
		define(["jquery"], e)
	} else {
		e(jQuery)
	}
})(function (e, t) {
	"use strict";
	e.infinitescroll = function (n, r, i) {
		this.element = e(i);
		if (!this._create(n, r)) {
			this.failed = true
		}
	};
	e.infinitescroll.defaults = {
		loading              : {
			finished   : t,
			finishedMsg: "<em>Congratulations, you've reached the end of the internet.</em>",
			img        : "data:image/gif;base64,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",
			msg        : null,
			msgText    : "<em>Loading the next set of posts...</em>",
			selector   : null,
			speed      : "fast",
			start      : t
		},
		state                : {
			isDuringAjax   : false,
			isInvalidPage  : false,
			isDestroyed    : false,
			isDone         : false,
			isPaused       : false,
			isBeyondMaxPage: false,
			currPage       : 1
		},
		debug                : false,
		behavior             : t,
		binder               : e(window),
		nextSelector         : "div.navigation a:first",
		navSelector          : "div.navigation",
		contentSelector      : null,
		extraScrollPx        : 150,
		itemSelector         : "div.post",
		animate              : false,
		pathParse            : t,
		dataType             : "html",
		appendCallback       : true,
		bufferPx             : 40,
		errorCallback        : function () {
		},
		infid                : 0,
		pixelsFromNavToBottom: t,
		path                 : t,
		prefill              : false,
		maxPage              : t
	};
	e.infinitescroll.prototype = {
		_binding         : function (n) {
			var r = this, i = r.options;
			i.v = "2.0b2.120520";
			if (!!i.behavior && this["_binding_" + i.behavior] !== t) {
				this["_binding_" + i.behavior].call(this);
				return
			}
			if (n !== "bind" && n !== "unbind") {
				this._debug("Binding value  " + n + " not valid");
				return false
			}
			if (n === "unbind") {
				this.options.binder.unbind("smartscroll.infscr." + r.options.infid)
			} else {
				this.options.binder[n]("smartscroll.infscr." + r.options.infid, function () {
					r.scroll()
				})
			}
			this._debug("Binding", n)
		}, _create       : function (r, i) {
			var s = e.extend(true, {}, e.infinitescroll.defaults, r);
			this.options = s;
			var o = e(window);
			var u = this;
			if (!u._validate(r)) {
				return false
			}
			var a = e(s.nextSelector).attr("href");
			if (!a) {
				this._debug("Navigation selector not found");
				return false
			}
			s.path = s.path || this._determinepath(a);
			s.contentSelector = s.contentSelector || this.element;
			s.loading.selector = s.loading.selector || s.contentSelector;
			s.loading.msg = s.loading.msg || e('<div id="infscr-loading"><img alt="Loading..." src="' + s.loading.img + '" /><div>' + s.loading.msgText + "</div></div>");
			(new Image).src = s.loading.img;
			if (s.pixelsFromNavToBottom === t) {
				s.pixelsFromNavToBottom = e(document).height() - e(s.navSelector).offset().top;
				this._debug("pixelsFromNavToBottom: " + s.pixelsFromNavToBottom)
			}
			var f = this;
			s.loading.start = s.loading.start || function () {
				e(s.navSelector).hide();
				s.loading.msg.appendTo(s.loading.selector).show(s.loading.speed, e.proxy(function () {
					this.beginAjax(s)
				}, f))
			};
			s.loading.finished = s.loading.finished || function () {
				if (!s.state.isBeyondMaxPage)s.loading.msg.fadeOut(s.loading.speed)
			};
			s.callback = function (n, r, u) {
				if (!!s.behavior && n["_callback_" + s.behavior] !== t) {
					n["_callback_" + s.behavior].call(e(s.contentSelector)[0], r, u)
				}
				if (i) {
					i.call(e(s.contentSelector)[0], r, s, u)
				}
				if (s.prefill) {
					o.bind("resize.infinite-scroll", n._prefill)
				}
			};
			if (r.debug) {
				if (Function.prototype.bind && (typeof console === "object" || typeof console === "function") && typeof console.log === "object") {
					["log", "info", "warn", "error", "assert", "dir", "clear", "profile", "profileEnd"].forEach(function (e) {
						console[e] = this.call(console[e], console)
					}, Function.prototype.bind)
				}
			}
			this._setup();
			if (s.prefill) {
				this._prefill()
			}
			return true
		}, _prefill      : function () {
			function i() {
				return e(n.options.contentSelector).height() <= r.height()
			}
			var n = this;
			var r = e(window);
			this._prefill = function () {
				if (i()) {
					n.scroll()
				}
				r.bind("resize.infinite-scroll", function () {
					if (i()) {
						r.unbind("resize.infinite-scroll");
						n.scroll()
					}
				})
			};
			this._prefill()
		}, _debug        : function () {
			if (true !== this.options.debug) {
				return
			}
			if (typeof console !== "undefined" && typeof console.log === "function") {
				if (Array.prototype.slice.call(arguments).length === 1 && typeof Array.prototype.slice.call(arguments)[0] === "string") {
					console.log(Array.prototype.slice.call(arguments).toString())
				} else {
					console.log(Array.prototype.slice.call(arguments))
				}
			} else if (!Function.prototype.bind && typeof console !== "undefined" && typeof console.log === "object") {
				Function.prototype.call.call(console.log, console, Array.prototype.slice.call(arguments))
			}
		}, _determinepath: function (n) {
			var r = this.options;
			if (!!r.behavior && this["_determinepath_" + r.behavior] !== t) {
				return this["_determinepath_" + r.behavior].call(this, n)
			}
			if (!!r.pathParse) {
				this._debug("pathParse manual");
				return r.pathParse(n, this.options.state.currPage + 1)
			} else if (n.match(/^(.*?)\b2\b(.*?$)/)) {
				n = n.match(/^(.*?)\b2\b(.*?$)/).slice(1)
			} else if (n.match(/^(.*?)2(.*?$)/)) {
				if (n.match(/^(.*?page=)2(\/.*|$)/)) {
					n = n.match(/^(.*?page=)2(\/.*|$)/).slice(1);
					return n
				}
				n = n.match(/^(.*?)2(.*?$)/).slice(1)
			} else {
				if (n.match(/^(.*?page=)1(\/.*|$)/)) {
					n = n.match(/^(.*?page=)1(\/.*|$)/).slice(1);
					return n
				} else {
					this._debug("Sorry, we couldn't parse your Next (Previous Posts) URL. Verify your the css selector points to the correct A tag. If you still get this error: yell, scream, and kindly ask for help at infinite-scroll.com.");
					r.state.isInvalidPage = true
				}
			}
			this._debug("determinePath", n);
			return n
		}, _error        : function (n) {
			var r = this.options;
			if (!!r.behavior && this["_error_" + r.behavior] !== t) {
				this["_error_" + r.behavior].call(this, n);
				return
			}
			if (n !== "destroy" && n !== "end") {
				n = "unknown"
			}
			this._debug("Error", n);
			if (n === "end" || r.state.isBeyondMaxPage) {
				this._showdonemsg()
			}
			r.state.isDone = true;
			r.state.currPage = 1;
			r.state.isPaused = false;
			r.state.isBeyondMaxPage = false;
			this._binding("unbind")
		}, _loadcallback : function (r, i, s) {
			var o = this.options, u = this.options.callback, a = o.state.isDone ? "done" : !o.appendCallback ? "no-append" : "append", f;
			if (!!o.behavior && this["_loadcallback_" + o.behavior] !== t) {
				this["_loadcallback_" + o.behavior].call(this, r, i);
				return
			}
			switch (a) {
				case"done":
					this._showdonemsg();
					return false;
				case"no-append":
					if (o.dataType === "html") {
						i = "<div>" + i + "</div>";
						i = e(i).find(o.itemSelector)
					}
					if (i.length === 0) {
						return this._error("end")
					}
					break;
				case"append":
					var l = r.children();
					if (l.length === 0) {
						return this._error("end")
					}
					f = document.createDocumentFragment();
					while (r[0].firstChild) {
						f.appendChild(r[0].firstChild)
					}
					this._debug("contentSelector", e(o.contentSelector)[0]);
					e(o.contentSelector)[0].appendChild(f);
					i = l.get();
					break
			}
			o.loading.finished.call(e(o.contentSelector)[0], o);
			if (o.animate) {
				var c = e(window).scrollTop() + e(o.loading.msg).height() + o.extraScrollPx + "px";
				e("html,body").animate({scrollTop: c}, 800, function () {
					o.state.isDuringAjax = false
				})
			}
			if (!o.animate) {
				o.state.isDuringAjax = false
			}
			u(this, i, s);
			if (o.prefill) {
				this._prefill()
			}
		}, _nearbottom   : function () {
			var r = this.options, i = 0 + e(document).height() - r.binder.scrollTop() - e(window).height();
			if (!!r.behavior && this["_nearbottom_" + r.behavior] !== t) {
				return this["_nearbottom_" + r.behavior].call(this)
			}
			this._debug("math:", i, r.pixelsFromNavToBottom);
			return i - r.bufferPx < r.pixelsFromNavToBottom
		}, _pausing      : function (n) {
			var r = this.options;
			if (!!r.behavior && this["_pausing_" + r.behavior] !== t) {
				this["_pausing_" + r.behavior].call(this, n);
				return
			}
			if (n !== "pause" && n !== "resume" && n !== null) {
				this._debug("Invalid argument. Toggling pause value instead")
			}
			n = n && (n === "pause" || n === "resume") ? n : "toggle";
			switch (n) {
				case"pause":
					r.state.isPaused = true;
					break;
				case"resume":
					r.state.isPaused = false;
					break;
				case"toggle":
					r.state.isPaused = !r.state.isPaused;
					break
			}
			this._debug("Paused", r.state.isPaused);
			return false
		}, _setup        : function () {
			var n = this.options;
			if (!!n.behavior && this["_setup_" + n.behavior] !== t) {
				this["_setup_" + n.behavior].call(this);
				return
			}
			this._binding("bind");
			return false
		}, _showdonemsg  : function () {
			var r = this.options;
			if (!!r.behavior && this["_showdonemsg_" + r.behavior] !== t) {
				this["_showdonemsg_" + r.behavior].call(this);
				return
			}
			r.loading.msg.find("img").hide().parent().find("div").html(r.loading.finishedMsg).animate({opacity: 1}, 2e3, function () {
				e(this).parent().fadeOut(r.loading.speed)
			});
			r.errorCallback.call(e(r.contentSelector)[0], "done")
		}, _validate     : function (n) {
			for (var r in n) {
				if (r.indexOf && r.indexOf("Selector") > -1 && e(n[r]).length === 0) {
					this._debug("Your " + r + " found no elements.");
					return false
				}
			}
			return true
		}, bind          : function () {
			this._binding("bind")
		}, destroy       : function () {
			this.options.state.isDestroyed = true;
			this.options.loading.finished();
			return this._error("destroy")
		}, pause         : function () {
			this._pausing("pause")
		}, resume        : function () {
			this._pausing("resume")
		}, beginAjax     : function (r) {
			var i = this, s = r.path, o, u, a, f;
			r.state.currPage++;
			if (r.maxPage !== t && r.state.currPage > r.maxPage) {
				r.state.isBeyondMaxPage = true;
				this.destroy();
				return
			}
			o = e(r.contentSelector).is("table, tbody") ? e("<tbody/>") : e("<div/>");
			u = typeof s === "function" ? s(r.state.currPage) : s.join(r.state.currPage);
			i._debug("heading into ajax", u);
			a = r.dataType === "html" || r.dataType === "json" ? r.dataType : "html+callback";
			if (r.appendCallback && r.dataType === "html") {
				a += "+callback"
			}
			switch (a) {
				case"html+callback":
					i._debug("Using HTML via .load() method");
					o.load(u + " " + r.itemSelector, t, function (t) {
						i._loadcallback(o, t, u)
					});
					break;
				case"html":
					i._debug("Using " + a.toUpperCase() + " via $.ajax() method");
					e.ajax({
						url: u, dataType: r.dataType, complete: function (t, n) {
							f = typeof t.isResolved !== "undefined" ? t.isResolved() : n === "success" || n === "notmodified";
							if (f) {
								i._loadcallback(o, t.responseText, u)
							} else {
								i._error("end")
							}
						}
					});
					break;
				case"json":
					i._debug("Using " + a.toUpperCase() + " via $.ajax() method");
					e.ajax({
						dataType: "json", type: "GET", url: u, success: function (e, n, s) {
							f = typeof s.isResolved !== "undefined" ? s.isResolved() : n === "success" || n === "notmodified";
							if (r.appendCallback) {
								if (r.template !== t) {
									var a = r.template(e);
									o.append(a);
									if (f) {
										i._loadcallback(o, a)
									} else {
										i._error("end")
									}
								} else {
									i._debug("template must be defined.");
									i._error("end")
								}
							} else {
								if (f) {
									i._loadcallback(o, e, u)
								} else {
									i._error("end")
								}
							}
						}, error: function () {
							i._debug("JSON ajax request failed.");
							i._error("end")
						}
					});
					break
			}
		}, retrieve      : function (r) {
			r = r || null;
			var i = this, s = i.options;
			if (!!s.behavior && this["retrieve_" + s.behavior] !== t) {
				this["retrieve_" + s.behavior].call(this, r);
				return
			}
			if (s.state.isDestroyed) {
				this._debug("Instance is destroyed");
				return false
			}
			s.state.isDuringAjax = true;
			s.loading.start.call(e(s.contentSelector)[0], s)
		}, scroll        : function () {
			var n = this.options, r = n.state;
			if (!!n.behavior && this["scroll_" + n.behavior] !== t) {
				this["scroll_" + n.behavior].call(this);
				return
			}
			if (r.isDuringAjax || r.isInvalidPage || r.isDone || r.isDestroyed || r.isPaused) {
				return
			}
			if (!this._nearbottom()) {
				return
			}
			this.retrieve()
		}, toggle        : function () {
			this._pausing()
		}, unbind        : function () {
			this._binding("unbind")
		}, update        : function (n) {
			if (e.isPlainObject(n)) {
				this.options = e.extend(true, this.options, n)
			}
		}
	};
	e.fn.infinitescroll = function (n, r) {
		var i = typeof n;
		switch (i) {
			case"string":
				var s = Array.prototype.slice.call(arguments, 1);
				this.each(function () {
					var t = e.data(this, "infinitescroll");
					if (!t) {
						return false
					}
					if (!e.isFunction(t[n]) || n.charAt(0) === "_") {
						return false
					}
					t[n].apply(t, s)
				});
				break;
			case"object":
				this.each(function () {
					var t = e.data(this, "infinitescroll");
					if (t) {
						t.update(n)
					} else {
						t = new e.infinitescroll(n, r, this);
						if (!t.failed) {
							e.data(this, "infinitescroll", t)
						}
					}
				});
				break
		}
		return this
	};
	var n = e.event, r;
	n.special.smartscroll = {
		setup      : function () {
			e(this).bind("scroll", n.special.smartscroll.handler)
		}, teardown: function () {
			e(this).unbind("scroll", n.special.smartscroll.handler)
		}, handler : function (t, n) {
			var i = this, s = arguments;
			t.type = "smartscroll";
			if (r) {
				clearTimeout(r)
			}
			r = setTimeout(function () {
				e(i).trigger("smartscroll", s)
			}, n === "execAsap" ? 0 : 100)
		}
	};
	e.fn.smartscroll = function (e) {
		return e ? this.bind("smartscroll", e) : this.trigger("smartscroll", ["execAsap"])
	}
});
/*! Stellar.js v0.6.2 | Copyright 2014, Mark Dalgleish | http://markdalgleish.com/projects/stellar.js | http://markdalgleish.mit-license.org */
!function (a, b, c, d) {
	function e(b, c) {
		this.element = b, this.options = a.extend({}, g, c), this._defaults = g, this._name = f, this.init()
	}
	var f = "stellar", g = {
		scrollProperty     : "scroll",
		positionProperty   : "position",
		horizontalScrolling: !0,
		verticalScrolling  : !0,
		horizontalOffset   : 0,
		verticalOffset     : 0,
		responsive         : !1,
		parallaxBackgrounds: !0,
		parallaxElements   : !0,
		hideDistantElements: !0,
		hideElement        : function (a) {
			a.hide()
		},
		showElement        : function (a) {
			a.show()
		}
	}, h = {
		scroll      : {
			getLeft   : function (a) {
				return a.scrollLeft()
			}, setLeft: function (a, b) {
				a.scrollLeft(b)
			}, getTop : function (a) {
				return a.scrollTop()
			}, setTop : function (a, b) {
				a.scrollTop(b)
			}
		}, position : {
			getLeft  : function (a) {
				return -1 * parseInt(a.css("left"), 10)
			}, getTop: function (a) {
				return -1 * parseInt(a.css("top"), 10)
			}
		}, margin   : {
			getLeft  : function (a) {
				return -1 * parseInt(a.css("margin-left"), 10)
			}, getTop: function (a) {
				return -1 * parseInt(a.css("margin-top"), 10)
			}
		}, transform: {
			getLeft  : function (a) {
				var b = getComputedStyle(a[0])[k];
				return "none" !== b ? -1 * parseInt(b.match(/(-?[0-9]+)/g)[4], 10) : 0
			}, getTop: function (a) {
				var b = getComputedStyle(a[0])[k];
				return "none" !== b ? -1 * parseInt(b.match(/(-?[0-9]+)/g)[5], 10) : 0
			}
		}
	}, i = {
		position    : {
			setLeft  : function (a, b) {
				a.css("left", b)
			}, setTop: function (a, b) {
				a.css("top", b)
			}
		}, transform: {
			setPosition: function (a, b, c, d, e) {
				a[0].style[k] = "translate3d(" + (b - c) + "px, " + (d - e) + "px, 0)"
			}
		}
	}, j = function () {
		var b, c = /^(Moz|Webkit|Khtml|O|ms|Icab)(?=[A-Z])/, d = a("script")[0].style, e = "";
		for (b in d)if (c.test(b)) {
			e = b.match(c)[0];
			break
		}
		return "WebkitOpacity"in d && (e = "Webkit"), "KhtmlOpacity"in d && (e = "Khtml"), function (a) {
			return e + (e.length > 0 ? a.charAt(0).toUpperCase() + a.slice(1) : a)
		}
	}(), k = j("transform"), l = a("<div />", {style: "background:#fff"}).css("background-position-x") !== d, m = l ? function (a, b, c) {
		a.css({"background-position-x": b, "background-position-y": c})
	} : function (a, b, c) {
		a.css("background-position", b + " " + c)
	}, n = l ? function (a) {
		return [a.css("background-position-x"), a.css("background-position-y")]
	} : function (a) {
		return a.css("background-position").split(" ")
	}, o = b.requestAnimationFrame || b.webkitRequestAnimationFrame || b.mozRequestAnimationFrame || b.oRequestAnimationFrame || b.msRequestAnimationFrame || function (a) {
			setTimeout(a, 1e3 / 60)
		};
	e.prototype = {
		init                         : function () {
			this.options.name = f + "_" + Math.floor(1e9 * Math.random()), this._defineElements(), this._defineGetters(), this._defineSetters(), this._handleWindowLoadAndResize(), this._detectViewport(), this.refresh({firstLoad: !0}), "scroll" === this.options.scrollProperty ? this._handleScrollEvent() : this._startAnimationLoop()
		}, _defineElements           : function () {
			this.element === c.body && (this.element = b), this.$scrollElement = a(this.element), this.$element = this.element === b ? a("body") : this.$scrollElement, this.$viewportElement = this.options.viewportElement !== d ? a(this.options.viewportElement) : this.$scrollElement[0] === b || "scroll" === this.options.scrollProperty ? this.$scrollElement : this.$scrollElement.parent()
		}, _defineGetters            : function () {
			var a = this, b = h[a.options.scrollProperty];
			this._getScrollLeft = function () {
				return b.getLeft(a.$scrollElement)
			}, this._getScrollTop = function () {
				return b.getTop(a.$scrollElement)
			}
		}, _defineSetters            : function () {
			var b = this, c = h[b.options.scrollProperty], d = i[b.options.positionProperty], e = c.setLeft, f = c.setTop;
			this._setScrollLeft = "function" == typeof e ? function (a) {
				e(b.$scrollElement, a)
			} : a.noop, this._setScrollTop = "function" == typeof f ? function (a) {
				f(b.$scrollElement, a)
			} : a.noop, this._setPosition = d.setPosition || function (a, c, e, f, g) {
				b.options.horizontalScrolling && d.setLeft(a, c, e), b.options.verticalScrolling && d.setTop(a, f, g)
			}
		}, _handleWindowLoadAndResize: function () {
			var c = this, d = a(b);
			c.options.responsive && d.bind("load." + this.name, function () {
				c.refresh()
			}), d.bind("resize." + this.name, function () {
				c._detectViewport(), c.options.responsive && c.refresh()
			})
		}, refresh                   : function (c) {
			var d = this, e = d._getScrollLeft(), f = d._getScrollTop();
			c && c.firstLoad || this._reset(), this._setScrollLeft(0), this._setScrollTop(0), this._setOffsets(), this._findParticles(), this._findBackgrounds(), c && c.firstLoad && /WebKit/.test(navigator.userAgent) && a(b).load(function () {
				var a = d._getScrollLeft(), b = d._getScrollTop();
				d._setScrollLeft(a + 1), d._setScrollTop(b + 1), d._setScrollLeft(a), d._setScrollTop(b)
			}), this._setScrollLeft(e), this._setScrollTop(f)
		}, _detectViewport           : function () {
			var a = this.$viewportElement.offset(), b = null !== a && a !== d;
			this.viewportWidth = this.$viewportElement.width(), this.viewportHeight = this.$viewportElement.height(), this.viewportOffsetTop = b ? a.top : 0, this.viewportOffsetLeft = b ? a.left : 0
		}, _findParticles            : function () {
			{
				var b = this;
				this._getScrollLeft(), this._getScrollTop()
			}
			if (this.particles !== d)for (var c = this.particles.length - 1; c >= 0; c--)this.particles[c].$element.data("stellar-elementIsActive", d);
			this.particles = [], this.options.parallaxElements && this.$element.find("[data-stellar-ratio]").each(function () {
				var c, e, f, g, h, i, j, k, l, m = a(this), n = 0, o = 0, p = 0, q = 0;
				if (m.data("stellar-elementIsActive")) {
					if (m.data("stellar-elementIsActive") !== this)return
				} else m.data("stellar-elementIsActive", this);
				b.options.showElement(m), m.data("stellar-startingLeft") ? (m.css("left", m.data("stellar-startingLeft")), m.css("top", m.data("stellar-startingTop"))) : (m.data("stellar-startingLeft", m.css("left")), m.data("stellar-startingTop", m.css("top"))), f = m.position().left, g = m.position().top, h = "auto" === m.css("margin-left") ? 0 : parseInt(m.css("margin-left"), 10), i = "auto" === m.css("margin-top") ? 0 : parseInt(m.css("margin-top"), 10), k = m.offset().left - h, l = m.offset().top - i, m.parents().each(function () {
					var b = a(this);
					return b.data("stellar-offset-parent") === !0 ? (n = p, o = q, j = b, !1) : (p += b.position().left, void(q += b.position().top))
				}), c = m.data("stellar-horizontal-offset") !== d ? m.data("stellar-horizontal-offset") : j !== d && j.data("stellar-horizontal-offset") !== d ? j.data("stellar-horizontal-offset") : b.horizontalOffset, e = m.data("stellar-vertical-offset") !== d ? m.data("stellar-vertical-offset") : j !== d && j.data("stellar-vertical-offset") !== d ? j.data("stellar-vertical-offset") : b.verticalOffset, b.particles.push({
					$element: m,
					$offsetParent: j,
					isFixed: "fixed" === m.css("position"),
					horizontalOffset: c,
					verticalOffset: e,
					startingPositionLeft: f,
					startingPositionTop: g,
					startingOffsetLeft: k,
					startingOffsetTop: l,
					parentOffsetLeft: n,
					parentOffsetTop: o,
					stellarRatio: m.data("stellar-ratio") !== d ? m.data("stellar-ratio") : 1,
					width: m.outerWidth(!0),
					height: m.outerHeight(!0),
					isHidden: !1
				})
			})
		}, _findBackgrounds          : function () {
			var b, c = this, e = this._getScrollLeft(), f = this._getScrollTop();
			this.backgrounds = [], this.options.parallaxBackgrounds && (b = this.$element.find("[data-stellar-background-ratio]"), this.$element.data("stellar-background-ratio") && (b = b.add(this.$element)), b.each(function () {
				var b, g, h, i, j, k, l, o = a(this), p = n(o), q = 0, r = 0, s = 0, t = 0;
				if (o.data("stellar-backgroundIsActive")) {
					if (o.data("stellar-backgroundIsActive") !== this)return
				} else o.data("stellar-backgroundIsActive", this);
				o.data("stellar-backgroundStartingLeft") ? m(o, o.data("stellar-backgroundStartingLeft"), o.data("stellar-backgroundStartingTop")) : (o.data("stellar-backgroundStartingLeft", p[0]), o.data("stellar-backgroundStartingTop", p[1])), h = "auto" === o.css("margin-left") ? 0 : parseInt(o.css("margin-left"), 10), i = "auto" === o.css("margin-top") ? 0 : parseInt(o.css("margin-top"), 10), j = o.offset().left - h - e, k = o.offset().top - i - f, o.parents().each(function () {
					var b = a(this);
					return b.data("stellar-offset-parent") === !0 ? (q = s, r = t, l = b, !1) : (s += b.position().left, void(t += b.position().top))
				}), b = o.data("stellar-horizontal-offset") !== d ? o.data("stellar-horizontal-offset") : l !== d && l.data("stellar-horizontal-offset") !== d ? l.data("stellar-horizontal-offset") : c.horizontalOffset, g = o.data("stellar-vertical-offset") !== d ? o.data("stellar-vertical-offset") : l !== d && l.data("stellar-vertical-offset") !== d ? l.data("stellar-vertical-offset") : c.verticalOffset, c.backgrounds.push({
					$element: o,
					$offsetParent: l,
					isFixed: "fixed" === o.css("background-attachment"),
					horizontalOffset: b,
					verticalOffset: g,
					startingValueLeft: p[0],
					startingValueTop: p[1],
					startingBackgroundPositionLeft: isNaN(parseInt(p[0], 10)) ? 0 : parseInt(p[0], 10),
					startingBackgroundPositionTop: isNaN(parseInt(p[1], 10)) ? 0 : parseInt(p[1], 10),
					startingPositionLeft: o.position().left,
					startingPositionTop: o.position().top,
					startingOffsetLeft: j,
					startingOffsetTop: k,
					parentOffsetLeft: q,
					parentOffsetTop: r,
					stellarRatio: o.data("stellar-background-ratio") === d ? 1 : o.data("stellar-background-ratio")
				})
			}))
		}, _reset                    : function () {
			var a, b, c, d, e;
			for (e = this.particles.length - 1; e >= 0; e--)a = this.particles[e], b = a.$element.data("stellar-startingLeft"), c = a.$element.data("stellar-startingTop"), this._setPosition(a.$element, b, b, c, c), this.options.showElement(a.$element), a.$element.data("stellar-startingLeft", null).data("stellar-elementIsActive", null).data("stellar-backgroundIsActive", null);
			for (e = this.backgrounds.length - 1; e >= 0; e--)d = this.backgrounds[e], d.$element.data("stellar-backgroundStartingLeft", null).data("stellar-backgroundStartingTop", null), m(d.$element, d.startingValueLeft, d.startingValueTop)
		}, destroy                   : function () {
			this._reset(), this.$scrollElement.unbind("resize." + this.name).unbind("scroll." + this.name), this._animationLoop = a.noop, a(b).unbind("load." + this.name).unbind("resize." + this.name)
		}, _setOffsets               : function () {
			var c = this, d = a(b);
			d.unbind("resize.horizontal-" + this.name).unbind("resize.vertical-" + this.name), "function" == typeof this.options.horizontalOffset ? (this.horizontalOffset = this.options.horizontalOffset(), d.bind("resize.horizontal-" + this.name, function () {
				c.horizontalOffset = c.options.horizontalOffset()
			})) : this.horizontalOffset = this.options.horizontalOffset, "function" == typeof this.options.verticalOffset ? (this.verticalOffset = this.options.verticalOffset(), d.bind("resize.vertical-" + this.name, function () {
				c.verticalOffset = c.options.verticalOffset()
			})) : this.verticalOffset = this.options.verticalOffset
		}, _repositionElements       : function () {
			var a, b, c, d, e, f, g, h, i, j, k = this._getScrollLeft(), l = this._getScrollTop(), n = !0, o = !0;
			if (this.currentScrollLeft !== k || this.currentScrollTop !== l || this.currentWidth !== this.viewportWidth || this.currentHeight !== this.viewportHeight) {
				for (this.currentScrollLeft = k, this.currentScrollTop = l, this.currentWidth = this.viewportWidth, this.currentHeight = this.viewportHeight, j = this.particles.length - 1; j >= 0; j--)a = this.particles[j], b = a.isFixed ? 1 : 0, this.options.horizontalScrolling ? (f = (k + a.horizontalOffset + this.viewportOffsetLeft + a.startingPositionLeft - a.startingOffsetLeft + a.parentOffsetLeft) * -(a.stellarRatio + b - 1) + a.startingPositionLeft, h = f - a.startingPositionLeft + a.startingOffsetLeft) : (f = a.startingPositionLeft, h = a.startingOffsetLeft), this.options.verticalScrolling ? (g = (l + a.verticalOffset + this.viewportOffsetTop + a.startingPositionTop - a.startingOffsetTop + a.parentOffsetTop) * -(a.stellarRatio + b - 1) + a.startingPositionTop, i = g - a.startingPositionTop + a.startingOffsetTop) : (g = a.startingPositionTop, i = a.startingOffsetTop), this.options.hideDistantElements && (o = !this.options.horizontalScrolling || h + a.width > (a.isFixed ? 0 : k) && h < (a.isFixed ? 0 : k) + this.viewportWidth + this.viewportOffsetLeft, n = !this.options.verticalScrolling || i + a.height > (a.isFixed ? 0 : l) && i < (a.isFixed ? 0 : l) + this.viewportHeight + this.viewportOffsetTop), o && n ? (a.isHidden && (this.options.showElement(a.$element), a.isHidden = !1), this._setPosition(a.$element, f, a.startingPositionLeft, g, a.startingPositionTop)) : a.isHidden || (this.options.hideElement(a.$element), a.isHidden = !0);
				for (j = this.backgrounds.length - 1; j >= 0; j--)c = this.backgrounds[j], b = c.isFixed ? 0 : 1, d = this.options.horizontalScrolling ? (k + c.horizontalOffset - this.viewportOffsetLeft - c.startingOffsetLeft + c.parentOffsetLeft - c.startingBackgroundPositionLeft) * (b - c.stellarRatio) + "px" : c.startingValueLeft, e = this.options.verticalScrolling ? (l + c.verticalOffset - this.viewportOffsetTop - c.startingOffsetTop + c.parentOffsetTop - c.startingBackgroundPositionTop) * (b - c.stellarRatio) + "px" : c.startingValueTop, m(c.$element, d, e)
			}
		}, _handleScrollEvent        : function () {
			var a = this, b = !1, c = function () {
				a._repositionElements(), b = !1
			}, d = function () {
				b || (o(c), b = !0)
			};
			this.$scrollElement.bind("scroll." + this.name, d), d()
		}, _startAnimationLoop       : function () {
			var a = this;
			this._animationLoop = function () {
				o(a._animationLoop), a._repositionElements()
			}, this._animationLoop()
		}
	}, a.fn[f] = function (b) {
		var c = arguments;
		return b === d || "object" == typeof b ? this.each(function () {
			a.data(this, "plugin_" + f) || a.data(this, "plugin_" + f, new e(this, b))
		}) : "string" == typeof b && "_" !== b[0] && "init" !== b ? this.each(function () {
			var d = a.data(this, "plugin_" + f);
			d instanceof e && "function" == typeof d[b] && d[b].apply(d, Array.prototype.slice.call(c, 1)), "destroy" === b && a.data(this, "plugin_" + f, null)
		}) : void 0
	}, a[f] = function () {
		var c = a(b);
		return c.stellar.apply(c, Array.prototype.slice.call(arguments, 0))
	}, a[f].scrollProperty = h, a[f].positionProperty = i, b.Stellar = e
}(jQuery, this, document);
/* ------------------------------------------------------------------------
 Class: prettyPhoto
 Use: Lightbox clone for jQuery
 Author: Stephane Caron (http://www.no-margin-for-errors.com)
 Version: 3.1.6
 ------------------------------------------------------------------------- */
!function (e) {
	function t() {
		var e = location.href;
		return hashtag = -1 !== e.indexOf("#prettyPhoto") ? decodeURI(e.substring(e.indexOf("#prettyPhoto") + 1, e.length)) : !1, hashtag && (hashtag = hashtag.replace(/<|>/g, "")), hashtag
	}
	function i() {
		"undefined" != typeof theRel && (location.hash = theRel + "/" + rel_index + "/")
	}
	function p() {
		-1 !== location.href.indexOf("#prettyPhoto") && (location.hash = "prettyPhoto")
	}
	function o(e, t) {
		e = e.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
		var i = "[\\?&]" + e + "=([^&#]*)", p = new RegExp(i), o = p.exec(t);
		return null == o ? "" : o[1]
	}
	e.prettyPhoto = {version: "3.1.6"}, e.fn.prettyPhoto = function (a) {
		function s() {
			e(".pp_loaderIcon").hide(), projectedTop = scroll_pos.scrollTop + (I / 2 - f.containerHeight / 2), projectedTop < 0 && (projectedTop = 0), $ppt.fadeTo(settings.animation_speed, 1), $pp_pic_holder.find(".pp_content").animate({
				height: f.contentHeight,
				width: f.contentWidth
			}, settings.animation_speed), $pp_pic_holder.animate({
				top  : projectedTop,
				left : j / 2 - f.containerWidth / 2 < 0 ? 0 : j / 2 - f.containerWidth / 2,
				width: f.containerWidth
			}, settings.animation_speed, function () {
				$pp_pic_holder.find(".pp_hoverContainer,#fullResImage").height(f.height).width(f.width), $pp_pic_holder.find(".pp_fade").fadeIn(settings.animation_speed), isSet && "image" == h(pp_images[set_position]) ? $pp_pic_holder.find(".pp_hoverContainer").show() : $pp_pic_holder.find(".pp_hoverContainer").hide(), settings.allow_expand && (f.resized ? e("a.pp_expand,a.pp_contract").show() : e("a.pp_expand").hide()), !settings.autoplay_slideshow || P || v || e.prettyPhoto.startSlideshow(), settings.changepicturecallback(), v = !0
			}), m(), a.ajaxcallback()
		}
		function n(t) {
			$pp_pic_holder.find("#pp_full_res object,#pp_full_res embed").css("visibility", "hidden"), $pp_pic_holder.find(".pp_fade").fadeOut(settings.animation_speed, function () {
				e(".pp_loaderIcon").show(), t()
			})
		}
		function r(t) {
			t > 1 ? e(".pp_nav").show() : e(".pp_nav").hide()
		}
		function l(e, t) {
			if (resized = !1, d(e, t), imageWidth = e, imageHeight = t, (k > j || b > I) && doresize && settings.allow_resize && !$) {
				for (resized = !0, fitting = !1; !fitting;)k > j ? (imageWidth = j - 200, imageHeight = t / e * imageWidth) : b > I ? (imageHeight = I - 200, imageWidth = e / t * imageHeight) : fitting = !0, b = imageHeight, k = imageWidth;
				(k > j || b > I) && l(k, b), d(imageWidth, imageHeight)
			}
			return {
				width          : Math.floor(imageWidth),
				height         : Math.floor(imageHeight),
				containerHeight: Math.floor(b),
				containerWidth : Math.floor(k) + 2 * settings.horizontal_padding,
				contentHeight  : Math.floor(y),
				contentWidth   : Math.floor(w),
				resized        : resized
			}
		}
		function d(t, i) {
			t = parseFloat(t), i = parseFloat(i), $pp_details = $pp_pic_holder.find(".pp_details"), $pp_details.width(t), detailsHeight = parseFloat($pp_details.css("marginTop")) + parseFloat($pp_details.css("marginBottom")), $pp_details = $pp_details.clone().addClass(settings.theme).width(t).appendTo(e("body")).css({
				position: "absolute",
				top: -1e4
			}), detailsHeight += $pp_details.height(), detailsHeight = detailsHeight <= 34 ? 36 : detailsHeight, $pp_details.remove(), $pp_title = $pp_pic_holder.find(".ppt"), $pp_title.width(t), titleHeight = parseFloat($pp_title.css("marginTop")) + parseFloat($pp_title.css("marginBottom")), $pp_title = $pp_title.clone().appendTo(e("body")).css({
				position: "absolute",
				top: -1e4
			}), titleHeight += $pp_title.height(), $pp_title.remove(), y = i + detailsHeight, w = t, b = y + titleHeight + $pp_pic_holder.find(".pp_top").height() + $pp_pic_holder.find(".pp_bottom").height(), k = t
		}
		function h(e) {
			return e.match(/youtube\.com\/watch/i) || e.match(/youtu\.be/i) ? "youtube" : e.match(/vimeo\.com/i) ? "vimeo" : e.match(/\b.mov\b/i) ? "quicktime" : e.match(/\b.swf\b/i) ? "flash" : e.match(/\biframe=true\b/i) ? "iframe" : e.match(/\bajax=true\b/i) ? "ajax" : e.match(/\bcustom=true\b/i) ? "custom" : "#" == e.substr(0, 1) ? "inline" : "image"
		}
		function c() {
			if (doresize && "undefined" != typeof $pp_pic_holder) {
				if (scroll_pos = _(), contentHeight = $pp_pic_holder.height(), contentwidth = $pp_pic_holder.width(), projectedTop = I / 2 + scroll_pos.scrollTop - contentHeight / 2, projectedTop < 0 && (projectedTop = 0), contentHeight > I)return;
				$pp_pic_holder.css({top: projectedTop, left: j / 2 + scroll_pos.scrollLeft - contentwidth / 2})
			}
		}
		function _() {
			return self.pageYOffset ? {
				scrollTop : self.pageYOffset,
				scrollLeft: self.pageXOffset
			} : document.documentElement && document.documentElement.scrollTop ? {
				scrollTop : document.documentElement.scrollTop,
				scrollLeft: document.documentElement.scrollLeft
			} : document.body ? {scrollTop: document.body.scrollTop, scrollLeft: document.body.scrollLeft} : void 0
		}
		function g() {
			I = e(window).height(), j = e(window).width(), "undefined" != typeof $pp_overlay && $pp_overlay.height(e(document).height()).width(j)
		}
		function m() {
			isSet && settings.overlay_gallery && "image" == h(pp_images[set_position]) ? (itemWidth = 57, navWidth = "facebook" == settings.theme || "pp_default" == settings.theme ? 50 : 30, itemsPerPage = Math.floor((f.containerWidth - 100 - navWidth) / itemWidth), itemsPerPage = itemsPerPage < pp_images.length ? itemsPerPage : pp_images.length, totalPage = Math.ceil(pp_images.length / itemsPerPage) - 1, 0 == totalPage ? (navWidth = 0, $pp_gallery.find(".pp_arrow_next,.pp_arrow_previous").hide()) : $pp_gallery.find(".pp_arrow_next,.pp_arrow_previous").show(), galleryWidth = itemsPerPage * itemWidth, fullGalleryWidth = pp_images.length * itemWidth, $pp_gallery.css("margin-left", -(galleryWidth / 2 + navWidth / 2)).find("div:first").width(galleryWidth + 5).find("ul").width(fullGalleryWidth).find("li.selected").removeClass("selected"), goToPage = Math.floor(set_position / itemsPerPage) < totalPage ? Math.floor(set_position / itemsPerPage) : totalPage, e.prettyPhoto.changeGalleryPage(goToPage), $pp_gallery_li.filter(":eq(" + set_position + ")").addClass("selected")) : $pp_pic_holder.find(".pp_content").unbind("mouseenter mouseleave")
		}
		function u() {
			if (settings.social_tools && (facebook_like_link = settings.social_tools.replace("{location_href}", encodeURIComponent(location.href))), settings.markup = settings.markup.replace("{pp_social}", ""), e("body").append(settings.markup), $pp_pic_holder = e(".pp_pic_holder"), $ppt = e(".ppt"), $pp_overlay = e("div.pp_overlay"), isSet && settings.overlay_gallery) {
				currentGalleryPage = 0, toInject = "";
				for (var t = 0; t < pp_images.length; t++)pp_images[t].match(/\b(jpg|jpeg|png|gif)\b/gi) ? (classname = "", img_src = pp_images[t]) : (classname = "default", img_src = ""), toInject += "<li class='" + classname + "'><a href='#'><img src='" + img_src + "' width='50' alt='' /></a></li>";
				toInject = settings.gallery_markup.replace(/{gallery}/g, toInject), $pp_pic_holder.find("#pp_full_res").after(toInject), $pp_gallery = e(".pp_pic_holder .pp_gallery"), $pp_gallery_li = $pp_gallery.find("li"), $pp_gallery.find(".pp_arrow_next").click(function () {
					return e.prettyPhoto.changeGalleryPage("next"), e.prettyPhoto.stopSlideshow(), !1
				}), $pp_gallery.find(".pp_arrow_previous").click(function () {
					return e.prettyPhoto.changeGalleryPage("previous"), e.prettyPhoto.stopSlideshow(), !1
				}), $pp_pic_holder.find(".pp_content").hover(function () {
					$pp_pic_holder.find(".pp_gallery:not(.disabled)").fadeIn()
				}, function () {
					$pp_pic_holder.find(".pp_gallery:not(.disabled)").fadeOut()
				}), itemWidth = 57, $pp_gallery_li.each(function (t) {
					e(this).find("a").click(function () {
						return e.prettyPhoto.changePage(t), e.prettyPhoto.stopSlideshow(), !1
					})
				})
			}
			settings.slideshow && ($pp_pic_holder.find(".pp_nav").prepend('<a href="#" class="pp_play">Play</a>'), $pp_pic_holder.find(".pp_nav .pp_play").click(function () {
				return e.prettyPhoto.startSlideshow(), !1
			})), $pp_pic_holder.attr("class", "pp_pic_holder " + settings.theme), $pp_overlay.css({
				opacity: 0,
				height : e(document).height(),
				width  : e(window).width()
			}).bind("click", function () {
				settings.modal || e.prettyPhoto.close()
			}), e("a.pp_close").bind("click", function () {
				return e.prettyPhoto.close(), !1
			}), settings.allow_expand && e("a.pp_expand").bind("click", function () {
				return e(this).hasClass("pp_expand") ? (e(this).removeClass("pp_expand").addClass("pp_contract"), doresize = !1) : (e(this).removeClass("pp_contract").addClass("pp_expand"), doresize = !0), n(function () {
					e.prettyPhoto.open()
				}), !1
			}), $pp_pic_holder.find(".pp_previous, .pp_nav .pp_arrow_previous").bind("click", function () {
				return e.prettyPhoto.changePage("previous"), e.prettyPhoto.stopSlideshow(), !1
			}), $pp_pic_holder.find(".pp_next, .pp_nav .pp_arrow_next").bind("click", function () {
				return e.prettyPhoto.changePage("next"), e.prettyPhoto.stopSlideshow(), !1
			}), c()
		}
		a = jQuery.extend({
			hook                   : "rel",
			animation_speed        : "fast",
			ajaxcallback           : function () {
			},
			slideshow              : 5e3,
			autoplay_slideshow     : !1,
			opacity                : .8,
			show_title             : !0,
			allow_resize           : !0,
			allow_expand           : !0,
			default_width          : 500,
			default_height         : 344,
			counter_separator_label: "/",
			theme                  : "pp_default",
			horizontal_padding     : 20,
			hideflash              : !1,
			wmode                  : "opaque",
			autoplay               : !0,
			modal                  : !1,
			deeplinking            : !0,
			overlay_gallery        : !0,
			overlay_gallery_max    : 30,
			keyboard_shortcuts     : !0,
			changepicturecallback  : function () {
			},
			callback               : function () {
			},
			ie6_fallback           : !0,
			markup                 : '<div class="pp_pic_holder"> 						<div class="ppt">&nbsp;</div> 						<div class="pp_top"> 							<div class="pp_left"></div> 							<div class="pp_middle"></div> 							<div class="pp_right"></div> 						</div> 						<div class="pp_content_container"> 							<div class="pp_left"> 							<div class="pp_right"> 								<div class="pp_content"> 									<div class="pp_loaderIcon"></div> 									<div class="pp_fade"> 										<a href="#" class="pp_expand" title="Expand the image">Expand</a> 										<div class="pp_hoverContainer"> 											<a class="pp_next" href="#">next</a> 											<a class="pp_previous" href="#">previous</a> 										</div> 										<div id="pp_full_res"></div> 										<div class="pp_details"> 											<div class="pp_nav"> 												<a href="#" class="pp_arrow_previous">Previous</a> 												<p class="currentTextHolder">0/0</p> 												<a href="#" class="pp_arrow_next">Next</a> 											</div> 											<p class="pp_description"></p> 											<div class="pp_social">{pp_social}</div> 											<a class="pp_close" href="#">Close</a> 										</div> 									</div> 								</div> 							</div> 							</div> 						</div> 						<div class="pp_bottom"> 							<div class="pp_left"></div> 							<div class="pp_middle"></div> 							<div class="pp_right"></div> 						</div> 					</div> 					<div class="pp_overlay"></div>',
			gallery_markup         : '<div class="pp_gallery"> 								<a href="#" class="pp_arrow_previous">Previous</a> 								<div> 									<ul> 										{gallery} 									</ul> 								</div> 								<a href="#" class="pp_arrow_next">Next</a> 							</div>',
			image_markup           : '<img id="fullResImage" src="{path}" />',
			flash_markup           : '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}"><param name="wmode" value="{wmode}" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="{path}" /><embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{width}" height="{height}" wmode="{wmode}"></embed></object>',
			quicktime_markup       : '<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="{height}" width="{width}"><param name="src" value="{path}"><param name="autoplay" value="{autoplay}"><param name="type" value="video/quicktime"><embed src="{path}" height="{height}" width="{width}" autoplay="{autoplay}" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"></embed></object>',
			iframe_markup          : '<iframe src ="{path}" width="{width}" height="{height}" frameborder="no"></iframe>',
			inline_markup          : '<div class="pp_inline">{content}</div>',
			custom_markup          : "",
			social_tools           : '<div class="twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div><div class="facebook"><iframe src="//www.facebook.com/plugins/like.php?locale=en_US&href={location_href}&layout=button_count&show_faces=true&width=500&action=like&font&colorscheme=light&height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:23px;" allowTransparency="true"></iframe></div>'
		}, a);
		var f, v, y, w, b, k, P, x = this, $ = !1, I = e(window).height(), j = e(window).width();
		return doresize = !0, scroll_pos = _(), e(window).unbind("resize.prettyphoto").bind("resize.prettyphoto", function () {
			c(), g()
		}), a.keyboard_shortcuts && e(document).unbind("keydown.prettyphoto").bind("keydown.prettyphoto", function (t) {
			if ("undefined" != typeof $pp_pic_holder && $pp_pic_holder.is(":visible"))switch (t.keyCode) {
				case 37:
					e.prettyPhoto.changePage("previous"), t.preventDefault();
					break;
				case 39:
					e.prettyPhoto.changePage("next"), t.preventDefault();
					break;
				case 27:
					settings.modal || e.prettyPhoto.close(), t.preventDefault()
			}
		}), e.prettyPhoto.initialize = function () {
			return settings = a, "pp_default" == settings.theme && (settings.horizontal_padding = 16), theRel = e(this).attr(settings.hook), galleryRegExp = /\[(?:.*)\]/, isSet = galleryRegExp.exec(theRel) ? !0 : !1, pp_images = isSet ? jQuery.map(x, function (t) {
				return -1 != e(t).attr(settings.hook).indexOf(theRel) ? e(t).attr("href") : void 0
			}) : e.makeArray(e(this).attr("href")), pp_titles = isSet ? jQuery.map(x, function (t) {
				return -1 != e(t).attr(settings.hook).indexOf(theRel) ? e(t).find("img").attr("alt") ? e(t).find("img").attr("alt") : "" : void 0
			}) : e.makeArray(e(this).find("img").attr("alt")), pp_descriptions = isSet ? jQuery.map(x, function (t) {
				return -1 != e(t).attr(settings.hook).indexOf(theRel) ? e(t).attr("title") ? e(t).attr("title") : "" : void 0
			}) : e.makeArray(e(this).attr("title")), pp_images.length > settings.overlay_gallery_max && (settings.overlay_gallery = !1), set_position = jQuery.inArray(e(this).attr("href"), pp_images), rel_index = isSet ? set_position : e("a[" + settings.hook + "^='" + theRel + "']").index(e(this)), u(this), settings.allow_resize && e(window).bind("scroll.prettyphoto", function () {
				c()
			}), e.prettyPhoto.open(), !1
		}, e.prettyPhoto.open = function (t) {
			return "undefined" == typeof settings && (settings = a, pp_images = e.makeArray(arguments[0]), pp_titles = e.makeArray(arguments[1] ? arguments[1] : ""), pp_descriptions = e.makeArray(arguments[2] ? arguments[2] : ""), isSet = pp_images.length > 1 ? !0 : !1, set_position = arguments[3] ? arguments[3] : 0, u(t.target)), settings.hideflash && e("object,embed,iframe[src*=youtube],iframe[src*=vimeo]").css("visibility", "hidden"), r(e(pp_images).size()), e(".pp_loaderIcon").show(), settings.deeplinking && i(), settings.social_tools && (facebook_like_link = settings.social_tools.replace("{location_href}", encodeURIComponent(location.href)), $pp_pic_holder.find(".pp_social").html(facebook_like_link)), $ppt.is(":hidden") && $ppt.css("opacity", 0).show(), $pp_overlay.show().fadeTo(settings.animation_speed, settings.opacity), $pp_pic_holder.find(".currentTextHolder").text(set_position + 1 + settings.counter_separator_label + e(pp_images).size()), "undefined" != typeof pp_descriptions[set_position] && "" != pp_descriptions[set_position] ? $pp_pic_holder.find(".pp_description").show().html(unescape(pp_descriptions[set_position])) : $pp_pic_holder.find(".pp_description").hide(), movie_width = parseFloat(o("width", pp_images[set_position])) ? o("width", pp_images[set_position]) : settings.default_width.toString(), movie_height = parseFloat(o("height", pp_images[set_position])) ? o("height", pp_images[set_position]) : settings.default_height.toString(), $ = !1, -1 != movie_height.indexOf("%") && (movie_height = parseFloat(e(window).height() * parseFloat(movie_height) / 100 - 150), $ = !0), -1 != movie_width.indexOf("%") && (movie_width = parseFloat(e(window).width() * parseFloat(movie_width) / 100 - 150), $ = !0), $pp_pic_holder.fadeIn(function () {
				switch ($ppt.html(settings.show_title && "" != pp_titles[set_position] && "undefined" != typeof pp_titles[set_position] ? unescape(pp_titles[set_position]) : "&nbsp;"), imgPreloader = "", skipInjection = !1, h(pp_images[set_position])) {
					case"image":
						imgPreloader = new Image, nextImage = new Image, isSet && set_position < e(pp_images).size() - 1 && (nextImage.src = pp_images[set_position + 1]), prevImage = new Image, isSet && pp_images[set_position - 1] && (prevImage.src = pp_images[set_position - 1]), $pp_pic_holder.find("#pp_full_res")[0].innerHTML = settings.image_markup.replace(/{path}/g, pp_images[set_position]), imgPreloader.onload = function () {
							f = l(imgPreloader.width, imgPreloader.height), s()
						}, imgPreloader.onerror = function () {
							alert("Image cannot be loaded. Make sure the path is correct and image exist."), e.prettyPhoto.close()
						}, imgPreloader.src = pp_images[set_position];
						break;
					case"youtube":
						f = l(movie_width, movie_height), movie_id = o("v", pp_images[set_position]), "" == movie_id && (movie_id = pp_images[set_position].split("youtu.be/"), movie_id = movie_id[1], movie_id.indexOf("?") > 0 && (movie_id = movie_id.substr(0, movie_id.indexOf("?"))), movie_id.indexOf("&") > 0 && (movie_id = movie_id.substr(0, movie_id.indexOf("&")))), movie = "http://www.youtube.com/embed/" + movie_id, movie += o("rel", pp_images[set_position]) ? "?rel=" + o("rel", pp_images[set_position]) : "?rel=1", settings.autoplay && (movie += "&autoplay=1"), toInject = settings.iframe_markup.replace(/{width}/g, f.width).replace(/{height}/g, f.height).replace(/{wmode}/g, settings.wmode).replace(/{path}/g, movie);
						break;
					case"vimeo":
						f = l(movie_width, movie_height), movie_id = pp_images[set_position];
						var t = /http(s?):\/\/(www\.)?vimeo.com\/(\d+)/, i = movie_id.match(t);
						movie = "http://player.vimeo.com/video/" + i[3] + "?title=0&byline=0&portrait=0", settings.autoplay && (movie += "&autoplay=1;"), vimeo_width = f.width + "/embed/?moog_width=" + f.width, toInject = settings.iframe_markup.replace(/{width}/g, vimeo_width).replace(/{height}/g, f.height).replace(/{path}/g, movie);
						break;
					case"quicktime":
						f = l(movie_width, movie_height), f.height += 15, f.contentHeight += 15, f.containerHeight += 15, toInject = settings.quicktime_markup.replace(/{width}/g, f.width).replace(/{height}/g, f.height).replace(/{wmode}/g, settings.wmode).replace(/{path}/g, pp_images[set_position]).replace(/{autoplay}/g, settings.autoplay);
						break;
					case"flash":
						f = l(movie_width, movie_height), flash_vars = pp_images[set_position], flash_vars = flash_vars.substring(pp_images[set_position].indexOf("flashvars") + 10, pp_images[set_position].length), filename = pp_images[set_position], filename = filename.substring(0, filename.indexOf("?")), toInject = settings.flash_markup.replace(/{width}/g, f.width).replace(/{height}/g, f.height).replace(/{wmode}/g, settings.wmode).replace(/{path}/g, filename + "?" + flash_vars);
						break;
					case"iframe":
						f = l(movie_width, movie_height), frame_url = pp_images[set_position], frame_url = frame_url.substr(0, frame_url.indexOf("iframe") - 1), toInject = settings.iframe_markup.replace(/{width}/g, f.width).replace(/{height}/g, f.height).replace(/{path}/g, frame_url);
						break;
					case"ajax":
						doresize = !1, f = l(movie_width, movie_height), doresize = !0, skipInjection = !0, e.get(pp_images[set_position], function (e) {
							toInject = settings.inline_markup.replace(/{content}/g, e), $pp_pic_holder.find("#pp_full_res")[0].innerHTML = toInject, s()
						});
						break;
					case"custom":
						f = l(movie_width, movie_height), toInject = settings.custom_markup;
						break;
					case"inline":
						myClone = e(pp_images[set_position]).clone().append('<br clear="all" />').css({width: settings.default_width}).wrapInner('<div id="pp_full_res"><div class="pp_inline"></div></div>').appendTo(e("body")).show(), doresize = !1, f = l(e(myClone).width(), e(myClone).height()), doresize = !0, e(myClone).remove(), toInject = settings.inline_markup.replace(/{content}/g, e(pp_images[set_position]).html())
				}
				imgPreloader || skipInjection || ($pp_pic_holder.find("#pp_full_res")[0].innerHTML = toInject, s())
			}), !1
		}, e.prettyPhoto.changePage = function (t) {
			currentGalleryPage = 0, "previous" == t ? (set_position--, set_position < 0 && (set_position = e(pp_images).size() - 1)) : "next" == t ? (set_position++, set_position > e(pp_images).size() - 1 && (set_position = 0)) : set_position = t, rel_index = set_position, doresize || (doresize = !0), settings.allow_expand && e(".pp_contract").removeClass("pp_contract").addClass("pp_expand"), n(function () {
				e.prettyPhoto.open()
			})
		}, e.prettyPhoto.changeGalleryPage = function (e) {
			"next" == e ? (currentGalleryPage++, currentGalleryPage > totalPage && (currentGalleryPage = 0)) : "previous" == e ? (currentGalleryPage--, currentGalleryPage < 0 && (currentGalleryPage = totalPage)) : currentGalleryPage = e, slide_speed = "next" == e || "previous" == e ? settings.animation_speed : 0, slide_to = currentGalleryPage * itemsPerPage * itemWidth, $pp_gallery.find("ul").animate({left: -slide_to}, slide_speed)
		}, e.prettyPhoto.startSlideshow = function () {
			"undefined" == typeof P ? ($pp_pic_holder.find(".pp_play").unbind("click").removeClass("pp_play").addClass("pp_pause").click(function () {
				return e.prettyPhoto.stopSlideshow(), !1
			}), P = setInterval(e.prettyPhoto.startSlideshow, settings.slideshow)) : e.prettyPhoto.changePage("next")
		}, e.prettyPhoto.stopSlideshow = function () {
			$pp_pic_holder.find(".pp_pause").unbind("click").removeClass("pp_pause").addClass("pp_play").click(function () {
				return e.prettyPhoto.startSlideshow(), !1
			}), clearInterval(P), P = void 0
		}, e.prettyPhoto.close = function () {
			$pp_overlay.is(":animated") || (e.prettyPhoto.stopSlideshow(), $pp_pic_holder.stop().find("object,embed").css("visibility", "hidden"), e("div.pp_pic_holder,div.ppt,.pp_fade").fadeOut(settings.animation_speed, function () {
				e(this).remove()
			}), $pp_overlay.fadeOut(settings.animation_speed, function () {
				settings.hideflash && e("object,embed,iframe[src*=youtube],iframe[src*=vimeo]").css("visibility", "visible"), e(this).remove(), e(window).unbind("scroll.prettyphoto"), p(), settings.callback(), doresize = !0, v = !1, delete settings
			}))
		}, !pp_alreadyInitialized && t() && (pp_alreadyInitialized = !0, hashIndex = t(), hashRel = hashIndex, hashIndex = hashIndex.substring(hashIndex.indexOf("/") + 1, hashIndex.length - 1), hashRel = hashRel.substring(0, hashRel.indexOf("/")), setTimeout(function () {
			e("a[" + a.hook + "^='" + hashRel + "']:eq(" + hashIndex + ")").trigger("click")
		}, 50)), this.unbind("click.prettyphoto").bind("click.prettyphoto", e.prettyPhoto.initialize)
	}
}(jQuery);
var pp_alreadyInitialized = !1;
/* perfect-scrollbar v0.6.2 */
!function t(e, n, r) {
	function o(l, s) {
		if (!n[l]) {
			if (!e[l]) {
				var a = "function" == typeof require && require;
				if (!s && a)return a(l, !0);
				if (i)return i(l, !0);
				var c = new Error("Cannot find module '" + l + "'");
				throw c.code = "MODULE_NOT_FOUND", c
			}
			var u = n[l] = {exports: {}};
			e[l][0].call(u.exports, function (t) {
				var n = e[l][1][t];
				return o(n ? n : t)
			}, u, u.exports, t, e, n, r)
		}
		return n[l].exports
	}
	for (var i = "function" == typeof require && require, l = 0; l < r.length; l++)o(r[l]);
	return o
}({1                                                                                                              : [function (t, e) {
	"use strict";
	function n(t) {
		t.fn.perfectScrollbar = function (e) {
			return this.each(function () {
				if ("object" == typeof e || "undefined" == typeof e) {
					var n = e;
					o.get(this) || r.initialize(this, n)
				} else {
					var i = e;
					"update" === i ? r.update(this) : "destroy" === i && r.destroy(this)
				}
				return t(this)
			})
		}
	}
	var r = t("../main"), o = t("../plugin/instances");
	if ("function" == typeof define && define.amd)define(["jquery"], n); else {
		var i = window.jQuery ? window.jQuery : window.$;
		"undefined" != typeof i && n(i)
	}
	e.exports = n
}, {"../main": 7, "../plugin/instances": 18}],
	2                                                                                                             : [function (t, e, n) {
		"use strict";
		function r(t, e) {
			var n = t.className.split(" ");
			n.indexOf(e) < 0 && n.push(e), t.className = n.join(" ")
		}
		function o(t, e) {
			var n = t.className.split(" "), r = n.indexOf(e);
			r >= 0 && n.splice(r, 1), t.className = n.join(" ")
		}
		n.add = function (t, e) {
			t.classList ? t.classList.add(e) : r(t, e)
		}, n.remove = function (t, e) {
			t.classList ? t.classList.remove(e) : o(t, e)
		}, n.list = function (t) {
			return t.classList ? t.classList : t.className.split(" ")
		}
	}, {}],
	3                                                                                                             : [function (t, e, n) {
		"use strict";
		function r(t, e) {
			return window.getComputedStyle(t)[e]
		}
		function o(t, e, n) {
			return "number" == typeof n && (n = n.toString() + "px"), t.style[e] = n, t
		}
		function i(t, e) {
			for (var n in e) {
				var r = e[n];
				"number" == typeof r && (r = r.toString() + "px"), t.style[n] = r
			}
			return t
		}
		n.e = function (t, e) {
			var n = document.createElement(t);
			return n.className = e, n
		}, n.appendTo = function (t, e) {
			return e.appendChild(t), t
		}, n.css = function (t, e, n) {
			return "object" == typeof e ? i(t, e) : "undefined" == typeof n ? r(t, e) : o(t, e, n)
		}, n.matches = function (t, e) {
			return "undefined" != typeof t.matches ? t.matches(e) : "undefined" != typeof t.matchesSelector ? t.matchesSelector(e) : "undefined" != typeof t.webkitMatchesSelector ? t.webkitMatchesSelector(e) : "undefined" != typeof t.mozMatchesSelector ? t.mozMatchesSelector(e) : "undefined" != typeof t.msMatchesSelector ? t.msMatchesSelector(e) : void 0
		}, n.remove = function (t) {
			"undefined" != typeof t.remove ? t.remove() : t.parentNode && t.parentNode.removeChild(t)
		}
	}, {}],
	4                                                                                                             : [function (t, e) {
		"use strict";
		var n = function (t) {
			this.element = t, this.events = {}
		};
		n.prototype.bind = function (t, e) {
			"undefined" == typeof this.events[t] && (this.events[t] = []), this.events[t].push(e), this.element.addEventListener(t, e, !1)
		}, n.prototype.unbind = function (t, e) {
			var n = "undefined" != typeof e;
			this.events[t] = this.events[t].filter(function (r) {
				return n && r !== e ? !0 : (this.element.removeEventListener(t, r, !1), !1)
			}, this)
		}, n.prototype.unbindAll = function () {
			for (var t in this.events)this.unbind(t)
		};
		var r = function () {
			this.eventElements = []
		};
		r.prototype.eventElement = function (t) {
			var e = this.eventElements.filter(function (e) {
				return e.element === t
			})[0];
			return "undefined" == typeof e && (e = new n(t), this.eventElements.push(e)), e
		}, r.prototype.bind = function (t, e, n) {
			this.eventElement(t).bind(e, n)
		}, r.prototype.unbind = function (t, e, n) {
			this.eventElement(t).unbind(e, n)
		}, r.prototype.unbindAll = function () {
			for (var t = 0; t < this.eventElements.length; t++)this.eventElements[t].unbindAll()
		}, r.prototype.once = function (t, e, n) {
			var r = this.eventElement(t), o = function (t) {
				r.unbind(e, o), n(t)
			};
			r.bind(e, o)
		}, e.exports = r
	}, {}],
	5                                                                                                             : [function (t, e) {
		"use strict";
		e.exports = function () {
			function t() {
				return Math.floor(65536 * (1 + Math.random())).toString(16).substring(1)
			}
			return function () {
				return t() + t() + "-" + t() + "-" + t() + "-" + t() + "-" + t() + t() + t()
			}
		}()
	}, {}],
	6                                                                                                             : [function (t, e, n) {
		"use strict";
		var r = t("./class"), o = t("./dom");
		n.toInt = function (t) {
			return "string" == typeof t ? parseInt(t, 10) : ~~t
		}, n.clone = function (t) {
			if (null === t)return null;
			if ("object" == typeof t) {
				var e = {};
				for (var n in t)e[n] = this.clone(t[n]);
				return e
			}
			return t
		}, n.extend = function (t, e) {
			var n = this.clone(t);
			for (var r in e)n[r] = this.clone(e[r]);
			return n
		}, n.isEditable = function (t) {
			return o.matches(t, "input,[contenteditable]") || o.matches(t, "select,[contenteditable]") || o.matches(t, "textarea,[contenteditable]") || o.matches(t, "button,[contenteditable]")
		}, n.removePsClasses = function (t) {
			for (var e = r.list(t), n = 0; n < e.length; n++) {
				var o = e[n];
				0 === o.indexOf("ps-") && r.remove(t, o)
			}
		}, n.outerWidth = function (t) {
			return this.toInt(o.css(t, "width")) + this.toInt(o.css(t, "paddingLeft")) + this.toInt(o.css(t, "paddingRight")) + this.toInt(o.css(t, "borderLeftWidth")) + this.toInt(o.css(t, "borderRightWidth"))
		}, n.startScrolling = function (t, e) {
			r.add(t, "ps-in-scrolling"), "undefined" != typeof e ? r.add(t, "ps-" + e) : (r.add(t, "ps-x"), r.add(t, "ps-y"))
		}, n.stopScrolling = function (t, e) {
			r.remove(t, "ps-in-scrolling"), "undefined" != typeof e ? r.remove(t, "ps-" + e) : (r.remove(t, "ps-x"), r.remove(t, "ps-y"))
		}, n.env = {
			isWebKit         : "WebkitAppearance"in document.documentElement.style,
			supportsTouch    : "ontouchstart"in window || window.DocumentTouch && document instanceof window.DocumentTouch,
			supportsIePointer: null !== window.navigator.msMaxTouchPoints
		}
	}, {"./class": 2, "./dom": 3}],
	7                                                                                                             : [function (t, e) {
		"use strict";
		var n = t("./plugin/destroy"), r = t("./plugin/initialize"), o = t("./plugin/update");
		e.exports = {initialize: r, update: o, destroy: n}
	}, {"./plugin/destroy": 9, "./plugin/initialize": 17, "./plugin/update": 20}],
	8                                                                                                             : [function (t, e) {
		"use strict";
		e.exports = {
			wheelSpeed         : 1,
			wheelPropagation   : !1,
			swipePropagation   : !0,
			minScrollbarLength : null,
			maxScrollbarLength : null,
			useBothWheelAxes   : !1,
			useKeyboard        : !0,
			suppressScrollX    : !1,
			suppressScrollY    : !1,
			scrollXMarginOffset: 0,
			scrollYMarginOffset: 0
		}
	}, {}],
	9                                                                                                             : [function (t, e) {
		"use strict";
		var n = t("../lib/dom"), r = t("../lib/helper"), o = t("./instances");
		e.exports = function (t) {
			var e = o.get(t);
			e.event.unbindAll(), n.remove(e.scrollbarX), n.remove(e.scrollbarY), n.remove(e.scrollbarXRail), n.remove(e.scrollbarYRail), r.removePsClasses(t), o.remove(t)
		}
	}, {"../lib/dom": 3, "../lib/helper": 6, "./instances": 18}],
	10                                                                                                            : [function (t, e) {
		"use strict";
		function n(t, e) {
			function n(t) {
				return t.getBoundingClientRect()
			}
			var o = window.Event.prototype.stopPropagation.bind;
			e.event.bind(e.scrollbarY, "click", o), e.event.bind(e.scrollbarYRail, "click", function (o) {
				var l = r.toInt(e.scrollbarYHeight / 2), s = o.pageY - n(e.scrollbarYRail).top - l, a = e.containerHeight - e.scrollbarYHeight, c = s / a;
				0 > c ? c = 0 : c > 1 && (c = 1), t.scrollTop = (e.contentHeight - e.containerHeight) * c, i(t)
			}), e.event.bind(e.scrollbarX, "click", o), e.event.bind(e.scrollbarXRail, "click", function (o) {
				var l = r.toInt(e.scrollbarXWidth / 2), s = o.pageX - n(e.scrollbarXRail).left - l;
				console.log(o.pageX, e.scrollbarXRail.offsetLeft);
				var a = e.containerWidth - e.scrollbarXWidth, c = s / a;
				0 > c ? c = 0 : c > 1 && (c = 1), t.scrollLeft = (e.contentWidth - e.containerWidth) * c, i(t)
			})
		}
		var r = t("../../lib/helper"), o = t("../instances"), i = t("../update-geometry");
		e.exports = function (t) {
			var e = o.get(t);
			n(t, e)
		}
	}, {"../../lib/helper": 6, "../instances": 18, "../update-geometry": 19}],
	11                                                                                                            : [function (t, e) {
		"use strict";
		function n(t, e) {
			function n(n) {
				var o = r + n, l = e.containerWidth - e.scrollbarXWidth;
				e.scrollbarXLeft = 0 > o ? 0 : o > l ? l : o;
				var s = i.toInt(e.scrollbarXLeft * (e.contentWidth - e.containerWidth) / (e.containerWidth - e.scrollbarXWidth));
				t.scrollLeft = s
			}
			var r = null, l = null, a = function (e) {
				n(e.pageX - l), s(t), e.stopPropagation(), e.preventDefault()
			}, c = function () {
				i.stopScrolling(t, "x"), e.event.unbind(e.ownerDocument, "mousemove", a)
			};
			e.event.bind(e.scrollbarX, "mousedown", function (n) {
				l = n.pageX, r = i.toInt(o.css(e.scrollbarX, "left")), i.startScrolling(t, "x"), e.event.bind(e.ownerDocument, "mousemove", a), e.event.once(e.ownerDocument, "mouseup", c), n.stopPropagation(), n.preventDefault()
			})
		}
		function r(t, e) {
			function n(n) {
				var o = r + n, l = e.containerHeight - e.scrollbarYHeight;
				e.scrollbarYTop = 0 > o ? 0 : o > l ? l : o;
				var s = i.toInt(e.scrollbarYTop * (e.contentHeight - e.containerHeight) / (e.containerHeight - e.scrollbarYHeight));
				t.scrollTop = s
			}
			var r = null, l = null, a = function (e) {
				n(e.pageY - l), s(t), e.stopPropagation(), e.preventDefault()
			}, c = function () {
				i.stopScrolling(t, "y"), e.event.unbind(e.ownerDocument, "mousemove", a)
			};
			e.event.bind(e.scrollbarY, "mousedown", function (n) {
				l = n.pageY, r = i.toInt(o.css(e.scrollbarY, "top")), i.startScrolling(t, "y"), e.event.bind(e.ownerDocument, "mousemove", a), e.event.once(e.ownerDocument, "mouseup", c), n.stopPropagation(), n.preventDefault()
			})
		}
		var o = t("../../lib/dom"), i = t("../../lib/helper"), l = t("../instances"), s = t("../update-geometry");
		e.exports = function (t) {
			var e = l.get(t);
			n(t, e), r(t, e)
		}
	}, {"../../lib/dom": 3, "../../lib/helper": 6, "../instances": 18, "../update-geometry": 19}],
	12                                                                                                            : [function (t, e) {
		"use strict";
		function n(t, e) {
			function n(n, r) {
				var o = t.scrollTop;
				if (0 === n) {
					if (!e.scrollbarYActive)return !1;
					if (0 === o && r > 0 || o >= e.contentHeight - e.containerHeight && 0 > r)return !e.settings.wheelPropagation
				}
				var i = t.scrollLeft;
				if (0 === r) {
					if (!e.scrollbarXActive)return !1;
					if (0 === i && 0 > n || i >= e.contentWidth - e.containerWidth && n > 0)return !e.settings.wheelPropagation
				}
				return !0
			}
			var o = !1;
			e.event.bind(t, "mouseenter", function () {
				o = !0
			}), e.event.bind(t, "mouseleave", function () {
				o = !1
			});
			var l = !1;
			e.event.bind(e.ownerDocument, "keydown", function (s) {
				if ((!s.isDefaultPrevented || !s.isDefaultPrevented()) && o) {
					var a = document.activeElement ? document.activeElement : e.ownerDocument.activeElement;
					if (a) {
						for (; a.shadowRoot;)a = a.shadowRoot.activeElement;
						if (r.isEditable(a))return
					}
					var c = 0, u = 0;
					switch (s.which) {
						case 37:
							c = -30;
							break;
						case 38:
							u = 30;
							break;
						case 39:
							c = 30;
							break;
						case 40:
							u = -30;
							break;
						case 33:
							u = 90;
							break;
						case 32:
						case 34:
							u = -90;
							break;
						case 35:
							u = s.ctrlKey ? -e.contentHeight : -e.containerHeight;
							break;
						case 36:
							u = s.ctrlKey ? t.scrollTop : e.containerHeight;
							break;
						default:
							return
					}
					t.scrollTop = t.scrollTop - u, t.scrollLeft = t.scrollLeft + c, i(t), l = n(c, u), l && s.preventDefault()
				}
			})
		}
		var r = t("../../lib/helper"), o = t("../instances"), i = t("../update-geometry");
		e.exports = function (t) {
			var e = o.get(t);
			n(t, e)
		}
	}, {"../../lib/helper": 6, "../instances": 18, "../update-geometry": 19}],
	13                                                                                                            : [function (t, e) {
		"use strict";
		function n(t, e) {
			function n(n, r) {
				var o = t.scrollTop;
				if (0 === n) {
					if (!e.scrollbarYActive)return !1;
					if (0 === o && r > 0 || o >= e.contentHeight - e.containerHeight && 0 > r)return !e.settings.wheelPropagation
				}
				var i = t.scrollLeft;
				if (0 === r) {
					if (!e.scrollbarXActive)return !1;
					if (0 === i && 0 > n || i >= e.contentWidth - e.containerWidth && n > 0)return !e.settings.wheelPropagation
				}
				return !0
			}
			function o(t) {
				var e = t.deltaX, n = -1 * t.deltaY;
				return ("undefined" == typeof e || "undefined" == typeof n) && (e = -1 * t.wheelDeltaX / 6, n = t.wheelDeltaY / 6), t.deltaMode && 1 === t.deltaMode && (e *= 10, n *= 10), e !== e && n !== n && (e = 0, n = t.wheelDelta), [e, n]
			}
			function l(e, n) {
				var r = t.querySelector("textarea:hover");
				if (r) {
					var o = r.scrollHeight - r.clientHeight;
					if (o > 0 && !(0 === r.scrollTop && n > 0 || r.scrollTop === o && 0 > n))return !0;
					var i = r.scrollLeft - r.clientWidth;
					if (i > 0 && !(0 === r.scrollLeft && 0 > e || r.scrollLeft === i && e > 0))return !0
				}
				return !1
			}
			function s(s) {
				if (r.env.isWebKit || !t.querySelector("select:focus")) {
					var c = o(s), u = c[0], d = c[1];
					l(u, d) || (a = !1, e.settings.useBothWheelAxes ? e.scrollbarYActive && !e.scrollbarXActive ? (t.scrollTop = d ? t.scrollTop - d * e.settings.wheelSpeed : t.scrollTop + u * e.settings.wheelSpeed, a = !0) : e.scrollbarXActive && !e.scrollbarYActive && (t.scrollLeft = u ? t.scrollLeft + u * e.settings.wheelSpeed : t.scrollLeft - d * e.settings.wheelSpeed, a = !0) : (t.scrollTop = t.scrollTop - d * e.settings.wheelSpeed, t.scrollLeft = t.scrollLeft + u * e.settings.wheelSpeed), i(t), a = a || n(u, d), a && (s.stopPropagation(), s.preventDefault()))
				}
			}
			var a = !1;
			"undefined" != typeof window.onwheel ? e.event.bind(t, "wheel", s) : "undefined" != typeof window.onmousewheel && e.event.bind(t, "mousewheel", s)
		}
		var r = t("../../lib/helper"), o = t("../instances"), i = t("../update-geometry");
		e.exports = function (t) {
			var e = o.get(t);
			n(t, e)
		}
	}, {"../../lib/helper": 6, "../instances": 18, "../update-geometry": 19}],
	14                                                                                                            : [function (t, e) {
		"use strict";
		function n(t, e) {
			e.event.bind(t, "scroll", function () {
				o(t)
			})
		}
		var r = t("../instances"), o = t("../update-geometry");
		e.exports = function (t) {
			var e = r.get(t);
			n(t, e)
		}
	}, {"../instances": 18, "../update-geometry": 19}],
	15                                                                                                            : [function (t, e) {
		"use strict";
		function n(t, e) {
			function n() {
				var t = window.getSelection ? window.getSelection() : document.getSelection ? document.getSelection() : "";
				return 0 === t.toString().length ? null : t.getRangeAt(0).commonAncestorContainer
			}
			function l() {
				a || (a = setInterval(function () {
					return o.get(t) ? (t.scrollTop = t.scrollTop + c.top, t.scrollLeft = t.scrollLeft + c.left, void i(t)) : void clearInterval(a)
				}, 50))
			}
			function s() {
				a && (clearInterval(a), a = null), r.stopScrolling(t)
			}
			var a = null, c = {top: 0, left: 0}, u = !1;
			e.event.bind(e.ownerDocument, "selectionchange", function () {
				t.contains(n()) ? u = !0 : (u = !1, s())
			}), e.event.bind(window, "mouseup", function () {
				u && (u = !1, s())
			}), e.event.bind(window, "mousemove", function (e) {
				if (u) {
					var n = {x: e.pageX, y: e.pageY}, o = {
						left  : t.offsetLeft,
						right : t.offsetLeft + t.offsetWidth,
						top   : t.offsetTop,
						bottom: t.offsetTop + t.offsetHeight
					};
					n.x < o.left + 3 ? (c.left = -5, r.startScrolling(t, "x")) : n.x > o.right - 3 ? (c.left = 5, r.startScrolling(t, "x")) : c.left = 0, n.y < o.top + 3 ? (c.top = o.top + 3 - n.y < 5 ? -5 : -20, r.startScrolling(t, "y")) : n.y > o.bottom - 3 ? (c.top = n.y - o.bottom + 3 < 5 ? 5 : 20, r.startScrolling(t, "y")) : c.top = 0, 0 === c.top && 0 === c.left ? s() : l()
				}
			})
		}
		var r = t("../../lib/helper"), o = t("../instances"), i = t("../update-geometry");
		e.exports = function (t) {
			var e = o.get(t);
			n(t, e)
		}
	}, {"../../lib/helper": 6, "../instances": 18, "../update-geometry": 19}],
	16                                                                                                            : [function (t, e) {
		"use strict";
		function n(t, e, n, i) {
			function l(n, r) {
				var o = t.scrollTop, i = t.scrollLeft, l = Math.abs(n), s = Math.abs(r);
				if (s > l) {
					if (0 > r && o === e.contentHeight - e.containerHeight || r > 0 && 0 === o)return !e.settings.swipePropagation
				} else if (l > s && (0 > n && i === e.contentWidth - e.containerWidth || n > 0 && 0 === i))return !e.settings.swipePropagation;
				return !0
			}
			function s(e, n) {
				t.scrollTop = t.scrollTop - n, t.scrollLeft = t.scrollLeft - e, o(t)
			}
			function a() {
				w = !0
			}
			function c() {
				w = !1
			}
			function u(t) {
				return t.targetTouches ? t.targetTouches[0] : t
			}
			function d(t) {
				return t.targetTouches && 1 === t.targetTouches.length ? !0 : t.pointerType && "mouse" !== t.pointerType && t.pointerType !== t.MSPOINTER_TYPE_MOUSE ? !0 : !1
			}
			function p(t) {
				if (d(t)) {
					y = !0;
					var e = u(t);
					b.pageX = e.pageX, b.pageY = e.pageY, g = (new Date).getTime(), null !== m && clearInterval(m), t.stopPropagation()
				}
			}
			function f(t) {
				if (!w && y && d(t)) {
					var e = u(t), n = {pageX: e.pageX, pageY: e.pageY}, r = n.pageX - b.pageX, o = n.pageY - b.pageY;
					s(r, o), b = n;
					var i = (new Date).getTime(), a = i - g;
					a > 0 && (v.x = r / a, v.y = o / a, g = i), l(r, o) && (t.stopPropagation(), t.preventDefault())
				}
			}
			function h() {
				!w && y && (y = !1, clearInterval(m), m = setInterval(function () {
					return r.get(t) ? Math.abs(v.x) < .01 && Math.abs(v.y) < .01 ? void clearInterval(m) : (s(30 * v.x, 30 * v.y), v.x *= .8, void(v.y *= .8)) : void clearInterval(m)
				}, 10))
			}
			var b = {}, g = 0, v = {}, m = null, w = !1, y = !1;
			n && (e.event.bind(window, "touchstart", a), e.event.bind(window, "touchend", c), e.event.bind(t, "touchstart", p), e.event.bind(t, "touchmove", f), e.event.bind(t, "touchend", h)), i && (window.PointerEvent ? (e.event.bind(window, "pointerdown", a), e.event.bind(window, "pointerup", c), e.event.bind(t, "pointerdown", p), e.event.bind(t, "pointermove", f), e.event.bind(t, "pointerup", h)) : window.MSPointerEvent && (e.event.bind(window, "MSPointerDown", a), e.event.bind(window, "MSPointerUp", c), e.event.bind(t, "MSPointerDown", p), e.event.bind(t, "MSPointerMove", f), e.event.bind(t, "MSPointerUp", h)))
		}
		var r = t("../instances"), o = t("../update-geometry");
		e.exports = function (t, e, o) {
			var i = r.get(t);
			n(t, i, e, o)
		}
	}, {"../instances": 18, "../update-geometry": 19}],
	17                                                                                                            : [function (t, e) {
		"use strict";
		var n = t("../lib/class"), r = t("../lib/helper"), o = t("./instances"), i = t("./update-geometry"), l = t("./handler/click-rail"), s = t("./handler/drag-scrollbar"), a = t("./handler/keyboard"), c = t("./handler/mouse-wheel"), u = t("./handler/native-scroll"), d = t("./handler/selection"), p = t("./handler/touch");
		e.exports = function (t, e) {
			e = "object" == typeof e ? e : {}, n.add(t, "ps-container");
			var f = o.add(t);
			f.settings = r.extend(f.settings, e), l(t), s(t), c(t), u(t), d(t), (r.env.supportsTouch || r.env.supportsIePointer) && p(t, r.env.supportsTouch, r.env.supportsIePointer), f.settings.useKeyboard && a(t), i(t)
		}
	}, {
		"../lib/class"            : 2,
		"../lib/helper"           : 6,
		"./handler/click-rail"    : 10,
		"./handler/drag-scrollbar": 11,
		"./handler/keyboard"      : 12,
		"./handler/mouse-wheel"   : 13,
		"./handler/native-scroll" : 14,
		"./handler/selection"     : 15,
		"./handler/touch"         : 16,
		"./instances"             : 18,
		"./update-geometry"       : 19
	}],
	18                                                                                                            : [function (t, e, n) {
		"use strict";
		function r(t) {
			var e = this;
			e.settings = d.clone(a), e.containerWidth = null, e.containerHeight = null, e.contentWidth = null, e.contentHeight = null, e.isRtl = "rtl" === s.css(t, "direction"), e.event = new c, e.ownerDocument = t.ownerDocument || document, e.scrollbarXRail = s.appendTo(s.e("div", "ps-scrollbar-x-rail"), t), e.scrollbarX = s.appendTo(s.e("div", "ps-scrollbar-x"), e.scrollbarXRail), e.scrollbarXActive = null, e.scrollbarXWidth = null, e.scrollbarXLeft = null, e.scrollbarXBottom = d.toInt(s.css(e.scrollbarXRail, "bottom")), e.isScrollbarXUsingBottom = e.scrollbarXBottom === e.scrollbarXBottom, e.scrollbarXTop = e.isScrollbarXUsingBottom ? null : d.toInt(s.css(e.scrollbarXRail, "top")), e.railBorderXWidth = d.toInt(s.css(e.scrollbarXRail, "borderLeftWidth")) + d.toInt(s.css(e.scrollbarXRail, "borderRightWidth")), e.railXMarginWidth = d.toInt(s.css(e.scrollbarXRail, "marginLeft")) + d.toInt(s.css(e.scrollbarXRail, "marginRight")), e.railXWidth = null, e.scrollbarYRail = s.appendTo(s.e("div", "ps-scrollbar-y-rail"), t), e.scrollbarY = s.appendTo(s.e("div", "ps-scrollbar-y"), e.scrollbarYRail), e.scrollbarYActive = null, e.scrollbarYHeight = null, e.scrollbarYTop = null, e.scrollbarYRight = d.toInt(s.css(e.scrollbarYRail, "right")), e.isScrollbarYUsingRight = e.scrollbarYRight === e.scrollbarYRight, e.scrollbarYLeft = e.isScrollbarYUsingRight ? null : d.toInt(s.css(e.scrollbarYRail, "left")), e.scrollbarYOuterWidth = e.isRtl ? d.outerWidth(e.scrollbarY) : null, e.railBorderYWidth = d.toInt(s.css(e.scrollbarYRail, "borderTopWidth")) + d.toInt(s.css(e.scrollbarYRail, "borderBottomWidth")), e.railYMarginHeight = d.toInt(s.css(e.scrollbarYRail, "marginTop")) + d.toInt(s.css(e.scrollbarYRail, "marginBottom")), e.railYHeight = null
		}
		function o(t) {
			return "undefined" == typeof t.dataset ? t.getAttribute("data-ps-id") : t.dataset.psId
		}
		function i(t, e) {
			"undefined" == typeof t.dataset ? t.setAttribute("data-ps-id", e) : t.dataset.psId = e
		}
		function l(t) {
			"undefined" == typeof t.dataset ? t.removeAttribute("data-ps-id") : delete t.dataset.psId
		}
		var s = t("../lib/dom"), a = t("./default-setting"), c = t("../lib/event-manager"), u = t("../lib/guid"), d = t("../lib/helper"), p = {};
		n.add = function (t) {
			var e = u();
			return i(t, e), p[e] = new r(t), p[e]
		}, n.remove = function (t) {
			delete p[o(t)], l(t)
		}, n.get = function (t) {
			return p[o(t)]
		}
	}, {"../lib/dom": 3, "../lib/event-manager": 4, "../lib/guid": 5, "../lib/helper": 6, "./default-setting": 8}],
	19                                                                                                            : [function (t, e) {
		"use strict";
		function n(t, e) {
			return t.settings.minScrollbarLength && (e = Math.max(e, t.settings.minScrollbarLength)), t.settings.maxScrollbarLength && (e = Math.min(e, t.settings.maxScrollbarLength)), e
		}
		function r(t, e) {
			var n = {width: e.railXWidth};
			n.left = e.isRtl ? t.scrollLeft + e.containerWidth - e.contentWidth : t.scrollLeft, e.isScrollbarXUsingBottom ? n.bottom = e.scrollbarXBottom - t.scrollTop : n.top = e.scrollbarXTop + t.scrollTop, i.css(e.scrollbarXRail, n);
			var r = {top: t.scrollTop, height: e.railYHeight};
			e.isScrollbarYUsingRight ? r.right = e.isRtl ? e.contentWidth - t.scrollLeft - e.scrollbarYRight - e.scrollbarYOuterWidth : e.scrollbarYRight - t.scrollLeft : r.left = e.isRtl ? t.scrollLeft + 2 * e.containerWidth - e.contentWidth - e.scrollbarYLeft - e.scrollbarYOuterWidth : e.scrollbarYLeft + t.scrollLeft, i.css(e.scrollbarYRail, r), i.css(e.scrollbarX, {left: e.scrollbarXLeft,
				width: e.scrollbarXWidth - e.railBorderXWidth
			}), i.css(e.scrollbarY, {top: e.scrollbarYTop, height: e.scrollbarYHeight - e.railBorderYWidth})
		}
		var o = t("../lib/class"), i = t("../lib/dom"), l = t("../lib/helper"), s = t("./instances");
		e.exports = function (t) {
			var e = s.get(t);
			e.containerWidth = t.clientWidth, e.containerHeight = t.clientHeight, e.contentWidth = t.scrollWidth, e.contentHeight = t.scrollHeight, t.contains(e.scrollbarXRail) || i.appendTo(e.scrollbarXRail, t), t.contains(e.scrollbarYRail) || i.appendTo(e.scrollbarYRail, t), !e.settings.suppressScrollX && e.containerWidth + e.settings.scrollXMarginOffset < e.contentWidth ? (e.scrollbarXActive = !0, e.railXWidth = e.containerWidth - e.railXMarginWidth, e.scrollbarXWidth = n(e, l.toInt(e.railXWidth * e.containerWidth / e.contentWidth)), e.scrollbarXLeft = l.toInt(t.scrollLeft * (e.railXWidth - e.scrollbarXWidth) / (e.contentWidth - e.containerWidth))) : (e.scrollbarXActive = !1, e.scrollbarXWidth = 0, e.scrollbarXLeft = 0, t.scrollLeft = 0), !e.settings.suppressScrollY && e.containerHeight + e.settings.scrollYMarginOffset < e.contentHeight ? (e.scrollbarYActive = !0, e.railYHeight = e.containerHeight - e.railYMarginHeight, e.scrollbarYHeight = n(e, l.toInt(e.railYHeight * e.containerHeight / e.contentHeight)), e.scrollbarYTop = l.toInt(t.scrollTop * (e.railYHeight - e.scrollbarYHeight) / (e.contentHeight - e.containerHeight))) : (e.scrollbarYActive = !1, e.scrollbarYHeight = 0, e.scrollbarYTop = 0, t.scrollTop = 0), e.scrollbarXLeft >= e.railXWidth - e.scrollbarXWidth && (e.scrollbarXLeft = e.railXWidth - e.scrollbarXWidth), e.scrollbarYTop >= e.railYHeight - e.scrollbarYHeight && (e.scrollbarYTop = e.railYHeight - e.scrollbarYHeight), r(t, e), o[e.scrollbarXActive ? "add" : "remove"](t, "ps-active-x"), o[e.scrollbarYActive ? "add" : "remove"](t, "ps-active-y")
		}
	}, {"../lib/class": 2, "../lib/dom": 3, "../lib/helper": 6, "./instances": 18}],
	20                                                                                                            : [function (t, e) {
		"use strict";
		var n = t("../lib/dom"), r = t("./instances"), o = t("./update-geometry");
		e.exports = function (t) {
			var e = r.get(t);
			n.css(e.scrollbarXRail, "display", "none"), n.css(e.scrollbarYRail, "display", "none"), o(t), n.css(e.scrollbarXRail, "display", "block"), n.css(e.scrollbarYRail, "display", "block")
		}
	}, {"../lib/dom": 3, "./instances": 18, "./update-geometry": 19}]
}, {}, [1]);
/*!
 * Isotope PACKAGED v2.2.0
 *
 * Licensed GPLv3 for open source use
 * or Isotope Commercial License for commercial use
 *
 * http://isotope.metafizzy.co
 * Copyright 2015 Metafizzy
 */

(function (t) {
	function e() {
	}
	function i(t) {
		function i(e) {
			e.prototype.option || (e.prototype.option = function (e) {
				t.isPlainObject(e) && (this.options = t.extend(!0, this.options, e))
			})
		}
		function n(e, i) {
			t.fn[e] = function (n) {
				if ("string" == typeof n) {
					for (var s = o.call(arguments, 1), a = 0, u = this.length; u > a; a++) {
						var p = this[a], h = t.data(p, e);
						if (h)if (t.isFunction(h[n]) && "_" !== n.charAt(0)) {
							var f = h[n].apply(h, s);
							if (void 0 !== f)return f
						} else r("no such method '" + n + "' for " + e + " instance"); else r("cannot call methods on " + e + " prior to initialization; " + "attempted to call '" + n + "'")
					}
					return this
				}
				return this.each(function () {
					var o = t.data(this, e);
					o ? (o.option(n), o._init()) : (o = new i(this, n), t.data(this, e, o))
				})
			}
		}
		if (t) {
			var r = "undefined" == typeof console ? e : function (t) {
				console.error(t)
			};
			return t.bridget = function (t, e) {
				i(e), n(t, e)
			}, t.bridget
		}
	}
	var o = Array.prototype.slice;
	"function" == typeof define && define.amd ? define("jquery-bridget/jquery.bridget", ["jquery"], i) : "object" == typeof exports ? i(require("jquery")) : i(t.jQuery)
})(window), function (t) {
	function e(e) {
		var i = t.event;
		return i.target = i.target || i.srcElement || e, i
	}
	var i = document.documentElement, o = function () {
	};
	i.addEventListener ? o = function (t, e, i) {
		t.addEventListener(e, i, !1)
	} : i.attachEvent && (o = function (t, i, o) {
		t[i + o] = o.handleEvent ? function () {
			var i = e(t);
			o.handleEvent.call(o, i)
		} : function () {
			var i = e(t);
			o.call(t, i)
		}, t.attachEvent("on" + i, t[i + o])
	});
	var n = function () {
	};
	i.removeEventListener ? n = function (t, e, i) {
		t.removeEventListener(e, i, !1)
	} : i.detachEvent && (n = function (t, e, i) {
		t.detachEvent("on" + e, t[e + i]);
		try {
			delete t[e + i]
		} catch (o) {
			t[e + i] = void 0
		}
	});
	var r = {bind: o, unbind: n};
	"function" == typeof define && define.amd ? define("eventie/eventie", r) : "object" == typeof exports ? module.exports = r : t.eventie = r
}(window), function () {
	function t() {
	}
	function e(t, e) {
		for (var i = t.length; i--;)if (t[i].listener === e)return i;
		return -1
	}
	function i(t) {
		return function () {
			return this[t].apply(this, arguments)
		}
	}
	var o = t.prototype, n = this, r = n.EventEmitter;
	o.getListeners = function (t) {
		var e, i, o = this._getEvents();
		if (t instanceof RegExp) {
			e = {};
			for (i in o)o.hasOwnProperty(i) && t.test(i) && (e[i] = o[i])
		} else e = o[t] || (o[t] = []);
		return e
	}, o.flattenListeners = function (t) {
		var e, i = [];
		for (e = 0; t.length > e; e += 1)i.push(t[e].listener);
		return i
	}, o.getListenersAsObject = function (t) {
		var e, i = this.getListeners(t);
		return i instanceof Array && (e = {}, e[t] = i), e || i
	}, o.addListener = function (t, i) {
		var o, n = this.getListenersAsObject(t), r = "object" == typeof i;
		for (o in n)n.hasOwnProperty(o) && -1 === e(n[o], i) && n[o].push(r ? i : {listener: i, once: !1});
		return this
	}, o.on = i("addListener"), o.addOnceListener = function (t, e) {
		return this.addListener(t, {listener: e, once: !0})
	}, o.once = i("addOnceListener"), o.defineEvent = function (t) {
		return this.getListeners(t), this
	}, o.defineEvents = function (t) {
		for (var e = 0; t.length > e; e += 1)this.defineEvent(t[e]);
		return this
	}, o.removeListener = function (t, i) {
		var o, n, r = this.getListenersAsObject(t);
		for (n in r)r.hasOwnProperty(n) && (o = e(r[n], i), -1 !== o && r[n].splice(o, 1));
		return this
	}, o.off = i("removeListener"), o.addListeners = function (t, e) {
		return this.manipulateListeners(!1, t, e)
	}, o.removeListeners = function (t, e) {
		return this.manipulateListeners(!0, t, e)
	}, o.manipulateListeners = function (t, e, i) {
		var o, n, r = t ? this.removeListener : this.addListener, s = t ? this.removeListeners : this.addListeners;
		if ("object" != typeof e || e instanceof RegExp)for (o = i.length; o--;)r.call(this, e, i[o]); else for (o in e)e.hasOwnProperty(o) && (n = e[o]) && ("function" == typeof n ? r.call(this, o, n) : s.call(this, o, n));
		return this
	}, o.removeEvent = function (t) {
		var e, i = typeof t, o = this._getEvents();
		if ("string" === i)delete o[t]; else if (t instanceof RegExp)for (e in o)o.hasOwnProperty(e) && t.test(e) && delete o[e]; else delete this._events;
		return this
	}, o.removeAllListeners = i("removeEvent"), o.emitEvent = function (t, e) {
		var i, o, n, r, s = this.getListenersAsObject(t);
		for (n in s)if (s.hasOwnProperty(n))for (o = s[n].length; o--;)i = s[n][o], i.once === !0 && this.removeListener(t, i.listener), r = i.listener.apply(this, e || []), r === this._getOnceReturnValue() && this.removeListener(t, i.listener);
		return this
	}, o.trigger = i("emitEvent"), o.emit = function (t) {
		var e = Array.prototype.slice.call(arguments, 1);
		return this.emitEvent(t, e)
	}, o.setOnceReturnValue = function (t) {
		return this._onceReturnValue = t, this
	}, o._getOnceReturnValue = function () {
		return this.hasOwnProperty("_onceReturnValue") ? this._onceReturnValue : !0
	}, o._getEvents = function () {
		return this._events || (this._events = {})
	}, t.noConflict = function () {
		return n.EventEmitter = r, t
	}, "function" == typeof define && define.amd ? define("eventEmitter/EventEmitter", [], function () {
		return t
	}) : "object" == typeof module && module.exports ? module.exports = t : n.EventEmitter = t
}.call(this), function (t) {
	function e(t) {
		if (t) {
			if ("string" == typeof o[t])return t;
			t = t.charAt(0).toUpperCase() + t.slice(1);
			for (var e, n = 0, r = i.length; r > n; n++)if (e = i[n] + t, "string" == typeof o[e])return e
		}
	}
	var i = "Webkit Moz ms Ms O".split(" "), o = document.documentElement.style;
	"function" == typeof define && define.amd ? define("get-style-property/get-style-property", [], function () {
		return e
	}) : "object" == typeof exports ? module.exports = e : t.getStyleProperty = e
}(window), function (t) {
	function e(t) {
		var e = parseFloat(t), i = -1 === t.indexOf("%") && !isNaN(e);
		return i && e
	}
	function i() {
	}
	function o() {
		for (var t = {
			width      : 0,
			height     : 0,
			innerWidth : 0,
			innerHeight: 0,
			outerWidth : 0,
			outerHeight: 0
		}, e = 0, i = s.length; i > e; e++) {
			var o = s[e];
			t[o] = 0
		}
		return t
	}
	function n(i) {
		function n() {
			if (!d) {
				d = !0;
				var o = t.getComputedStyle;
				if (p = function () {
						var t = o ? function (t) {
							return o(t, null)
						} : function (t) {
							return t.currentStyle
						};
						return function (e) {
							var i = t(e);
							return i || r("Style returned " + i + ". Are you running this code in a hidden iframe on Firefox? " + "See http://bit.ly/getsizebug1"), i
						}
					}(), h = i("boxSizing")) {
					var n = document.createElement("div");
					n.style.width = "200px", n.style.padding = "1px 2px 3px 4px", n.style.borderStyle = "solid", n.style.borderWidth = "1px 2px 3px 4px", n.style[h] = "border-box";
					var s = document.body || document.documentElement;
					s.appendChild(n);
					var a = p(n);
					f = 200 === e(a.width), s.removeChild(n)
				}
			}
		}
		function a(t) {
			if (n(), "string" == typeof t && (t = document.querySelector(t)), t && "object" == typeof t && t.nodeType) {
				var i = p(t);
				if ("none" === i.display)return o();
				var r = {};
				r.width = t.offsetWidth, r.height = t.offsetHeight;
				for (var a = r.isBorderBox = !(!h || !i[h] || "border-box" !== i[h]), d = 0, l = s.length; l > d; d++) {
					var c = s[d], m = i[c];
					m = u(t, m);
					var y = parseFloat(m);
					r[c] = isNaN(y) ? 0 : y
				}
				var g = r.paddingLeft + r.paddingRight, v = r.paddingTop + r.paddingBottom, _ = r.marginLeft + r.marginRight, I = r.marginTop + r.marginBottom, z = r.borderLeftWidth + r.borderRightWidth, L = r.borderTopWidth + r.borderBottomWidth, x = a && f, E = e(i.width);
				E !== !1 && (r.width = E + (x ? 0 : g + z));
				var b = e(i.height);
				return b !== !1 && (r.height = b + (x ? 0 : v + L)), r.innerWidth = r.width - (g + z), r.innerHeight = r.height - (v + L), r.outerWidth = r.width + _, r.outerHeight = r.height + I, r
			}
		}
		function u(e, i) {
			if (t.getComputedStyle || -1 === i.indexOf("%"))return i;
			var o = e.style, n = o.left, r = e.runtimeStyle, s = r && r.left;
			return s && (r.left = e.currentStyle.left), o.left = i, i = o.pixelLeft, o.left = n, s && (r.left = s), i
		}
		var p, h, f, d = !1;
		return a
	}
	var r = "undefined" == typeof console ? i : function (t) {
		console.error(t)
	}, s = ["paddingLeft", "paddingRight", "paddingTop", "paddingBottom", "marginLeft", "marginRight", "marginTop", "marginBottom", "borderLeftWidth", "borderRightWidth", "borderTopWidth", "borderBottomWidth"];
	"function" == typeof define && define.amd ? define("get-size/get-size", ["get-style-property/get-style-property"], n) : "object" == typeof exports ? module.exports = n(require("desandro-get-style-property")) : t.getSize = n(t.getStyleProperty)
}(window), function (t) {
	function e(t) {
		"function" == typeof t && (e.isReady ? t() : s.push(t))
	}
	function i(t) {
		var i = "readystatechange" === t.type && "complete" !== r.readyState;
		e.isReady || i || o()
	}
	function o() {
		e.isReady = !0;
		for (var t = 0, i = s.length; i > t; t++) {
			var o = s[t];
			o()
		}
	}
	function n(n) {
		return "complete" === r.readyState ? o() : (n.bind(r, "DOMContentLoaded", i), n.bind(r, "readystatechange", i), n.bind(t, "load", i)), e
	}
	var r = t.document, s = [];
	e.isReady = !1, "function" == typeof define && define.amd ? define("doc-ready/doc-ready", ["eventie/eventie"], n) : "object" == typeof exports ? module.exports = n(require("eventie")) : t.docReady = n(t.eventie)
}(window), function (t) {
	function e(t, e) {
		return t[s](e)
	}
	function i(t) {
		if (!t.parentNode) {
			var e = document.createDocumentFragment();
			e.appendChild(t)
		}
	}
	function o(t, e) {
		i(t);
		for (var o = t.parentNode.querySelectorAll(e), n = 0, r = o.length; r > n; n++)if (o[n] === t)return !0;
		return !1
	}
	function n(t, o) {
		return i(t), e(t, o)
	}
	var r, s = function () {
		if (t.matches)return "matches";
		if (t.matchesSelector)return "matchesSelector";
		for (var e = ["webkit", "moz", "ms", "o"], i = 0, o = e.length; o > i; i++) {
			var n = e[i], r = n + "MatchesSelector";
			if (t[r])return r
		}
	}();
	if (s) {
		var a = document.createElement("div"), u = e(a, "div");
		r = u ? e : n
	} else r = o;
	"function" == typeof define && define.amd ? define("matches-selector/matches-selector", [], function () {
		return r
	}) : "object" == typeof exports ? module.exports = r : window.matchesSelector = r
}(Element.prototype), function (t, e) {
	"function" == typeof define && define.amd ? define("fizzy-ui-utils/utils", ["doc-ready/doc-ready", "matches-selector/matches-selector"], function (i, o) {
		return e(t, i, o)
	}) : "object" == typeof exports ? module.exports = e(t, require("doc-ready"), require("desandro-matches-selector")) : t.fizzyUIUtils = e(t, t.docReady, t.matchesSelector)
}(window, function (t, e, i) {
	var o = {};
	o.extend = function (t, e) {
		for (var i in e)t[i] = e[i];
		return t
	}, o.modulo = function (t, e) {
		return (t % e + e) % e
	};
	var n = Object.prototype.toString;
	o.isArray = function (t) {
		return "[object Array]" == n.call(t)
	}, o.makeArray = function (t) {
		var e = [];
		if (o.isArray(t))e = t; else if (t && "number" == typeof t.length)for (var i = 0, n = t.length; n > i; i++)e.push(t[i]); else e.push(t);
		return e
	}, o.indexOf = Array.prototype.indexOf ? function (t, e) {
		return t.indexOf(e)
	} : function (t, e) {
		for (var i = 0, o = t.length; o > i; i++)if (t[i] === e)return i;
		return -1
	}, o.removeFrom = function (t, e) {
		var i = o.indexOf(t, e);
		-1 != i && t.splice(i, 1)
	}, o.isElement = "function" == typeof HTMLElement || "object" == typeof HTMLElement ? function (t) {
		return t instanceof HTMLElement
	} : function (t) {
		return t && "object" == typeof t && 1 == t.nodeType && "string" == typeof t.nodeName
	}, o.setText = function () {
		function t(t, i) {
			e = e || (void 0 !== document.documentElement.textContent ? "textContent" : "innerText"), t[e] = i
		}
		var e;
		return t
	}(), o.getParent = function (t, e) {
		for (; t != document.body;)if (t = t.parentNode, i(t, e))return t
	}, o.getQueryElement = function (t) {
		return "string" == typeof t ? document.querySelector(t) : t
	}, o.handleEvent = function (t) {
		var e = "on" + t.type;
		this[e] && this[e](t)
	}, o.filterFindElements = function (t, e) {
		t = o.makeArray(t);
		for (var n = [], r = 0, s = t.length; s > r; r++) {
			var a = t[r];
			if (o.isElement(a))if (e) {
				i(a, e) && n.push(a);
				for (var u = a.querySelectorAll(e), p = 0, h = u.length; h > p; p++)n.push(u[p])
			} else n.push(a)
		}
		return n
	}, o.debounceMethod = function (t, e, i) {
		var o = t.prototype[e], n = e + "Timeout";
		t.prototype[e] = function () {
			var t = this[n];
			t && clearTimeout(t);
			var e = arguments, r = this;
			this[n] = setTimeout(function () {
				o.apply(r, e), delete r[n]
			}, i || 100)
		}
	}, o.toDashed = function (t) {
		return t.replace(/(.)([A-Z])/g, function (t, e, i) {
			return e + "-" + i
		}).toLowerCase()
	};
	var r = t.console;
	return o.htmlInit = function (i, n) {
		e(function () {
			for (var e = o.toDashed(n), s = document.querySelectorAll(".js-" + e), a = "data-" + e + "-options", u = 0, p = s.length; p > u; u++) {
				var h, f = s[u], d = f.getAttribute(a);
				try {
					h = d && JSON.parse(d)
				} catch (l) {
					r && r.error("Error parsing " + a + " on " + f.nodeName.toLowerCase() + (f.id ? "#" + f.id : "") + ": " + l);
					continue
				}
				var c = new i(f, h), m = t.jQuery;
				m && m.data(f, n, c)
			}
		})
	}, o
}), function (t, e) {
	"function" == typeof define && define.amd ? define("outlayer/item", ["eventEmitter/EventEmitter", "get-size/get-size", "get-style-property/get-style-property", "fizzy-ui-utils/utils"], function (i, o, n, r) {
		return e(t, i, o, n, r)
	}) : "object" == typeof exports ? module.exports = e(t, require("wolfy87-eventemitter"), require("get-size"), require("desandro-get-style-property"), require("fizzy-ui-utils")) : (t.Outlayer = {}, t.Outlayer.Item = e(t, t.EventEmitter, t.getSize, t.getStyleProperty, t.fizzyUIUtils))
}(window, function (t, e, i, o, n) {
	function r(t) {
		for (var e in t)return !1;
		return e = null, !0
	}
	function s(t, e) {
		t && (this.element = t, this.layout = e, this.position = {x: 0, y: 0}, this._create())
	}
	var a = t.getComputedStyle, u = a ? function (t) {
		return a(t, null)
	} : function (t) {
		return t.currentStyle
	}, p = o("transition"), h = o("transform"), f = p && h, d = !!o("perspective"), l = {
		WebkitTransition: "webkitTransitionEnd",
		MozTransition   : "transitionend",
		OTransition     : "otransitionend",
		transition      : "transitionend"
	}[p], c = ["transform", "transition", "transitionDuration", "transitionProperty"], m = function () {
		for (var t = {}, e = 0, i = c.length; i > e; e++) {
			var n = c[e], r = o(n);
			r && r !== n && (t[n] = r)
		}
		return t
	}();
	n.extend(s.prototype, e.prototype), s.prototype._create = function () {
		this._transn = {ingProperties: {}, clean: {}, onEnd: {}}, this.css({position: "absolute"})
	}, s.prototype.handleEvent = function (t) {
		var e = "on" + t.type;
		this[e] && this[e](t)
	}, s.prototype.getSize = function () {
		this.size = i(this.element)
	}, s.prototype.css = function (t) {
		var e = this.element.style;
		for (var i in t) {
			var o = m[i] || i;
			e[o] = t[i]
		}
	}, s.prototype.getPosition = function () {
		var t = u(this.element), e = this.layout.options, i = e.isOriginLeft, o = e.isOriginTop, n = parseInt(t[i ? "left" : "right"], 10), r = parseInt(t[o ? "top" : "bottom"], 10);
		n = isNaN(n) ? 0 : n, r = isNaN(r) ? 0 : r;
		var s = this.layout.size;
		n -= i ? s.paddingLeft : s.paddingRight, r -= o ? s.paddingTop : s.paddingBottom, this.position.x = n, this.position.y = r
	}, s.prototype.layoutPosition = function () {
		var t = this.layout.size, e = this.layout.options, i = {}, o = e.isOriginLeft ? "paddingLeft" : "paddingRight", n = e.isOriginLeft ? "left" : "right", r = e.isOriginLeft ? "right" : "left", s = this.position.x + t[o];
		s = e.percentPosition && !e.isHorizontal ? 100 * (s / t.width) + "%" : s + "px", i[n] = s, i[r] = "";
		var a = e.isOriginTop ? "paddingTop" : "paddingBottom", u = e.isOriginTop ? "top" : "bottom", p = e.isOriginTop ? "bottom" : "top", h = this.position.y + t[a];
		h = e.percentPosition && e.isHorizontal ? 100 * (h / t.height) + "%" : h + "px", i[u] = h, i[p] = "", this.css(i), this.emitEvent("layout", [this])
	};
	var y = d ? function (t, e) {
		return "translate3d(" + t + "px, " + e + "px, 0)"
	} : function (t, e) {
		return "translate(" + t + "px, " + e + "px)"
	};
	s.prototype._transitionTo = function (t, e) {
		this.getPosition();
		var i = this.position.x, o = this.position.y, n = parseInt(t, 10), r = parseInt(e, 10), s = n === this.position.x && r === this.position.y;
		if (this.setPosition(t, e), s && !this.isTransitioning)return this.layoutPosition(), void 0;
		var a = t - i, u = e - o, p = {}, h = this.layout.options;
		a = h.isOriginLeft ? a : -a, u = h.isOriginTop ? u : -u, p.transform = y(a, u), this.transition({
			to             : p,
			onTransitionEnd: {transform: this.layoutPosition},
			isCleaning     : !0
		})
	}, s.prototype.goTo = function (t, e) {
		this.setPosition(t, e), this.layoutPosition()
	}, s.prototype.moveTo = f ? s.prototype._transitionTo : s.prototype.goTo, s.prototype.setPosition = function (t, e) {
		this.position.x = parseInt(t, 10), this.position.y = parseInt(e, 10)
	}, s.prototype._nonTransition = function (t) {
		this.css(t.to), t.isCleaning && this._removeStyles(t.to);
		for (var e in t.onTransitionEnd)t.onTransitionEnd[e].call(this)
	}, s.prototype._transition = function (t) {
		if (!parseFloat(this.layout.options.transitionDuration))return this._nonTransition(t), void 0;
		var e = this._transn;
		for (var i in t.onTransitionEnd)e.onEnd[i] = t.onTransitionEnd[i];
		for (i in t.to)e.ingProperties[i] = !0, t.isCleaning && (e.clean[i] = !0);
		if (t.from) {
			this.css(t.from);
			var o = this.element.offsetHeight;
			o = null
		}
		this.enableTransition(t.to), this.css(t.to), this.isTransitioning = !0
	};
	var g = h && n.toDashed(h) + ",opacity";
	s.prototype.enableTransition = function () {
		this.isTransitioning || (this.css({
			transitionProperty: g,
			transitionDuration: this.layout.options.transitionDuration
		}), this.element.addEventListener(l, this, !1))
	}, s.prototype.transition = s.prototype[p ? "_transition" : "_nonTransition"], s.prototype.onwebkitTransitionEnd = function (t) {
		this.ontransitionend(t)
	}, s.prototype.onotransitionend = function (t) {
		this.ontransitionend(t)
	};
	var v = {"-webkit-transform": "transform", "-moz-transform": "transform", "-o-transform": "transform"};
	s.prototype.ontransitionend = function (t) {
		if (t.target === this.element) {
			var e = this._transn, i = v[t.propertyName] || t.propertyName;
			if (delete e.ingProperties[i], r(e.ingProperties) && this.disableTransition(), i in e.clean && (this.element.style[t.propertyName] = "", delete e.clean[i]), i in e.onEnd) {
				var o = e.onEnd[i];
				o.call(this), delete e.onEnd[i]
			}
			this.emitEvent("transitionEnd", [this])
		}
	}, s.prototype.disableTransition = function () {
		this.removeTransitionStyles(), this.element.removeEventListener(l, this, !1), this.isTransitioning = !1
	}, s.prototype._removeStyles = function (t) {
		var e = {};
		for (var i in t)e[i] = "";
		this.css(e)
	};
	var _ = {transitionProperty: "", transitionDuration: ""};
	return s.prototype.removeTransitionStyles = function () {
		this.css(_)
	}, s.prototype.removeElem = function () {
		this.element.parentNode.removeChild(this.element), this.css({display: ""}), this.emitEvent("remove", [this])
	}, s.prototype.remove = function () {
		if (!p || !parseFloat(this.layout.options.transitionDuration))return this.removeElem(), void 0;
		var t = this;
		this.once("transitionEnd", function () {
			t.removeElem()
		}), this.hide()
	}, s.prototype.reveal = function () {
		delete this.isHidden, this.css({display: ""});
		var t = this.layout.options, e = {}, i = this.getHideRevealTransitionEndProperty("visibleStyle");
		e[i] = this.onRevealTransitionEnd, this.transition({
			from           : t.hiddenStyle,
			to             : t.visibleStyle,
			isCleaning     : !0,
			onTransitionEnd: e
		})
	}, s.prototype.onRevealTransitionEnd = function () {
		this.isHidden || this.emitEvent("reveal")
	}, s.prototype.getHideRevealTransitionEndProperty = function (t) {
		var e = this.layout.options[t];
		if (e.opacity)return "opacity";
		for (var i in e)return i
	}, s.prototype.hide = function () {
		this.isHidden = !0, this.css({display: ""});
		var t = this.layout.options, e = {}, i = this.getHideRevealTransitionEndProperty("hiddenStyle");
		e[i] = this.onHideTransitionEnd, this.transition({
			from           : t.visibleStyle,
			to             : t.hiddenStyle,
			isCleaning     : !0,
			onTransitionEnd: e
		})
	}, s.prototype.onHideTransitionEnd = function () {
		this.isHidden && (this.css({display: "none"}), this.emitEvent("hide"))
	}, s.prototype.destroy = function () {
		this.css({position: "", left: "", right: "", top: "", bottom: "", transition: "", transform: ""})
	}, s
}), function (t, e) {
	"function" == typeof define && define.amd ? define("outlayer/outlayer", ["eventie/eventie", "eventEmitter/EventEmitter", "get-size/get-size", "fizzy-ui-utils/utils", "./item"], function (i, o, n, r, s) {
		return e(t, i, o, n, r, s)
	}) : "object" == typeof exports ? module.exports = e(t, require("eventie"), require("wolfy87-eventemitter"), require("get-size"), require("fizzy-ui-utils"), require("./item")) : t.Outlayer = e(t, t.eventie, t.EventEmitter, t.getSize, t.fizzyUIUtils, t.Outlayer.Item)
}(window, function (t, e, i, o, n, r) {
	function s(t, e) {
		var i = n.getQueryElement(t);
		if (!i)return a && a.error("Bad element for " + this.constructor.namespace + ": " + (i || t)), void 0;
		this.element = i, u && (this.$element = u(this.element)), this.options = n.extend({}, this.constructor.defaults), this.option(e);
		var o = ++h;
		this.element.outlayerGUID = o, f[o] = this, this._create(), this.options.isInitLayout && this.layout()
	}
	var a = t.console, u = t.jQuery, p = function () {
	}, h = 0, f = {};
	return s.namespace = "outlayer", s.Item = r, s.defaults = {
		containerStyle     : {position: "relative"},
		isInitLayout       : !0,
		isOriginLeft       : !0,
		isOriginTop        : !0,
		isResizeBound      : !0,
		isResizingContainer: !0,
		transitionDuration : "0.4s",
		hiddenStyle        : {opacity: 0, transform: "scale(0.001)"},
		visibleStyle       : {opacity: 1, transform: "scale(1)"}
	}, n.extend(s.prototype, i.prototype), s.prototype.option = function (t) {
		n.extend(this.options, t)
	}, s.prototype._create = function () {
		this.reloadItems(), this.stamps = [], this.stamp(this.options.stamp), n.extend(this.element.style, this.options.containerStyle), this.options.isResizeBound && this.bindResize()
	}, s.prototype.reloadItems = function () {
		this.items = this._itemize(this.element.children)
	}, s.prototype._itemize = function (t) {
		for (var e = this._filterFindItemElements(t), i = this.constructor.Item, o = [], n = 0, r = e.length; r > n; n++) {
			var s = e[n], a = new i(s, this);
			o.push(a)
		}
		return o
	}, s.prototype._filterFindItemElements = function (t) {
		return n.filterFindElements(t, this.options.itemSelector)
	}, s.prototype.getItemElements = function () {
		for (var t = [], e = 0, i = this.items.length; i > e; e++)t.push(this.items[e].element);
		return t
	}, s.prototype.layout = function () {
		this._resetLayout(), this._manageStamps();
		var t = void 0 !== this.options.isLayoutInstant ? this.options.isLayoutInstant : !this._isLayoutInited;
		this.layoutItems(this.items, t), this._isLayoutInited = !0
	}, s.prototype._init = s.prototype.layout, s.prototype._resetLayout = function () {
		this.getSize()
	}, s.prototype.getSize = function () {
		this.size = o(this.element)
	}, s.prototype._getMeasurement = function (t, e) {
		var i, r = this.options[t];
		r ? ("string" == typeof r ? i = this.element.querySelector(r) : n.isElement(r) && (i = r), this[t] = i ? o(i)[e] : r) : this[t] = 0
	}, s.prototype.layoutItems = function (t, e) {
		t = this._getItemsForLayout(t), this._layoutItems(t, e), this._postLayout()
	}, s.prototype._getItemsForLayout = function (t) {
		for (var e = [], i = 0, o = t.length; o > i; i++) {
			var n = t[i];
			n.isIgnored || e.push(n)
		}
		return e
	}, s.prototype._layoutItems = function (t, e) {
		if (this._emitCompleteOnItems("layout", t), t && t.length) {
			for (var i = [], o = 0, n = t.length; n > o; o++) {
				var r = t[o], s = this._getItemLayoutPosition(r);
				s.item = r, s.isInstant = e || r.isLayoutInstant, i.push(s)
			}
			this._processLayoutQueue(i)
		}
	}, s.prototype._getItemLayoutPosition = function () {
		return {x: 0, y: 0}
	}, s.prototype._processLayoutQueue = function (t) {
		for (var e = 0, i = t.length; i > e; e++) {
			var o = t[e];
			this._positionItem(o.item, o.x, o.y, o.isInstant)
		}
	}, s.prototype._positionItem = function (t, e, i, o) {
		o ? t.goTo(e, i) : t.moveTo(e, i)
	}, s.prototype._postLayout = function () {
		this.resizeContainer()
	}, s.prototype.resizeContainer = function () {
		if (this.options.isResizingContainer) {
			var t = this._getContainerSize();
			t && (this._setContainerMeasure(t.width, !0), this._setContainerMeasure(t.height, !1))
		}
	}, s.prototype._getContainerSize = p, s.prototype._setContainerMeasure = function (t, e) {
		if (void 0 !== t) {
			var i = this.size;
			i.isBorderBox && (t += e ? i.paddingLeft + i.paddingRight + i.borderLeftWidth + i.borderRightWidth : i.paddingBottom + i.paddingTop + i.borderTopWidth + i.borderBottomWidth), t = Math.max(t, 0), this.element.style[e ? "width" : "height"] = t + "px"
		}
	}, s.prototype._emitCompleteOnItems = function (t, e) {
		function i() {
			n.emitEvent(t + "Complete", [e])
		}
		function o() {
			s++, s === r && i()
		}
		var n = this, r = e.length;
		if (!e || !r)return i(), void 0;
		for (var s = 0, a = 0, u = e.length; u > a; a++) {
			var p = e[a];
			p.once(t, o)
		}
	}, s.prototype.ignore = function (t) {
		var e = this.getItem(t);
		e && (e.isIgnored = !0)
	}, s.prototype.unignore = function (t) {
		var e = this.getItem(t);
		e && delete e.isIgnored
	}, s.prototype.stamp = function (t) {
		if (t = this._find(t)) {
			this.stamps = this.stamps.concat(t);
			for (var e = 0, i = t.length; i > e; e++) {
				var o = t[e];
				this.ignore(o)
			}
		}
	}, s.prototype.unstamp = function (t) {
		if (t = this._find(t))for (var e = 0, i = t.length; i > e; e++) {
			var o = t[e];
			n.removeFrom(this.stamps, o), this.unignore(o)
		}
	}, s.prototype._find = function (t) {
		return t ? ("string" == typeof t && (t = this.element.querySelectorAll(t)), t = n.makeArray(t)) : void 0
	}, s.prototype._manageStamps = function () {
		if (this.stamps && this.stamps.length) {
			this._getBoundingRect();
			for (var t = 0, e = this.stamps.length; e > t; t++) {
				var i = this.stamps[t];
				this._manageStamp(i)
			}
		}
	}, s.prototype._getBoundingRect = function () {
		var t = this.element.getBoundingClientRect(), e = this.size;
		this._boundingRect = {
			left  : t.left + e.paddingLeft + e.borderLeftWidth,
			top   : t.top + e.paddingTop + e.borderTopWidth,
			right : t.right - (e.paddingRight + e.borderRightWidth),
			bottom: t.bottom - (e.paddingBottom + e.borderBottomWidth)
		}
	}, s.prototype._manageStamp = p, s.prototype._getElementOffset = function (t) {
		var e = t.getBoundingClientRect(), i = this._boundingRect, n = o(t), r = {
			left  : e.left - i.left - n.marginLeft,
			top   : e.top - i.top - n.marginTop,
			right : i.right - e.right - n.marginRight,
			bottom: i.bottom - e.bottom - n.marginBottom
		};
		return r
	}, s.prototype.handleEvent = function (t) {
		var e = "on" + t.type;
		this[e] && this[e](t)
	}, s.prototype.bindResize = function () {
		this.isResizeBound || (e.bind(t, "resize", this), this.isResizeBound = !0)
	}, s.prototype.unbindResize = function () {
		this.isResizeBound && e.unbind(t, "resize", this), this.isResizeBound = !1
	}, s.prototype.onresize = function () {
		function t() {
			e.resize(), delete e.resizeTimeout
		}
		this.resizeTimeout && clearTimeout(this.resizeTimeout);
		var e = this;
		this.resizeTimeout = setTimeout(t, 100)
	}, s.prototype.resize = function () {
		this.isResizeBound && this.needsResizeLayout() && this.layout()
	}, s.prototype.needsResizeLayout = function () {
		var t = o(this.element), e = this.size && t;
		return e && t.innerWidth !== this.size.innerWidth
	}, s.prototype.addItems = function (t) {
		var e = this._itemize(t);
		return e.length && (this.items = this.items.concat(e)), e
	}, s.prototype.appended = function (t) {
		var e = this.addItems(t);
		e.length && (this.layoutItems(e, !0), this.reveal(e))
	}, s.prototype.prepended = function (t) {
		var e = this._itemize(t);
		if (e.length) {
			var i = this.items.slice(0);
			this.items = e.concat(i), this._resetLayout(), this._manageStamps(), this.layoutItems(e, !0), this.reveal(e), this.layoutItems(i)
		}
	}, s.prototype.reveal = function (t) {
		this._emitCompleteOnItems("reveal", t);
		for (var e = t && t.length, i = 0; e && e > i; i++) {
			var o = t[i];
			o.reveal()
		}
	}, s.prototype.hide = function (t) {
		this._emitCompleteOnItems("hide", t);
		for (var e = t && t.length, i = 0; e && e > i; i++) {
			var o = t[i];
			o.hide()
		}
	}, s.prototype.revealItemElements = function (t) {
		var e = this.getItems(t);
		this.reveal(e)
	}, s.prototype.hideItemElements = function (t) {
		var e = this.getItems(t);
		this.hide(e)
	}, s.prototype.getItem = function (t) {
		for (var e = 0, i = this.items.length; i > e; e++) {
			var o = this.items[e];
			if (o.element === t)return o
		}
	}, s.prototype.getItems = function (t) {
		t = n.makeArray(t);
		for (var e = [], i = 0, o = t.length; o > i; i++) {
			var r = t[i], s = this.getItem(r);
			s && e.push(s)
		}
		return e
	}, s.prototype.remove = function (t) {
		var e = this.getItems(t);
		if (this._emitCompleteOnItems("remove", e), e && e.length)for (var i = 0, o = e.length; o > i; i++) {
			var r = e[i];
			r.remove(), n.removeFrom(this.items, r)
		}
	}, s.prototype.destroy = function () {
		var t = this.element.style;
		t.height = "", t.position = "", t.width = "";
		for (var e = 0, i = this.items.length; i > e; e++) {
			var o = this.items[e];
			o.destroy()
		}
		this.unbindResize();
		var n = this.element.outlayerGUID;
		delete f[n], delete this.element.outlayerGUID, u && u.removeData(this.element, this.constructor.namespace)
	}, s.data = function (t) {
		t = n.getQueryElement(t);
		var e = t && t.outlayerGUID;
		return e && f[e]
	}, s.create = function (t, e) {
		function i() {
			s.apply(this, arguments)
		}
		return Object.create ? i.prototype = Object.create(s.prototype) : n.extend(i.prototype, s.prototype), i.prototype.constructor = i, i.defaults = n.extend({}, s.defaults), n.extend(i.defaults, e), i.prototype.settings = {}, i.namespace = t, i.data = s.data, i.Item = function () {
			r.apply(this, arguments)
		}, i.Item.prototype = new r, n.htmlInit(i, t), u && u.bridget && u.bridget(t, i), i
	}, s.Item = r, s
}), function (t, e) {
	"function" == typeof define && define.amd ? define("isotope/js/item", ["outlayer/outlayer"], e) : "object" == typeof exports ? module.exports = e(require("outlayer")) : (t.Isotope = t.Isotope || {}, t.Isotope.Item = e(t.Outlayer))
}(window, function (t) {
	function e() {
		t.Item.apply(this, arguments)
	}
	e.prototype = new t.Item, e.prototype._create = function () {
		this.id = this.layout.itemGUID++, t.Item.prototype._create.call(this), this.sortData = {}
	}, e.prototype.updateSortData = function () {
		if (!this.isIgnored) {
			this.sortData.id = this.id, this.sortData["original-order"] = this.id, this.sortData.random = Math.random();
			var t = this.layout.options.getSortData, e = this.layout._sorters;
			for (var i in t) {
				var o = e[i];
				this.sortData[i] = o(this.element, this)
			}
		}
	};
	var i = e.prototype.destroy;
	return e.prototype.destroy = function () {
		i.apply(this, arguments), this.css({display: ""})
	}, e
}), function (t, e) {
	"function" == typeof define && define.amd ? define("isotope/js/layout-mode", ["get-size/get-size", "outlayer/outlayer"], e) : "object" == typeof exports ? module.exports = e(require("get-size"), require("outlayer")) : (t.Isotope = t.Isotope || {}, t.Isotope.LayoutMode = e(t.getSize, t.Outlayer))
}(window, function (t, e) {
	function i(t) {
		this.isotope = t, t && (this.options = t.options[this.namespace], this.element = t.element, this.items = t.filteredItems, this.size = t.size)
	}
	return function () {
		function t(t) {
			return function () {
				return e.prototype[t].apply(this.isotope, arguments)
			}
		}
		for (var o = ["_resetLayout", "_getItemLayoutPosition", "_manageStamp", "_getContainerSize", "_getElementOffset", "needsResizeLayout"], n = 0, r = o.length; r > n; n++) {
			var s = o[n];
			i.prototype[s] = t(s)
		}
	}(), i.prototype.needsVerticalResizeLayout = function () {
		var e = t(this.isotope.element), i = this.isotope.size && e;
		return i && e.innerHeight != this.isotope.size.innerHeight
	}, i.prototype._getMeasurement = function () {
		this.isotope._getMeasurement.apply(this, arguments)
	}, i.prototype.getColumnWidth = function () {
		this.getSegmentSize("column", "Width")
	}, i.prototype.getRowHeight = function () {
		this.getSegmentSize("row", "Height")
	}, i.prototype.getSegmentSize = function (t, e) {
		var i = t + e, o = "outer" + e;
		if (this._getMeasurement(i, o), !this[i]) {
			var n = this.getFirstItemSize();
			this[i] = n && n[o] || this.isotope.size["inner" + e]
		}
	}, i.prototype.getFirstItemSize = function () {
		var e = this.isotope.filteredItems[0];
		return e && e.element && t(e.element)
	}, i.prototype.layout = function () {
		this.isotope.layout.apply(this.isotope, arguments)
	}, i.prototype.getSize = function () {
		this.isotope.getSize(), this.size = this.isotope.size
	}, i.modes = {}, i.create = function (t, e) {
		function o() {
			i.apply(this, arguments)
		}
		return o.prototype = new i, e && (o.options = e), o.prototype.namespace = t, i.modes[t] = o, o
	}, i
}), function (t, e) {
	"function" == typeof define && define.amd ? define("masonry/masonry", ["outlayer/outlayer", "get-size/get-size", "fizzy-ui-utils/utils"], e) : "object" == typeof exports ? module.exports = e(require("outlayer"), require("get-size"), require("fizzy-ui-utils")) : t.Masonry = e(t.Outlayer, t.getSize, t.fizzyUIUtils)
}(window, function (t, e, i) {
	var o = t.create("masonry");
	return o.prototype._resetLayout = function () {
		this.getSize(), this._getMeasurement("columnWidth", "outerWidth"), this._getMeasurement("gutter", "outerWidth"), this.measureColumns();
		var t = this.cols;
		for (this.colYs = []; t--;)this.colYs.push(0);
		this.maxY = 0
	}, o.prototype.measureColumns = function () {
		if (this.getContainerWidth(), !this.columnWidth) {
			var t = this.items[0], i = t && t.element;
			this.columnWidth = i && e(i).outerWidth || this.containerWidth
		}
		var o = this.columnWidth += this.gutter, n = this.containerWidth + this.gutter, r = n / o, s = o - n % o, a = s && 1 > s ? "round" : "floor";
		r = Math[a](r), this.cols = Math.max(r, 1)
	}, o.prototype.getContainerWidth = function () {
		var t = this.options.isFitWidth ? this.element.parentNode : this.element, i = e(t);
		this.containerWidth = i && i.innerWidth
	}, o.prototype._getItemLayoutPosition = function (t) {
		t.getSize();
		var e = t.size.outerWidth % this.columnWidth, o = e && 1 > e ? "round" : "ceil", n = Math[o](t.size.outerWidth / this.columnWidth);
		n = Math.min(n, this.cols);
		for (var r = this._getColGroup(n), s = Math.min.apply(Math, r), a = i.indexOf(r, s), u = {
			x: this.columnWidth * a,
			y: s
		}, p = s + t.size.outerHeight, h = this.cols + 1 - r.length, f = 0; h > f; f++)this.colYs[a + f] = p;
		return u
	}, o.prototype._getColGroup = function (t) {
		if (2 > t)return this.colYs;
		for (var e = [], i = this.cols + 1 - t, o = 0; i > o; o++) {
			var n = this.colYs.slice(o, o + t);
			e[o] = Math.max.apply(Math, n)
		}
		return e
	}, o.prototype._manageStamp = function (t) {
		var i = e(t), o = this._getElementOffset(t), n = this.options.isOriginLeft ? o.left : o.right, r = n + i.outerWidth, s = Math.floor(n / this.columnWidth);
		s = Math.max(0, s);
		var a = Math.floor(r / this.columnWidth);
		a -= r % this.columnWidth ? 0 : 1, a = Math.min(this.cols - 1, a);
		for (var u = (this.options.isOriginTop ? o.top : o.bottom) + i.outerHeight, p = s; a >= p; p++)this.colYs[p] = Math.max(u, this.colYs[p])
	}, o.prototype._getContainerSize = function () {
		this.maxY = Math.max.apply(Math, this.colYs);
		var t = {height: this.maxY};
		return this.options.isFitWidth && (t.width = this._getContainerFitWidth()), t
	}, o.prototype._getContainerFitWidth = function () {
		for (var t = 0, e = this.cols; --e && 0 === this.colYs[e];)t++;
		return (this.cols - t) * this.columnWidth - this.gutter
	}, o.prototype.needsResizeLayout = function () {
		var t = this.containerWidth;
		return this.getContainerWidth(), t !== this.containerWidth
	}, o
}), function (t, e) {
	"function" == typeof define && define.amd ? define("isotope/js/layout-modes/masonry", ["../layout-mode", "masonry/masonry"], e) : "object" == typeof exports ? module.exports = e(require("../layout-mode"), require("masonry-layout")) : e(t.Isotope.LayoutMode, t.Masonry)
}(window, function (t, e) {
	function i(t, e) {
		for (var i in e)t[i] = e[i];
		return t
	}
	var o = t.create("masonry"), n = o.prototype._getElementOffset, r = o.prototype.layout, s = o.prototype._getMeasurement;
	i(o.prototype, e.prototype), o.prototype._getElementOffset = n, o.prototype.layout = r, o.prototype._getMeasurement = s;
	var a = o.prototype.measureColumns;
	o.prototype.measureColumns = function () {
		this.items = this.isotope.filteredItems, a.call(this)
	};
	var u = o.prototype._manageStamp;
	return o.prototype._manageStamp = function () {
		this.options.isOriginLeft = this.isotope.options.isOriginLeft, this.options.isOriginTop = this.isotope.options.isOriginTop, u.apply(this, arguments)
	}, o
}), function (t, e) {
	"function" == typeof define && define.amd ? define("isotope/js/layout-modes/fit-rows", ["../layout-mode"], e) : "object" == typeof exports ? module.exports = e(require("../layout-mode")) : e(t.Isotope.LayoutMode)
}(window, function (t) {
	var e = t.create("fitRows");
	return e.prototype._resetLayout = function () {
		this.x = 0, this.y = 0, this.maxY = 0, this._getMeasurement("gutter", "outerWidth")
	},e.prototype._getItemLayoutPosition=function(t){t.getSize();var e=t.size.outerWidth+this.gutter,i=this.isotope.size.innerWidth+this.gutter;0!==this.x&&e+this.x>i&&(this.x=0,this.y=this.maxY);var o={x:this.x,y:this.y};return this.maxY=Math.max(this.maxY,this.y+t.size.outerHeight),this.x+=e,o},e.prototype._getContainerSize=function(){return{height:this.maxY}},e}),function(t,e){"function"==typeof define&&define.amd?define("isotope/js/layout-modes/vertical",["../layout-mode"],e):"object"==typeof exports?module.exports=e(require("../layout-mode")):e(t.Isotope.LayoutMode)}(window,function(t){var e=t.create("vertical",{horizontalAlignment:0});return e.prototype._resetLayout=function(){this.y=0},e.prototype._getItemLayoutPosition=function(t){t.getSize();var e=(this.isotope.size.innerWidth-t.size.outerWidth)*this.options.horizontalAlignment,i=this.y;return this.y+=t.size.outerHeight,{x:e,y:i}},e.prototype._getContainerSize=function(){return{height:this.y}},e}),function(t,e){"function"==typeof define&&define.amd?define(["outlayer/outlayer","get-size/get-size","matches-selector/matches-selector","fizzy-ui-utils/utils","isotope/js/item","isotope/js/layout-mode","isotope/js/layout-modes/masonry","isotope/js/layout-modes/fit-rows","isotope/js/layout-modes/vertical"],function(i,o,n,r,s,a){return e(t,i,o,n,r,s,a)}):"object"==typeof exports?module.exports=e(t,require("outlayer"),require("get-size"),require("desandro-matches-selector"),require("fizzy-ui-utils"),require("./item"),require("./layout-mode"),require("./layout-modes/masonry"),require("./layout-modes/fit-rows"),require("./layout-modes/vertical")):t.Isotope=e(t,t.Outlayer,t.getSize,t.matchesSelector,t.fizzyUIUtils,t.Isotope.Item,t.Isotope.LayoutMode)}(window,function(t,e,i,o,n,r,s){function a(t,e){return function(i,o){for(var n=0,r=t.length;r>n;n++){var s=t[n],a=i.sortData[s],u=o.sortData[s];if(a>u||u>a){var p=void 0!==e[s]?e[s]:e,h=p?1:-1;return(a>u?1:-1)*h}}return 0}}var u=t.jQuery,p=String.prototype.trim?function(t){return t.trim()}:function(t){return t.replace(/^\s+|\s+$/g,"")},h=document.documentElement,f=h.textContent?function(t){return t.textContent}:function(t){return t.innerText},d=e.create("isotope",{layoutMode:"masonry",isJQueryFiltering:!0,sortAscending:!0});d.Item=r,d.LayoutMode=s,d.prototype._create=function(){this.itemGUID=0,this._sorters={},this._getSorters(),e.prototype._create.call(this),this.modes={},this.filteredItems=this.items,this.sortHistory=["original-order"];for(var t in s.modes)this._initLayoutMode(t)},d.prototype.reloadItems=function(){this.itemGUID=0,e.prototype.reloadItems.call(this)},d.prototype._itemize=function(){for(var t=e.prototype._itemize.apply(this,arguments),i=0,o=t.length;o>i;i++){var n=t[i];n.id=this.itemGUID++}return this._updateItemsSortData(t),t},d.prototype._initLayoutMode=function(t){var e=s.modes[t],i=this.options[t]||{};this.options[t]=e.options?n.extend(e.options,i):i,this.modes[t]=new e(this)},d.prototype.layout=function(){return!this._isLayoutInited&&this.options.isInitLayout?(this.arrange(),void 0):(this._layout(),void 0)},d.prototype._layout=function(){var t=this._getIsInstant();this._resetLayout(),this._manageStamps(),this.layoutItems(this.filteredItems,t),this._isLayoutInited=!0},d.prototype.arrange=function(t){function e(){o.reveal(i.needReveal),o.hide(i.needHide)}this.option(t),this._getIsInstant();var i=this._filter(this.items);this.filteredItems=i.matches;var o=this;this._bindArrangeComplete(),this._isInstant?this._noTransition(e):e(),this._sort(),this._layout()},d.prototype._init=d.prototype.arrange,d.prototype._getIsInstant=function(){var t=void 0!==this.options.isLayoutInstant?this.options.isLayoutInstant:!this._isLayoutInited;return this._isInstant=t,t},d.prototype._bindArrangeComplete=function(){function t(){e&&i&&o&&n.emitEvent("arrangeComplete",[n.filteredItems])}var e,i,o,n=this;this.once("layoutComplete",function(){e=!0,t()}),this.once("hideComplete",function(){i=!0,t()}),this.once("revealComplete",function(){o=!0,t()})},d.prototype._filter=function(t){var e=this.options.filter;e=e||"*";for(var i=[],o=[],n=[],r=this._getFilterTest(e),s=0,a=t.length;a>s;s++){var u=t[s];if(!u.isIgnored){var p=r(u);p&&i.push(u),p&&u.isHidden?o.push(u):p||u.isHidden||n.push(u)}}return{matches:i,needReveal:o,needHide:n}},d.prototype._getFilterTest=function(t){return u&&this.options.isJQueryFiltering?function(e){return u(e.element).is(t)}:"function"==typeof t?function(e){return t(e.element)}:function(e){return o(e.element,t)}},d.prototype.updateSortData=function(t){var e;t?(t=n.makeArray(t),e=this.getItems(t)):e=this.items,this._getSorters(),this._updateItemsSortData(e)},d.prototype._getSorters=function(){var t=this.options.getSortData;for(var e in t){var i=t[e];this._sorters[e]=l(i)}},d.prototype._updateItemsSortData=function(t){for(var e=t&&t.length,i=0;e&&e>i;i++){var o=t[i];o.updateSortData()}};var l=function(){function t(t){if("string"!=typeof t)return t;var i=p(t).split(" "),o=i[0],n=o.match(/^\[(.+)\]$/),r=n&&n[1],s=e(r,o),a=d.sortDataParsers[i[1]];return t=a?function(t){return t&&a(s(t))}:function(t){return t&&s(t)}}function e(t,e){var i;return i=t?function(e){return e.getAttribute(t)}:function(t){var i=t.querySelector(e);return i&&f(i)}}return t}();d.sortDataParsers={parseInt:function(t){return parseInt(t,10)},parseFloat:function(t){return parseFloat(t)}},d.prototype._sort=function(){var t=this.options.sortBy;if(t){var e=[].concat.apply(t,this.sortHistory),i=a(e,this.options.sortAscending);this.filteredItems.sort(i),t!=this.sortHistory[0]&&this.sortHistory.unshift(t)}},d.prototype._mode=function(){var t=this.options.layoutMode,e=this.modes[t];if(!e)throw Error("No layout mode: "+t);return e.options=this.options[t],e},d.prototype._resetLayout=function(){e.prototype._resetLayout.call(this),this._mode()._resetLayout()},d.prototype._getItemLayoutPosition=function(t){return this._mode()._getItemLayoutPosition(t)},d.prototype._manageStamp=function(t){this._mode()._manageStamp(t)},d.prototype._getContainerSize=function(){return this._mode()._getContainerSize()},d.prototype.needsResizeLayout=function(){return this._mode().needsResizeLayout()},d.prototype.appended=function(t){var e=this.addItems(t);if(e.length){var i=this._filterRevealAdded(e);this.filteredItems=this.filteredItems.concat(i)}},d.prototype.prepended=function(t){var e=this._itemize(t);if(e.length){this._resetLayout(),this._manageStamps();var i=this._filterRevealAdded(e);this.layoutItems(this.filteredItems),this.filteredItems=i.concat(this.filteredItems),this.items=e.concat(this.items)}},d.prototype._filterRevealAdded=function(t){var e=this._filter(t);return this.hide(e.needHide),this.reveal(e.matches),this.layoutItems(e.matches,!0),e.matches},d.prototype.insert=function(t){var e=this.addItems(t);if(e.length){var i,o,n=e.length;for(i=0;n>i;i++)o=e[i],this.element.appendChild(o.element);var r=this._filter(e).matches;for(i=0;n>i;i++)e[i].isLayoutInstant=!0;for(this.arrange(),i=0;n>i;i++)delete e[i].isLayoutInstant;this.reveal(r)}};var c=d.prototype.remove;return d.prototype.remove=function(t){t=n.makeArray(t);var e=this.getItems(t);c.call(this,t);var i=e&&e.length;if(i)for(var o=0;i>o;o++){var r=e[o];n.removeFrom(this.filteredItems,r)}},d.prototype.shuffle=function(){for(var t=0,e=this.items.length;e>t;t++){var i=this.items[t];i.sortData.random=Math.random()}this.options.sortBy="random",this._sort(),this._layout()},d.prototype._noTransition=function(t){var e=this.options.transitionDuration;this.options.transitionDuration=0;var i=t.call(this);return this.options.transitionDuration=e,i},d.prototype.getFilteredItemElements=function(){for(var t=[],e=0,i=this.filteredItems.length;i>e;e++)t.push(this.filteredItems[e].element);return t},d});

/* ========================================================================
 * VC: carousel.js v0.4.5
 * Fork Bootstrap: carousel.js v3.0.0
 * http://twbs.github.com/bootstrap/javascript.html#carousel
 * ========================================================================
 * Copyright 2012 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ======================================================================== */
!function (t) {
	"use strict";
	var i = function (i, e) {
		this.$element = t(i), this.$indicators = this.$element.find(".vc_carousel-indicators"), this.options = e, this.paused = this.sliding = this.interval = this.$active = this.$items = null, "hover" == this.options.pause && this.$element.on("mouseenter", t.proxy(this.pause, this)).on("mouseleave", t.proxy(this.cycle, this)), this._build()
	};
	i.DEFAULTS = {
		mode      : "horizontal",
		partial   : !1,
		interval  : 5e3,
		pause     : "hover",
		wrap      : !1,
		autoHeight: !1,
		perView   : 1
	}, i.prototype.cycle = function (i) {
		return i || (this.paused = !1), this.interval && clearInterval(this.interval), this.options.interval && !this.paused && (this.interval = setInterval(t.proxy(this.next, this), this.options.interval)), this.touch_start_position = 0, this
	}, i.prototype.getActiveIndex = function () {
		return this.$active = this.$element.find(".vc_item.vc_active"), this.$active.length || (this.$active = this.$element.find(".vc_item:first").addClass("vc_active")), this.$items = this.$active.parent().children(), this.$items.index(this.$active)
	}, i.prototype.showHideControl = function (t) {
		if ("undefined" == typeof t)var t = this.getActiveIndex();
		this.$left_control[0 === t ? "hide" : "show"](), this.$right_control[t === this.items_count - 1 ? "hide" : "show"]()
	}, i.prototype.to = function (i) {
		var e = this, s = this.getActiveIndex();
		return i > this.$items.length - 1 || 0 > i ? void 0 : this.sliding ? this.$element.one("slid", function () {
			e.to(i)
		}) : s == i ? this.pause().cycle() : this.slide(i > s ? "next" : "prev", t(this.$items[i]))
	}, i.prototype.pause = function (i) {
		return i || (this.paused = !0), this.$element.find(".vc_right.vc_carousel-control, .vc_left.vc_carousel-control").length && t.support.transition.end && (this.$element.trigger(t.support.transition.end), this.cycle(!0)), this.interval = clearInterval(this.interval), this
	}, i.prototype.next = function () {
		return this.sliding ? void 0 : this.slide("next")
	}, i.prototype.prev = function () {
		return this.sliding ? void 0 : this.slide("prev")
	}, i.prototype.slide = function (i, e) {
		var s = this.$element.find(".vc_item.vc_active"), n = e || s[i](), o = this.interval, a = "next" == i ? "vc_left" : "vc_right", r = "next" == i ? "first" : "last", h = this;
		if (!n.length) {
			if (!this.options.wrap)return void this.returnSwipedSlide();
			n = this.$element.find(".vc_item")[r]()
		}
		this.sliding = !0, o && this.pause();
		var l = t.Event("slide.vc.carousel", {relatedTarget: n[0], direction: a});
		if (!n.hasClass("vc_active")) {
			if (this.$indicators.length && (this.$indicators.find(".vc_active").removeClass("vc_active"), this.$indicators.find(".vc_partial").removeClass("vc_partial"), this.$element.one("slid", function () {
					var i = h.getActiveIndex(), e = t(h.$indicators.children().slice(i, h.getActiveIndex() + h.options.perView));
					e && e.addClass("vc_active"), h.options.partial && e && (i + 1 < h.items_count ? e.last().next().addClass("vc_partial") : e.first().prev().addClass("vc_partial")), !h.options.wrap && h.showHideControl(i)
				})), this.current_index = n.index(), this.current_index > this.items_count ? this.current_index = 0 : this.current_index < 0 && (this.current_index = this.items_count - 1), this.current_pos_value = this.options.autoHeight ? -1 * this._step * this.current_index : -1 * n.position()[this.animation_position], this.options.partial && this.current_index >= this.items_count - 1 && (this.current_pos_value += this._step * (1 - this.partial_part)), t.support.transition && this.$element.hasClass("vc_slide")) {
				if (this.$element.trigger(l), l.isDefaultPrevented())return;
				this.$slideline_inner.addClass("vc_transition").css(this.animation_position, this.current_pos_value + h.pos_units), this.options.autoHeight || this.recalculateSlidelineHeight(n.height(), !0), this.$slideline_inner.one(t.support.transition.end, function () {
					n.addClass("vc_active"), s.removeClass("vc_active"), h.$slideline_inner.removeClass([i, "vc_transition"].join(" ")), h.sliding = !1, h.removeSwipeAnimationSpeed(), setTimeout(function () {
						h.$element.trigger("slid")
					}, 0)
				}).emulateTransitionEnd(this.transition_speed)
			} else {
				if (this.$element.trigger(l), l.isDefaultPrevented())return;
				s.removeClass("vc_active"), n.addClass("vc_active"), this.sliding = !1, this.$slideline_inner.css(this.animation_position, this.current_pos_value + h.pos_units)
			}
			return o && this.cycle(), this
		}
	}, i.prototype.setSwipeAnimationSpeed = function () {
		this.$slideline_inner.addClass("vc_swipe-transition")
	}, i.prototype.removeSwipeAnimationSpeed = function () {
		this.$slideline_inner.removeClass("vc_swipe-transition")
	}, i.prototype.velocity = function (t, i) {
		return {x: Math.abs(i / t) || 0}
	}, i.prototype.recalculateSlidelineHeight = function (t, i) {
		i === !0 ? this.$slideline.animate({height: t}) : this.$slideline.height(t)
	}, i.prototype.resizeAction = function () {
		var i = 0, e = 0;
		"horizontal" === this.options.mode && (this.el_effect_size = this.$element.width() * (this.options.partial ? this.partial_part : 1), this.$slideline.width(this.items_count * this.el_effect_size)), this.options.autoHeight ? (this.$items.height("auto"), this.$items.each(function () {
			var e = t(this).height();
			e > i && (i = e)
		}), this.$items.height(i)) : this.recalculateSlidelineHeight(this.$active.height()), "vertical" === this.options.mode && (this._step = this.$active.height(), e = this.$active.height() * this.options.perView * (this.options.partial ? 2 - this.partial_part : 1), this.recalculateSlidelineHeight(e, !1), this.$slideline_inner.css({top: -1 * this.$active.position().top}), this.el_effect_size = this._step)
	}, i.prototype.returnSwipedSlide = function () {
		var t = {};
		t[this.animation_position] = this.current_pos_value + this.pos_units, this.$slideline_inner.animate(t)
	}, i.prototype._build = function () {
		var i = this.$element.get(0), e = !1, s = 0, n = 0, o = 0, a = !1, r = this, h = this.options.mode;
		if (this.getActiveIndex(), this.el_width = 0, this.items_count = this.$items.length, this.$slideline = this.$element.find(".vc_carousel-slideline"), this.$slideline_inner = this.$slideline.find("> div"), this.slideline_inner = this.$slideline_inner.get(0), this.partial_part = .8, this._slide_width = 0, this.swipe_velocity = .7, this.current_pos_value = 0, this.current_index = 0, this.el_effect_size = 0, this.transition_speed = 600, this.$left_control = this.$element.find(".vc_left.vc_carousel-control"), this.$right_control = this.$element.find(".vc_right.vc_carousel-control"), this.options.partial && (this.options.autoHeight = !0), this.options.perView > 1 && this.$element.addClass("vc_per-view-more vc_per-view-" + this.options.perView), "horizontal" === h ? (this.pos_units = "%", this._step = 100 / this.items_count / this.options.perView, this.animation_position = "left", this.$items.width(this._step + this.pos_units), this.touch_direction = "pageX") : (this.pos_units = "px", this.animation_position = "top", this.touch_direction = "pageY", this.$element.addClass("vc_carousel_vertical")), !r.options.wrap && this.showHideControl(), this.options.partial && this.$element.addClass("vc_partial"), this.$indicators.length) {
			var l = r.$indicators.children().slice(this.current_index, this.current_index + this.options.perView).addClass("vc_active");
			this.options.partial && l.last().next().addClass("vc_partial")
		}
		return t(window).resize(this.resizeAction.bind(this)), this.resizeAction(), i.addEventListener("touchstart", function (t) {
			e = parseFloat(t[r.touch_direction]), s = t.timeStamp, n = r.$slideline_inner.position()[r.animation_position]
		}.bind(this), !1), i.addEventListener("touchmove", function (t) {
			return o = parseFloat(t[r.touch_direction]) - e, (a = Math.abs(o) > 0) ? (t.preventDefault(), void(r.slideline_inner.style[r.animation_position] = n + o + "px")) : !0
		}, !1), i.addEventListener("touchend", function (t) {
			var i, e, n;
			a && (i = (t.timeStamp - s) / 1e3, e = o / r.el_effect_size, n = r.velocity(i, e), n.x > r.swipe_velocity && 0 > e || -.7 >= e ? (r.setSwipeAnimationSpeed(), r.next()) : n.x > r.swipe_velocity || e >= .7 ? (r.setSwipeAnimationSpeed(), r.prev()) : r.returnSwipedSlide(), a = !1)
		}, !1), this.$element.addClass("vc_build"), this
	};
	var e = t.fn.carousel;
	t.fn.carousel = function (e, s) {
		return this.each(function () {
			var n = t(this), o = n.data("vc.carousel"), a = t.extend({}, i.DEFAULTS, n.data(), "object" == typeof e && e), r = "string" == typeof e ? e : a.slide;
			o || n.data("vc.carousel", o = new i(this, a)), "number" == typeof e ? o.to(e) : r ? o[r](s) : a.interval && o.pause().cycle()
		})
	}, t.fn.carousel.Constructor = i, t.fn.carousel.noConflict = function () {
		return t.fn.carousel = e, this
	}, t(document).off("click.vc.carousel.data-api").on("click.vc.carousel.data-api", "[data-slide], [data-slide-to]", function (i) {
		var e, s = t(this), n = t(s.attr("data-target") || (e = s.attr("href")) && e.replace(/.*(?=#[^\s]+$)/, "")), o = t.extend({}, n.data(), s.data()), a = s.attr("data-slide-to");
		a && (o.interval = !1), n.carousel(o), (a = s.attr("data-slide-to")) && n.data("vc.carousel").to(a), i.preventDefault()
	}), t(window).on("load", function () {
		t('[data-ride="vc_carousel"]').each(function () {
			var i = t(this);
			i.carousel(i.data())
		})
	})
}(window.jQuery);
/*!
 jQuery Waypoints - v2.0.5
 Copyright (c) 2011-2014 Caleb Troughton
 Licensed under the MIT license.
 https://github.com/imakewebthings/jquery-waypoints/blob/master/licenses.txt
 */
(function () {
	var t = [].indexOf || function (t) {
			for (var e = 0, n = this.length; e < n; e++) {
				if (e in this && this[e] === t)return e
			}
			return -1
		}, e = [].slice;
	(function (t, e) {
		if (typeof define === "function" && define.amd) {
			return define("waypoints", ["jquery"], function (n) {
				return e(n, t)
			})
		} else {
			return e(t.jQuery, t)
		}
	})(window, function (n, r) {
		var i, o, l, s, f, u, c, a, h, d, p, y, v, w, g, m;
		i = n(r);
		a = t.call(r, "ontouchstart") >= 0;
		s = {horizontal: {}, vertical: {}};
		f = 1;
		c = {};
		u = "waypoints-context-id";
		p = "resize.waypoints";
		y = "scroll.waypoints";
		v = 1;
		w = "waypoints-waypoint-ids";
		g = "waypoint";
		m = "waypoints";
		o = function () {
			function t(t) {
				var e = this;
				this.$element = t;
				this.element = t[0];
				this.didResize = false;
				this.didScroll = false;
				this.id = "context" + f++;
				this.oldScroll = {x: t.scrollLeft(), y: t.scrollTop()};
				this.waypoints = {horizontal: {}, vertical: {}};
				this.element[u] = this.id;
				c[this.id] = this;
				t.bind(y, function () {
					var t;
					if (!(e.didScroll || a)) {
						e.didScroll = true;
						t = function () {
							e.doScroll();
							return e.didScroll = false
						};
						return r.setTimeout(t, n[m].settings.scrollThrottle)
					}
				});
				t.bind(p, function () {
					var t;
					if (!e.didResize) {
						e.didResize = true;
						t = function () {
							n[m]("refresh");
							return e.didResize = false
						};
						return r.setTimeout(t, n[m].settings.resizeThrottle)
					}
				})
			}
			t.prototype.doScroll = function () {
				var t, e = this;
				t = {
					horizontal: {
						newScroll: this.$element.scrollLeft(),
						oldScroll: this.oldScroll.x,
						forward  : "right",
						backward : "left"
					},
					vertical  : {
						newScroll: this.$element.scrollTop(),
						oldScroll: this.oldScroll.y,
						forward  : "down",
						backward : "up"
					}
				};
				if (a && (!t.vertical.oldScroll || !t.vertical.newScroll)) {
					n[m]("refresh")
				}
				n.each(t, function (t, r) {
					var i, o, l;
					l = [];
					o = r.newScroll > r.oldScroll;
					i = o ? r.forward : r.backward;
					n.each(e.waypoints[t], function (t, e) {
						var n, i;
						if (r.oldScroll < (n = e.offset) && n <= r.newScroll) {
							return l.push(e)
						} else if (r.newScroll < (i = e.offset) && i <= r.oldScroll) {
							return l.push(e)
						}
					});
					l.sort(function (t, e) {
						return t.offset - e.offset
					});
					if (!o) {
						l.reverse()
					}
					return n.each(l, function (t, e) {
						if (e.options.continuous || t === l.length - 1) {
							return e.trigger([i])
						}
					})
				});
				return this.oldScroll = {x: t.horizontal.newScroll, y: t.vertical.newScroll}
			};
			t.prototype.refresh = function () {
				var t, e, r, i = this;
				r = n.isWindow(this.element);
				e = this.$element.offset();
				this.doScroll();
				t = {
					horizontal: {
						contextOffset   : r ? 0 : e.left,
						contextScroll   : r ? 0 : this.oldScroll.x,
						contextDimension: this.$element.width(),
						oldScroll       : this.oldScroll.x,
						forward         : "right",
						backward        : "left",
						offsetProp      : "left"
					},
					vertical  : {
						contextOffset   : r ? 0 : e.top,
						contextScroll   : r ? 0 : this.oldScroll.y,
						contextDimension: r ? n[m]("viewportHeight") : this.$element.height(),
						oldScroll       : this.oldScroll.y,
						forward         : "down",
						backward        : "up",
						offsetProp      : "top"
					}
				};
				return n.each(t, function (t, e) {
					return n.each(i.waypoints[t], function (t, r) {
						var i, o, l, s, f;
						i = r.options.offset;
						l = r.offset;
						o = n.isWindow(r.element) ? 0 : r.$element.offset()[e.offsetProp];
						if (n.isFunction(i)) {
							i = i.apply(r.element)
						} else if (typeof i === "string") {
							i = parseFloat(i);
							if (r.options.offset.indexOf("%") > -1) {
								i = Math.ceil(e.contextDimension * i / 100)
							}
						}
						r.offset = o - e.contextOffset + e.contextScroll - i;
						if (r.options.onlyOnScroll && l != null || !r.enabled) {
							return
						}
						if (l !== null && l < (s = e.oldScroll) && s <= r.offset) {
							return r.trigger([e.backward])
						} else if (l !== null && l > (f = e.oldScroll) && f >= r.offset) {
							return r.trigger([e.forward])
						} else if (l === null && e.oldScroll >= r.offset) {
							return r.trigger([e.forward])
						}
					})
				})
			};
			t.prototype.checkEmpty = function () {
				if (n.isEmptyObject(this.waypoints.horizontal) && n.isEmptyObject(this.waypoints.vertical)) {
					this.$element.unbind([p, y].join(" "));
					return delete c[this.id]
				}
			};
			return t
		}();
		l = function () {
			function t(t, e, r) {
				var i, o;
				if (r.offset === "bottom-in-view") {
					r.offset = function () {
						var t;
						t = n[m]("viewportHeight");
						if (!n.isWindow(e.element)) {
							t = e.$element.height()
						}
						return t - n(this).outerHeight()
					}
				}
				this.$element = t;
				this.element = t[0];
				this.axis = r.horizontal ? "horizontal" : "vertical";
				this.callback = r.handler;
				this.context = e;
				this.enabled = r.enabled;
				this.id = "waypoints" + v++;
				this.offset = null;
				this.options = r;
				e.waypoints[this.axis][this.id] = this;
				s[this.axis][this.id] = this;
				i = (o = this.element[w]) != null ? o : [];
				i.push(this.id);
				this.element[w] = i
			}
			t.prototype.trigger = function (t) {
				if (!this.enabled) {
					return
				}
				if (this.callback != null) {
					this.callback.apply(this.element, t)
				}
				if (this.options.triggerOnce) {
					return this.destroy()
				}
			};
			t.prototype.disable = function () {
				return this.enabled = false
			};
			t.prototype.enable = function () {
				this.context.refresh();
				return this.enabled = true
			};
			t.prototype.destroy = function () {
				delete s[this.axis][this.id];
				delete this.context.waypoints[this.axis][this.id];
				return this.context.checkEmpty()
			};
			t.getWaypointsByElement = function (t) {
				var e, r;
				r = t[w];
				if (!r) {
					return []
				}
				e = n.extend({}, s.horizontal, s.vertical);
				return n.map(r, function (t) {
					return e[t]
				})
			};
			return t
		}();
		d = {
			init        : function (t, e) {
				var r;
				e = n.extend({}, n.fn[g].defaults, e);
				if ((r = e.handler) == null) {
					e.handler = t
				}
				this.each(function () {
					var t, r, i, s;
					t = n(this);
					i = (s = e.context) != null ? s : n.fn[g].defaults.context;
					if (!n.isWindow(i)) {
						i = t.closest(i)
					}
					i = n(i);
					r = c[i[0][u]];
					if (!r) {
						r = new o(i)
					}
					return new l(t, r, e)
				});
				n[m]("refresh");
				return this
			}, disable  : function () {
				return d._invoke.call(this, "disable")
			}, enable   : function () {
				return d._invoke.call(this, "enable")
			}, destroy  : function () {
				return d._invoke.call(this, "destroy")
			}, prev     : function (t, e) {
				return d._traverse.call(this, t, e, function (t, e, n) {
					if (e > 0) {
						return t.push(n[e - 1])
					}
				})
			}, next     : function (t, e) {
				return d._traverse.call(this, t, e, function (t, e, n) {
					if (e < n.length - 1) {
						return t.push(n[e + 1])
					}
				})
			}, _traverse: function (t, e, i) {
				var o, l;
				if (t == null) {
					t = "vertical"
				}
				if (e == null) {
					e = r
				}
				l = h.aggregate(e);
				o = [];
				this.each(function () {
					var e;
					e = n.inArray(this, l[t]);
					return i(o, e, l[t])
				});
				return this.pushStack(o)
			}, _invoke  : function (t) {
				this.each(function () {
					var e;
					e = l.getWaypointsByElement(this);
					return n.each(e, function (e, n) {
						n[t]();
						return true
					})
				});
				return this
			}
		};
		n.fn[g] = function () {
			var t, r;
			r = arguments[0], t = 2 <= arguments.length ? e.call(arguments, 1) : [];
			if (d[r]) {
				return d[r].apply(this, t)
			} else if (n.isFunction(r)) {
				return d.init.apply(this, arguments)
			} else if (n.isPlainObject(r)) {
				return d.init.apply(this, [null, r])
			} else if (!r) {
				return n.error("jQuery Waypoints needs a callback function or handler option.")
			} else {
				return n.error("The " + r + " method does not exist in jQuery Waypoints.")
			}
		};
		n.fn[g].defaults = {
			context    : r,
			continuous : true,
			enabled    : true,
			horizontal : false,
			offset     : 0,
			triggerOnce: false
		};
		h = {
			refresh          : function () {
				return n.each(c, function (t, e) {
					return e.refresh()
				})
			}, viewportHeight: function () {
				var t;
				return (t = r.innerHeight) != null ? t : i.height()
			}, aggregate     : function (t) {
				var e, r, i;
				e = s;
				if (t) {
					e = (i = c[n(t)[0][u]]) != null ? i.waypoints : void 0
				}
				if (!e) {
					return []
				}
				r = {horizontal: [], vertical: []};
				n.each(r, function (t, i) {
					n.each(e[t], function (t, e) {
						return i.push(e)
					});
					i.sort(function (t, e) {
						return t.offset - e.offset
					});
					r[t] = n.map(i, function (t) {
						return t.element
					});
					return r[t] = n.unique(r[t])
				});
				return r
			}, above         : function (t) {
				if (t == null) {
					t = r
				}
				return h._filter(t, "vertical", function (t, e) {
					return e.offset <= t.oldScroll.y
				})
			}, below         : function (t) {
				if (t == null) {
					t = r
				}
				return h._filter(t, "vertical", function (t, e) {
					return e.offset > t.oldScroll.y
				})
			}, left          : function (t) {
				if (t == null) {
					t = r
				}
				return h._filter(t, "horizontal", function (t, e) {
					return e.offset <= t.oldScroll.x
				})
			}, right         : function (t) {
				if (t == null) {
					t = r
				}
				return h._filter(t, "horizontal", function (t, e) {
					return e.offset > t.oldScroll.x
				})
			}, enable        : function () {
				return h._invoke("enable")
			}, disable       : function () {
				return h._invoke("disable")
			}, destroy       : function () {
				return h._invoke("destroy")
			}, extendFn      : function (t, e) {
				return d[t] = e
			}, _invoke       : function (t) {
				var e;
				e = n.extend({}, s.vertical, s.horizontal);
				return n.each(e, function (e, n) {
					n[t]();
					return true
				})
			}, _filter       : function (t, e, r) {
				var i, o;
				i = c[n(t)[0][u]];
				if (!i) {
					return []
				}
				o = [];
				n.each(i.waypoints[e], function (t, e) {
					if (r(i, e)) {
						return o.push(e)
					}
				});
				o.sort(function (t, e) {
					return t.offset - e.offset
				});
				return n.map(o, function (t) {
					return t.element
				})
			}
		};
		n[m] = function () {
			var t, n;
			n = arguments[0], t = 2 <= arguments.length ? e.call(arguments, 1) : [];
			if (h[n]) {
				return h[n].apply(null, t)
			} else {
				return h.aggregate.call(null, n)
			}
		};
		n[m].settings = {resizeThrottle: 100, scrollThrottle: 30};
		return i.on("load.waypoints", function () {
			return n[m]("refresh")
		})
	})
}).call(this);
/*!
 * jQuery One Page Nav Plugin
 * http://github.com/davist11/jQuery-One-Page-Nav
 *
 * Copyright (c) 2010 Trevor Davis (http://trevordavis.net)
 * Dual licensed under the MIT and GPL licenses.
 * Uses the same license as jQuery, see:
 * http://jquery.org/license
 *
 * @version 3.0.0
 *
 * Example usage:
 * $('#nav').onePageNav({
 *   currentClass: 'current',
 *   changeHash: false,
 *   scrollSpeed: 750
 * });
 */
(function (d, c, a, e) {
	var b = function (g, f) {
		this.elem = g;
		this.$elem = d(g);
		this.options = f;
		this.metadata = this.$elem.data("plugin-options");
		this.$win = d(c);
		this.sections = {};
		this.didScroll = false;
		this.$doc = d(a);
		this.docHeight = this.$doc.height()
	};
	b.prototype = {
		defaults          : {
			navItems       : "a",
			currentClass   : "current",
			changeHash     : false,
			easing         : "swing",
			filter         : "",
			scrollSpeed    : 750,
			scrollThreshold: 0.5,
			begin          : false,
			end            : false,
			scrollChange   : false
		}, init           : function () {
			this.config = d.extend({}, this.defaults, this.options, this.metadata);
			this.$nav = this.$elem.find(this.config.navItems);
			if (this.config.filter !== "") {
				this.$nav = this.$nav.filter(this.config.filter)
			}
			this.$nav.on("click.onePageNav", d.proxy(this.handleClick, this));
			this.getPositions();
			this.bindInterval();
			this.$win.on("resize.onePageNav", d.proxy(this.getPositions, this));
			return this
		}, adjustNav      : function (f, g) {
			f.$elem.find("." + f.config.currentClass).removeClass(f.config.currentClass);
			g.addClass(f.config.currentClass)
		}, bindInterval   : function () {
			var g = this;
			var f;
			g.$win.on("scroll.onePageNav", function () {
				g.didScroll = true
			});
			g.t = setInterval(function () {
				f = g.$doc.height();
				if (g.didScroll) {
					g.didScroll = false;
					g.scrollChange()
				}
				if (f !== g.docHeight) {
					g.docHeight = f;
					g.getPositions()
				}
			}, 250)
		}, getHash        : function (f) {
			return f.attr("href").split("#")[1]
		}, getPositions   : function () {
			var h = this;
			var i;
			var g;
			var f;
			h.$nav.each(function () {
				i = h.getHash(d(this));
				f = d("#" + i);
				if (f.length) {
					g = f.offset().top;
					h.sections[i] = Math.round(g)
				}
			})
		}, getSection     : function (i) {
			var f = null;
			var h = Math.round(this.$win.height() * this.config.scrollThreshold);
			for (var g in this.sections) {
				if ((this.sections[g] - h - this.headerOffsetTop()) < i) {
					f = g
				}
			}
			return f
		}, headerOffsetTop: function () {
			var f = 0;
			if ((d("#wpadminbar").length > 0) && (d("#wpadminbar").css("position") == "fixed")) {
				f = d("#wpadminbar").outerHeight()
			}
			if (d("header.main-header").hasClass("header-sticky")) {
				if (d("header.main-header").css("position") == "fixed") {
					f += d("header.main-header").outerHeight()
				} else {
					f += 66
				}
			}
			return f
		}, handleClick    : function (j) {
			var g = this;
			var f = d(j.currentTarget);
			var i = f.parent();
			var h = "#" + g.getHash(f);
			if ((1) || !i.hasClass(g.config.currentClass)) {
				if (g.config.begin) {
					g.config.begin()
				}
				g.adjustNav(g, i);
				g.unbindInterval();
				g.scrollTo(h, function () {
					if (g.config.changeHash) {
						c.location.hash = h
					}
					g.bindInterval();
					if (g.config.end) {
						g.config.end()
					}
				})
			}
			j.preventDefault()
		}, scrollChange   : function () {
			var h = this.$win.scrollTop();
			var f = this.getSection(h);
			var g;
			if (f !== null) {
				g = this.$elem.find('a[href$="#' + f + '"]').parent();
				if (!g.hasClass(this.config.currentClass)) {
					this.adjustNav(this, g);
					if (this.config.scrollChange) {
						this.config.scrollChange(g)
					}
				}
			}
		}, scrollTo       : function (f, h) {
			var g = d(f).offset().top - this.headerOffsetTop();
			d("html, body").animate({scrollTop: g}, this.config.scrollSpeed, this.config.easing, h)
		}, unbindInterval : function () {
			clearInterval(this.t);
			this.$win.unbind("scroll.onePageNav")
		}
	};
	b.defaults = b.prototype.defaults;
	d.fn.onePageNav = function (f) {
		return this.each(function () {
			new b(this, f).init()
		})
	}
})(jQuery, window, document);
/*!
 * Parallax VisualComposer
 */
(function ($) {
	"use strict";
    var $window = jQuery(window);
    var windowHeight = $window.height();

    $window.resize(function () {
        windowHeight = $window.height();
    });

    jQuery.fn.vparallax = function(xpos, speedFactor, outerHeight) {
        var $this = jQuery(this);
        var attach = $this.data('scroll_effect');
        $this.css('background-attachment', attach);
        var getHeight;
        var firstTop;
        if (outerHeight) {
            getHeight = function(jqo) {
                return jqo.outerHeight(true);
            };
        } else {
            getHeight = function(jqo) {
                return jqo.height();
            };
        }
        if (arguments.length < 1 || xpos === null) xpos = "50%";
        if (arguments.length < 2 || speedFactor === null) speedFactor = 0.5;
        if (arguments.length < 3 || outerHeight === null) outerHeight = true;
        function update(){
            var pos = $window.scrollTop();
            $this.each(function(){
                firstTop = jQuery(this).offset().top;
                var $element = jQuery(this);
                var top = $element.offset().top;
                var height = getHeight($element);
                if (top + height < pos || top > pos + windowHeight) {
                    return;
                }
                var f = Math.round((firstTop - pos) * speedFactor);
                if(firstTop >= windowHeight){ f = f-(speedFactor*windowHeight);	}
                else{	f=-f;	}
                $this.css('backgroundPosition', xpos + " " + f + "px");
            });
        }
        $window.bind('scroll', update).resize(update);
        update();
    };

    jQuery.fn.hparallax = function(xpos, speedFactor, outerHeight) {
        var $this = jQuery(this);
        var attach = $this.data('scroll_effect');
        $this.css('background-attachment', attach);
        var getHeight;
        var firstTop;
        if (outerHeight) {
            getHeight = function(jqo) {
                return jqo.outerHeight(true);
            };
        } else {
            getHeight = function(jqo) {
                return jqo.height();
            };
        }
        if (arguments.length < 1 || xpos === null) xpos = "50%";
        if (arguments.length < 2 || speedFactor === null) speedFactor = 0.5;
        if (arguments.length < 3 || outerHeight === null) outerHeight = true;
        xpos = '0px';
        var prev_pos = $window.scrollTop();
        function update(){
            var pos = $window.scrollTop();
            $this.each(function(){
                firstTop = jQuery(this).offset().top;
                var $element = jQuery(this);
                var top = $element.offset().top;
                var height = getHeight($element);
                if (top + height < pos || top > pos + windowHeight) {
                    return;
                }
                var bg = $this.css('backgroundPosition');
                var pxpos = bg.indexOf('px');
                var bgxpos= bg.substring(0,pxpos);
                var f =0;
                if(prev_pos-pos <= 0){
                    f = parseInt(bgxpos) - parseInt(speedFactor*(Math.abs(prev_pos-pos)));
                }else{
                    f = parseInt(bgxpos) + parseInt(speedFactor*(prev_pos-pos));
                    if(f>0)
                        f=0;
                }
                $this.css('backgroundPosition', f + "px "+ xpos);

            });
            prev_pos = pos;
        }

        $window.bind('scroll', update).resize(update);
        update();
    };

	// Auto Initialization
	jQuery(document).ready(function(){
		jQuery('.vertical-parallax').each(function () {
			jQuery(this).vparallax("50%", jQuery(this).data('parallax_speed'));
		});
		jQuery('.horizontal-parallax').each(function(){
			jQuery(this).hparallax("0", jQuery(this).data('parallax_speed'));
		});
		if(jQuery('.horizontal-parallax').length>0){
			setTimeout(function() {
				jQuery(window).scrollTop(0);
			}, 1000);
		}
	});

})(jQuery);


(function($) {
    'use strict';
    /**
     * Set all elements within the collection to have the same height.
     */
    $.fn.equalHeight = function(){
        var heights = [];
        $.each(this, function(i, element){
            var $element = $(element);
            var element_height;
            // Should we include the elements padding in it's height?
            var includePadding = ($element.css('box-sizing') == 'border-box') || ($element.css('-moz-box-sizing') == 'border-box');
            if (includePadding) {
                element_height = $element.innerHeight();

            } else {
                element_height = $element.height();
            }
            heights.push(element_height);
        });
        this.height(Math.max.apply(window, heights));
        return this;
    };

    /**
     * Create a grid of equal height elements.
     */
    $.fn.equalHeightGrid = function(columns){
        var $tiles = this;
        $tiles.css('height', 'auto');
        for (var i = 0; i < $tiles.length; i++) {
            if (i % columns === 0) {
                var row = $($tiles[i]);
                for(var n = 1;n < columns;n++){
                    row = row.add($tiles[i + n]);
                }
                row.equalHeight();
            }
        }
        return this;
    };

    /**
     * Detect how many columns there are in a given layout.
     */
    $.fn.detectGridColumns = function() {
        var offset = 0, cols = 0;
        this.each(function(i, elem) {
            var elem_offset = $(elem).offset().top;
            if (offset === 0 || elem_offset == offset) {
                cols++;
                offset = elem_offset;
            } else {
                return false;
            }
        });
        return cols;
    };

    /**
     * Ensure equal heights now, on ready, load and resize.
     */
    $.fn.responsiveEqualHeightGrid = function() {
        var _this = this;
        function syncHeights() {
            var cols = _this.detectGridColumns();
            _this.equalHeightGrid(cols);
        }
        $(window).bind('resize load', syncHeights);
        syncHeights();
        return this;
    };

})(jQuery);
jQuery(document).ready(function(){
    jQuery(function($) {
        if($('.column-equal-height').length) {
            $('.column-equal-height').each(function() {
                $('[class*="vc_col-"]' ,this).responsiveEqualHeightGrid();
            })
        }
    });
});
// Dialog effects
/*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 *
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

/*jshint browser: true, strict: true, undef: true */
/*global define: false */

(function (window) {
	'use strict';

	// class helper functions from bonzo https://github.com/ded/bonzo
	function classReg( className ) {
		return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
	}

	// classList support for class management
	// altho to be fair, the api sucks because it won't accept multiple classes at once
	var hasClass, addClass, removeClass;

	if ( 'classList' in document.documentElement ) {
		hasClass = function( elem, c ) {
			return elem.classList.contains( c );
		};
		addClass = function( elem, c ) {
			elem.classList.add( c );
		};
		removeClass = function( elem, c ) {
			elem.classList.remove( c );
		};
	}
	else {
		hasClass = function( elem, c ) {
			return classReg( c ).test( elem.className );
		};
		addClass = function( elem, c ) {
			if ( !hasClass( elem, c ) ) {
				elem.className = elem.className + ' ' + c;
			}
		};
		removeClass = function( elem, c ) {
			elem.className = elem.className.replace( classReg( c ), ' ' );
		};
	}

	function toggleClass( elem, c ) {
		var fn = hasClass( elem, c ) ? removeClass : addClass;
		fn( elem, c );
	}

	var classie = {
		// full names
		hasClass: hasClass,
		addClass: addClass,
		removeClass: removeClass,
		toggleClass: toggleClass,
		// short names
		has: hasClass,
		add: addClass,
		remove: removeClass,
		toggle: toggleClass
	};

	// transport
	if ( typeof define === 'function' && define.amd ) {
		// AMD
		define( classie );
	} else {
		// browser global
		window.classie = classie;
	}

})( window );

(function (window) {
	'use strict';

	var support = { animations : Modernizr.cssanimations },
		animEndEventNames = { 'WebkitAnimation' : 'webkitAnimationEnd', 'OAnimation' : 'oAnimationEnd', 'msAnimation' : 'MSAnimationEnd', 'animation' : 'animationend' },
		animEndEventName = animEndEventNames[ Modernizr.prefixed( 'animation' ) ],
		onEndAnimation = function( el, callback ) {
			var onEndCallbackFn = function( ev ) {
				if( support.animations ) {
					if( ev.target != this ) return;
					this.removeEventListener( animEndEventName, onEndCallbackFn );
				}
				if( callback && typeof callback === 'function' ) { callback.call(); }
			};
			if( support.animations ) {
				el.addEventListener( animEndEventName, onEndCallbackFn );
			}
			else {
				onEndCallbackFn();
			}
		};

	function extend( a, b ) {
		for( var key in b ) {
			if( b.hasOwnProperty( key ) ) {
				a[key] = b[key];
			}
		}
		return a;
	}

	function DialogFx( el, options ) {
		this.el = el;
		this.options = extend( {}, this.options );
		extend( this.options, options );
		this.ctrlClose = this.el.querySelector( '[data-dialog-close]' );
		this.isOpen = false;
		this._initEvents();
	}

	DialogFx.prototype.options = {
		// callbacks
		onOpenDialog : function() { return false; },
		onCloseDialog : function() { return false; }
	};

	DialogFx.prototype._initEvents = function() {
		var self = this;

		// close action
		this.ctrlClose.addEventListener( 'click', this.toggle.bind(this) );

		// esc key closes dialog
		document.addEventListener( 'keydown', function( ev ) {
			var keyCode = ev.keyCode || ev.which;
			if( keyCode === 27 && self.isOpen ) {
				self.toggle();
			}
		} );

		this.el.querySelector( '.dialog__overlay' ).addEventListener( 'click', this.toggle.bind(this) );
	};

	DialogFx.prototype.toggle = function() {
		var self = this;
		if( this.isOpen ) {
			classie.remove( this.el, 'dialog--open' );
			classie.add( self.el, 'dialog--close' );

			onEndAnimation( this.el.querySelector( '.dialog__content' ), function() {
				classie.remove( self.el, 'dialog--close' );
			} );

			// callback on close
			this.options.onCloseDialog( this );
		}
		else {
			classie.add( this.el, 'dialog--open' );

			// callback on open
			this.options.onOpenDialog( this );
		}
		this.isOpen = !this.isOpen;
	};

	// add to global namespace
	window.DialogFx = DialogFx;

})( window );
