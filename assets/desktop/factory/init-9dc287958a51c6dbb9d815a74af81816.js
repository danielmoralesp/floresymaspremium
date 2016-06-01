function resizeEl(t) {
var e = window.getSize().y - offset;
t.setStyles({
height:e
});
}

function init() {
var t = $$(".intro");
_.each(t, function(t) {
resizeEl(t);
}), window.addEvent("resize", function() {
_.each(t, function(t) {
resizeEl(t);
});
});
var e = new URI().get("query").parseQueryString(), i = e["wraith-no-animate"] ? !1 :!0;
_.each($$("video.cover"), function(t) {
i || t.removeAttribute("autoplay"), new BgCoverVideo(t);
}), _.each($$(".slideshow"), function(t) {
new Gallery(t, {
autoplay:!1
});
});
var n = $("intro"), s = new Fx.Scroll(window, {
duration:1e3
});
if (n && n.addEvent("click", function() {
s.start(0, window.getSize().y - 92 - offset);
}), !Browser.Platform.iPad) {
skrollr.init({
forceHeight:!1
});
}
if (Browser.Platform.iPad) {
var o = $("intro").getElement("video"), r = $("intro").getElement("img").get("src");
console.log(r), $("intro").setStyles({
"background-image":'url("' + r + '")',
"background-size":"cover",
"background-position":"center center"
}), o.dispose();
}
}

var BgCoverVideo = new Class({
Implements:[ Events, Options ],
options:{
yOffset:0,
video_r:16 / 9,
lock:"center"
},
initialize:function(t, e) {
function i() {
var t, e = n.parent_el.getSize().y, i = n.parent_el.getSize().x, s = i / e;
if (s < n.options.video_r) "center" === n.options.lock ? t = {
top:0,
left:-(e * n.options.video_r - i) / 2,
height:e
} :"left" === n.options.lock ? t = {
top:0,
left:0,
height:e
} :"right" === n.options.lock && (t = {
top:0,
right:0,
height:e
}); else if ("center" === n.options.lock) {
var o = -(i / n.options.video_r - e) / 2;
Math.abs(o) > n.options.yOffset && (o += n.options.yOffset), t = {
top:o,
left:0,
height:i / n.options.video_r
};
} else "top" === n.options.lock ? t = {
top:0,
left:0,
height:i / n.options.video_r
} :"bottom" === n.options.lock && (t = {
bottom:0,
left:0,
height:i / n.options.video_r
});
n.el.setStyles(t);
}
var n = this;
this.setOptions(e), this.el = t, this.parent_el = this.el.getParent(), this.parent_el.setStyle("overflow", "hidden"), 
i(), window.addEvent("resize", i);
}
});

!function(t, e, i) {
"use strict";
function n(i) {
if (s = e.documentElement, o = e.body, Y(), ae = this, i = i || {}, de = i.constants || {}, 
i.easing) for (var n in i.easing) X[n] = i.easing[n];
ye = i.edgeStrategy || "set", ce = {
beforerender:i.beforerender,
render:i.render,
keyframe:i.keyframe
}, ue = i.forceHeight !== !1, ue && (Oe = i.scale || 1), pe = i.mobileDeceleration || C, 
me = i.smoothScrolling !== !1, ge = i.smoothScrollingDuration || T, ve = {
targetTop:ae.getScrollTop()
}, Be = (i.mobileCheck || function() {
return /Android|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent || navigator.vendor || t.opera);
})(), Be ? (he = e.getElementById(i.skrollrBody || E), he && re(), K(), Pe(s, [ _, w ], [ y ])) :Pe(s, [ _, b ], [ y ]), 
ae.refresh(), xe(t, "resize orientationchange", function() {
var t = s.clientWidth, e = s.clientHeight;
(e !== $e || t !== We) && ($e = e, We = t, Re = !0);
});
var r = V();
return function a() {
J(), we = r(a);
}(), ae;
}
var s, o, r = {
get:function() {
return ae;
},
init:function(t) {
return ae || new n(t);
},
VERSION:"0.6.29"
}, a = Object.prototype.hasOwnProperty, l = t.Math, h = t.getComputedStyle, c = "touchstart", u = "touchmove", d = "touchcancel", p = "touchend", f = "skrollable", m = f + "-before", g = f + "-between", v = f + "-after", _ = "skrollr", y = "no-" + _, b = _ + "-desktop", w = _ + "-mobile", x = "linear", k = 1e3, C = .004, E = "skrollr-body", T = 200, D = "start", I = "end", S = "center", P = "bottom", M = "___skrollable_id", A = /^(?:input|textarea|button|select)$/i, N = /^\s+|\s+$/g, H = /^data(?:-(_\w+))?(?:-?(-?\d*\.?\d+p?))?(?:-?(start|end|top|center|bottom))?(?:-?(top|center|bottom))?$/, z = /\s*(@?[\w\-\[\]]+)\s*:\s*(.+?)\s*(?:;|$)/gi, O = /^(@?[a-z\-]+)\[(\w+)\]$/, j = /-([a-z0-9_])/g, F = function(t, e) {
return e.toUpperCase();
}, L = /[\-+]?[\d]*\.?[\d]+/g, W = /\{\?\}/g, $ = /rgba?\(\s*-?\d+\s*,\s*-?\d+\s*,\s*-?\d+/g, R = /[a-z\-]+-gradient/g, q = "", B = "", Y = function() {
var t = /^(?:O|Moz|webkit|ms)|(?:-(?:o|moz|webkit|ms)-)/;
if (h) {
var e = h(o, null);
for (var i in e) if (q = i.match(t) || +i == i && e[i].match(t)) break;
if (!q) return q = B = "", void 0;
q = q[0], "-" === q.slice(0, 1) ? (B = q, q = {
"-webkit-":"webkit",
"-moz-":"Moz",
"-ms-":"ms",
"-o-":"O"
}[q]) :B = "-" + q.toLowerCase() + "-";
}
}, V = function() {
var e = t.requestAnimationFrame || t[q.toLowerCase() + "RequestAnimationFrame"], i = Ne();
return (Be || !e) && (e = function(e) {
var n = Ne() - i, s = l.max(0, 1e3 / 60 - n);
return t.setTimeout(function() {
i = Ne(), e();
}, s);
}), e;
}, U = function() {
var e = t.cancelAnimationFrame || t[q.toLowerCase() + "CancelAnimationFrame"];
return (Be || !e) && (e = function(e) {
return t.clearTimeout(e);
}), e;
}, X = {
begin:function() {
return 0;
},
end:function() {
return 1;
},
linear:function(t) {
return t;
},
quadratic:function(t) {
return t * t;
},
cubic:function(t) {
return t * t * t;
},
swing:function(t) {
return -l.cos(t * l.PI) / 2 + .5;
},
sqrt:function(t) {
return l.sqrt(t);
},
outCubic:function(t) {
return l.pow(t - 1, 3) + 1;
},
bounce:function(t) {
var e;
if (.5083 >= t) e = 3; else if (.8489 >= t) e = 9; else if (.96208 >= t) e = 27; else {
if (!(.99981 >= t)) return 1;
e = 91;
}
return 1 - l.abs(3 * l.cos(t * e * 1.028) / e);
}
};
n.prototype.refresh = function(t) {
var n, s, o = !1;
for (t === i ? (o = !0, le = [], qe = 0, t = e.getElementsByTagName("*")) :t.length === i && (t = [ t ]), 
n = 0, s = t.length; s > n; n++) {
var r = t[n], a = r, l = [], h = me, c = ye, u = !1;
if (o && M in r && delete r[M], r.attributes) {
for (var d = 0, p = r.attributes.length; p > d; d++) {
var m = r.attributes[d];
if ("data-anchor-target" !== m.name) if ("data-smooth-scrolling" !== m.name) if ("data-edge-strategy" !== m.name) if ("data-emit-events" !== m.name) {
var g = m.name.match(H);
if (null !== g) {
var v = {
props:m.value,
element:r,
eventType:m.name.replace(j, F)
};
l.push(v);
var _ = g[1];
_ && (v.constant = _.substr(1));
var y = g[2];
/p$/.test(y) ? (v.isPercentage = !0, v.offset = (0 | y.slice(0, -1)) / 100) :v.offset = 0 | y;
var b = g[3], w = g[4] || b;
b && b !== D && b !== I ? (v.mode = "relative", v.anchors = [ b, w ]) :(v.mode = "absolute", 
b === I ? v.isEnd = !0 :v.isPercentage || (v.offset = v.offset * Oe));
}
} else u = !0; else c = m.value; else h = "off" !== m.value; else if (a = e.querySelector(m.value), 
null === a) throw 'Unable to find anchor target "' + m.value + '"';
}
if (l.length) {
var x, k, C;
!o && M in r ? (C = r[M], x = le[C].styleAttr, k = le[C].classAttr) :(C = r[M] = qe++, 
x = r.style.cssText, k = Se(r)), le[C] = {
element:r,
styleAttr:x,
classAttr:k,
anchorTarget:a,
keyFrames:l,
smoothScrolling:h,
edgeStrategy:c,
emitEvents:u,
lastFrameIndex:-1
}, Pe(r, [ f ], []);
}
}
}
for (Te(), n = 0, s = t.length; s > n; n++) {
var E = le[t[n][M]];
E !== i && (Z(E), ee(E));
}
return ae;
}, n.prototype.relativeToAbsolute = function(t, e, i) {
var n = s.clientHeight, o = t.getBoundingClientRect(), r = o.top, a = o.bottom - o.top;
return e === P ? r -= n :e === S && (r -= n / 2), i === P ? r += a :i === S && (r += a / 2), 
r += ae.getScrollTop(), r + .5 | 0;
}, n.prototype.animateTo = function(t, e) {
e = e || {};
var n = Ne(), s = ae.getScrollTop();
return fe = {
startTop:s,
topDiff:t - s,
targetTop:t,
duration:e.duration || k,
startTime:n,
endTime:n + (e.duration || k),
easing:X[e.easing || x],
done:e.done
}, fe.topDiff || (fe.done && fe.done.call(ae, !1), fe = i), ae;
}, n.prototype.stopAnimateTo = function() {
fe && fe.done && fe.done.call(ae, !0), fe = i;
}, n.prototype.isAnimatingTo = function() {
return !!fe;
}, n.prototype.isMobile = function() {
return Be;
}, n.prototype.setScrollTop = function(e, i) {
return _e = i === !0, Be ? Ye = l.min(l.max(e, 0), ze) :t.scrollTo(0, e), ae;
}, n.prototype.getScrollTop = function() {
return Be ? Ye :t.pageYOffset || s.scrollTop || o.scrollTop || 0;
}, n.prototype.getMaxScrollTop = function() {
return ze;
}, n.prototype.on = function(t, e) {
return ce[t] = e, ae;
}, n.prototype.off = function(t) {
return delete ce[t], ae;
}, n.prototype.destroy = function() {
var t = U();
t(we), Ce(), Pe(s, [ y ], [ _, b, w ]);
for (var e = 0, n = le.length; n > e; e++) oe(le[e].element);
s.style.overflow = o.style.overflow = "", s.style.height = o.style.height = "", 
he && r.setStyle(he, "transform", "none"), ae = i, he = i, ce = i, ue = i, ze = 0, 
Oe = 1, de = i, pe = i, je = "down", Fe = -1, We = 0, $e = 0, Re = !1, fe = i, me = i, 
ge = i, ve = i, _e = i, qe = 0, ye = i, Be = !1, Ye = 0, be = i;
};
var K = function() {
var n, r, a, h, f, m, g, v, _, y, b, w;
xe(s, [ c, u, d, p ].join(" "), function(t) {
var s = t.changedTouches[0];
for (h = t.target; 3 === h.nodeType; ) h = h.parentNode;
switch (f = s.clientY, m = s.clientX, y = t.timeStamp, A.test(h.tagName) || t.preventDefault(), 
t.type) {
case c:
n && n.blur(), ae.stopAnimateTo(), n = h, r = g = f, a = m, _ = y;
break;

case u:
A.test(h.tagName) && e.activeElement !== h && t.preventDefault(), v = f - g, w = y - b, 
ae.setScrollTop(Ye - v, !0), g = f, b = y;
break;

default:
case d:
case p:
var o = r - f, x = a - m, k = x * x + o * o;
if (49 > k) {
if (!A.test(n.tagName)) {
n.focus();
var C = e.createEvent("MouseEvents");
C.initMouseEvent("click", !0, !0, t.view, 1, s.screenX, s.screenY, s.clientX, s.clientY, t.ctrlKey, t.altKey, t.shiftKey, t.metaKey, 0, null), 
n.dispatchEvent(C);
}
return;
}
n = i;
var E = v / w;
E = l.max(l.min(E, 3), -3);
var T = l.abs(E / pe), D = E * T + .5 * pe * T * T, I = ae.getScrollTop() - D, S = 0;
I > ze ? (S = (ze - I) / D, I = ze) :0 > I && (S = -I / D, I = 0), T *= 1 - S, ae.animateTo(I + .5 | 0, {
easing:"outCubic",
duration:T
});
}
}), t.scrollTo(0, 0), s.style.overflow = o.style.overflow = "hidden";
}, Q = function() {
var t, e, i, n, o, r, a, h, c, u, d, p = s.clientHeight, f = De();
for (h = 0, c = le.length; c > h; h++) for (t = le[h], e = t.element, i = t.anchorTarget, 
n = t.keyFrames, o = 0, r = n.length; r > o; o++) a = n[o], u = a.offset, d = f[a.constant] || 0, 
a.frame = u, a.isPercentage && (u *= p, a.frame = u), "relative" === a.mode && (oe(e), 
a.frame = ae.relativeToAbsolute(i, a.anchors[0], a.anchors[1]) - u, oe(e, !0)), 
a.frame += d, ue && !a.isEnd && a.frame > ze && (ze = a.frame);
for (ze = l.max(ze, Ie()), h = 0, c = le.length; c > h; h++) {
for (t = le[h], n = t.keyFrames, o = 0, r = n.length; r > o; o++) a = n[o], d = f[a.constant] || 0, 
a.isEnd && (a.frame = ze - a.offset + d);
t.keyFrames.sort(He);
}
}, G = function(t, e) {
for (var i = 0, n = le.length; n > i; i++) {
var s, o, l = le[i], h = l.element, c = l.smoothScrolling ? t :e, u = l.keyFrames, d = u.length, p = u[0], _ = u[u.length - 1], y = c < p.frame, b = c > _.frame, w = y ? p :_, x = l.emitEvents, k = l.lastFrameIndex;
if (y || b) {
if (y && -1 === l.edge || b && 1 === l.edge) continue;
switch (y ? (Pe(h, [ m ], [ v, g ]), x && k > -1 && (Ee(h, p.eventType, je), l.lastFrameIndex = -1)) :(Pe(h, [ v ], [ m, g ]), 
x && d > k && (Ee(h, _.eventType, je), l.lastFrameIndex = d)), l.edge = y ? -1 :1, 
l.edgeStrategy) {
case "reset":
oe(h);
continue;

case "ease":
c = w.frame;
break;

default:
case "set":
var C = w.props;
for (s in C) a.call(C, s) && (o = se(C[s].value), 0 === s.indexOf("@") ? h.setAttribute(s.substr(1), o) :r.setStyle(h, s, o));
continue;
}
} else 0 !== l.edge && (Pe(h, [ f, g ], [ m, v ]), l.edge = 0);
for (var E = 0; d - 1 > E; E++) if (c >= u[E].frame && c <= u[E + 1].frame) {
var T = u[E], D = u[E + 1];
for (s in T.props) if (a.call(T.props, s)) {
var I = (c - T.frame) / (D.frame - T.frame);
I = T.props[s].easing(I), o = ne(T.props[s].value, D.props[s].value, I), o = se(o), 
0 === s.indexOf("@") ? h.setAttribute(s.substr(1), o) :r.setStyle(h, s, o);
}
x && k !== E && ("down" === je ? Ee(h, T.eventType, je) :Ee(h, D.eventType, je), 
l.lastFrameIndex = E);
break;
}
}
}, J = function() {
Re && (Re = !1, Te());
var t, e, n = ae.getScrollTop(), s = Ne();
if (fe) s >= fe.endTime ? (n = fe.targetTop, t = fe.done, fe = i) :(e = fe.easing((s - fe.startTime) / fe.duration), 
n = fe.startTop + e * fe.topDiff | 0), ae.setScrollTop(n, !0); else if (!_e) {
var o = ve.targetTop - n;
o && (ve = {
startTop:Fe,
topDiff:n - Fe,
targetTop:n,
startTime:Le,
endTime:Le + ge
}), s <= ve.endTime && (e = X.sqrt((s - ve.startTime) / ge), n = ve.startTop + e * ve.topDiff | 0);
}
if (Be && he && r.setStyle(he, "transform", "translate(0, " + -Ye + "px) " + be), 
_e || Fe !== n) {
je = n > Fe ? "down" :Fe > n ? "up" :je, _e = !1;
var a = {
curTop:n,
lastTop:Fe,
maxTop:ze,
direction:je
}, l = ce.beforerender && ce.beforerender.call(ae, a);
l !== !1 && (G(n, ae.getScrollTop()), Fe = n, ce.render && ce.render.call(ae, a)), 
t && t.call(ae, !1);
}
Le = s;
}, Z = function(t) {
for (var e = 0, i = t.keyFrames.length; i > e; e++) {
for (var n, s, o, r, a = t.keyFrames[e], l = {}; null !== (r = z.exec(a.props)); ) o = r[1], 
s = r[2], n = o.match(O), null !== n ? (o = n[1], n = n[2]) :n = x, s = s.indexOf("!") ? te(s) :[ s.slice(1) ], 
l[o] = {
value:s,
easing:X[n]
};
a.props = l;
}
}, te = function(t) {
var e = [];
return $.lastIndex = 0, t = t.replace($, function(t) {
return t.replace(L, function(t) {
return t / 255 * 100 + "%";
});
}), B && (R.lastIndex = 0, t = t.replace(R, function(t) {
return B + t;
})), t = t.replace(L, function(t) {
return e.push(+t), "{?}";
}), e.unshift(t), e;
}, ee = function(t) {
var e, i, n = {};
for (e = 0, i = t.keyFrames.length; i > e; e++) ie(t.keyFrames[e], n);
for (n = {}, e = t.keyFrames.length - 1; e >= 0; e--) ie(t.keyFrames[e], n);
}, ie = function(t, e) {
var i;
for (i in e) a.call(t.props, i) || (t.props[i] = e[i]);
for (i in t.props) e[i] = t.props[i];
}, ne = function(t, e, i) {
var n, s = t.length;
if (s !== e.length) throw "Can't interpolate between \"" + t[0] + '" and "' + e[0] + '"';
var o = [ t[0] ];
for (n = 1; s > n; n++) o[n] = t[n] + (e[n] - t[n]) * i;
return o;
}, se = function(t) {
var e = 1;
return W.lastIndex = 0, t[0].replace(W, function() {
return t[e++];
});
}, oe = function(t, e) {
t = [].concat(t);
for (var i, n, s = 0, o = t.length; o > s; s++) n = t[s], i = le[n[M]], i && (e ? (n.style.cssText = i.dirtyStyleAttr, 
Pe(n, i.dirtyClassAttr)) :(i.dirtyStyleAttr = n.style.cssText, i.dirtyClassAttr = Se(n), 
n.style.cssText = i.styleAttr, Pe(n, i.classAttr)));
}, re = function() {
be = "translateZ(0)", r.setStyle(he, "transform", be);
var t = h(he), e = t.getPropertyValue("transform"), i = t.getPropertyValue(B + "transform"), n = e && "none" !== e || i && "none" !== i;
n || (be = "");
};
r.setStyle = function(t, e, i) {
var n = t.style;
if (e = e.replace(j, F).replace("-", ""), "zIndex" === e) n[e] = isNaN(i) ? i :"" + (0 | i); else if ("float" === e) n.styleFloat = n.cssFloat = i; else try {
q && (n[q + e.slice(0, 1).toUpperCase() + e.slice(1)] = i), n[e] = i;
} catch (s) {}
};
var ae, le, he, ce, ue, de, pe, fe, me, ge, ve, _e, ye, be, we, xe = r.addEvent = function(e, i, n) {
var s = function(e) {
return e = e || t.event, e.target || (e.target = e.srcElement), e.preventDefault || (e.preventDefault = function() {
e.returnValue = !1, e.defaultPrevented = !0;
}), n.call(this, e);
};
i = i.split(" ");
for (var o, r = 0, a = i.length; a > r; r++) o = i[r], e.addEventListener ? e.addEventListener(o, n, !1) :e.attachEvent("on" + o, s), 
Ve.push({
element:e,
name:o,
listener:n
});
}, ke = r.removeEvent = function(t, e, i) {
e = e.split(" ");
for (var n = 0, s = e.length; s > n; n++) t.removeEventListener ? t.removeEventListener(e[n], i, !1) :t.detachEvent("on" + e[n], i);
}, Ce = function() {
for (var t, e = 0, i = Ve.length; i > e; e++) t = Ve[e], ke(t.element, t.name, t.listener);
Ve = [];
}, Ee = function(t, e, i) {
ce.keyframe && ce.keyframe.call(ae, t, e, i);
}, Te = function() {
var t = ae.getScrollTop();
ze = 0, ue && !Be && (o.style.height = ""), Q(), ue && !Be && (o.style.height = ze + s.clientHeight + "px"), 
Be ? ae.setScrollTop(l.min(ae.getScrollTop(), ze)) :ae.setScrollTop(t, !0), _e = !0;
}, De = function() {
var t, e, i = s.clientHeight, n = {};
for (t in de) e = de[t], "function" == typeof e ? e = e.call(ae) :/p$/.test(e) && (e = e.slice(0, -1) / 100 * i), 
n[t] = e;
return n;
}, Ie = function() {
var t, e = 0;
return he && (e = l.max(he.offsetHeight, he.scrollHeight)), t = l.max(e, o.scrollHeight, o.offsetHeight, s.scrollHeight, s.offsetHeight, s.clientHeight), 
t - s.clientHeight;
}, Se = function(e) {
var i = "className";
return t.SVGElement && e instanceof t.SVGElement && (e = e[i], i = "baseVal"), e[i];
}, Pe = function(e, n, s) {
var o = "className";
if (t.SVGElement && e instanceof t.SVGElement && (e = e[o], o = "baseVal"), s === i) return e[o] = n, 
void 0;
for (var r = e[o], a = 0, l = s.length; l > a; a++) r = Ae(r).replace(Ae(s[a]), " ");
r = Me(r);
for (var h = 0, c = n.length; c > h; h++) -1 === Ae(r).indexOf(Ae(n[h])) && (r += " " + n[h]);
e[o] = Me(r);
}, Me = function(t) {
return t.replace(N, "");
}, Ae = function(t) {
return " " + t + " ";
}, Ne = Date.now || function() {
return +new Date();
}, He = function(t, e) {
return t.frame - e.frame;
}, ze = 0, Oe = 1, je = "down", Fe = -1, Le = Ne(), We = 0, $e = 0, Re = !1, qe = 0, Be = !1, Ye = 0, Ve = [];
"function" == typeof define && define.amd ? define([], function() {
return r;
}) :"undefined" != typeof module && module.exports ? module.exports = r :t.skrollr = r;
}(window, document);

var Slide = new Class({
Implements:Events,
initialize:function(t, e, i) {
this.rootEl = t, this.parentEl = e, this.index = i;
},
insert:function(t) {
this.rootEl.inject(this.parentEl, t);
},
remove:function() {
this.rootEl = this.rootEl.dispose();
}
}), ProgressBar = new Class({
Implements:Events,
initialize:function(t, e) {
var i;
this.count = e, this.position = 1, this.rootEl = t, this.sliderEl = this.rootEl.getElement(".slider"), 
i = 1 / e * 100, this.sliderEl.setStyle("width", i + "%"), this.slideFx = new Fx.Tween(this.sliderEl, {
duration:"1000",
property:"left",
unit:"%"
});
},
move:function(t) {
var e;
"next" == t ? this.position += 1 :"previous" == t && (this.position -= 1), this.position >= this.count + 1 && (this.position = 1), 
0 === this.position && (this.position = this.count), e = (this.position - 1) / this.count * 100, 
this.slideFx.start(e);
}
}), Gallery = new Class({
Implements:Events,
initialize:function(t, e) {
function i(t) {
var e;
e = t.target.hasClass("right") ? "right" :"left", this.changeSlide(e);
}
function n() {
r = setInterval(changeSlide, 5e3, "right");
}
function s() {
clearTimeout(r);
}
var o, r, a;
if (this.rootEl = t, this.frameEl = this.rootEl.getElement(".frame"), this.slidesEl = this.rootEl.getElement(".slides"), 
this.getSlides(), this.slide_width = this.slideEls[0].getStyle("width").toInt(), 
o = this.slideEls.length * this.slide_width, this.slidesEl.setStyle("width", o), 
this.arrowEls = this.rootEl.getElements(".arrow"), this.arrowEls.addEvents({
click:i.bind(this),
remove_clicks:function() {
this.arrowEls.removeEvents("click");
}.bind(this),
add_clicks:function() {
this.arrowEls.addEvent("click", i.bind(this));
}.bind(this)
}), a = this.rootEl.getElement(".progress"), a && (this.progress_bar = new ProgressBar(a, this.slideEls.length)), 
e.autoplay && (n(), galleryEl.addEvent("mouseover", s), galleryEl.addEvent("mouseout", n)), 
1 === $$(".slideshow").length) {
var l = function(t) {
var e = this.rootEl.getCoordinates().top + this.rootEl.getCoordinates().height, i = window.getScrollTop() + window.getHeight();
e > i || ("left" === t.key ? this.changeSlide("left") :"right" === t.key && this.changeSlide("right"));
}.bind(this);
window.addEvents({
keydown:l,
remove_keypressed:function() {
window.removeEvent("keydown", l);
},
add_keypressed:function() {
window.addEvent("keydown", l);
}
});
}
},
completeMissingSlides:function() {
for (;this.slideEls.length < 5 && this.slideEls.length > 0; ) {
var t = [];
this.slideEls.each(function(e) {
t.push(e.clone().inject(e.getParent()));
}, this), this.slideEls = this.slideEls.concat(t);
}
},
getSlides:function() {
function t(t, e) {
this.slides[e] = new Slide(t, this.slidesEl, e);
}
this.slideEls = this.rootEl.getElements(".slide"), this.completeMissingSlides(), 
this.slides = [], this.slideEls.each(t, this);
},
changeSlide:function(t) {
this.arrowEls[0].fireEvent("remove_clicks"), window.fireEvent("remove_keypressed"), 
this.arrowEls.fade("out"), "right" == t ? (this.next(), this.progress_bar && this.progress_bar.move("next")) :(this.previous(), 
this.progress_bar && this.progress_bar.move("previous"));
},
next:function() {
function t() {
e.remove();
var t;
t = n >= this.slides.length - 1 ? 0 :n + 1, this.slides[t].insert("bottom"), this.slides[t].rootEl.setStyle("width", this.slide_width), 
this.getSlides(), this.arrowEls[0].fireEvent("add_clicks"), window.fireEvent("add_keypressed"), 
this.arrowEls.fade("in"), s.removeEvents();
}
var e = this.slides[0], i = this.slides[this.slides.length - 1], n = (e.index, i.index), s = new Fx.Tween(e.rootEl, {
duration:1e3,
property:"width",
link:"ignore"
});
s.addEvent("complete", t.bind(this)), s.start(0);
},
previous:function() {
var t = this.slides[this.slides.length - 1], e = t.rootEl.dispose();
e.setStyle("width", 0), e.inject(this.slidesEl, "top"), this.getSlides();
var i = (this.slides[0], new Fx.Tween(e, {
duration:1e3,
property:"width",
link:"chain",
unit:"px"
}));
i.addEvent("complete", function() {
this.arrowEls[0].fireEvent("add_clicks"), window.fireEvent("add_keypressed"), this.arrowEls.fade("in"), 
i.removeEvents();
}.bind(this)), i.start(this.slide_width);
}
}), Harrys = Harrys || {}, offset = 0;

window.addEvent("domready", init);