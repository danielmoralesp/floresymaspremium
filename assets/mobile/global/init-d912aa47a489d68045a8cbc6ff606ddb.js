function QuickTap(t) {
this.element = "object" == typeof t ? t :document.getElementById(t), window.Touch && this.element.addEventListener("touchstart", this, !1);
}

window.Modernizr = function(t, e, n) {
function i(t) {
y.cssText = t;
}
function r(t, e) {
return i(b.join(t + ";") + (e || ""));
}
function s(t, e) {
return typeof t === e;
}
function a(t, e) {
return !!~("" + t).indexOf(e);
}
function o(t, e) {
for (var i in t) {
var r = t[i];
if (!a(r, "-") && y[r] !== n) return "pfx" == e ? r :!0;
}
return !1;
}
function u(t, e, i) {
for (var r in t) {
var a = e[t[r]];
if (a !== n) return i === !1 ? t[r] :s(a, "function") ? a.bind(i || e) :a;
}
return !1;
}
function l(t, e, n) {
var i = t.charAt(0).toUpperCase() + t.slice(1), r = (t + " " + w.join(i + " ") + i).split(" ");
return s(e, "string") || s(e, "undefined") ? o(r, e) :(r = (t + " " + k.join(i + " ") + i).split(" "), 
u(r, e, n));
}
function c() {
f.input = function(n) {
for (var i = 0, r = n.length; r > i; i++) D[n[i]] = n[i] in v;
return D.list && (D.list = !!e.createElement("datalist") && !!t.HTMLDataListElement), 
D;
}("autocomplete autofocus list placeholder max min multiple pattern required step".split(" ")), 
f.inputtypes = function(t) {
for (var i, r, s, a = 0, o = t.length; o > a; a++) v.setAttribute("type", r = t[a]), 
i = "text" !== v.type, i && (v.value = M, v.style.cssText = "position:absolute;visibility:hidden;", 
/^range$/.test(r) && v.style.WebkitAppearance !== n ? (p.appendChild(v), s = e.defaultView, 
i = s.getComputedStyle && "textfield" !== s.getComputedStyle(v, null).WebkitAppearance && 0 !== v.offsetHeight, 
p.removeChild(v)) :/^(search|tel)$/.test(r) || (i = /^(url|email)$/.test(r) ? v.checkValidity && v.checkValidity() === !1 :v.value != M)), 
T[t[a]] = !!i;
return T;
}("search tel url email datetime date month week time datetime-local number range color".split(" "));
}
var d, h, m = "2.6.2", f = {}, p = e.documentElement, _ = "modernizr", g = e.createElement(_), y = g.style, v = e.createElement("input"), M = ":)", b = ({}.toString, 
" -webkit- -moz- -o- -ms- ".split(" ")), L = "Webkit Moz O ms", w = L.split(" "), k = L.toLowerCase().split(" "), Y = {}, T = {}, D = {}, S = [], E = S.slice, x = function(t, n, i, r) {
var s, a, o, u, l = e.createElement("div"), c = e.body, d = c || e.createElement("body");
if (parseInt(i, 10)) for (;i--; ) o = e.createElement("div"), o.id = r ? r[i] :_ + (i + 1), 
l.appendChild(o);
return s = [ "&#173;", '<style id="s', _, '">', t, "</style>" ].join(""), l.id = _, 
(c ? l :d).innerHTML += s, d.appendChild(l), c || (d.style.background = "", d.style.overflow = "hidden", 
u = p.style.overflow, p.style.overflow = "hidden", p.appendChild(d)), a = n(l, t), 
c ? l.parentNode.removeChild(l) :(d.parentNode.removeChild(d), p.style.overflow = u), 
!!a;
}, C = {}.hasOwnProperty;
h = s(C, "undefined") || s(C.call, "undefined") ? function(t, e) {
return e in t && s(t.constructor.prototype[e], "undefined");
} :function(t, e) {
return C.call(t, e);
}, Function.prototype.bind || (Function.prototype.bind = function(t) {
var e = this;
if ("function" != typeof e) throw new TypeError();
var n = E.call(arguments, 1), i = function() {
if (this instanceof i) {
var r = function() {};
r.prototype = e.prototype;
var s = new r(), a = e.apply(s, n.concat(E.call(arguments)));
return Object(a) === a ? a :s;
}
return e.apply(t, n.concat(E.call(arguments)));
};
return i;
}), Y.rgba = function() {
return i("background-color:rgba(150,255,150,.5)"), a(y.backgroundColor, "rgba");
}, Y.multiplebgs = function() {
return i("background:url(https://),url(https://),red url(https://)"), /(url\s*\(.*?){3}/.test(y.background);
}, Y.backgroundsize = function() {
return l("backgroundSize");
}, Y.borderradius = function() {
return l("borderRadius");
}, Y.boxshadow = function() {
return l("boxShadow");
}, Y.textshadow = function() {
return "" === e.createElement("div").style.textShadow;
}, Y.opacity = function() {
return r("opacity:.55"), /^0.55$/.test(y.opacity);
}, Y.generatedcontent = function() {
var t;
return x([ "#", _, "{font:0/0 a}#", _, ':after{content:"', M, '";visibility:hidden;font:3px/1 a}' ].join(""), function(e) {
t = e.offsetHeight >= 3;
}), t;
}, Y.video = function() {
var t = e.createElement("video"), n = !1;
try {
(n = !!t.canPlayType) && (n = new Boolean(n), n.ogg = t.canPlayType('video/ogg; codecs="theora"').replace(/^no$/, ""), 
n.h264 = t.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/, ""), n.webm = t.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/, ""));
} catch (i) {}
return n;
};
for (var O in Y) h(Y, O) && (d = O.toLowerCase(), f[d] = Y[O](), S.push((f[d] ? "" :"no-") + d));
return f.input || c(), f.addTest = function(t, e) {
if ("object" == typeof t) for (var i in t) h(t, i) && f.addTest(i, t[i]); else {
if (t = t.toLowerCase(), f[t] !== n) return f;
e = "function" == typeof e ? e() :e, "undefined" != typeof enableClasses && enableClasses && (p.className += " " + (e ? "" :"no-") + t), 
f[t] = e;
}
return f;
}, i(""), g = v = null, f._version = m, f._prefixes = b, f._domPrefixes = k, f._cssomPrefixes = w, 
f.testProp = function(t) {
return o([ t ]);
}, f.testAllProps = l, f.testStyles = x, f;
}(this, this.document), /*
---
MooTools: the javascript framework

web build:
 - http://mootools.net/core/76bf47062d6c1983d66ce47ad66aa0e0

packager build:
 - packager build Core/Core Core/Array Core/String Core/Number Core/Function Core/Object Core/Event Core/Browser Core/Class Core/Class.Extras Core/Slick.Parser Core/Slick.Finder Core/Element Core/Element.Style Core/Element.Event Core/Element.Delegation Core/Element.Dimensions Core/Fx Core/Fx.CSS Core/Fx.Tween Core/Fx.Morph Core/Fx.Transitions Core/Request Core/Request.HTML Core/Request.JSON Core/Cookie Core/JSON Core/DOMReady Core/Swiff

copyrights:
  - [MooTools](http://mootools.net)

licenses:
  - [MIT License](http://mootools.net/license.txt)
...
*/
function() {
this.MooTools = {
version:"1.4.5",
build:"ab8ea8824dc3b24b6666867a2c4ed58ebb762cf0"
};
var t = this.typeOf = function(t) {
if (null == t) return "null";
if (null != t.$family) return t.$family();
if (t.nodeName) {
if (1 == t.nodeType) return "element";
if (3 == t.nodeType) return /\S/.test(t.nodeValue) ? "textnode" :"whitespace";
} else if ("number" == typeof t.length) {
if (t.callee) return "arguments";
if ("item" in t) return "collection";
}
return typeof t;
}, e = this.instanceOf = function(t, e) {
if (null == t) return !1;
for (var n = t.$constructor || t.constructor; n; ) {
if (n === e) return !0;
n = n.parent;
}
return t.hasOwnProperty ? t instanceof e :!1;
}, n = this.Function, i = !0;
for (var r in {
toString:1
}) i = null;
i && (i = [ "hasOwnProperty", "valueOf", "isPrototypeOf", "propertyIsEnumerable", "toLocaleString", "toString", "constructor" ]), 
n.prototype.overloadSetter = function(t) {
var e = this;
return function(n, r) {
if (null == n) return this;
if (t || "string" != typeof n) {
for (var s in n) e.call(this, s, n[s]);
if (i) for (var a = i.length; a--; ) s = i[a], n.hasOwnProperty(s) && e.call(this, s, n[s]);
} else e.call(this, n, r);
return this;
};
}, n.prototype.overloadGetter = function(t) {
var e = this;
return function(n) {
var i, r;
if ("string" != typeof n ? i = n :arguments.length > 1 ? i = arguments :t && (i = [ n ]), 
i) {
r = {};
for (var s = 0; s < i.length; s++) r[i[s]] = e.call(this, i[s]);
} else r = e.call(this, n);
return r;
};
}, n.prototype.extend = function(t, e) {
this[t] = e;
}.overloadSetter(), n.prototype.implement = function(t, e) {
this.prototype[t] = e;
}.overloadSetter();
var s = Array.prototype.slice;
n.from = function(e) {
return "function" == t(e) ? e :function() {
return e;
};
}, Array.from = function(e) {
return null == e ? [] :a.isEnumerable(e) && "string" != typeof e ? "array" == t(e) ? e :s.call(e) :[ e ];
}, Number.from = function(t) {
var e = parseFloat(t);
return isFinite(e) ? e :null;
}, String.from = function(t) {
return t + "";
}, n.implement({
hide:function() {
return this.$hidden = !0, this;
},
protect:function() {
return this.$protected = !0, this;
}
});
var a = this.Type = function(e, n) {
if (e) {
var i = e.toLowerCase(), r = function(e) {
return t(e) == i;
};
a["is" + e] = r, null != n && (n.prototype.$family = function() {
return i;
}.hide(), n.type = r);
}
return null == n ? null :(n.extend(this), n.$constructor = a, n.prototype.$constructor = n, 
n);
}, o = Object.prototype.toString;
a.isEnumerable = function(t) {
return null != t && "number" == typeof t.length && "[object Function]" != o.call(t);
};
var u = {}, l = function(e) {
var n = t(e.prototype);
return u[n] || (u[n] = []);
}, c = function(e, n) {
if (!n || !n.$hidden) {
for (var i = l(this), r = 0; r < i.length; r++) {
var a = i[r];
"type" == t(a) ? c.call(a, e, n) :a.call(this, e, n);
}
var o = this.prototype[e];
null != o && o.$protected || (this.prototype[e] = n), null == this[e] && "function" == t(n) && d.call(this, e, function(t) {
return n.apply(t, s.call(arguments, 1));
});
}
}, d = function(t, e) {
if (!e || !e.$hidden) {
var n = this[t];
null != n && n.$protected || (this[t] = e);
}
};
a.implement({
implement:c.overloadSetter(),
extend:d.overloadSetter(),
alias:function(t, e) {
c.call(this, t, this.prototype[e]);
}.overloadSetter(),
mirror:function(t) {
return l(this).push(t), this;
}
}), new a("Type", a);
var h = function(t, e, n) {
var i = e != Object, r = e.prototype;
i && (e = new a(t, e));
for (var s = 0, o = n.length; o > s; s++) {
var u = n[s], l = e[u], c = r[u];
l && l.protect(), i && c && e.implement(u, c.protect());
}
if (i) {
var d = r.propertyIsEnumerable(n[0]);
e.forEachMethod = function(t) {
if (!d) for (var e = 0, i = n.length; i > e; e++) t.call(r, r[n[e]], n[e]);
for (var s in r) t.call(r, r[s], s);
};
}
return h;
};
h("String", String, [ "charAt", "charCodeAt", "concat", "indexOf", "lastIndexOf", "match", "quote", "replace", "search", "slice", "split", "substr", "substring", "trim", "toLowerCase", "toUpperCase" ])("Array", Array, [ "pop", "push", "reverse", "shift", "sort", "splice", "unshift", "concat", "join", "slice", "indexOf", "lastIndexOf", "filter", "forEach", "every", "map", "some", "reduce", "reduceRight" ])("Number", Number, [ "toExponential", "toFixed", "toLocaleString", "toPrecision" ])("Function", n, [ "apply", "call", "bind" ])("RegExp", RegExp, [ "exec", "test" ])("Object", Object, [ "create", "defineProperty", "defineProperties", "keys", "getPrototypeOf", "getOwnPropertyDescriptor", "getOwnPropertyNames", "preventExtensions", "isExtensible", "seal", "isSealed", "freeze", "isFrozen" ])("Date", Date, [ "now" ]), 
Object.extend = d.overloadSetter(), Date.extend("now", function() {
return +new Date();
}), new a("Boolean", Boolean), Number.prototype.$family = function() {
return isFinite(this) ? "number" :"null";
}.hide(), Number.extend("random", function(t, e) {
return Math.floor(Math.random() * (e - t + 1) + t);
});
var m = Object.prototype.hasOwnProperty;
Object.extend("forEach", function(t, e, n) {
for (var i in t) m.call(t, i) && e.call(n, t[i], i, t);
}), Object.each = Object.forEach, Array.implement({
forEach:function(t, e) {
for (var n = 0, i = this.length; i > n; n++) n in this && t.call(e, this[n], n, this);
},
each:function(t, e) {
return Array.forEach(this, t, e), this;
}
});
var f = function(e) {
switch (t(e)) {
case "array":
return e.clone();

case "object":
return Object.clone(e);

default:
return e;
}
};
Array.implement("clone", function() {
for (var t = this.length, e = new Array(t); t--; ) e[t] = f(this[t]);
return e;
});
var p = function(e, n, i) {
switch (t(i)) {
case "object":
"object" == t(e[n]) ? Object.merge(e[n], i) :e[n] = Object.clone(i);
break;

case "array":
e[n] = i.clone();
break;

default:
e[n] = i;
}
return e;
};
Object.extend({
merge:function(e, n, i) {
if ("string" == t(n)) return p(e, n, i);
for (var r = 1, s = arguments.length; s > r; r++) {
var a = arguments[r];
for (var o in a) p(e, o, a[o]);
}
return e;
},
clone:function(t) {
var e = {};
for (var n in t) e[n] = f(t[n]);
return e;
},
append:function(t) {
for (var e = 1, n = arguments.length; n > e; e++) {
var i = arguments[e] || {};
for (var r in i) t[r] = i[r];
}
return t;
}
}), [ "Object", "WhiteSpace", "TextNode", "Collection", "Arguments" ].each(function(t) {
new a(t);
});
var _ = Date.now();
String.extend("uniqueID", function() {
return (_++).toString(36);
});
var g = this.Hash = new a("Hash", function(e) {
"hash" == t(e) && (e = Object.clone(e.getClean()));
for (var n in e) this[n] = e[n];
return this;
});
g.implement({
forEach:function(t, e) {
Object.forEach(this, t, e);
},
getClean:function() {
var t = {};
for (var e in this) this.hasOwnProperty(e) && (t[e] = this[e]);
return t;
},
getLength:function() {
var t = 0;
for (var e in this) this.hasOwnProperty(e) && t++;
return t;
}
}), g.alias("each", "forEach"), Object.type = a.isObject;
var y = this.Native = function(t) {
return new a(t.name, t.initialize);
};
y.type = a.type, y.implement = function(t, e) {
for (var n = 0; n < t.length; n++) t[n].implement(e);
return y;
};
var v = Array.type;
Array.type = function(t) {
return e(t, Array) || v(t);
}, this.$A = function(t) {
return Array.from(t).slice();
}, this.$arguments = function(t) {
return function() {
return arguments[t];
};
}, this.$chk = function(t) {
return !(!t && 0 !== t);
}, this.$clear = function(t) {
return clearTimeout(t), clearInterval(t), null;
}, this.$defined = function(t) {
return null != t;
}, this.$each = function(e, n, i) {
var r = t(e);
("arguments" == r || "collection" == r || "array" == r || "elements" == r ? Array :Object).each(e, n, i);
}, this.$empty = function() {}, this.$extend = function(t, e) {
return Object.append(t, e);
}, this.$H = function(t) {
return new g(t);
}, this.$merge = function() {
var t = Array.slice(arguments);
return t.unshift({}), Object.merge.apply(null, t);
}, this.$lambda = n.from, this.$mixin = Object.merge, this.$random = Number.random, 
this.$splat = Array.from, this.$time = Date.now, this.$type = function(e) {
var n = t(e);
return "elements" == n ? "array" :"null" == n ? !1 :n;
}, this.$unlink = function(e) {
switch (t(e)) {
case "object":
return Object.clone(e);

case "array":
return Array.clone(e);

case "hash":
return new g(e);

default:
return e;
}
};
}(), Array.implement({
every:function(t, e) {
for (var n = 0, i = this.length >>> 0; i > n; n++) if (n in this && !t.call(e, this[n], n, this)) return !1;
return !0;
},
filter:function(t, e) {
for (var n, i = [], r = 0, s = this.length >>> 0; s > r; r++) r in this && (n = this[r], 
t.call(e, n, r, this) && i.push(n));
return i;
},
indexOf:function(t, e) {
for (var n = this.length >>> 0, i = 0 > e ? Math.max(0, n + e) :e || 0; n > i; i++) if (this[i] === t) return i;
return -1;
},
map:function(t, e) {
for (var n = this.length >>> 0, i = Array(n), r = 0; n > r; r++) r in this && (i[r] = t.call(e, this[r], r, this));
return i;
},
some:function(t, e) {
for (var n = 0, i = this.length >>> 0; i > n; n++) if (n in this && t.call(e, this[n], n, this)) return !0;
return !1;
},
clean:function() {
return this.filter(function(t) {
return null != t;
});
},
invoke:function(t) {
var e = Array.slice(arguments, 1);
return this.map(function(n) {
return n[t].apply(n, e);
});
},
associate:function(t) {
for (var e = {}, n = Math.min(this.length, t.length), i = 0; n > i; i++) e[t[i]] = this[i];
return e;
},
link:function(t) {
for (var e = {}, n = 0, i = this.length; i > n; n++) for (var r in t) if (t[r](this[n])) {
e[r] = this[n], delete t[r];
break;
}
return e;
},
contains:function(t, e) {
return -1 != this.indexOf(t, e);
},
append:function(t) {
return this.push.apply(this, t), this;
},
getLast:function() {
return this.length ? this[this.length - 1] :null;
},
getRandom:function() {
return this.length ? this[Number.random(0, this.length - 1)] :null;
},
include:function(t) {
return this.contains(t) || this.push(t), this;
},
combine:function(t) {
for (var e = 0, n = t.length; n > e; e++) this.include(t[e]);
return this;
},
erase:function(t) {
for (var e = this.length; e--; ) this[e] === t && this.splice(e, 1);
return this;
},
empty:function() {
return this.length = 0, this;
},
flatten:function() {
for (var t = [], e = 0, n = this.length; n > e; e++) {
var i = typeOf(this[e]);
"null" != i && (t = t.concat("array" == i || "collection" == i || "arguments" == i || instanceOf(this[e], Array) ? Array.flatten(this[e]) :this[e]));
}
return t;
},
pick:function() {
for (var t = 0, e = this.length; e > t; t++) if (null != this[t]) return this[t];
return null;
},
hexToRgb:function(t) {
if (3 != this.length) return null;
var e = this.map(function(t) {
return 1 == t.length && (t += t), t.toInt(16);
});
return t ? e :"rgb(" + e + ")";
},
rgbToHex:function(t) {
if (this.length < 3) return null;
if (4 == this.length && 0 == this[3] && !t) return "transparent";
for (var e = [], n = 0; 3 > n; n++) {
var i = (this[n] - 0).toString(16);
e.push(1 == i.length ? "0" + i :i);
}
return t ? e :"#" + e.join("");
}
}), Array.alias("extend", "append");

var $pick = function() {
return Array.from(arguments).pick();
};

String.implement({
test:function(t, e) {
return ("regexp" == typeOf(t) ? t :new RegExp("" + t, e)).test(this);
},
contains:function(t, e) {
return e ? (e + this + e).indexOf(e + t + e) > -1 :String(this).indexOf(t) > -1;
},
trim:function() {
return String(this).replace(/^\s+|\s+$/g, "");
},
clean:function() {
return String(this).replace(/\s+/g, " ").trim();
},
camelCase:function() {
return String(this).replace(/-\D/g, function(t) {
return t.charAt(1).toUpperCase();
});
},
hyphenate:function() {
return String(this).replace(/[A-Z]/g, function(t) {
return "-" + t.charAt(0).toLowerCase();
});
},
capitalize:function() {
return String(this).replace(/\b[a-z]/g, function(t) {
return t.toUpperCase();
});
},
escapeRegExp:function() {
return String(this).replace(/([-.*+?^${}()|[\]\/\\])/g, "\\$1");
},
toInt:function(t) {
return parseInt(this, t || 10);
},
toFloat:function() {
return parseFloat(this);
},
hexToRgb:function(t) {
var e = String(this).match(/^#?(\w{1,2})(\w{1,2})(\w{1,2})$/);
return e ? e.slice(1).hexToRgb(t) :null;
},
rgbToHex:function(t) {
var e = String(this).match(/\d{1,3}/g);
return e ? e.rgbToHex(t) :null;
},
substitute:function(t, e) {
return String(this).replace(e || /\\?\{([^{}]+)\}/g, function(e, n) {
return "\\" == e.charAt(0) ? e.slice(1) :null != t[n] ? t[n] :"";
});
}
}), Number.implement({
limit:function(t, e) {
return Math.min(e, Math.max(t, this));
},
round:function(t) {
return t = Math.pow(10, t || 0).toFixed(0 > t ? -t :0), Math.round(this * t) / t;
},
times:function(t, e) {
for (var n = 0; this > n; n++) t.call(e, n, this);
},
toFloat:function() {
return parseFloat(this);
},
toInt:function(t) {
return parseInt(this, t || 10);
}
}), Number.alias("each", "times"), function(t) {
var e = {};
t.each(function(t) {
Number[t] || (e[t] = function() {
return Math[t].apply(null, [ this ].concat(Array.from(arguments)));
});
}), Number.implement(e);
}([ "abs", "acos", "asin", "atan", "atan2", "ceil", "cos", "exp", "floor", "log", "max", "min", "pow", "sin", "sqrt", "tan" ]), 
Function.extend({
attempt:function() {
for (var t = 0, e = arguments.length; e > t; t++) try {
return arguments[t]();
} catch (n) {}
return null;
}
}), Function.implement({
attempt:function(t, e) {
try {
return this.apply(e, Array.from(t));
} catch (n) {}
return null;
},
bind:function(t) {
var e = this, n = arguments.length > 1 ? Array.slice(arguments, 1) :null, i = function() {}, r = function() {
var s = t, a = arguments.length;
this instanceof r && (i.prototype = e.prototype, s = new i());
var o = n || a ? e.apply(s, n && a ? n.concat(Array.slice(arguments)) :n || arguments) :e.call(s);
return s == t ? o :s;
};
return r;
},
pass:function(t, e) {
var n = this;
return null != t && (t = Array.from(t)), function() {
return n.apply(e, t || arguments);
};
},
delay:function(t, e, n) {
return setTimeout(this.pass(null == n ? [] :n, e), t);
},
periodical:function(t, e, n) {
return setInterval(this.pass(null == n ? [] :n, e), t);
}
}), delete Function.prototype.bind, Function.implement({
create:function(t) {
var e = this;
return t = t || {}, function(n) {
var i = t.arguments;
i = null != i ? Array.from(i) :Array.slice(arguments, t.event ? 1 :0), t.event && (i = [ n || window.event ].extend(i));
var r = function() {
return e.apply(t.bind || null, i);
};
return t.delay ? setTimeout(r, t.delay) :t.periodical ? setInterval(r, t.periodical) :t.attempt ? Function.attempt(r) :r();
};
},
bind:function(t, e) {
var n = this;
return null != e && (e = Array.from(e)), function() {
return n.apply(t, e || arguments);
};
},
bindWithEvent:function(t, e) {
var n = this;
return null != e && (e = Array.from(e)), function(i) {
return n.apply(t, null == e ? arguments :[ i ].concat(e));
};
},
run:function(t, e) {
return this.apply(e, Array.from(t));
}
}), Object.create == Function.prototype.create && (Object.create = null);

var $try = Function.attempt;

!function() {
var t = Object.prototype.hasOwnProperty;
Object.extend({
subset:function(t, e) {
for (var n = {}, i = 0, r = e.length; r > i; i++) {
var s = e[i];
s in t && (n[s] = t[s]);
}
return n;
},
map:function(e, n, i) {
var r = {};
for (var s in e) t.call(e, s) && (r[s] = n.call(i, e[s], s, e));
return r;
},
filter:function(e, n, i) {
var r = {};
for (var s in e) {
var a = e[s];
t.call(e, s) && n.call(i, a, s, e) && (r[s] = a);
}
return r;
},
every:function(e, n, i) {
for (var r in e) if (t.call(e, r) && !n.call(i, e[r], r)) return !1;
return !0;
},
some:function(e, n, i) {
for (var r in e) if (t.call(e, r) && n.call(i, e[r], r)) return !0;
return !1;
},
keys:function(e) {
var n = [];
for (var i in e) t.call(e, i) && n.push(i);
return n;
},
values:function(e) {
var n = [];
for (var i in e) t.call(e, i) && n.push(e[i]);
return n;
},
getLength:function(t) {
return Object.keys(t).length;
},
keyOf:function(e, n) {
for (var i in e) if (t.call(e, i) && e[i] === n) return i;
return null;
},
contains:function(t, e) {
return null != Object.keyOf(t, e);
},
toQueryString:function(t, e) {
var n = [];
return Object.each(t, function(t, i) {
e && (i = e + "[" + i + "]");
var r;
switch (typeOf(t)) {
case "object":
r = Object.toQueryString(t, i);
break;

case "array":
var s = {};
t.each(function(t, e) {
s[e] = t;
}), r = Object.toQueryString(s, i);
break;

default:
r = i + "=" + encodeURIComponent(t);
}
null != t && n.push(r);
}), n.join("&");
}
});
}(), Hash.implement({
has:Object.prototype.hasOwnProperty,
keyOf:function(t) {
return Object.keyOf(this, t);
},
hasValue:function(t) {
return Object.contains(this, t);
},
extend:function(t) {
return Hash.each(t || {}, function(t, e) {
Hash.set(this, e, t);
}, this), this;
},
combine:function(t) {
return Hash.each(t || {}, function(t, e) {
Hash.include(this, e, t);
}, this), this;
},
erase:function(t) {
return this.hasOwnProperty(t) && delete this[t], this;
},
get:function(t) {
return this.hasOwnProperty(t) ? this[t] :null;
},
set:function(t, e) {
return (!this[t] || this.hasOwnProperty(t)) && (this[t] = e), this;
},
empty:function() {
return Hash.each(this, function(t, e) {
delete this[e];
}, this), this;
},
include:function(t, e) {
return null == this[t] && (this[t] = e), this;
},
map:function(t, e) {
return new Hash(Object.map(this, t, e));
},
filter:function(t, e) {
return new Hash(Object.filter(this, t, e));
},
every:function(t, e) {
return Object.every(this, t, e);
},
some:function(t, e) {
return Object.some(this, t, e);
},
getKeys:function() {
return Object.keys(this);
},
getValues:function() {
return Object.values(this);
},
toQueryString:function(t) {
return Object.toQueryString(this, t);
}
}), Hash.extend = Object.append, Hash.alias({
indexOf:"keyOf",
contains:"hasValue"
}), function() {
var t = this.document, e = t.window = this, n = navigator.userAgent.toLowerCase(), i = navigator.platform.toLowerCase(), r = n.match(/(opera|ie|firefox|chrome|version)[\s\/:]([\w\d\.]+)?.*?(safari|version[\s\/:]([\w\d\.]+)|$)/) || [ null, "unknown", 0 ], s = "ie" == r[1] && t.documentMode, a = this.Browser = {
extend:Function.prototype.extend,
name:"version" == r[1] ? r[3] :r[1],
version:s || parseFloat("opera" == r[1] && r[4] ? r[4] :r[2]),
Platform:{
name:n.match(/ip(?:ad|od|hone)/) ? "ios" :(n.match(/(?:webos|android)/) || i.match(/mac|win|linux/) || [ "other" ])[0]
},
Features:{
xpath:!!t.evaluate,
air:!!e.runtime,
query:!!t.querySelector,
json:!!e.JSON
},
Plugins:{}
};
a[a.name] = !0, a[a.name + parseInt(a.version, 10)] = !0, a.Platform[a.Platform.name] = !0, 
a.Request = function() {
var t = function() {
return new XMLHttpRequest();
}, e = function() {
return new ActiveXObject("MSXML2.XMLHTTP");
}, n = function() {
return new ActiveXObject("Microsoft.XMLHTTP");
};
return Function.attempt(function() {
return t(), t;
}, function() {
return e(), e;
}, function() {
return n(), n;
});
}(), a.Features.xhr = !!a.Request;
var o = (Function.attempt(function() {
return navigator.plugins["Shockwave Flash"].description;
}, function() {
return new ActiveXObject("ShockwaveFlash.ShockwaveFlash").GetVariable("$version");
}) || "0 r0").match(/\d+/g);
if (a.Plugins.Flash = {
version:Number(o[0] || "0." + o[1]) || 0,
build:Number(o[2]) || 0
}, a.exec = function(n) {
if (!n) return n;
if (e.execScript) e.execScript(n); else {
var i = t.createElement("script");
i.setAttribute("type", "text/javascript"), i.text = n, t.head.appendChild(i), t.head.removeChild(i);
}
return n;
}, String.implement("stripScripts", function(t) {
var e = "", n = this.replace(/<script[^>]*>([\s\S]*?)<\/script>/gi, function(t, n) {
return e += n + "\n", "";
});
return t === !0 ? a.exec(e) :"function" == typeOf(t) && t(e, n), n;
}), a.extend({
Document:this.Document,
Window:this.Window,
Element:this.Element,
Event:this.Event
}), this.Window = this.$constructor = new Type("Window", function() {}), this.$family = Function.from("window").hide(), 
Window.mirror(function(t, n) {
e[t] = n;
}), this.Document = t.$constructor = new Type("Document", function() {}), t.$family = Function.from("document").hide(), 
Document.mirror(function(e, n) {
t[e] = n;
}), t.html = t.documentElement, t.head || (t.head = t.getElementsByTagName("head")[0]), 
t.execCommand) try {
t.execCommand("BackgroundImageCache", !1, !0);
} catch (u) {}
if (this.attachEvent && !this.addEventListener) {
var l = function() {
this.detachEvent("onunload", l), t.head = t.html = t.window = null;
};
this.attachEvent("onunload", l);
}
var c = Array.from;
try {
c(t.html.childNodes);
} catch (u) {
Array.from = function(t) {
if ("string" != typeof t && Type.isEnumerable(t) && "array" != typeOf(t)) {
for (var e = t.length, n = new Array(e); e--; ) n[e] = t[e];
return n;
}
return c(t);
};
var d = Array.prototype, h = d.slice;
[ "pop", "push", "reverse", "shift", "sort", "splice", "unshift", "concat", "join", "slice" ].each(function(t) {
var e = d[t];
Array[t] = function(t) {
return e.apply(Array.from(t), h.call(arguments, 1));
};
});
}
a.Platform.ios && (a.Platform.ipod = !0), a.Engine = {};
var m = function(t, e) {
a.Engine.name = t, a.Engine[t + e] = !0, a.Engine.version = e;
};
if (a.ie) switch (a.Engine.trident = !0, a.version) {
case 6:
m("trident", 4);
break;

case 7:
m("trident", 5);
break;

case 8:
m("trident", 6);
}
if (a.firefox && (a.Engine.gecko = !0, a.version >= 3 ? m("gecko", 19) :m("gecko", 18)), 
a.safari || a.chrome) switch (a.Engine.webkit = !0, a.version) {
case 2:
m("webkit", 419);
break;

case 3:
m("webkit", 420);
break;

case 4:
m("webkit", 525);
}
if (a.opera && (a.Engine.presto = !0, a.version >= 9.6 ? m("presto", 960) :a.version >= 9.5 ? m("presto", 950) :m("presto", 925)), 
"unknown" == a.name) switch ((n.match(/(?:webkit|khtml|gecko)/) || [])[0]) {
case "webkit":
case "khtml":
a.Engine.webkit = !0;
break;

case "gecko":
a.Engine.gecko = !0;
}
this.$exec = a.exec;
}(), function() {
var t = {}, e = this.DOMEvent = new Type("DOMEvent", function(e, n) {
if (n || (n = window), e = e || n.event, e.$extended) return e;
this.event = e, this.$extended = !0, this.shift = e.shiftKey, this.control = e.ctrlKey, 
this.alt = e.altKey, this.meta = e.metaKey;
for (var i = this.type = e.type, r = e.target || e.srcElement; r && 3 == r.nodeType; ) r = r.parentNode;
if (this.target = document.id(r), 0 == i.indexOf("key")) {
var s = this.code = e.which || e.keyCode;
this.key = t[s] || Object.keyOf(Event.Keys, s), "keydown" == i && (s > 111 && 124 > s ? this.key = "f" + (s - 111) :s > 95 && 106 > s && (this.key = s - 96)), 
null == this.key && (this.key = String.fromCharCode(s).toLowerCase());
} else if ("click" == i || "dblclick" == i || "contextmenu" == i || "DOMMouseScroll" == i || 0 == i.indexOf("mouse")) {
var a = n.document;
if (a = a.compatMode && "CSS1Compat" != a.compatMode ? a.body :a.html, this.page = {
x:null != e.pageX ? e.pageX :e.clientX + a.scrollLeft,
y:null != e.pageY ? e.pageY :e.clientY + a.scrollTop
}, this.client = {
x:null != e.pageX ? e.pageX - n.pageXOffset :e.clientX,
y:null != e.pageY ? e.pageY - n.pageYOffset :e.clientY
}, ("DOMMouseScroll" == i || "mousewheel" == i) && (this.wheel = e.wheelDelta ? e.wheelDelta / 120 :-(e.detail || 0) / 3), 
this.rightClick = 3 == e.which || 2 == e.button, "mouseover" == i || "mouseout" == i) {
for (var o = e.relatedTarget || e[("mouseover" == i ? "from" :"to") + "Element"]; o && 3 == o.nodeType; ) o = o.parentNode;
this.relatedTarget = document.id(o);
}
} else if (0 == i.indexOf("touch") || 0 == i.indexOf("gesture")) {
this.rotation = e.rotation, this.scale = e.scale, this.targetTouches = e.targetTouches, 
this.changedTouches = e.changedTouches;
var u = this.touches = e.touches;
if (u && u[0]) {
var l = u[0];
this.page = {
x:l.pageX,
y:l.pageY
}, this.client = {
x:l.clientX,
y:l.clientY
};
}
}
this.client || (this.client = {}), this.page || (this.page = {});
});
e.implement({
stop:function() {
return this.preventDefault().stopPropagation();
},
stopPropagation:function() {
return this.event.stopPropagation ? this.event.stopPropagation() :this.event.cancelBubble = !0, 
this;
},
preventDefault:function() {
return this.event.preventDefault ? this.event.preventDefault() :this.event.returnValue = !1, 
this;
}
}), e.defineKey = function(e, n) {
return t[e] = n, this;
}, e.defineKeys = e.defineKey.overloadSetter(!0), e.defineKeys({
"38":"up",
"40":"down",
"37":"left",
"39":"right",
"27":"esc",
"32":"space",
"8":"backspace",
"9":"tab",
"46":"delete",
"13":"enter"
});
}();

var Event = DOMEvent;

Event.Keys = {}, Event.Keys = new Hash(Event.Keys), function() {
var t = this.Class = new Type("Class", function(i) {
instanceOf(i, Function) && (i = {
initialize:i
});
var r = function() {
if (n(this), r.$prototyping) return this;
this.$caller = null;
var t = this.initialize ? this.initialize.apply(this, arguments) :this;
return this.$caller = this.caller = null, t;
}.extend(this).implement(i);
return r.$constructor = t, r.prototype.$constructor = r, r.prototype.parent = e, 
r;
}), e = function() {
if (!this.$caller) throw new Error('The method "parent" cannot be called.');
var t = this.$caller.$name, e = this.$caller.$owner.parent, n = e ? e.prototype[t] :null;
if (!n) throw new Error('The method "' + t + '" has no parent.');
return n.apply(this, arguments);
}, n = function(t) {
for (var e in t) {
var i = t[e];
switch (typeOf(i)) {
case "object":
var r = function() {};
r.prototype = i, t[e] = n(new r());
break;

case "array":
t[e] = i.clone();
}
}
return t;
}, i = function(t, e, n) {
n.$origin && (n = n.$origin);
var i = function() {
if (n.$protected && null == this.$caller) throw new Error('The method "' + e + '" cannot be called.');
var t = this.caller, r = this.$caller;
this.caller = r, this.$caller = i;
var s = n.apply(this, arguments);
return this.$caller = r, this.caller = t, s;
}.extend({
$owner:t,
$origin:n,
$name:e
});
return i;
}, r = function(e, n, r) {
if (t.Mutators.hasOwnProperty(e) && (n = t.Mutators[e].call(this, n), null == n)) return this;
if ("function" == typeOf(n)) {
if (n.$hidden) return this;
this.prototype[e] = r ? n :i(this, e, n);
} else Object.merge(this.prototype, e, n);
return this;
}, s = function(t) {
t.$prototyping = !0;
var e = new t();
return delete t.$prototyping, e;
};
t.implement("implement", r.overloadSetter()), t.Mutators = {
Extends:function(t) {
this.parent = t, this.prototype = s(t);
},
Implements:function(t) {
Array.from(t).each(function(t) {
var e = new t();
for (var n in e) r.call(this, n, e[n], !0);
}, this);
}
};
}(), function() {
this.Chain = new Class({
$chain:[],
chain:function() {
return this.$chain.append(Array.flatten(arguments)), this;
},
callChain:function() {
return this.$chain.length ? this.$chain.shift().apply(this, arguments) :!1;
},
clearChain:function() {
return this.$chain.empty(), this;
}
});
var t = function(t) {
return t.replace(/^on([A-Z])/, function(t, e) {
return e.toLowerCase();
});
};
this.Events = new Class({
$events:{},
addEvent:function(e, n, i) {
return e = t(e), n == $empty ? this :(this.$events[e] = (this.$events[e] || []).include(n), 
i && (n.internal = !0), this);
},
addEvents:function(t) {
for (var e in t) this.addEvent(e, t[e]);
return this;
},
fireEvent:function(e, n, i) {
e = t(e);
var r = this.$events[e];
return r ? (n = Array.from(n), r.each(function(t) {
i ? t.delay(i, this, n) :t.apply(this, n);
}, this), this) :this;
},
removeEvent:function(e, n) {
e = t(e);
var i = this.$events[e];
if (i && !n.internal) {
var r = i.indexOf(n);
-1 != r && delete i[r];
}
return this;
},
removeEvents:function(e) {
var n;
if ("object" == typeOf(e)) {
for (n in e) this.removeEvent(n, e[n]);
return this;
}
e && (e = t(e));
for (n in this.$events) if (!e || e == n) for (var i = this.$events[n], r = i.length; r--; ) r in i && this.removeEvent(n, i[r]);
return this;
}
}), this.Options = new Class({
setOptions:function() {
var t = this.options = Object.merge.apply(null, [ {}, this.options ].append(arguments));
if (this.addEvent) for (var e in t) "function" == typeOf(t[e]) && /^on[A-Z]/.test(e) && (this.addEvent(e, t[e]), 
delete t[e]);
return this;
}
});
}(), function() {
function t(t, s, a, u, c, h, m, f, p, _, g, y, v, M, b, L) {
if ((s || -1 === n) && (e.expressions[++n] = [], i = -1, s)) return "";
if (a || u || -1 === i) {
a = a || " ";
var w = e.expressions[n];
r && w[i] && (w[i].reverseCombinator = l(a)), w[++i] = {
combinator:a,
tag:"*"
};
}
var k = e.expressions[n][i];
if (c) k.tag = c.replace(o, ""); else if (h) k.id = h.replace(o, ""); else if (m) m = m.replace(o, ""), 
k.classList || (k.classList = []), k.classes || (k.classes = []), k.classList.push(m), 
k.classes.push({
value:m,
regexp:new RegExp("(^|\\s)" + d(m) + "(\\s|$)")
}); else if (v) L = L || b, L = L ? L.replace(o, "") :null, k.pseudos || (k.pseudos = []), 
k.pseudos.push({
key:v.replace(o, ""),
value:L,
type:1 == y.length ? "class" :"element"
}); else if (f) {
f = f.replace(o, ""), g = (g || "").replace(o, "");
var Y, T;
switch (p) {
case "^=":
T = new RegExp("^" + d(g));
break;

case "$=":
T = new RegExp(d(g) + "$");
break;

case "~=":
T = new RegExp("(^|\\s)" + d(g) + "(\\s|$)");
break;

case "|=":
T = new RegExp("^" + d(g) + "(-|$)");
break;

case "=":
Y = function(t) {
return g == t;
};
break;

case "*=":
Y = function(t) {
return t && t.indexOf(g) > -1;
};
break;

case "!=":
Y = function(t) {
return g != t;
};
break;

default:
Y = function(t) {
return !!t;
};
}
"" == g && /^[*$^]=$/.test(p) && (Y = function() {
return !1;
}), Y || (Y = function(t) {
return t && T.test(t);
}), k.attributes || (k.attributes = []), k.attributes.push({
key:f,
operator:p,
value:g,
test:Y
});
}
return "";
}
var e, n, i, r, s = {}, a = {}, o = /\\/g, u = function(i, o) {
if (null == i) return null;
if (i.Slick === !0) return i;
i = ("" + i).replace(/^\s+|\s+$/g, ""), r = !!o;
var l = r ? a :s;
if (l[i]) return l[i];
for (e = {
Slick:!0,
expressions:[],
raw:i,
reverse:function() {
return u(this.raw, !0);
}
}, n = -1; i != (i = i.replace(h, t)); ) ;
return e.length = e.expressions.length, l[e.raw] = r ? c(e) :e;
}, l = function(t) {
return "!" === t ? " " :" " === t ? "!" :/^!/.test(t) ? t.replace(/^!/, "") :"!" + t;
}, c = function(t) {
for (var e = t.expressions, n = 0; n < e.length; n++) {
for (var i = e[n], r = {
parts:[],
tag:"*",
combinator:l(i[0].combinator)
}, s = 0; s < i.length; s++) {
var a = i[s];
a.reverseCombinator || (a.reverseCombinator = " "), a.combinator = a.reverseCombinator, 
delete a.reverseCombinator;
}
i.reverse().push(r);
}
return t;
}, d = function(t) {
return t.replace(/[-[\]{}()*+?.\\^$|,#\s]/g, function(t) {
return "\\" + t;
});
}, h = new RegExp("^(?:\\s*(,)\\s*|\\s*(<combinator>+)\\s*|(\\s+)|(<unicode>+|\\*)|\\#(<unicode>+)|\\.(<unicode>+)|\\[\\s*(<unicode1>+)(?:\\s*([*^$!~|]?=)(?:\\s*(?:([\"']?)(.*?)\\9)))?\\s*\\](?!\\])|(:+)(<unicode>+)(?:\\((?:(?:([\"'])([^\\13]*)\\13)|((?:\\([^)]+\\)|[^()]*)+))\\))?)".replace(/<combinator>/, "[" + d(">+~`!@$%^&={}\\;</") + "]").replace(/<unicode>/g, "(?:[\\w\\u00a1-\\uFFFF-]|\\\\[^\\s0-9a-f])").replace(/<unicode1>/g, "(?:[:\\w\\u00a1-\\uFFFF-]|\\\\[^\\s0-9a-f])")), m = this.Slick || {};
m.parse = function(t) {
return u(t);
}, m.escapeRegExp = d, this.Slick || (this.Slick = m);
}.apply("undefined" != typeof exports ? exports :this), function() {
var t = {}, e = {}, n = Object.prototype.toString;
t.isNativeCode = function(t) {
return /\{\s*\[native code\]\s*\}/.test("" + t);
}, t.isXML = function(t) {
return !!t.xmlVersion || !!t.xml || "[object XMLDocument]" == n.call(t) || 9 == t.nodeType && "HTML" != t.documentElement.nodeName;
}, t.setDocument = function(t) {
var n = t.nodeType;
if (9 == n) ; else if (n) t = t.ownerDocument; else {
if (!t.navigator) return;
t = t.document;
}
if (this.document !== t) {
this.document = t;
var i, r = t.documentElement, s = this.getUIDXML(r), a = e[s];
if (a) for (i in a) this[i] = a[i]; else {
a = e[s] = {}, a.root = r, a.isXMLDocument = this.isXML(t), a.brokenStarGEBTN = a.starSelectsClosedQSA = a.idGetsName = a.brokenMixedCaseQSA = a.brokenGEBCN = a.brokenCheckedQSA = a.brokenEmptyAttributeQSA = a.isHTMLDocument = a.nativeMatchesSelector = !1;
var o, u, l, c, d, h, m = "slick_uniqueid", f = t.createElement("div"), p = t.body || t.getElementsByTagName("body")[0] || r;
p.appendChild(f);
try {
f.innerHTML = '<a id="' + m + '"></a>', a.isHTMLDocument = !!t.getElementById(m);
} catch (_) {}
if (a.isHTMLDocument) {
f.style.display = "none", f.appendChild(t.createComment("")), u = f.getElementsByTagName("*").length > 1;
try {
f.innerHTML = "foo</foo>", h = f.getElementsByTagName("*"), o = h && !!h.length && "/" == h[0].nodeName.charAt(0);
} catch (_) {}
a.brokenStarGEBTN = u || o;
try {
f.innerHTML = '<a name="' + m + '"></a><b id="' + m + '"></b>', a.idGetsName = t.getElementById(m) === f.firstChild;
} catch (_) {}
if (f.getElementsByClassName) {
try {
f.innerHTML = '<a class="f"></a><a class="b"></a>', f.getElementsByClassName("b").length, 
f.firstChild.className = "b", c = 2 != f.getElementsByClassName("b").length;
} catch (_) {}
try {
f.innerHTML = '<a class="a"></a><a class="f b a"></a>', l = 2 != f.getElementsByClassName("a").length;
} catch (_) {}
a.brokenGEBCN = c || l;
}
if (f.querySelectorAll) {
try {
f.innerHTML = "foo</foo>", h = f.querySelectorAll("*"), a.starSelectsClosedQSA = h && !!h.length && "/" == h[0].nodeName.charAt(0);
} catch (_) {}
try {
f.innerHTML = '<a class="MiX"></a>', a.brokenMixedCaseQSA = !f.querySelectorAll(".MiX").length;
} catch (_) {}
try {
f.innerHTML = '<select><option selected="selected">a</option></select>', a.brokenCheckedQSA = 0 == f.querySelectorAll(":checked").length;
} catch (_) {}
try {
f.innerHTML = '<a class=""></a>', a.brokenEmptyAttributeQSA = 0 != f.querySelectorAll('[class*=""]').length;
} catch (_) {}
}
try {
f.innerHTML = '<form action="s"><input id="action"/></form>', d = "s" != f.firstChild.getAttribute("action");
} catch (_) {}
if (a.nativeMatchesSelector = r.matchesSelector || r.mozMatchesSelector || r.webkitMatchesSelector, 
a.nativeMatchesSelector) try {
a.nativeMatchesSelector.call(r, ":slick"), a.nativeMatchesSelector = null;
} catch (_) {}
}
try {
r.slick_expando = 1, delete r.slick_expando, a.getUID = this.getUIDHTML;
} catch (_) {
a.getUID = this.getUIDXML;
}
p.removeChild(f), f = h = p = null, a.getAttribute = a.isHTMLDocument && d ? function(t, e) {
var n = this.attributeGetters[e];
if (n) return n.call(t);
var i = t.getAttributeNode(e);
return i ? i.nodeValue :null;
} :function(t, e) {
var n = this.attributeGetters[e];
return n ? n.call(t) :t.getAttribute(e);
}, a.hasAttribute = r && this.isNativeCode(r.hasAttribute) ? function(t, e) {
return t.hasAttribute(e);
} :function(t, e) {
return t = t.getAttributeNode(e), !(!t || !t.specified && !t.nodeValue);
};
var g = r && this.isNativeCode(r.contains), y = t && this.isNativeCode(t.contains);
a.contains = g && y ? function(t, e) {
return t.contains(e);
} :g && !y ? function(e, n) {
return e === n || (e === t ? t.documentElement :e).contains(n);
} :r && r.compareDocumentPosition ? function(t, e) {
return t === e || !!(16 & t.compareDocumentPosition(e));
} :function(t, e) {
if (e) do if (e === t) return !0; while (e = e.parentNode);
return !1;
}, a.documentSorter = r.compareDocumentPosition ? function(t, e) {
return t.compareDocumentPosition && e.compareDocumentPosition ? 4 & t.compareDocumentPosition(e) ? -1 :t === e ? 0 :1 :0;
} :"sourceIndex" in r ? function(t, e) {
return t.sourceIndex && e.sourceIndex ? t.sourceIndex - e.sourceIndex :0;
} :t.createRange ? function(t, e) {
if (!t.ownerDocument || !e.ownerDocument) return 0;
var n = t.ownerDocument.createRange(), i = e.ownerDocument.createRange();
return n.setStart(t, 0), n.setEnd(t, 0), i.setStart(e, 0), i.setEnd(e, 0), n.compareBoundaryPoints(Range.START_TO_END, i);
} :null, r = null;
for (i in a) this[i] = a[i];
}
}
};
var i = /^([#.]?)((?:[\w-]+|\*))$/, r = /\[.+[*$^]=(?:""|'')?\]/, s = {};
t.search = function(t, e, n, a) {
var o = this.found = a ? null :n || [];
if (!t) return o;
if (t.navigator) t = t.document; else if (!t.nodeType) return o;
var u, l, c = this.uniques = {}, h = !(!n || !n.length), m = 9 == t.nodeType;
if (this.document !== (m ? t :t.ownerDocument) && this.setDocument(t), h) for (l = o.length; l--; ) c[this.getUID(o[l])] = !0;
if ("string" == typeof e) {
var f = e.match(i);
t:if (f) {
var p, _, g = f[1], y = f[2];
if (g) {
if ("#" == g) {
if (!this.isHTMLDocument || !m) break t;
if (p = t.getElementById(y), !p) return o;
if (this.idGetsName && p.getAttributeNode("id").nodeValue != y) break t;
if (a) return p || null;
h && c[this.getUID(p)] || o.push(p);
} else if ("." == g) {
if (!this.isHTMLDocument || (!t.getElementsByClassName || this.brokenGEBCN) && t.querySelectorAll) break t;
if (t.getElementsByClassName && !this.brokenGEBCN) {
if (_ = t.getElementsByClassName(y), a) return _[0] || null;
for (l = 0; p = _[l++]; ) h && c[this.getUID(p)] || o.push(p);
} else {
var v = new RegExp("(^|\\s)" + d.escapeRegExp(y) + "(\\s|$)");
for (_ = t.getElementsByTagName("*"), l = 0; p = _[l++]; ) if (className = p.className, 
className && v.test(className)) {
if (a) return p;
h && c[this.getUID(p)] || o.push(p);
}
}
}
} else {
if ("*" == y && this.brokenStarGEBTN) break t;
if (_ = t.getElementsByTagName(y), a) return _[0] || null;
for (l = 0; p = _[l++]; ) h && c[this.getUID(p)] || o.push(p);
}
return h && this.sort(o), a ? null :o;
}
t:if (t.querySelectorAll) {
if (!this.isHTMLDocument || s[e] || this.brokenMixedCaseQSA || this.brokenCheckedQSA && e.indexOf(":checked") > -1 || this.brokenEmptyAttributeQSA && r.test(e) || !m && e.indexOf(",") > -1 || d.disableQSA) break t;
var M = e, b = t;
if (!m) {
var L = b.getAttribute("id"), w = "slickid__";
b.setAttribute("id", w), M = "#" + w + " " + M, t = b.parentNode;
}
try {
if (a) return t.querySelector(M) || null;
_ = t.querySelectorAll(M);
} catch (k) {
s[e] = 1;
break t;
} finally {
m || (L ? b.setAttribute("id", L) :b.removeAttribute("id"), t = b);
}
if (this.starSelectsClosedQSA) for (l = 0; p = _[l++]; ) !(p.nodeName > "@") || h && c[this.getUID(p)] || o.push(p); else for (l = 0; p = _[l++]; ) h && c[this.getUID(p)] || o.push(p);
return h && this.sort(o), o;
}
if (u = this.Slick.parse(e), !u.length) return o;
} else {
if (null == e) return o;
if (!e.Slick) return this.contains(t.documentElement || t, e) ? (o ? o.push(e) :o = e, 
o) :o;
u = e;
}
this.posNTH = {}, this.posNTHLast = {}, this.posNTHType = {}, this.posNTHTypeLast = {}, 
this.push = !h && (a || 1 == u.length && 1 == u.expressions[0].length) ? this.pushArray :this.pushUID, 
null == o && (o = []);
var Y, T, D, S, E, x, C, O, A, j, I, F, N, z, H = u.expressions;
t:for (l = 0; F = H[l]; l++) for (Y = 0; N = F[Y]; Y++) {
if (S = "combinator:" + N.combinator, !this[S]) continue t;
if (E = this.isXMLDocument ? N.tag :N.tag.toUpperCase(), x = N.id, C = N.classList, 
O = N.classes, A = N.attributes, j = N.pseudos, z = Y === F.length - 1, this.bitUniques = {}, 
z ? (this.uniques = c, this.found = o) :(this.uniques = {}, this.found = []), 0 === Y) {
if (this[S](t, E, x, O, A, j, C), a && z && o.length) break t;
} else if (a && z) {
for (T = 0, D = I.length; D > T; T++) if (this[S](I[T], E, x, O, A, j, C), o.length) break t;
} else for (T = 0, D = I.length; D > T; T++) this[S](I[T], E, x, O, A, j, C);
I = this.found;
}
return (h || u.expressions.length > 1) && this.sort(o), a ? o[0] || null :o;
}, t.uidx = 1, t.uidk = "slick-uniqueid", t.getUIDXML = function(t) {
var e = t.getAttribute(this.uidk);
return e || (e = this.uidx++, t.setAttribute(this.uidk, e)), e;
}, t.getUIDHTML = function(t) {
return t.uniqueNumber || (t.uniqueNumber = this.uidx++);
}, t.sort = function(t) {
return this.documentSorter ? (t.sort(this.documentSorter), t) :t;
}, t.cacheNTH = {}, t.matchNTH = /^([+-]?\d*)?([a-z]+)?([+-]\d+)?$/, t.parseNTHArgument = function(t) {
var e = t.match(this.matchNTH);
if (!e) return !1;
var n = e[2] || !1, i = e[1] || 1;
"-" == i && (i = -1);
var r = +e[3] || 0;
return e = "n" == n ? {
a:i,
b:r
} :"odd" == n ? {
a:2,
b:1
} :"even" == n ? {
a:2,
b:0
} :{
a:0,
b:i
}, this.cacheNTH[t] = e;
}, t.createNTHPseudo = function(t, e, n, i) {
return function(r, s) {
var a = this.getUID(r);
if (!this[n][a]) {
var o = r.parentNode;
if (!o) return !1;
var u = o[t], l = 1;
if (i) {
var c = r.nodeName;
do u.nodeName == c && (this[n][this.getUID(u)] = l++); while (u = u[e]);
} else do 1 == u.nodeType && (this[n][this.getUID(u)] = l++); while (u = u[e]);
}
s = s || "n";
var d = this.cacheNTH[s] || this.parseNTHArgument(s);
if (!d) return !1;
var h = d.a, m = d.b, f = this[n][a];
if (0 == h) return m == f;
if (h > 0) {
if (m > f) return !1;
} else if (f > m) return !1;
return (f - m) % h == 0;
};
}, t.pushArray = function(t, e, n, i, r, s) {
this.matchSelector(t, e, n, i, r, s) && this.found.push(t);
}, t.pushUID = function(t, e, n, i, r, s) {
var a = this.getUID(t);
!this.uniques[a] && this.matchSelector(t, e, n, i, r, s) && (this.uniques[a] = !0, 
this.found.push(t));
}, t.matchNode = function(t, e) {
if (this.isHTMLDocument && this.nativeMatchesSelector) try {
return this.nativeMatchesSelector.call(t, e.replace(/\[([^=]+)=\s*([^'"\]]+?)\s*\]/g, '[$1="$2"]'));
} catch (n) {}
var i = this.Slick.parse(e);
if (!i) return !0;
var r, s = i.expressions, a = 0;
for (r = 0; currentExpression = s[r]; r++) if (1 == currentExpression.length) {
var o = currentExpression[0];
if (this.matchSelector(t, this.isXMLDocument ? o.tag :o.tag.toUpperCase(), o.id, o.classes, o.attributes, o.pseudos)) return !0;
a++;
}
if (a == i.length) return !1;
var u, l = this.search(this.document, i);
for (r = 0; u = l[r++]; ) if (u === t) return !0;
return !1;
}, t.matchPseudo = function(t, e, n) {
var i = "pseudo:" + e;
if (this[i]) return this[i](t, n);
var r = this.getAttribute(t, e);
return n ? n == r :!!r;
}, t.matchSelector = function(t, e, n, i, r, s) {
if (e) {
var a = this.isXMLDocument ? t.nodeName :t.nodeName.toUpperCase();
if ("*" == e) {
if ("@" > a) return !1;
} else if (a != e) return !1;
}
if (n && t.getAttribute("id") != n) return !1;
var o, u, l;
if (i) for (o = i.length; o--; ) if (l = this.getAttribute(t, "class"), !l || !i[o].regexp.test(l)) return !1;
if (r) for (o = r.length; o--; ) if (u = r[o], u.operator ? !u.test(this.getAttribute(t, u.key)) :!this.hasAttribute(t, u.key)) return !1;
if (s) for (o = s.length; o--; ) if (u = s[o], !this.matchPseudo(t, u.key, u.value)) return !1;
return !0;
};
var a = {
" ":function(t, e, n, i, r, s, a) {
var o, u, l;
if (this.isHTMLDocument) {
t:if (n) {
if (u = this.document.getElementById(n), !u && t.all || this.idGetsName && u && u.getAttributeNode("id").nodeValue != n) {
if (l = t.all[n], !l) return;
for (l[0] || (l = [ l ]), o = 0; u = l[o++]; ) {
var c = u.getAttributeNode("id");
if (c && c.nodeValue == n) {
this.push(u, e, null, i, r, s);
break;
}
}
return;
}
if (!u) {
if (this.contains(this.root, t)) return;
break t;
}
if (this.document !== t && !this.contains(t, u)) return;
return this.push(u, e, null, i, r, s), void 0;
}
t:if (i && t.getElementsByClassName && !this.brokenGEBCN) {
if (l = t.getElementsByClassName(a.join(" ")), !l || !l.length) break t;
for (o = 0; u = l[o++]; ) this.push(u, e, n, null, r, s);
return;
}
}
if (l = t.getElementsByTagName(e), l && l.length) for (this.brokenStarGEBTN || (e = null), 
o = 0; u = l[o++]; ) this.push(u, e, n, i, r, s);
},
">":function(t, e, n, i, r, s) {
if (t = t.firstChild) do 1 == t.nodeType && this.push(t, e, n, i, r, s); while (t = t.nextSibling);
},
"+":function(t, e, n, i, r, s) {
for (;t = t.nextSibling; ) if (1 == t.nodeType) {
this.push(t, e, n, i, r, s);
break;
}
},
"^":function(t, e, n, i, r, s) {
t = t.firstChild, t && (1 == t.nodeType ? this.push(t, e, n, i, r, s) :this["combinator:+"](t, e, n, i, r, s));
},
"~":function(t, e, n, i, r, s) {
for (;t = t.nextSibling; ) if (1 == t.nodeType) {
var a = this.getUID(t);
if (this.bitUniques[a]) break;
this.bitUniques[a] = !0, this.push(t, e, n, i, r, s);
}
},
"++":function(t, e, n, i, r, s) {
this["combinator:+"](t, e, n, i, r, s), this["combinator:!+"](t, e, n, i, r, s);
},
"~~":function(t, e, n, i, r, s) {
this["combinator:~"](t, e, n, i, r, s), this["combinator:!~"](t, e, n, i, r, s);
},
"!":function(t, e, n, i, r, s) {
for (;t = t.parentNode; ) t !== this.document && this.push(t, e, n, i, r, s);
},
"!>":function(t, e, n, i, r, s) {
t = t.parentNode, t !== this.document && this.push(t, e, n, i, r, s);
},
"!+":function(t, e, n, i, r, s) {
for (;t = t.previousSibling; ) if (1 == t.nodeType) {
this.push(t, e, n, i, r, s);
break;
}
},
"!^":function(t, e, n, i, r, s) {
t = t.lastChild, t && (1 == t.nodeType ? this.push(t, e, n, i, r, s) :this["combinator:!+"](t, e, n, i, r, s));
},
"!~":function(t, e, n, i, r, s) {
for (;t = t.previousSibling; ) if (1 == t.nodeType) {
var a = this.getUID(t);
if (this.bitUniques[a]) break;
this.bitUniques[a] = !0, this.push(t, e, n, i, r, s);
}
}
};
for (var o in a) t["combinator:" + o] = a[o];
var u = {
empty:function(t) {
var e = t.firstChild;
return !(e && 1 == e.nodeType || (t.innerText || t.textContent || "").length);
},
not:function(t, e) {
return !this.matchNode(t, e);
},
contains:function(t, e) {
return (t.innerText || t.textContent || "").indexOf(e) > -1;
},
"first-child":function(t) {
for (;t = t.previousSibling; ) if (1 == t.nodeType) return !1;
return !0;
},
"last-child":function(t) {
for (;t = t.nextSibling; ) if (1 == t.nodeType) return !1;
return !0;
},
"only-child":function(t) {
for (var e = t; e = e.previousSibling; ) if (1 == e.nodeType) return !1;
for (var n = t; n = n.nextSibling; ) if (1 == n.nodeType) return !1;
return !0;
},
"nth-child":t.createNTHPseudo("firstChild", "nextSibling", "posNTH"),
"nth-last-child":t.createNTHPseudo("lastChild", "previousSibling", "posNTHLast"),
"nth-of-type":t.createNTHPseudo("firstChild", "nextSibling", "posNTHType", !0),
"nth-last-of-type":t.createNTHPseudo("lastChild", "previousSibling", "posNTHTypeLast", !0),
index:function(t, e) {
return this["pseudo:nth-child"](t, "" + (e + 1));
},
even:function(t) {
return this["pseudo:nth-child"](t, "2n");
},
odd:function(t) {
return this["pseudo:nth-child"](t, "2n+1");
},
"first-of-type":function(t) {
for (var e = t.nodeName; t = t.previousSibling; ) if (t.nodeName == e) return !1;
return !0;
},
"last-of-type":function(t) {
for (var e = t.nodeName; t = t.nextSibling; ) if (t.nodeName == e) return !1;
return !0;
},
"only-of-type":function(t) {
for (var e = t, n = t.nodeName; e = e.previousSibling; ) if (e.nodeName == n) return !1;
for (var i = t; i = i.nextSibling; ) if (i.nodeName == n) return !1;
return !0;
},
enabled:function(t) {
return !t.disabled;
},
disabled:function(t) {
return t.disabled;
},
checked:function(t) {
return t.checked || t.selected;
},
focus:function(t) {
return this.isHTMLDocument && this.document.activeElement === t && (t.href || t.type || this.hasAttribute(t, "tabindex"));
},
root:function(t) {
return t === this.root;
},
selected:function(t) {
return t.selected;
}
};
for (var l in u) t["pseudo:" + l] = u[l];
var c = t.attributeGetters = {
"for":function() {
return "htmlFor" in this ? this.htmlFor :this.getAttribute("for");
},
href:function() {
return "href" in this ? this.getAttribute("href", 2) :this.getAttribute("href");
},
style:function() {
return this.style ? this.style.cssText :this.getAttribute("style");
},
tabindex:function() {
var t = this.getAttributeNode("tabindex");
return t && t.specified ? t.nodeValue :null;
},
type:function() {
return this.getAttribute("type");
},
maxlength:function() {
var t = this.getAttributeNode("maxLength");
return t && t.specified ? t.nodeValue :null;
}
};
c.MAXLENGTH = c.maxLength = c.maxlength;
var d = t.Slick = this.Slick || {};
d.version = "1.1.7", d.search = function(e, n, i) {
return t.search(e, n, i);
}, d.find = function(e, n) {
return t.search(e, n, null, !0);
}, d.contains = function(e, n) {
return t.setDocument(e), t.contains(e, n);
}, d.getAttribute = function(e, n) {
return t.setDocument(e), t.getAttribute(e, n);
}, d.hasAttribute = function(e, n) {
return t.setDocument(e), t.hasAttribute(e, n);
}, d.match = function(e, n) {
return e && n ? n && n !== e ? (t.setDocument(e), t.matchNode(e, n)) :!0 :!1;
}, d.defineAttributeGetter = function(e, n) {
return t.attributeGetters[e] = n, this;
}, d.lookupAttributeGetter = function(e) {
return t.attributeGetters[e];
}, d.definePseudo = function(e, n) {
return t["pseudo:" + e] = function(t, e) {
return n.call(t, e);
}, this;
}, d.lookupPseudo = function(e) {
var n = t["pseudo:" + e];
return n ? function(t) {
return n.call(this, t);
} :null;
}, d.override = function(e, n) {
return t.override(e, n), this;
}, d.isXML = t.isXML, d.uidOf = function(e) {
return t.getUIDHTML(e);
}, this.Slick || (this.Slick = d);
}.apply("undefined" != typeof exports ? exports :this);

var Element = function(t, e) {
var n = Element.Constructors[t];
if (n) return n(e);
if ("string" != typeof t) return document.id(t).set(e);
if (e || (e = {}), !/^[\w-]+$/.test(t)) {
var i = Slick.parse(t).expressions[0][0];
t = "*" == i.tag ? "div" :i.tag, i.id && null == e.id && (e.id = i.id);
var r = i.attributes;
if (r) for (var s, a = 0, o = r.length; o > a; a++) s = r[a], null == e[s.key] && (null != s.value && "=" == s.operator ? e[s.key] = s.value :s.value || s.operator || (e[s.key] = !0));
i.classList && null == e["class"] && (e["class"] = i.classList.join(" "));
}
return document.newElement(t, e);
};

Browser.Element && (Element.prototype = Browser.Element.prototype, Element.prototype._fireEvent = function(t) {
return function(e, n) {
return t.call(this, e, n);
};
}(Element.prototype.fireEvent)), new Type("Element", Element).mirror(function(t) {
if (!Array.prototype[t]) {
var e = {};
e[t] = function() {
for (var e = [], n = arguments, i = !0, r = 0, s = this.length; s > r; r++) {
var a = this[r], o = e[r] = a[t].apply(a, n);
i = i && "element" == typeOf(o);
}
return i ? new Elements(e) :e;
}, Elements.implement(e);
}
}), Browser.Element || (Element.parent = Object, Element.Prototype = {
$constructor:Element,
$family:Function.from("element").hide()
}, Element.mirror(function(t, e) {
Element.Prototype[t] = e;
})), Element.Constructors = {}, Element.Constructors = new Hash();

var IFrame = new Type("IFrame", function() {
var t, e = Array.link(arguments, {
properties:Type.isObject,
iframe:function(t) {
return null != t;
}
}), n = e.properties || {};
e.iframe && (t = document.id(e.iframe));
var i = n.onload || function() {};
delete n.onload, n.id = n.name = [ n.id, n.name, t ? t.id || t.name :"IFrame_" + String.uniqueID() ].pick(), 
t = new Element(t || "iframe", n);
var r = function() {
i.call(t.contentWindow);
};
return window.frames[n.id] ? r() :t.addListener("load", r), t;
}), Elements = this.Elements = function(t) {
if (t && t.length) for (var e, n = {}, i = 0; e = t[i++]; ) {
var r = Slick.uidOf(e);
n[r] || (n[r] = !0, this.push(e));
}
};

Elements.prototype = {
length:0
}, Elements.parent = Array, new Type("Elements", Elements).implement({
filter:function(t, e) {
return t ? new Elements(Array.filter(this, "string" == typeOf(t) ? function(e) {
return e.match(t);
} :t, e)) :this;
}.protect(),
push:function() {
for (var t = this.length, e = 0, n = arguments.length; n > e; e++) {
var i = document.id(arguments[e]);
i && (this[t++] = i);
}
return this.length = t;
}.protect(),
unshift:function() {
for (var t = [], e = 0, n = arguments.length; n > e; e++) {
var i = document.id(arguments[e]);
i && t.push(i);
}
return Array.prototype.unshift.apply(this, t);
}.protect(),
concat:function() {
for (var t = new Elements(this), e = 0, n = arguments.length; n > e; e++) {
var i = arguments[e];
Type.isEnumerable(i) ? t.append(i) :t.push(i);
}
return t;
}.protect(),
append:function(t) {
for (var e = 0, n = t.length; n > e; e++) this.push(t[e]);
return this;
}.protect(),
empty:function() {
for (;this.length; ) delete this[--this.length];
return this;
}.protect()
}), Elements.alias("extend", "append"), function() {
var t = Array.prototype.splice, e = {
"0":0,
"1":1,
length:2
};
t.call(e, 1, 1), 1 == e[1] && Elements.implement("splice", function() {
for (var e = this.length, n = t.apply(this, arguments); e >= this.length; ) delete this[e--];
return n;
}.protect()), Array.forEachMethod(function(t, e) {
Elements.implement(e, t);
}), Array.mirror(Elements);
var n;
try {
n = "x" == document.createElement("<input name=x>").name;
} catch (i) {}
var r = function(t) {
return ("" + t).replace(/&/g, "&amp;").replace(/"/g, "&quot;");
};
Document.implement({
newElement:function(t, e) {
return e && null != e.checked && (e.defaultChecked = e.checked), n && e && (t = "<" + t, 
e.name && (t += ' name="' + r(e.name) + '"'), e.type && (t += ' type="' + r(e.type) + '"'), 
t += ">", delete e.name, delete e.type), this.id(this.createElement(t)).set(e);
}
});
}(), function() {
Slick.uidOf(window), Slick.uidOf(document), Document.implement({
newTextNode:function(t) {
return this.createTextNode(t);
},
getDocument:function() {
return this;
},
getWindow:function() {
return this.window;
},
id:function() {
var t = {
string:function(e, n, i) {
return e = Slick.find(i, "#" + e.replace(/(\W)/g, "\\$1")), e ? t.element(e, n) :null;
},
element:function(t, e) {
if (Slick.uidOf(t), !e && !t.$family && !/^(?:object|embed)$/i.test(t.tagName)) {
var n = t.fireEvent;
t._fireEvent = function(t, e) {
return n(t, e);
}, Object.append(t, Element.Prototype);
}
return t;
},
object:function(e, n, i) {
return e.toElement ? t.element(e.toElement(i), n) :null;
}
};
return t.textnode = t.whitespace = t.window = t.document = function(t) {
return t;
}, function(e, n, i) {
if (e && e.$family && e.uniqueNumber) return e;
var r = typeOf(e);
return t[r] ? t[r](e, n, i || document) :null;
};
}()
}), null == window.$ && Window.implement("$", function(t, e) {
return document.id(t, e, this.document);
}), Window.implement({
getDocument:function() {
return this.document;
},
getWindow:function() {
return this;
}
}), [ Document, Element ].invoke("implement", {
getElements:function(t) {
return Slick.search(this, t, new Elements());
},
getElement:function(t) {
return document.id(Slick.find(this, t));
}
});
var t = {
contains:function(t) {
return Slick.contains(this, t);
}
};
document.contains || Document.implement(t), document.createElement("div").contains || Element.implement(t), 
Element.implement("hasChild", function(t) {
return this !== t && this.contains(t);
}), function(t, e, n) {
this.Selectors = {};
var i = this.Selectors.Pseudo = new Hash(), r = function() {
for (var t in i) i.hasOwnProperty(t) && (Slick.definePseudo(t, i[t]), delete i[t]);
};
Slick.search = function(e, n, i) {
return r(), t.call(this, e, n, i);
}, Slick.find = function(t, n) {
return r(), e.call(this, t, n);
}, Slick.match = function(t, e) {
return r(), n.call(this, t, e);
};
}(Slick.search, Slick.find, Slick.match);
var e = function(t, e) {
if (!t) return e;
t = Object.clone(Slick.parse(t));
for (var n = t.expressions, i = n.length; i--; ) n[i][0].combinator = e;
return t;
};
Object.forEach({
getNext:"~",
getPrevious:"!~",
getParent:"!"
}, function(t, n) {
Element.implement(n, function(n) {
return this.getElement(e(n, t));
});
}), Object.forEach({
getAllNext:"~",
getAllPrevious:"!~",
getSiblings:"~~",
getChildren:">",
getParents:"!"
}, function(t, n) {
Element.implement(n, function(n) {
return this.getElements(e(n, t));
});
}), Element.implement({
getFirst:function(t) {
return document.id(Slick.search(this, e(t, ">"))[0]);
},
getLast:function(t) {
return document.id(Slick.search(this, e(t, ">")).getLast());
},
getWindow:function() {
return this.ownerDocument.window;
},
getDocument:function() {
return this.ownerDocument;
},
getElementById:function(t) {
return document.id(Slick.find(this, "#" + ("" + t).replace(/(\W)/g, "\\$1")));
},
match:function(t) {
return !t || Slick.match(this, t);
}
}), null == window.$$ && Window.implement("$$", function(t) {
var e = new Elements();
if (1 == arguments.length && "string" == typeof t) return Slick.search(this.document, t, e);
for (var n = Array.flatten(arguments), i = 0, r = n.length; r > i; i++) {
var s = n[i];
switch (typeOf(s)) {
case "element":
e.push(s);
break;

case "string":
Slick.search(this.document, s, e);
}
}
return e;
}), null == window.$$ && Window.implement("$$", function(t) {
if (1 == arguments.length) {
if ("string" == typeof t) return Slick.search(this.document, t, new Elements());
if (Type.isEnumerable(t)) return new Elements(t);
}
return new Elements(arguments);
});
var n = {
before:function(t, e) {
var n = e.parentNode;
n && n.insertBefore(t, e);
},
after:function(t, e) {
var n = e.parentNode;
n && n.insertBefore(t, e.nextSibling);
},
bottom:function(t, e) {
e.appendChild(t);
},
top:function(t, e) {
e.insertBefore(t, e.firstChild);
}
};
n.inside = n.bottom, Object.each(n, function(t, e) {
e = e.capitalize();
var n = {};
n["inject" + e] = function(e) {
return t(this, document.id(e, !0)), this;
}, n["grab" + e] = function(e) {
return t(document.id(e, !0), this), this;
}, Element.implement(n);
});
var i = {}, r = {}, s = {};
Array.forEach([ "type", "value", "defaultValue", "accessKey", "cellPadding", "cellSpacing", "colSpan", "frameBorder", "rowSpan", "tabIndex", "useMap" ], function(t) {
s[t.toLowerCase()] = t;
}), s.html = "innerHTML", s.text = null == document.createElement("div").textContent ? "innerText" :"textContent", 
Object.forEach(s, function(t, e) {
r[e] = function(e, n) {
e[t] = n;
}, i[e] = function(e) {
return e[t];
};
});
var a = [ "compact", "nowrap", "ismap", "declare", "noshade", "checked", "disabled", "readOnly", "multiple", "selected", "noresize", "defer", "defaultChecked", "autofocus", "controls", "autoplay", "loop" ], o = {};
Array.forEach(a, function(t) {
var e = t.toLowerCase();
o[e] = t, r[e] = function(e, n) {
e[t] = !!n;
}, i[e] = function(e) {
return !!e[t];
};
}), Object.append(r, {
"class":function(t, e) {
"className" in t ? t.className = e || "" :t.setAttribute("class", e);
},
"for":function(t, e) {
"htmlFor" in t ? t.htmlFor = e :t.setAttribute("for", e);
},
style:function(t, e) {
t.style ? t.style.cssText = e :t.setAttribute("style", e);
},
value:function(t, e) {
t.value = null != e ? e :"";
}
}), i["class"] = function(t) {
return "className" in t ? t.className || null :t.getAttribute("class");
};
var u = document.createElement("button");
try {
u.type = "button";
} catch (l) {}
"button" != u.type && (r.type = function(t, e) {
t.setAttribute("type", e);
}), u = null;
var c = document.createElement("input");
c.value = "t", c.type = "submit", "t" != c.value && (r.type = function(t, e) {
var n = t.value;
t.type = e, t.value = n;
}), c = null;
var d = function(t) {
return t.random = "attribute", "attribute" == t.getAttribute("random");
}(document.createElement("div"));
Element.implement({
setProperty:function(t, e) {
var n = r[t.toLowerCase()];
if (n) n(this, e); else {
if (d) var i = this.retrieve("$attributeWhiteList", {});
null == e ? (this.removeAttribute(t), d && delete i[t]) :(this.setAttribute(t, "" + e), 
d && (i[t] = !0));
}
return this;
},
setProperties:function(t) {
for (var e in t) this.setProperty(e, t[e]);
return this;
},
getProperty:function(t) {
var e = i[t.toLowerCase()];
if (e) return e(this);
if (d) {
var n = this.getAttributeNode(t), r = this.retrieve("$attributeWhiteList", {});
if (!n) return null;
if (n.expando && !r[t]) {
var s = this.outerHTML;
if (s.substr(0, s.search(/\/?['"]?>(?![^<]*<['"])/)).indexOf(t) < 0) return null;
r[t] = !0;
}
}
var a = Slick.getAttribute(this, t);
return a || Slick.hasAttribute(this, t) ? a :null;
},
getProperties:function() {
var t = Array.from(arguments);
return t.map(this.getProperty, this).associate(t);
},
removeProperty:function(t) {
return this.setProperty(t, null);
},
removeProperties:function() {
return Array.each(arguments, this.removeProperty, this), this;
},
set:function(t, e) {
var n = Element.Properties[t];
n && n.set ? n.set.call(this, e) :this.setProperty(t, e);
}.overloadSetter(),
get:function(t) {
var e = Element.Properties[t];
return e && e.get ? e.get.apply(this) :this.getProperty(t);
}.overloadGetter(),
erase:function(t) {
var e = Element.Properties[t];
return e && e.erase ? e.erase.apply(this) :this.removeProperty(t), this;
},
hasClass:function(t) {
return this.className.clean().contains(t, " ");
},
addClass:function(t) {
return this.hasClass(t) || (this.className = (this.className + " " + t).clean()), 
this;
},
removeClass:function(t) {
return this.className = this.className.replace(new RegExp("(^|\\s)" + t + "(?:\\s|$)"), "$1"), 
this;
},
toggleClass:function(t, e) {
return null == e && (e = !this.hasClass(t)), e ? this.addClass(t) :this.removeClass(t);
},
adopt:function() {
var t, e = this, n = Array.flatten(arguments), i = n.length;
i > 1 && (e = t = document.createDocumentFragment());
for (var r = 0; i > r; r++) {
var s = document.id(n[r], !0);
s && e.appendChild(s);
}
return t && this.appendChild(t), this;
},
appendText:function(t, e) {
return this.grab(this.getDocument().newTextNode(t), e);
},
grab:function(t, e) {
return n[e || "bottom"](document.id(t, !0), this), this;
},
inject:function(t, e) {
return n[e || "bottom"](this, document.id(t, !0)), this;
},
replaces:function(t) {
return t = document.id(t, !0), t.parentNode.replaceChild(this, t), this;
},
wraps:function(t, e) {
return t = document.id(t, !0), this.replaces(t).grab(t, e);
},
getSelected:function() {
return this.selectedIndex, new Elements(Array.from(this.options).filter(function(t) {
return t.selected;
}));
},
toQueryString:function() {
var t = [];
return this.getElements("input, select, textarea").each(function(e) {
var n = e.type;
if (e.name && !e.disabled && "submit" != n && "reset" != n && "file" != n && "image" != n) {
var i = "select" == e.get("tag") ? e.getSelected().map(function(t) {
return document.id(t).get("value");
}) :"radio" != n && "checkbox" != n || e.checked ? e.get("value") :null;
Array.from(i).each(function(n) {
"undefined" != typeof n && t.push(encodeURIComponent(e.name) + "=" + encodeURIComponent(n));
});
}
}), t.join("&");
}
});
var h = {}, m = {}, f = function(t) {
return m[t] || (m[t] = {});
}, p = function(t) {
var e = t.uniqueNumber;
return t.removeEvents && t.removeEvents(), t.clearAttributes && t.clearAttributes(), 
null != e && (delete h[e], delete m[e]), t;
}, _ = {
input:"checked",
option:"selected",
textarea:"value"
};
Element.implement({
destroy:function() {
var t = p(this).getElementsByTagName("*");
return Array.each(t, p), Element.dispose(this), null;
},
empty:function() {
return Array.from(this.childNodes).each(Element.dispose), this;
},
dispose:function() {
return this.parentNode ? this.parentNode.removeChild(this) :this;
},
clone:function(t, e) {
t = t !== !1;
var n, i = this.cloneNode(t), r = [ i ], s = [ this ];
for (t && (r.append(Array.from(i.getElementsByTagName("*"))), s.append(Array.from(this.getElementsByTagName("*")))), 
n = r.length; n--; ) {
var a = r[n], o = s[n];
if (e || a.removeAttribute("id"), a.clearAttributes && (a.clearAttributes(), a.mergeAttributes(o), 
a.removeAttribute("uniqueNumber"), a.options)) for (var u = a.options, l = o.options, c = u.length; c--; ) u[c].selected = l[c].selected;
var d = _[o.tagName.toLowerCase()];
d && o[d] && (a[d] = o[d]);
}
if (Browser.ie) {
var h = i.getElementsByTagName("object"), m = this.getElementsByTagName("object");
for (n = h.length; n--; ) h[n].outerHTML = m[n].outerHTML;
}
return document.id(i);
}
}), [ Element, Window, Document ].invoke("implement", {
addListener:function(t, e) {
if ("unload" == t) {
var n = e, i = this;
e = function() {
i.removeListener("unload", e), n();
};
} else h[Slick.uidOf(this)] = this;
return this.addEventListener ? this.addEventListener(t, e, !!arguments[2]) :this.attachEvent("on" + t, e), 
this;
},
removeListener:function(t, e) {
return this.removeEventListener ? this.removeEventListener(t, e, !!arguments[2]) :this.detachEvent("on" + t, e), 
this;
},
retrieve:function(t, e) {
var n = f(Slick.uidOf(this)), i = n[t];
return null != e && null == i && (i = n[t] = e), null != i ? i :null;
},
store:function(t, e) {
var n = f(Slick.uidOf(this));
return n[t] = e, this;
},
eliminate:function(t) {
var e = f(Slick.uidOf(this));
return delete e[t], this;
}
}), window.attachEvent && !window.addEventListener && window.addListener("unload", function() {
Object.each(h, p), window.CollectGarbage && CollectGarbage();
}), Element.Properties = {}, Element.Properties = new Hash(), Element.Properties.style = {
set:function(t) {
this.style.cssText = t;
},
get:function() {
return this.style.cssText;
},
erase:function() {
this.style.cssText = "";
}
}, Element.Properties.tag = {
get:function() {
return this.tagName.toLowerCase();
}
}, Element.Properties.html = {
set:function(t) {
null == t ? t = "" :"array" == typeOf(t) && (t = t.join("")), this.innerHTML = t;
},
erase:function() {
this.innerHTML = "";
}
};
var g = document.createElement("div");
g.innerHTML = "<nav></nav>";
var y = 1 == g.childNodes.length;
if (!y) for (var v = "abbr article aside audio canvas datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video".split(" "), M = document.createDocumentFragment(), b = v.length; b--; ) M.createElement(v[b]);
g = null;
var L = Function.attempt(function() {
var t = document.createElement("table");
return t.innerHTML = "<tr><td></td></tr>", !0;
}), w = document.createElement("tr"), k = "<td></td>";
w.innerHTML = k;
var Y = w.innerHTML == k;
w = null, L && Y && y || (Element.Properties.html.set = function(t) {
var e = {
table:[ 1, "<table>", "</table>" ],
select:[ 1, "<select>", "</select>" ],
tbody:[ 2, "<table><tbody>", "</tbody></table>" ],
tr:[ 3, "<table><tbody><tr>", "</tr></tbody></table>" ]
};
return e.thead = e.tfoot = e.tbody, function(n) {
var i = e[this.get("tag")];
if (i || y || (i = [ 0, "", "" ]), !i) return t.call(this, n);
var r = i[0], s = document.createElement("div"), a = s;
for (y || M.appendChild(s), s.innerHTML = [ i[1], n, i[2] ].flatten().join(""); r--; ) a = a.firstChild;
this.empty().adopt(a.childNodes), y || M.removeChild(s), s = null;
};
}(Element.Properties.html.set));
var T = document.createElement("form");
T.innerHTML = "<select><option>s</option></select>", "s" != T.firstChild.value && (Element.Properties.value = {
set:function(t) {
var e = this.get("tag");
if ("select" != e) return this.setProperty("value", t);
for (var n = this.getElements("option"), i = 0; i < n.length; i++) {
var r = n[i], s = r.getAttributeNode("value"), a = s && s.specified ? r.value :r.get("text");
if (a == t) return r.selected = !0;
}
},
get:function() {
var t = this, e = t.get("tag");
if ("select" != e && "option" != e) return this.getProperty("value");
if ("select" == e && !(t = t.getSelected()[0])) return "";
var n = t.getAttributeNode("value");
return n && n.specified ? t.value :t.get("text");
}
}), T = null, document.createElement("div").getAttributeNode("id") && (Element.Properties.id = {
set:function(t) {
this.id = this.getAttributeNode("id").value = t;
},
get:function() {
return this.id || null;
},
erase:function() {
this.id = this.getAttributeNode("id").value = "";
}
});
}(), function() {
var t = document.html, e = document.createElement("div");
e.style.color = "red", e.style.color = null;
var n = "red" == e.style.color;
e = null, Element.Properties.styles = {
set:function(t) {
this.setStyles(t);
}
};
var i = null != t.style.opacity, r = null != t.style.filter, s = /alpha\(opacity=([\d.]+)\)/i, a = function(t, e) {
t.store("$opacity", e), t.style.visibility = e > 0 || null == e ? "visible" :"hidden";
}, o = i ? function(t, e) {
t.style.opacity = e;
} :r ? function(t, e) {
var n = t.style;
t.currentStyle && t.currentStyle.hasLayout || (n.zoom = 1), e = null == e || 1 == e ? "" :"alpha(opacity=" + (100 * e).limit(0, 100).round() + ")";
var i = n.filter || t.getComputedStyle("filter") || "";
n.filter = s.test(i) ? i.replace(s, e) :i + e, n.filter || n.removeAttribute("filter");
} :a, u = i ? function(t) {
var e = t.style.opacity || t.getComputedStyle("opacity");
return "" == e ? 1 :e.toFloat();
} :r ? function(t) {
var e, n = t.style.filter || t.getComputedStyle("filter");
return n && (e = n.match(s)), null == e || null == n ? 1 :e[1] / 100;
} :function(t) {
var e = t.retrieve("$opacity");
return null == e && (e = "hidden" == t.style.visibility ? 0 :1), e;
}, l = null == t.style.cssFloat ? "styleFloat" :"cssFloat";
Element.implement({
getComputedStyle:function(t) {
if (this.currentStyle) return this.currentStyle[t.camelCase()];
var e = Element.getDocument(this).defaultView, n = e ? e.getComputedStyle(this, null) :null;
return n ? n.getPropertyValue(t == l ? "float" :t.hyphenate()) :null;
},
setStyle:function(t, e) {
if ("opacity" == t) return null != e && (e = parseFloat(e)), o(this, e), this;
if (t = ("float" == t ? l :t).camelCase(), "string" != typeOf(e)) {
var i = (Element.Styles[t] || "@").split(" ");
e = Array.from(e).map(function(t, e) {
return i[e] ? "number" == typeOf(t) ? i[e].replace("@", Math.round(t)) :t :"";
}).join(" ");
} else e == String(Number(e)) && (e = Math.round(e));
return this.style[t] = e, ("" == e || null == e) && n && this.style.removeAttribute && this.style.removeAttribute(t), 
this;
},
getStyle:function(t) {
if ("opacity" == t) return u(this);
t = ("float" == t ? l :t).camelCase();
var e = this.style[t];
if (!e || "zIndex" == t) {
e = [];
for (var n in Element.ShortStyles) if (t == n) {
for (var i in Element.ShortStyles[n]) e.push(this.getStyle(i));
return e.join(" ");
}
e = this.getComputedStyle(t);
}
if (e) {
e = String(e);
var r = e.match(/rgba?\([\d\s,]+\)/);
r && (e = e.replace(r[0], r[0].rgbToHex()));
}
if (Browser.opera || Browser.ie) {
if (/^(height|width)$/.test(t) && !/px$/.test(e)) {
var s = "width" == t ? [ "left", "right" ] :[ "top", "bottom" ], a = 0;
return s.each(function(t) {
a += this.getStyle("border-" + t + "-width").toInt() + this.getStyle("padding-" + t).toInt();
}, this), this["offset" + t.capitalize()] - a + "px";
}
if (Browser.ie && /^border(.+)Width|margin|padding/.test(t) && isNaN(parseFloat(e))) return "0px";
}
return e;
},
setStyles:function(t) {
for (var e in t) this.setStyle(e, t[e]);
return this;
},
getStyles:function() {
var t = {};
return Array.flatten(arguments).each(function(e) {
t[e] = this.getStyle(e);
}, this), t;
}
}), Element.Styles = {
left:"@px",
top:"@px",
bottom:"@px",
right:"@px",
width:"@px",
height:"@px",
maxWidth:"@px",
maxHeight:"@px",
minWidth:"@px",
minHeight:"@px",
backgroundColor:"rgb(@, @, @)",
backgroundPosition:"@px @px",
color:"rgb(@, @, @)",
fontSize:"@px",
letterSpacing:"@px",
lineHeight:"@px",
clip:"rect(@px @px @px @px)",
margin:"@px @px @px @px",
padding:"@px @px @px @px",
border:"@px @ rgb(@, @, @) @px @ rgb(@, @, @) @px @ rgb(@, @, @)",
borderWidth:"@px @px @px @px",
borderStyle:"@ @ @ @",
borderColor:"rgb(@, @, @) rgb(@, @, @) rgb(@, @, @) rgb(@, @, @)",
zIndex:"@",
zoom:"@",
fontWeight:"@",
textIndent:"@px",
opacity:"@"
}, Element.implement({
setOpacity:function(t) {
return o(this, t), this;
},
getOpacity:function() {
return u(this);
}
}), Element.Properties.opacity = {
set:function(t) {
o(this, t), a(this, t);
},
get:function() {
return u(this);
}
}, Element.Styles = new Hash(Element.Styles), Element.ShortStyles = {
margin:{},
padding:{},
border:{},
borderWidth:{},
borderStyle:{},
borderColor:{}
}, [ "Top", "Right", "Bottom", "Left" ].each(function(t) {
var e = Element.ShortStyles, n = Element.Styles;
[ "margin", "padding" ].each(function(i) {
var r = i + t;
e[i][r] = n[r] = "@px";
});
var i = "border" + t;
e.border[i] = n[i] = "@px @ rgb(@, @, @)";
var r = i + "Width", s = i + "Style", a = i + "Color";
e[i] = {}, e.borderWidth[r] = e[i][r] = n[r] = "@px", e.borderStyle[s] = e[i][s] = n[s] = "@", 
e.borderColor[a] = e[i][a] = n[a] = "rgb(@, @, @)";
});
}(), function() {
if (Element.Properties.events = {
set:function(t) {
this.addEvents(t);
}
}, [ Element, Window, Document ].invoke("implement", {
addEvent:function(t, e) {
var n = this.retrieve("events", {});
if (n[t] || (n[t] = {
keys:[],
values:[]
}), n[t].keys.contains(e)) return this;
n[t].keys.push(e);
var i = t, r = Element.Events[t], s = e, a = this;
r && (r.onAdd && r.onAdd.call(this, e, t), r.condition && (s = function(n) {
return r.condition.call(this, n, t) ? e.call(this, n) :!0;
}), r.base && (i = Function.from(r.base).call(this, t)));
var o = function() {
return e.call(a);
}, u = Element.NativeEvents[i];
return u && (2 == u && (o = function(t) {
t = new DOMEvent(t, a.getWindow()), s.call(a, t) === !1 && t.stop();
}), this.addListener(i, o, arguments[2])), n[t].values.push(o), this;
},
removeEvent:function(t, e) {
var n = this.retrieve("events");
if (!n || !n[t]) return this;
var i = n[t], r = i.keys.indexOf(e);
if (-1 == r) return this;
var s = i.values[r];
delete i.keys[r], delete i.values[r];
var a = Element.Events[t];
return a && (a.onRemove && a.onRemove.call(this, e, t), a.base && (t = Function.from(a.base).call(this, t))), 
Element.NativeEvents[t] ? this.removeListener(t, s, arguments[2]) :this;
},
addEvents:function(t) {
for (var e in t) this.addEvent(e, t[e]);
return this;
},
removeEvents:function(t) {
var e;
if ("object" == typeOf(t)) {
for (e in t) this.removeEvent(e, t[e]);
return this;
}
var n = this.retrieve("events");
if (!n) return this;
if (t) n[t] && (n[t].keys.each(function(e) {
this.removeEvent(t, e);
}, this), delete n[t]); else {
for (e in n) this.removeEvents(e);
this.eliminate("events");
}
return this;
},
fireEvent:function(t, e, n) {
var i = this.retrieve("events");
return i && i[t] ? (e = Array.from(e), i[t].keys.each(function(t) {
n ? t.delay(n, this, e) :t.apply(this, e);
}, this), this) :this;
},
cloneEvents:function(t, e) {
t = document.id(t);
var n = t.retrieve("events");
if (!n) return this;
if (e) n[e] && n[e].keys.each(function(t) {
this.addEvent(e, t);
}, this); else for (var i in n) this.cloneEvents(t, i);
return this;
}
}), Element.NativeEvents = {
click:2,
dblclick:2,
mouseup:2,
mousedown:2,
contextmenu:2,
mousewheel:2,
DOMMouseScroll:2,
mouseover:2,
mouseout:2,
mousemove:2,
selectstart:2,
selectend:2,
keydown:2,
keypress:2,
keyup:2,
orientationchange:2,
touchstart:2,
touchmove:2,
touchend:2,
touchcancel:2,
gesturestart:2,
gesturechange:2,
gestureend:2,
focus:2,
blur:2,
change:2,
reset:2,
select:2,
submit:2,
paste:2,
input:2,
load:2,
unload:1,
beforeunload:2,
resize:1,
move:1,
DOMContentLoaded:1,
readystatechange:1,
error:1,
abort:1,
scroll:1
}, Element.Events = {
mousewheel:{
base:Browser.firefox ? "DOMMouseScroll" :"mousewheel"
}
}, "onmouseenter" in document.documentElement) Element.NativeEvents.mouseenter = Element.NativeEvents.mouseleave = 2; else {
var t = function(t) {
var e = t.relatedTarget;
return null == e ? !0 :e ? e != this && "xul" != e.prefix && "document" != typeOf(this) && !this.contains(e) :!1;
};
Element.Events.mouseenter = {
base:"mouseover",
condition:t
}, Element.Events.mouseleave = {
base:"mouseout",
condition:t
};
}
window.addEventListener || (Element.NativeEvents.propertychange = 2, Element.Events.change = {
base:function() {
var t = this.type;
return "input" != this.get("tag") || "radio" != t && "checkbox" != t ? "change" :"propertychange";
},
condition:function(t) {
return "radio" != this.type || "checked" == t.event.propertyName && this.checked;
}
}), Element.Events = new Hash(Element.Events);
}(), function() {
var t = !!window.addEventListener;
Element.NativeEvents.focusin = Element.NativeEvents.focusout = 2;
var e = function(t, e, n, i, r) {
for (;r && r != t; ) {
if (e(r, i)) return n.call(r, i, r);
r = document.id(r.parentNode);
}
}, n = {
mouseenter:{
base:"mouseover"
},
mouseleave:{
base:"mouseout"
},
focus:{
base:"focus" + (t ? "" :"in"),
capture:!0
},
blur:{
base:t ? "blur" :"focusout",
capture:!0
}
}, i = "$delegation:", r = function(t) {
return {
base:"focusin",
remove:function(e, n) {
var r = e.retrieve(i + t + "listeners", {})[n];
if (r && r.forms) for (var s = r.forms.length; s--; ) r.forms[s].removeEvent(t, r.fns[s]);
},
listen:function(n, r, s, a, o, u) {
var l = "form" == o.get("tag") ? o :a.target.getParent("form");
if (l) {
var c = n.retrieve(i + t + "listeners", {}), d = c[u] || {
forms:[],
fns:[]
}, h = d.forms, m = d.fns;
if (-1 == h.indexOf(l)) {
h.push(l);
var f = function(t) {
e(n, r, s, t, o);
};
l.addEvent(t, f), m.push(f), c[u] = d, n.store(i + t + "listeners", c);
}
}
}
};
}, s = function(t) {
return {
base:"focusin",
listen:function(n, i, r, s, a) {
var o = {
blur:function() {
this.removeEvents(o);
}
};
o[t] = function(t) {
e(n, i, r, t, a);
}, s.target.addEvents(o);
}
};
};
t || Object.append(n, {
submit:r("submit"),
reset:r("reset"),
change:s("change"),
select:s("select")
});
var a = Element.prototype, o = a.addEvent, u = a.removeEvent, l = function(t, e) {
return function(n, i, r) {
if (-1 == n.indexOf(":relay")) return t.call(this, n, i, r);
var s = Slick.parse(n).expressions[0][0];
if ("relay" != s.pseudos[0].key) return t.call(this, n, i, r);
var a = s.tag;
return s.pseudos.slice(1).each(function(t) {
a += ":" + t.key + (t.value ? "(" + t.value + ")" :"");
}), t.call(this, n, i), e.call(this, a, s.pseudos[0].value, i);
};
}, c = {
addEvent:function(t, i, r) {
var s = this.retrieve("$delegates", {}), a = s[t];
if (a) for (var u in a) if (a[u].fn == r && a[u].match == i) return this;
var l = t, c = i, d = r, h = n[t] || {};
t = h.base || l, i = function(t) {
return Slick.match(t, c);
};
var m = Element.Events[l];
if (m && m.condition) {
var f = i, p = m.condition;
i = function(e, n) {
return f(e, n) && p.call(e, n, t);
};
}
var _ = this, g = String.uniqueID(), y = h.listen ? function(t, e) {
!e && t && t.target && (e = t.target), e && h.listen(_, i, r, t, e, g);
} :function(t, n) {
!n && t && t.target && (n = t.target), n && e(_, i, r, t, n);
};
return a || (a = {}), a[g] = {
match:c,
fn:d,
delegator:y
}, s[l] = a, o.call(this, t, y, h.capture);
},
removeEvent:function(t, e, i, r) {
var s = this.retrieve("$delegates", {}), a = s[t];
if (!a) return this;
if (r) {
var o = t, l = a[r].delegator, d = n[t] || {};
return t = d.base || o, d.remove && d.remove(this, r), delete a[r], s[o] = a, u.call(this, t, l);
}
var h, m;
if (i) {
for (h in a) if (m = a[h], m.match == e && m.fn == i) return c.removeEvent.call(this, t, e, i, h);
} else for (h in a) m = a[h], m.match == e && c.removeEvent.call(this, t, e, m.fn, h);
return this;
}
};
[ Element, Window, Document ].invoke("implement", {
addEvent:l(o, c.addEvent),
removeEvent:l(u, c.removeEvent)
});
}(), function() {
function t(t, e) {
return d(t, e).toInt() || 0;
}
function e(t) {
return "border-box" == d(t, "-moz-box-sizing");
}
function n(e) {
return t(e, "border-top-width");
}
function i(e) {
return t(e, "border-left-width");
}
function r(t) {
return /^(?:body|html)$/i.test(t.tagName);
}
function s(t) {
var e = t.getDocument();
return e.compatMode && "CSS1Compat" != e.compatMode ? e.body :e.html;
}
var a = document.createElement("div"), o = document.createElement("div");
a.style.height = "0", a.appendChild(o);
var u = o.offsetParent === a;
a = o = null;
var l = function(t) {
return "static" != d(t, "position") || r(t);
}, c = function(t) {
return l(t) || /^(?:table|td|th)$/i.test(t.tagName);
};
Element.implement({
scrollTo:function(t, e) {
return r(this) ? this.getWindow().scrollTo(t, e) :(this.scrollLeft = t, this.scrollTop = e), 
this;
},
getSize:function() {
return r(this) ? this.getWindow().getSize() :{
x:this.offsetWidth,
y:this.offsetHeight
};
},
getScrollSize:function() {
return r(this) ? this.getWindow().getScrollSize() :{
x:this.scrollWidth,
y:this.scrollHeight
};
},
getScroll:function() {
return r(this) ? this.getWindow().getScroll() :{
x:this.scrollLeft,
y:this.scrollTop
};
},
getScrolls:function() {
for (var t = this.parentNode, e = {
x:0,
y:0
}; t && !r(t); ) e.x += t.scrollLeft, e.y += t.scrollTop, t = t.parentNode;
return e;
},
getOffsetParent:u ? function() {
var t = this;
if (r(t) || "fixed" == d(t, "position")) return null;
for (var e = "static" == d(t, "position") ? c :l; t = t.parentNode; ) if (e(t)) return t;
return null;
} :function() {
var t = this;
if (r(t) || "fixed" == d(t, "position")) return null;
try {
return t.offsetParent;
} catch (e) {}
return null;
},
getOffsets:function() {
if (this.getBoundingClientRect && !Browser.Platform.ios) {
var t = this.getBoundingClientRect(), s = document.id(this.getDocument().documentElement), a = s.getScroll(), o = this.getScrolls(), u = "fixed" == d(this, "position");
return {
x:t.left.toInt() + o.x + (u ? 0 :a.x) - s.clientLeft,
y:t.top.toInt() + o.y + (u ? 0 :a.y) - s.clientTop
};
}
var l = this, c = {
x:0,
y:0
};
if (r(this)) return c;
for (;l && !r(l); ) {
if (c.x += l.offsetLeft, c.y += l.offsetTop, Browser.firefox) {
e(l) || (c.x += i(l), c.y += n(l));
var h = l.parentNode;
h && "visible" != d(h, "overflow") && (c.x += i(h), c.y += n(h));
} else l != this && Browser.safari && (c.x += i(l), c.y += n(l));
l = l.offsetParent;
}
return Browser.firefox && !e(this) && (c.x -= i(this), c.y -= n(this)), c;
},
getPosition:function(t) {
var e = this.getOffsets(), r = this.getScrolls(), s = {
x:e.x - r.x,
y:e.y - r.y
};
if (t && (t = document.id(t))) {
var a = t.getPosition();
return {
x:s.x - a.x - i(t),
y:s.y - a.y - n(t)
};
}
return s;
},
getCoordinates:function(t) {
if (r(this)) return this.getWindow().getCoordinates();
var e = this.getPosition(t), n = this.getSize(), i = {
left:e.x,
top:e.y,
width:n.x,
height:n.y
};
return i.right = i.left + i.width, i.bottom = i.top + i.height, i;
},
computePosition:function(e) {
return {
left:e.x - t(this, "margin-left"),
top:e.y - t(this, "margin-top")
};
},
setPosition:function(t) {
return this.setStyles(this.computePosition(t));
}
}), [ Document, Window ].invoke("implement", {
getSize:function() {
var t = s(this);
return {
x:t.clientWidth,
y:t.clientHeight
};
},
getScroll:function() {
var t = this.getWindow(), e = s(this);
return {
x:t.pageXOffset || e.scrollLeft,
y:t.pageYOffset || e.scrollTop
};
},
getScrollSize:function() {
var t = s(this), e = this.getSize(), n = this.getDocument().body;
return {
x:Math.max(t.scrollWidth, n.scrollWidth, e.x),
y:Math.max(t.scrollHeight, n.scrollHeight, e.y)
};
},
getPosition:function() {
return {
x:0,
y:0
};
},
getCoordinates:function() {
var t = this.getSize();
return {
top:0,
left:0,
bottom:t.y,
right:t.x,
height:t.y,
width:t.x
};
}
});
var d = Element.getComputedStyle;
}(), Element.alias({
position:"setPosition"
}), [ Window, Document, Element ].invoke("implement", {
getHeight:function() {
return this.getSize().y;
},
getWidth:function() {
return this.getSize().x;
},
getScrollTop:function() {
return this.getScroll().y;
},
getScrollLeft:function() {
return this.getScroll().x;
},
getScrollHeight:function() {
return this.getScrollSize().y;
},
getScrollWidth:function() {
return this.getScrollSize().x;
},
getTop:function() {
return this.getPosition().y;
},
getLeft:function() {
return this.getPosition().x;
}
}), function() {
var t = this.Fx = new Class({
Implements:[ Chain, Events, Options ],
options:{
fps:60,
unit:!1,
duration:500,
frames:null,
frameSkip:!0,
link:"ignore"
},
initialize:function(t) {
this.subject = this.subject || this, this.setOptions(t);
},
getTransition:function() {
return function(t) {
return -(Math.cos(Math.PI * t) - 1) / 2;
};
},
step:function(t) {
if (this.options.frameSkip) {
var e = null != this.time ? t - this.time :0, n = e / this.frameInterval;
this.time = t, this.frame += n;
} else this.frame++;
if (this.frame < this.frames) {
var i = this.transition(this.frame / this.frames);
this.set(this.compute(this.from, this.to, i));
} else this.frame = this.frames, this.set(this.compute(this.from, this.to, 1)), 
this.stop();
},
set:function(t) {
return t;
},
compute:function(e, n, i) {
return t.compute(e, n, i);
},
check:function() {
if (!this.isRunning()) return !0;
switch (this.options.link) {
case "cancel":
return this.cancel(), !0;

case "chain":
return this.chain(this.caller.pass(arguments, this)), !1;
}
return !1;
},
start:function(e, n) {
if (!this.check(e, n)) return this;
this.from = e, this.to = n, this.frame = this.options.frameSkip ? 0 :-1, this.time = null, 
this.transition = this.getTransition();
var i = this.options.frames, s = this.options.fps, a = this.options.duration;
return this.duration = t.Durations[a] || a.toInt(), this.frameInterval = 1e3 / s, 
this.frames = i || Math.round(this.duration / this.frameInterval), this.fireEvent("start", this.subject), 
r.call(this, s), this;
},
stop:function() {
return this.isRunning() && (this.time = null, s.call(this, this.options.fps), this.frames == this.frame ? (this.fireEvent("complete", this.subject), 
this.callChain() || this.fireEvent("chainComplete", this.subject)) :this.fireEvent("stop", this.subject)), 
this;
},
cancel:function() {
return this.isRunning() && (this.time = null, s.call(this, this.options.fps), this.frame = this.frames, 
this.fireEvent("cancel", this.subject).clearChain()), this;
},
pause:function() {
return this.isRunning() && (this.time = null, s.call(this, this.options.fps)), this;
},
resume:function() {
return this.frame < this.frames && !this.isRunning() && r.call(this, this.options.fps), 
this;
},
isRunning:function() {
var t = e[this.options.fps];
return t && t.contains(this);
}
});
t.compute = function(t, e, n) {
return (e - t) * n + t;
}, t.Durations = {
"short":250,
normal:500,
"long":1e3
};
var e = {}, n = {}, i = function() {
for (var t = Date.now(), e = this.length; e--; ) {
var n = this[e];
n && n.step(t);
}
}, r = function(t) {
var r = e[t] || (e[t] = []);
r.push(this), n[t] || (n[t] = i.periodical(Math.round(1e3 / t), r));
}, s = function(t) {
var i = e[t];
i && (i.erase(this), !i.length && n[t] && (delete e[t], n[t] = clearInterval(n[t])));
};
}(), Fx.CSS = new Class({
Extends:Fx,
prepare:function(t, e, n) {
n = Array.from(n);
var i = n[0], r = n[1];
if (null == r) {
r = i, i = t.getStyle(e);
var s = this.options.unit;
if (s && i.slice(-s.length) != s && 0 != parseFloat(i)) {
t.setStyle(e, r + s);
var a = t.getComputedStyle(e);
if (!/px$/.test(a) && (a = t.style[("pixel-" + e).camelCase()], null == a)) {
var o = t.style.left;
t.style.left = r + s, a = t.style.pixelLeft, t.style.left = o;
}
i = (r || 1) / (parseFloat(a) || 1) * (parseFloat(i) || 0), t.setStyle(e, i + s);
}
}
return {
from:this.parse(i),
to:this.parse(r)
};
},
parse:function(t) {
return t = Function.from(t)(), t = "string" == typeof t ? t.split(" ") :Array.from(t), 
t.map(function(t) {
t = String(t);
var e = !1;
return Object.each(Fx.CSS.Parsers, function(n) {
if (!e) {
var i = n.parse(t);
(i || 0 === i) && (e = {
value:i,
parser:n
});
}
}), e = e || {
value:t,
parser:Fx.CSS.Parsers.String
};
});
},
compute:function(t, e, n) {
var i = [];
return Math.min(t.length, e.length).times(function(r) {
i.push({
value:t[r].parser.compute(t[r].value, e[r].value, n),
parser:t[r].parser
});
}), i.$family = Function.from("fx:css:value"), i;
},
serve:function(t, e) {
"fx:css:value" != typeOf(t) && (t = this.parse(t));
var n = [];
return t.each(function(t) {
n = n.concat(t.parser.serve(t.value, e));
}), n;
},
render:function(t, e, n, i) {
t.setStyle(e, this.serve(n, i));
},
search:function(t) {
if (Fx.CSS.Cache[t]) return Fx.CSS.Cache[t];
var e = {}, n = new RegExp("^" + t.escapeRegExp() + "$");
return Array.each(document.styleSheets, function(t) {
var i = t.href;
if (!i || !i.contains("://") || i.contains(document.domain)) {
var r = t.rules || t.cssRules;
Array.each(r, function(t) {
if (t.style) {
var i = t.selectorText ? t.selectorText.replace(/^\w+/, function(t) {
return t.toLowerCase();
}) :null;
i && n.test(i) && Object.each(Element.Styles, function(n, i) {
t.style[i] && !Element.ShortStyles[i] && (n = String(t.style[i]), e[i] = /^rgb/.test(n) ? n.rgbToHex() :n);
});
}
});
}
}), Fx.CSS.Cache[t] = e;
}
}), Fx.CSS.Cache = {}, Fx.CSS.Parsers = {
Color:{
parse:function(t) {
return t.match(/^#[0-9a-f]{3,6}$/i) ? t.hexToRgb(!0) :(t = t.match(/(\d+),\s*(\d+),\s*(\d+)/)) ? [ t[1], t[2], t[3] ] :!1;
},
compute:function(t, e, n) {
return t.map(function(i, r) {
return Math.round(Fx.compute(t[r], e[r], n));
});
},
serve:function(t) {
return t.map(Number);
}
},
Number:{
parse:parseFloat,
compute:Fx.compute,
serve:function(t, e) {
return e ? t + e :t;
}
},
String:{
parse:Function.from(!1),
compute:function(t, e) {
return e;
},
serve:function(t) {
return t;
}
}
}, Fx.CSS.Parsers = new Hash(Fx.CSS.Parsers), Fx.Tween = new Class({
Extends:Fx.CSS,
initialize:function(t, e) {
this.element = this.subject = document.id(t), this.parent(e);
},
set:function(t, e) {
return 1 == arguments.length && (e = t, t = this.property || this.options.property), 
this.render(this.element, t, e, this.options.unit), this;
},
start:function(t, e, n) {
if (!this.check(t, e, n)) return this;
var i = Array.flatten(arguments);
this.property = this.options.property || i.shift();
var r = this.prepare(this.element, this.property, i);
return this.parent(r.from, r.to);
}
}), Element.Properties.tween = {
set:function(t) {
return this.get("tween").cancel().setOptions(t), this;
},
get:function() {
var t = this.retrieve("tween");
return t || (t = new Fx.Tween(this, {
link:"cancel"
}), this.store("tween", t)), t;
}
}, Element.implement({
tween:function(t, e, n) {
return this.get("tween").start(t, e, n), this;
},
fade:function() {
var t, e, n = this.get("tween"), i = [ "opacity" ].append(arguments);
switch (null == i[1] && (i[1] = "toggle"), i[1]) {
case "in":
t = "start", i[1] = 1;
break;

case "out":
t = "start", i[1] = 0;
break;

case "show":
t = "set", i[1] = 1;
break;

case "hide":
t = "set", i[1] = 0;
break;

case "toggle":
var r = this.retrieve("fade:flag", 1 == this.getStyle("opacity"));
t = "start", i[1] = r ? 0 :1, this.store("fade:flag", !r), e = !0;
break;

default:
t = "start";
}
e || this.eliminate("fade:flag"), n[t].apply(n, i);
var s = i[i.length - 1];
return "set" == t || 0 != s ? this.setStyle("visibility", 0 == s ? "hidden" :"visible") :n.chain(function() {
this.element.setStyle("visibility", "hidden"), this.callChain();
}), this;
},
highlight:function(t, e) {
e || (e = this.retrieve("highlight:original", this.getStyle("background-color")), 
e = "transparent" == e ? "#fff" :e);
var n = this.get("tween");
return n.start("background-color", t || "#ffff88", e).chain(function() {
this.setStyle("background-color", this.retrieve("highlight:original")), n.callChain();
}.bind(this)), this;
}
}), Fx.Morph = new Class({
Extends:Fx.CSS,
initialize:function(t, e) {
this.element = this.subject = document.id(t), this.parent(e);
},
set:function(t) {
"string" == typeof t && (t = this.search(t));
for (var e in t) this.render(this.element, e, t[e], this.options.unit);
return this;
},
compute:function(t, e, n) {
var i = {};
for (var r in t) i[r] = this.parent(t[r], e[r], n);
return i;
},
start:function(t) {
if (!this.check(t)) return this;
"string" == typeof t && (t = this.search(t));
var e = {}, n = {};
for (var i in t) {
var r = this.prepare(this.element, i, t[i]);
e[i] = r.from, n[i] = r.to;
}
return this.parent(e, n);
}
}), Element.Properties.morph = {
set:function(t) {
return this.get("morph").cancel().setOptions(t), this;
},
get:function() {
var t = this.retrieve("morph");
return t || (t = new Fx.Morph(this, {
link:"cancel"
}), this.store("morph", t)), t;
}
}, Element.implement({
morph:function(t) {
return this.get("morph").start(t), this;
}
}), Fx.implement({
getTransition:function() {
var t = this.options.transition || Fx.Transitions.Sine.easeInOut;
if ("string" == typeof t) {
var e = t.split(":");
t = Fx.Transitions, t = t[e[0]] || t[e[0].capitalize()], e[1] && (t = t["ease" + e[1].capitalize() + (e[2] ? e[2].capitalize() :"")]);
}
return t;
}
}), Fx.Transition = function(t, e) {
e = Array.from(e);
var n = function(n) {
return t(n, e);
};
return Object.append(n, {
easeIn:n,
easeOut:function(n) {
return 1 - t(1 - n, e);
},
easeInOut:function(n) {
return (.5 >= n ? t(2 * n, e) :2 - t(2 * (1 - n), e)) / 2;
}
});
}, Fx.Transitions = {
linear:function(t) {
return t;
}
}, Fx.Transitions = new Hash(Fx.Transitions), Fx.Transitions.extend = function(t) {
for (var e in t) Fx.Transitions[e] = new Fx.Transition(t[e]);
}, Fx.Transitions.extend({
Pow:function(t, e) {
return Math.pow(t, e && e[0] || 6);
},
Expo:function(t) {
return Math.pow(2, 8 * (t - 1));
},
Circ:function(t) {
return 1 - Math.sin(Math.acos(t));
},
Sine:function(t) {
return 1 - Math.cos(t * Math.PI / 2);
},
Back:function(t, e) {
return e = e && e[0] || 1.618, Math.pow(t, 2) * ((e + 1) * t - e);
},
Bounce:function(t) {
for (var e, n = 0, i = 1; 1; n += i, i /= 2) if (t >= (7 - 4 * n) / 11) {
e = i * i - Math.pow((11 - 6 * n - 11 * t) / 4, 2);
break;
}
return e;
},
Elastic:function(t, e) {
return Math.pow(2, 10 * --t) * Math.cos(20 * t * Math.PI * (e && e[0] || 1) / 3);
}
}), [ "Quad", "Cubic", "Quart", "Quint" ].each(function(t, e) {
Fx.Transitions[t] = new Fx.Transition(function(t) {
return Math.pow(t, e + 2);
});
}), function() {
var t = function() {}, e = "onprogress" in new Browser.Request(), n = this.Request = new Class({
Implements:[ Chain, Events, Options ],
options:{
url:"",
data:"",
headers:{
"X-Requested-With":"XMLHttpRequest",
Accept:"text/javascript, text/html, application/xml, text/xml, */*"
},
async:!0,
format:!1,
method:"post",
link:"ignore",
isSuccess:null,
emulation:!0,
urlEncoded:!0,
encoding:"utf-8",
evalScripts:!1,
evalResponse:!1,
timeout:0,
noCache:!1
},
initialize:function(t) {
this.xhr = new Browser.Request(), this.setOptions(t), this.headers = this.options.headers;
},
onStateChange:function() {
var n = this.xhr;
4 == n.readyState && this.running && (this.running = !1, this.status = 0, Function.attempt(function() {
var t = n.status;
this.status = 1223 == t ? 204 :t;
}.bind(this)), n.onreadystatechange = t, e && (n.onprogress = n.onloadstart = t), 
clearTimeout(this.timer), this.response = {
text:this.xhr.responseText || "",
xml:this.xhr.responseXML
}, this.options.isSuccess.call(this, this.status) ? this.success(this.response.text, this.response.xml) :this.failure());
},
isSuccess:function() {
var t = this.status;
return t >= 200 && 300 > t;
},
isRunning:function() {
return !!this.running;
},
processScripts:function(t) {
return this.options.evalResponse || /(ecma|java)script/.test(this.getHeader("Content-type")) ? Browser.exec(t) :t.stripScripts(this.options.evalScripts);
},
success:function(t, e) {
this.onSuccess(this.processScripts(t), e);
},
onSuccess:function() {
this.fireEvent("complete", arguments).fireEvent("success", arguments).callChain();
},
failure:function() {
this.onFailure();
},
onFailure:function() {
this.fireEvent("complete").fireEvent("failure", this.xhr);
},
loadstart:function(t) {
this.fireEvent("loadstart", [ t, this.xhr ]);
},
progress:function(t) {
this.fireEvent("progress", [ t, this.xhr ]);
},
timeout:function() {
this.fireEvent("timeout", this.xhr);
},
setHeader:function(t, e) {
return this.headers[t] = e, this;
},
getHeader:function(t) {
return Function.attempt(function() {
return this.xhr.getResponseHeader(t);
}.bind(this));
},
check:function() {
if (!this.running) return !0;
switch (this.options.link) {
case "cancel":
return this.cancel(), !0;

case "chain":
return this.chain(this.caller.pass(arguments, this)), !1;
}
return !1;
},
send:function(t) {
if (!this.check(t)) return this;
this.options.isSuccess = this.options.isSuccess || this.isSuccess, this.running = !0;
var n = typeOf(t);
("string" == n || "element" == n) && (t = {
data:t
});
var i = this.options;
t = Object.append({
data:i.data,
url:i.url,
method:i.method
}, t);
var r = t.data, s = String(t.url), a = t.method.toLowerCase();
switch (typeOf(r)) {
case "element":
r = document.id(r).toQueryString();
break;

case "object":
case "hash":
r = Object.toQueryString(r);
}
if (this.options.format) {
var o = "format=" + this.options.format;
r = r ? o + "&" + r :o;
}
if (this.options.emulation && ![ "get", "post" ].contains(a)) {
var u = "_method=" + a;
r = r ? u + "&" + r :u, a = "post";
}
if (this.options.urlEncoded && [ "post", "put" ].contains(a)) {
var l = this.options.encoding ? "; charset=" + this.options.encoding :"";
this.headers["Content-type"] = "application/x-www-form-urlencoded" + l;
}
s || (s = document.location.pathname);
var c = s.lastIndexOf("/");
c > -1 && (c = s.indexOf("#")) > -1 && (s = s.substr(0, c)), this.options.noCache && (s += (s.contains("?") ? "&" :"?") + String.uniqueID()), 
r && "get" == a && (s += (s.contains("?") ? "&" :"?") + r, r = null);
var d = this.xhr;
return e && (d.onloadstart = this.loadstart.bind(this), d.onprogress = this.progress.bind(this)), 
d.open(a.toUpperCase(), s, this.options.async, this.options.user, this.options.password), 
this.options.user && "withCredentials" in d && (d.withCredentials = !0), d.onreadystatechange = this.onStateChange.bind(this), 
Object.each(this.headers, function(t, e) {
try {
d.setRequestHeader(e, t);
} catch (n) {
this.fireEvent("exception", [ e, t ]);
}
}, this), this.fireEvent("request"), d.send(r), this.options.async ? this.options.timeout && (this.timer = this.timeout.delay(this.options.timeout, this)) :this.onStateChange(), 
this;
},
cancel:function() {
if (!this.running) return this;
this.running = !1;
var n = this.xhr;
return n.abort(), clearTimeout(this.timer), n.onreadystatechange = t, e && (n.onprogress = n.onloadstart = t), 
this.xhr = new Browser.Request(), this.fireEvent("cancel"), this;
}
}), i = {};
[ "get", "post", "put", "delete", "GET", "POST", "PUT", "DELETE" ].each(function(t) {
i[t] = function(e) {
var n = {
method:t
};
return null != e && (n.data = e), this.send(n);
};
}), n.implement(i), Element.Properties.send = {
set:function(t) {
var e = this.get("send").cancel();
return e.setOptions(t), this;
},
get:function() {
var t = this.retrieve("send");
return t || (t = new n({
data:this,
link:"cancel",
method:this.get("method") || "post",
url:this.get("action")
}), this.store("send", t)), t;
}
}, Element.implement({
send:function(t) {
var e = this.get("send");
return e.send({
data:this,
url:t || e.options.url
}), this;
}
});
}(), Request.HTML = new Class({
Extends:Request,
options:{
update:!1,
append:!1,
evalScripts:!0,
filter:!1,
headers:{
Accept:"text/html, application/xml, text/xml, */*"
}
},
success:function(t) {
var e = this.options, n = this.response;
n.html = t.stripScripts(function(t) {
n.javascript = t;
});
var i = n.html.match(/<body[^>]*>([\s\S]*?)<\/body>/i);
i && (n.html = i[1]);
var r = new Element("div").set("html", n.html);
if (n.tree = r.childNodes, n.elements = r.getElements(e.filter || "*"), e.filter && (n.tree = n.elements), 
e.update) {
var s = document.id(e.update).empty();
e.filter ? s.adopt(n.elements) :s.set("html", n.html);
} else if (e.append) {
var a = document.id(e.append);
e.filter ? n.elements.reverse().inject(a) :a.adopt(r.getChildren());
}
e.evalScripts && Browser.exec(n.javascript), this.onSuccess(n.tree, n.elements, n.html, n.javascript);
}
}), Element.Properties.load = {
set:function(t) {
var e = this.get("load").cancel();
return e.setOptions(t), this;
},
get:function() {
var t = this.retrieve("load");
return t || (t = new Request.HTML({
data:this,
link:"cancel",
update:this,
method:"get"
}), this.store("load", t)), t;
}
}, Element.implement({
load:function() {
return this.get("load").send(Array.link(arguments, {
data:Type.isObject,
url:Type.isString
})), this;
}
}), "undefined" == typeof JSON && (this.JSON = {}), JSON = new Hash({
stringify:JSON.stringify,
parse:JSON.parse
}), function() {
var special = {
"\b":"\\b",
"	":"\\t",
"\n":"\\n",
"\f":"\\f",
"\r":"\\r",
'"':'\\"',
"\\":"\\\\"
}, escape = function(t) {
return special[t] || "\\u" + ("0000" + t.charCodeAt(0).toString(16)).slice(-4);
};
JSON.validate = function(t) {
return t = t.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, "@").replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, "]").replace(/(?:^|:|,)(?:\s*\[)+/g, ""), 
/^[\],:{}\s]*$/.test(t);
}, JSON.encode = JSON.stringify ? function(t) {
return JSON.stringify(t);
} :function(t) {
switch (t && t.toJSON && (t = t.toJSON()), typeOf(t)) {
case "string":
return '"' + t.replace(/[\x00-\x1f\\"]/g, escape) + '"';

case "array":
return "[" + t.map(JSON.encode).clean() + "]";

case "object":
case "hash":
var e = [];
return Object.each(t, function(t, n) {
var i = JSON.encode(t);
i && e.push(JSON.encode(n) + ":" + i);
}), "{" + e + "}";

case "number":
case "boolean":
return "" + t;

case "null":
return "null";
}
return null;
}, JSON.decode = function(string, secure) {
if (!string || "string" != typeOf(string)) return null;
if (secure || JSON.secure) {
if (JSON.parse) return JSON.parse(string);
if (!JSON.validate(string)) throw new Error("JSON could not decode the input; security is enabled and the value is not secure.");
}
return eval("(" + string + ")");
};
}(), Request.JSON = new Class({
Extends:Request,
options:{
secure:!0
},
initialize:function(t) {
this.parent(t), Object.append(this.headers, {
Accept:"application/json",
"X-Request":"JSON"
});
},
success:function(t) {
var e;
try {
e = this.response.json = JSON.decode(t, this.options.secure);
} catch (n) {
return this.fireEvent("error", [ t, n ]), void 0;
}
null == e ? this.onFailure() :this.onSuccess(e, t);
}
});

var Cookie = new Class({
Implements:Options,
options:{
path:"/",
domain:!1,
duration:!1,
secure:!1,
document:document,
encode:!0
},
initialize:function(t, e) {
this.key = t, this.setOptions(e);
},
write:function(t) {
if (this.options.encode && (t = encodeURIComponent(t)), this.options.domain && (t += "; domain=" + this.options.domain), 
this.options.path && (t += "; path=" + this.options.path), this.options.duration) {
var e = new Date();
e.setTime(e.getTime() + 24 * this.options.duration * 60 * 60 * 1e3), t += "; expires=" + e.toGMTString();
}
return this.options.secure && (t += "; secure"), this.options.document.cookie = this.key + "=" + t, 
this;
},
read:function() {
var t = this.options.document.cookie.match("(?:^|;)\\s*" + this.key.escapeRegExp() + "=([^;]*)");
return t ? decodeURIComponent(t[1]) :null;
},
dispose:function() {
return new Cookie(this.key, Object.merge({}, this.options, {
duration:-1
})).write(""), this;
}
});

Cookie.write = function(t, e, n) {
return new Cookie(t, n).write(e);
}, Cookie.read = function(t) {
return new Cookie(t).read();
}, Cookie.dispose = function(t, e) {
return new Cookie(t, e).dispose();
}, function(t, e) {
var n, i, r, s, a = [], o = e.createElement("div"), u = function() {
clearTimeout(s), n || (Browser.loaded = n = !0, e.removeListener("DOMContentLoaded", u).removeListener("readystatechange", l), 
e.fireEvent("domready"), t.fireEvent("domready"));
}, l = function() {
for (var t = a.length; t--; ) if (a[t]()) return u(), !0;
return !1;
}, c = function() {
clearTimeout(s), l() || (s = setTimeout(c, 10));
};
e.addListener("DOMContentLoaded", u);
var d = function() {
try {
return o.doScroll(), !0;
} catch (t) {}
return !1;
};
o.doScroll && !d() && (a.push(d), r = !0), e.readyState && a.push(function() {
var t = e.readyState;
return "loaded" == t || "complete" == t;
}), "onreadystatechange" in e ? e.addListener("readystatechange", l) :r = !0, r && c(), 
Element.Events.domready = {
onAdd:function(t) {
n && t.call(this);
}
}, Element.Events.load = {
base:"load",
onAdd:function(e) {
i && this == t && e.call(this);
},
condition:function() {
return this == t && (u(), delete Element.Events.load), !0;
}
}, t.addEvent("load", function() {
i = !0;
});
}(window, document), function() {
var Swiff = this.Swiff = new Class({
Implements:Options,
options:{
id:null,
height:1,
width:1,
container:null,
properties:{},
params:{
quality:"high",
allowScriptAccess:"always",
wMode:"window",
swLiveConnect:!0
},
callBacks:{},
vars:{}
},
toElement:function() {
return this.object;
},
initialize:function(t, e) {
this.instance = "Swiff_" + String.uniqueID(), this.setOptions(e), e = this.options;
var n = this.id = e.id || this.instance, i = document.id(e.container);
Swiff.CallBacks[this.instance] = {};
var r = e.params, s = e.vars, a = e.callBacks, o = Object.append({
height:e.height,
width:e.width
}, e.properties), u = this;
for (var l in a) Swiff.CallBacks[this.instance][l] = function(t) {
return function() {
return t.apply(u.object, arguments);
};
}(a[l]), s[l] = "Swiff.CallBacks." + this.instance + "." + l;
r.flashVars = Object.toQueryString(s), Browser.ie ? (o.classid = "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000", 
r.movie = t) :o.type = "application/x-shockwave-flash", o.data = t;
var c = '<object id="' + n + '"';
for (var d in o) c += " " + d + '="' + o[d] + '"';
c += ">";
for (var h in r) r[h] && (c += '<param name="' + h + '" value="' + r[h] + '" />');
c += "</object>", this.object = (i ? i.empty() :new Element("div")).set("html", c).firstChild;
},
replaces:function(t) {
return t = document.id(t, !0), t.parentNode.replaceChild(this.toElement(), t), this;
},
inject:function(t) {
return document.id(t, !0).appendChild(this.toElement()), this;
},
remote:function() {
return Swiff.remote.apply(Swiff, [ this.toElement() ].append(arguments));
}
});
Swiff.CallBacks = {}, Swiff.remote = function(obj, fn) {
var rs = obj.CallFunction('<invoke name="' + fn + '" returntype="javascript">' + __flash__argumentsToXML(arguments, 2) + "</invoke>");
return eval(rs);
};
}(), MooTools.More = {
version:"1.4.0.1",
build:"a4244edf2aa97ac8a196fc96082dd35af1abab87"
}, function() {
var t = {
wait:function(t) {
return this.chain(function() {
return this.callChain.delay(null == t ? 500 :t, this), this;
}.bind(this));
}
};
Chain.implement(t), this.Fx && Fx.implement(t), this.Element && Element.implement && this.Fx && Element.implement({
chains:function(t) {
return Array.from(t || [ "tween", "morph", "reveal" ]).each(function(t) {
t = this.get(t), t && t.setOptions({
link:"chain"
});
}, this), this;
},
pauseFx:function(t, e) {
return this.chains(e).get(e || "tween").wait(t), this;
}
});
}(), function(t) {
Array.implement({
min:function() {
return Math.min.apply(null, this);
},
max:function() {
return Math.max.apply(null, this);
},
average:function() {
return this.length ? this.sum() / this.length :0;
},
sum:function() {
var t = 0, e = this.length;
if (e) for (;e--; ) t += this[e];
return t;
},
unique:function() {
return [].combine(this);
},
shuffle:function() {
for (var t = this.length; t && --t; ) {
var e = this[t], n = Math.floor(Math.random() * (t + 1));
this[t] = this[n], this[n] = e;
}
return this;
},
reduce:function(e, n) {
for (var i = 0, r = this.length; r > i; i++) i in this && (n = n === t ? this[i] :e.call(null, n, this[i], i, this));
return n;
},
reduceRight:function(e, n) {
for (var i = this.length; i--; ) i in this && (n = n === t ? this[i] :e.call(null, n, this[i], i, this));
return n;
}
});
}(), function() {
var t = function(t) {
return null != t;
}, e = Object.prototype.hasOwnProperty;
Object.extend({
getFromPath:function(t, n) {
"string" == typeof n && (n = n.split("."));
for (var i = 0, r = n.length; r > i; i++) {
if (!e.call(t, n[i])) return null;
t = t[n[i]];
}
return t;
},
cleanValues:function(e, n) {
n = n || t;
for (var i in e) n(e[i]) || delete e[i];
return e;
},
erase:function(t, n) {
return e.call(t, n) && delete t[n], t;
},
run:function(t) {
var e = Array.slice(arguments, 1);
for (var n in t) t[n].apply && t[n].apply(t, e);
return t;
}
});
}(), function() {
var t = null, e = {}, n = function(t) {
return instanceOf(t, i.Set) ? t :e[t];
}, i = this.Locale = {
define:function(n, r, s, a) {
var o;
return instanceOf(n, i.Set) ? (o = n.name, o && (e[o] = n)) :(o = n, e[o] || (e[o] = new i.Set(o)), 
n = e[o]), r && n.define(r, s, a), t || (t = n), n;
},
use:function(e) {
return e = n(e), e && (t = e, this.fireEvent("change", e)), this;
},
getCurrent:function() {
return t;
},
get:function(e, n) {
return t ? t.get(e, n) :"";
},
inherit:function(t, e, i) {
return t = n(t), t && t.inherit(e, i), this;
},
list:function() {
return Object.keys(e);
}
};
Object.append(i, new Events()), i.Set = new Class({
sets:{},
inherits:{
locales:[],
sets:{}
},
initialize:function(t) {
this.name = t || "";
},
define:function(t, e, n) {
var i = this.sets[t];
return i || (i = {}), e && ("object" == typeOf(e) ? i = Object.merge(i, e) :i[e] = n), 
this.sets[t] = i, this;
},
get:function(t, n, i) {
var r = Object.getFromPath(this.sets, t);
if (null != r) {
var s = typeOf(r);
return "function" == s ? r = r.apply(null, Array.from(n)) :"object" == s && (r = Object.clone(r)), 
r;
}
var a = t.indexOf("."), o = 0 > a ? t :t.substr(0, a), u = (this.inherits.sets[o] || []).combine(this.inherits.locales).include("en-US");
i || (i = []);
for (var l = 0, c = u.length; c > l; l++) if (!i.contains(u[l])) {
i.include(u[l]);
var d = e[u[l]];
if (d && (r = d.get(t, n, i), null != r)) return r;
}
return "";
},
inherit:function(t, e) {
t = Array.from(t), e && !this.inherits.sets[e] && (this.inherits.sets[e] = []);
for (var n = t.length; n--; ) (e ? this.inherits.sets[e] :this.inherits.locales).unshift(t[n]);
return this;
}
});
}(), Locale.define("en-US", "Date", {
months:[ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ],
months_abbr:[ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ],
days:[ "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday" ],
days_abbr:[ "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat" ],
dateOrder:[ "month", "date", "year" ],
shortDate:"%m/%d/%Y",
shortTime:"%I:%M%p",
AM:"AM",
PM:"PM",
firstDayOfWeek:0,
ordinal:function(t) {
return t > 3 && 21 > t ? "th" :[ "th", "st", "nd", "rd", "th" ][Math.min(t % 10, 4)];
},
lessThanMinuteAgo:"less than a minute ago",
minuteAgo:"about a minute ago",
minutesAgo:"{delta} minutes ago",
hourAgo:"about an hour ago",
hoursAgo:"about {delta} hours ago",
dayAgo:"1 day ago",
daysAgo:"{delta} days ago",
weekAgo:"1 week ago",
weeksAgo:"{delta} weeks ago",
monthAgo:"1 month ago",
monthsAgo:"{delta} months ago",
yearAgo:"1 year ago",
yearsAgo:"{delta} years ago",
lessThanMinuteUntil:"less than a minute from now",
minuteUntil:"about a minute from now",
minutesUntil:"{delta} minutes from now",
hourUntil:"about an hour from now",
hoursUntil:"about {delta} hours from now",
dayUntil:"1 day from now",
daysUntil:"{delta} days from now",
weekUntil:"1 week from now",
weeksUntil:"{delta} weeks from now",
monthUntil:"1 month from now",
monthsUntil:"{delta} months from now",
yearUntil:"1 year from now",
yearsUntil:"{delta} years from now"
}), function() {
var t = this.Date, e = t.Methods = {
ms:"Milliseconds",
year:"FullYear",
min:"Minutes",
mo:"Month",
sec:"Seconds",
hr:"Hours"
};
[ "Date", "Day", "FullYear", "Hours", "Milliseconds", "Minutes", "Month", "Seconds", "Time", "TimezoneOffset", "Week", "Timezone", "GMTOffset", "DayOfYear", "LastMonth", "LastDayOfMonth", "UTCDate", "UTCDay", "UTCFullYear", "AMPM", "Ordinal", "UTCHours", "UTCMilliseconds", "UTCMinutes", "UTCMonth", "UTCSeconds", "UTCMilliseconds" ].each(function(e) {
t.Methods[e.toLowerCase()] = e;
});
var n = function(t, e, i) {
return 1 == e ? t :t < Math.pow(10, e - 1) ? (i || "0") + n(t, e - 1, i) :t;
};
t.implement({
set:function(t, n) {
t = t.toLowerCase();
var i = e[t] && "set" + e[t];
return i && this[i] && this[i](n), this;
}.overloadSetter(),
get:function(t) {
t = t.toLowerCase();
var n = e[t] && "get" + e[t];
return n && this[n] ? this[n]() :null;
}.overloadGetter(),
clone:function() {
return new t(this.get("time"));
},
increment:function(e, n) {
switch (e = e || "day", n = null != n ? n :1, e) {
case "year":
return this.increment("month", 12 * n);

case "month":
var i = this.get("date");
return this.set("date", 1).set("mo", this.get("mo") + n), this.set("date", i.min(this.get("lastdayofmonth")));

case "week":
return this.increment("day", 7 * n);

case "day":
return this.set("date", this.get("date") + n);
}
if (!t.units[e]) throw new Error(e + " is not a supported interval");
return this.set("time", this.get("time") + n * t.units[e]());
},
decrement:function(t, e) {
return this.increment(t, -1 * (null != e ? e :1));
},
isLeapYear:function() {
return t.isLeapYear(this.get("year"));
},
clearTime:function() {
return this.set({
hr:0,
min:0,
sec:0,
ms:0
});
},
diff:function(e, n) {
return "string" == typeOf(e) && (e = t.parse(e)), ((e - this) / t.units[n || "day"](3, 3)).round();
},
getLastDayOfMonth:function() {
return t.daysInMonth(this.get("mo"), this.get("year"));
},
getDayOfYear:function() {
return (t.UTC(this.get("year"), this.get("mo"), this.get("date") + 1) - t.UTC(this.get("year"), 0, 1)) / t.units.day();
},
setDay:function(e, n) {
null == n && (n = t.getMsg("firstDayOfWeek"), "" === n && (n = 1)), e = (7 + t.parseDay(e, !0) - n) % 7;
var i = (7 + this.get("day") - n) % 7;
return this.increment("day", e - i);
},
getWeek:function(e) {
null == e && (e = t.getMsg("firstDayOfWeek"), "" === e && (e = 1));
var n, i = this, r = (7 + i.get("day") - e) % 7, s = 0;
if (1 == e) {
var a = i.get("month"), o = i.get("date") - r;
if (11 == a && o > 28) return 1;
0 == a && -2 > o && (i = new t(i).decrement("day", r), r = 0), n = new t(i.get("year"), 0, 1).get("day") || 7, 
n > 4 && (s = -7);
} else n = new t(i.get("year"), 0, 1).get("day");
return s += i.get("dayofyear"), s += 6 - r, s += (7 + n - e) % 7, s / 7;
},
getOrdinal:function(e) {
return t.getMsg("ordinal", e || this.get("date"));
},
getTimezone:function() {
return this.toString().replace(/^.*? ([A-Z]{3}).[0-9]{4}.*$/, "$1").replace(/^.*?\(([A-Z])[a-z]+ ([A-Z])[a-z]+ ([A-Z])[a-z]+\)$/, "$1$2$3");
},
getGMTOffset:function() {
var t = this.get("timezoneOffset");
return (t > 0 ? "-" :"+") + n((t.abs() / 60).floor(), 2) + n(t % 60, 2);
},
setAMPM:function(t) {
t = t.toUpperCase();
var e = this.get("hr");
return e > 11 && "AM" == t ? this.decrement("hour", 12) :12 > e && "PM" == t ? this.increment("hour", 12) :this;
},
getAMPM:function() {
return this.get("hr") < 12 ? "AM" :"PM";
},
parse:function(e) {
return this.set("time", t.parse(e)), this;
},
isValid:function(t) {
return t || (t = this), "date" == typeOf(t) && !isNaN(t.valueOf());
},
format:function(e) {
if (!this.isValid()) return "invalid date";
if (e || (e = "%x %X"), "string" == typeof e && (e = s[e.toLowerCase()] || e), "function" == typeof e) return e(this);
var i = this;
return e.replace(/%([a-z%])/gi, function(e, r) {
switch (r) {
case "a":
return t.getMsg("days_abbr")[i.get("day")];

case "A":
return t.getMsg("days")[i.get("day")];

case "b":
return t.getMsg("months_abbr")[i.get("month")];

case "B":
return t.getMsg("months")[i.get("month")];

case "c":
return i.format("%a %b %d %H:%M:%S %Y");

case "d":
return n(i.get("date"), 2);

case "e":
return n(i.get("date"), 2, " ");

case "H":
return n(i.get("hr"), 2);

case "I":
return n(i.get("hr") % 12 || 12, 2);

case "j":
return n(i.get("dayofyear"), 3);

case "k":
return n(i.get("hr"), 2, " ");

case "l":
return n(i.get("hr") % 12 || 12, 2, " ");

case "L":
return n(i.get("ms"), 3);

case "m":
return n(i.get("mo") + 1, 2);

case "M":
return n(i.get("min"), 2);

case "o":
return i.get("ordinal");

case "p":
return t.getMsg(i.get("ampm"));

case "s":
return Math.round(i / 1e3);

case "S":
return n(i.get("seconds"), 2);

case "T":
return i.format("%H:%M:%S");

case "U":
return n(i.get("week"), 2);

case "w":
return i.get("day");

case "x":
return i.format(t.getMsg("shortDate"));

case "X":
return i.format(t.getMsg("shortTime"));

case "y":
return i.get("year").toString().substr(2);

case "Y":
return i.get("year");

case "z":
return i.get("GMTOffset");

case "Z":
return i.get("Timezone");
}
return r;
});
},
toISOString:function() {
return this.format("iso8601");
}
}).alias({
toJSON:"toISOString",
compare:"diff",
strftime:"format"
});
var i = [ "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat" ], r = [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ], s = {
db:"%Y-%m-%d %H:%M:%S",
compact:"%Y%m%dT%H%M%S",
"short":"%d %b %H:%M",
"long":"%B %d, %Y %H:%M",
rfc822:function(t) {
return i[t.get("day")] + t.format(", %d ") + r[t.get("month")] + t.format(" %Y %H:%M:%S %Z");
},
rfc2822:function(t) {
return i[t.get("day")] + t.format(", %d ") + r[t.get("month")] + t.format(" %Y %H:%M:%S %z");
},
iso8601:function(t) {
return t.getUTCFullYear() + "-" + n(t.getUTCMonth() + 1, 2) + "-" + n(t.getUTCDate(), 2) + "T" + n(t.getUTCHours(), 2) + ":" + n(t.getUTCMinutes(), 2) + ":" + n(t.getUTCSeconds(), 2) + "." + n(t.getUTCMilliseconds(), 3) + "Z";
}
}, a = [], o = t.parse, u = function(e, n, i) {
var r = -1, s = t.getMsg(e + "s");
switch (typeOf(n)) {
case "object":
r = s[n.get(e)];
break;

case "number":
if (r = s[n], !r) throw new Error("Invalid " + e + " index: " + n);
break;

case "string":
var a = s.filter(function(t) {
return this.test(t);
}, new RegExp("^" + n, "i"));
if (!a.length) throw new Error("Invalid " + e + " string");
if (a.length > 1) throw new Error("Ambiguous " + e);
r = a[0];
}
return i ? s.indexOf(r) :r;
}, l = 1900, c = 70;
t.extend({
getMsg:function(t, e) {
return Locale.get("Date." + t, e);
},
units:{
ms:Function.from(1),
second:Function.from(1e3),
minute:Function.from(6e4),
hour:Function.from(36e5),
day:Function.from(864e5),
week:Function.from(6084e5),
month:function(e, n) {
var i = new t();
return 864e5 * t.daysInMonth(null != e ? e :i.get("mo"), null != n ? n :i.get("year"));
},
year:function(e) {
return e = e || new t().get("year"), t.isLeapYear(e) ? 316224e5 :31536e6;
}
},
daysInMonth:function(e, n) {
return [ 31, t.isLeapYear(n) ? 29 :28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ][e];
},
isLeapYear:function(t) {
return t % 4 === 0 && t % 100 !== 0 || t % 400 === 0;
},
parse:function(e) {
var n = typeOf(e);
if ("number" == n) return new t(e);
if ("string" != n) return e;
if (e = e.clean(), !e.length) return null;
var i;
return a.some(function(t) {
var n = t.re.exec(e);
return n ? i = t.handler(n) :!1;
}), i && i.isValid() || (i = new t(o(e)), i && i.isValid() || (i = new t(e.toInt()))), 
i;
},
parseDay:function(t, e) {
return u("day", t, e);
},
parseMonth:function(t, e) {
return u("month", t, e);
},
parseUTC:function(e) {
var n = new t(e), i = t.UTC(n.get("year"), n.get("mo"), n.get("date"), n.get("hr"), n.get("min"), n.get("sec"), n.get("ms"));
return new t(i);
},
orderIndex:function(e) {
return t.getMsg("dateOrder").indexOf(e) + 1;
},
defineFormat:function(t, e) {
return s[t] = e, this;
},
defineParser:function(t) {
return a.push(t.re && t.handler ? t :_(t)), this;
},
defineParsers:function() {
return Array.flatten(arguments).each(t.defineParser), this;
},
define2DigitYearStart:function(t) {
return c = t % 100, l = t - c, this;
}
}).extend({
defineFormats:t.defineFormat.overloadSetter()
});
var d = function(e) {
return new RegExp("(?:" + t.getMsg(e).map(function(t) {
return t.substr(0, 3);
}).join("|") + ")[a-z]*");
}, h = function(e) {
switch (e) {
case "T":
return "%H:%M:%S";

case "x":
return (1 == t.orderIndex("month") ? "%m[-./]%d" :"%d[-./]%m") + "([-./]%y)?";

case "X":
return "%H([.:]%M)?([.:]%S([.:]%s)?)? ?%p? ?%z?";
}
return null;
}, m = {
d:/[0-2]?[0-9]|3[01]/,
H:/[01]?[0-9]|2[0-3]/,
I:/0?[1-9]|1[0-2]/,
M:/[0-5]?\d/,
s:/\d+/,
o:/[a-z]*/,
p:/[ap]\.?m\.?/,
y:/\d{2}|\d{4}/,
Y:/\d{4}/,
z:/Z|[+-]\d{2}(?::?\d{2})?/
};
m.m = m.I, m.S = m.M;
var f, p = function(t) {
f = t, m.a = m.A = d("days"), m.b = m.B = d("months"), a.each(function(t, e) {
t.format && (a[e] = _(t.format));
});
}, _ = function(e) {
if (!f) return {
format:e
};
var n = [], i = (e.source || e).replace(/%([a-z])/gi, function(t, e) {
return h(e) || t;
}).replace(/\((?!\?)/g, "(?:").replace(/ (?!\?|\*)/g, ",? ").replace(/%([a-z%])/gi, function(t, e) {
var i = m[e];
return i ? (n.push(e), "(" + i.source + ")") :e;
}).replace(/\[a-z\]/gi, "[a-z\\u00c0-\\uffff;&]");
return {
format:e,
re:new RegExp("^" + i + "$", "i"),
handler:function(e) {
e = e.slice(1).associate(n);
var i = new t().clearTime(), r = e.y || e.Y;
null != r && g.call(i, "y", r), "d" in e && g.call(i, "d", 1), ("m" in e || e.b || e.B) && g.call(i, "m", 1);
for (var s in e) g.call(i, s, e[s]);
return i;
}
};
}, g = function(e, n) {
if (!n) return this;
switch (e) {
case "a":
case "A":
return this.set("day", t.parseDay(n, !0));

case "b":
case "B":
return this.set("mo", t.parseMonth(n, !0));

case "d":
return this.set("date", n);

case "H":
case "I":
return this.set("hr", n);

case "m":
return this.set("mo", n - 1);

case "M":
return this.set("min", n);

case "p":
return this.set("ampm", n.replace(/\./g, ""));

case "S":
return this.set("sec", n);

case "s":
return this.set("ms", 1e3 * ("0." + n));

case "w":
return this.set("day", n);

case "Y":
return this.set("year", n);

case "y":
return n = +n, 100 > n && (n += l + (c > n ? 100 :0)), this.set("year", n);

case "z":
"Z" == n && (n = "+00");
var i = n.match(/([+-])(\d{2}):?(\d{2})?/);
return i = (i[1] + "1") * (60 * i[2] + (+i[3] || 0)) + this.getTimezoneOffset(), 
this.set("time", this - 6e4 * i);
}
return this;
};
t.defineParsers("%Y([-./]%m([-./]%d((T| )%X)?)?)?", "%Y%m%d(T%H(%M%S?)?)?", "%x( %X)?", "%d%o( %b( %Y)?)?( %X)?", "%b( %d%o)?( %Y)?( %X)?", "%Y %b( %d%o( %X)?)?", "%o %b %d %X %z %Y", "%T", "%H:%M( ?%p)?"), 
Locale.addEvent("change", function(t) {
Locale.get("Date") && p(t);
}).fireEvent("change", Locale.getCurrent());
}(), String.implement({
parseQueryString:function(t, e) {
null == t && (t = !0), null == e && (e = !0);
var n = this.split(/[&;]/), i = {};
return n.length ? (n.each(function(n) {
var r = n.indexOf("=") + 1, s = r ? n.substr(r) :"", a = r ? n.substr(0, r - 1).match(/([^\]\[]+|(\B)(?=\]))/g) :[ n ], o = i;
a && (e && (s = decodeURIComponent(s)), a.each(function(e, n) {
t && (e = decodeURIComponent(e));
var i = o[e];
n < a.length - 1 ? o = o[e] = i || {} :"array" == typeOf(i) ? i.push(s) :o[e] = null != i ? [ i, s ] :s;
}));
}), i) :i;
},
cleanQueryString:function(t) {
return this.split("&").filter(function(e) {
var n = e.indexOf("="), i = 0 > n ? "" :e.substr(0, n), r = e.substr(n + 1);
return t ? t.call(null, i, r) :r || 0 === r;
}).join("&");
}
}), function() {
var t = function() {
return this.get("value");
}, e = this.URI = new Class({
Implements:Options,
options:{},
regex:/^(?:(\w+):)?(?:\/\/(?:(?:([^:@\/]*):?([^:@\/]*))?@)?([^:\/?#]*)(?::(\d*))?)?(\.\.?$|(?:[^?#\/]*\/)*)([^?#]*)(?:\?([^#]*))?(?:#(.*))?/,
parts:[ "scheme", "user", "password", "host", "port", "directory", "file", "query", "fragment" ],
schemes:{
http:80,
https:443,
ftp:21,
rtsp:554,
mms:1755,
file:0
},
initialize:function(t, n) {
this.setOptions(n);
var i = this.options.base || e.base;
t || (t = i), t && t.parsed ? this.parsed = Object.clone(t.parsed) :this.set("value", t.href || t.toString(), i ? new e(i) :!1);
},
parse:function(t, e) {
var n = t.match(this.regex);
return n ? (n.shift(), this.merge(n.associate(this.parts), e)) :!1;
},
merge:function(t, e) {
return t && t.scheme || e && e.scheme ? (e && this.parts.every(function(n) {
return t[n] ? !1 :(t[n] = e[n] || "", !0);
}), t.port = t.port || this.schemes[t.scheme.toLowerCase()], t.directory = t.directory ? this.parseDirectory(t.directory, e ? e.directory :"") :"/", 
t) :!1;
},
parseDirectory:function(t, n) {
if (t = ("/" == t.substr(0, 1) ? "" :n || "/") + t, !t.test(e.regs.directoryDot)) return t;
var i = [];
return t.replace(e.regs.endSlash, "").split("/").each(function(t) {
".." == t && i.length > 0 ? i.pop() :"." != t && i.push(t);
}), i.join("/") + "/";
},
combine:function(t) {
return t.value || t.scheme + "://" + (t.user ? t.user + (t.password ? ":" + t.password :"") + "@" :"") + (t.host || "") + (t.port && t.port != this.schemes[t.scheme] ? ":" + t.port :"") + (t.directory || "/") + (t.file || "") + (t.query ? "?" + t.query :"") + (t.fragment ? "#" + t.fragment :"");
},
set:function(t, n, i) {
if ("value" == t) {
var r = n.match(e.regs.scheme);
r && (r = r[1]), this.parsed = r && null == this.schemes[r.toLowerCase()] ? {
scheme:r,
value:n
} :this.parse(n, (i || this).parsed) || (r ? {
scheme:r,
value:n
} :{
value:n
});
} else "data" == t ? this.setData(n) :this.parsed[t] = n;
return this;
},
get:function(t, e) {
switch (t) {
case "value":
return this.combine(this.parsed, e ? e.parsed :!1);

case "data":
return this.getData();
}
return this.parsed[t] || "";
},
go:function() {
document.location.href = this.toString();
},
toURI:function() {
return this;
},
getData:function(t, e) {
var n = this.get(e || "query");
if (!n && 0 !== n) return t ? null :{};
var i = n.parseQueryString();
return t ? i[t] :i;
},
setData:function(t, e, n) {
if ("string" == typeof t) {
var i = this.getData();
i[arguments[0]] = arguments[1], t = i;
} else e && (t = Object.merge(this.getData(), t));
return this.set(n || "query", Object.toQueryString(t));
},
clearData:function(t) {
return this.set(t || "query", "");
},
toString:t,
valueOf:t
});
e.regs = {
endSlash:/\/$/,
scheme:/^(\w+):/,
directoryDot:/\.\/|\.$/
}, e.base = new e(Array.from(document.getElements("base[href]", !0)).getLast(), {
base:document.location
}), String.implement({
toURI:function(t) {
return new e(this, t);
}
});
}(), function() {
var t = {
a:/[Ã Ã¡Ã¢Ã£Ã¤Ã¥ÄƒÄ…]/g,
A:/[Ã€ÃÃ‚ÃƒÃ„Ã…Ä‚Ä„]/g,
c:/[Ä‡ÄÃ§]/g,
C:/[Ä†ÄŒÃ‡]/g,
d:/[ÄÄ‘]/g,
D:/[ÄŽÃ]/g,
e:/[Ã¨Ã©ÃªÃ«Ä›Ä™]/g,
E:/[ÃˆÃ‰ÃŠÃ‹ÄšÄ˜]/g,
g:/[ÄŸ]/g,
G:/[Äž]/g,
i:/[Ã¬Ã­Ã®Ã¯]/g,
I:/[ÃŒÃÃŽÃ]/g,
l:/[ÄºÄ¾Å‚]/g,
L:/[Ä¹Ä½Å]/g,
n:/[Ã±ÅˆÅ„]/g,
N:/[Ã‘Å‡Åƒ]/g,
o:/[Ã²Ã³Ã´ÃµÃ¶Ã¸Å‘]/g,
O:/[Ã’Ã“Ã”Ã•Ã–Ã˜]/g,
r:/[Å™Å•]/g,
R:/[Å˜Å”]/g,
s:/[Å¡Å¡ÅŸ]/g,
S:/[Å ÅžÅš]/g,
t:/[Å¥Å£]/g,
T:/[Å¤Å¢]/g,
ue:/[Ã¼]/g,
UE:/[Ãœ]/g,
u:/[Ã¹ÃºÃ»Å¯Âµ]/g,
U:/[Ã™ÃšÃ›Å®]/g,
y:/[Ã¿Ã½]/g,
Y:/[Å¸Ã]/g,
z:/[Å¾ÅºÅ¼]/g,
Z:/[Å½Å¹Å»]/g,
th:/[Ã¾]/g,
TH:/[Ãž]/g,
dh:/[Ã°]/g,
DH:/[Ã]/g,
ss:/[ÃŸ]/g,
oe:/[Å“]/g,
OE:/[Å’]/g,
ae:/[Ã¦]/g,
AE:/[Ã†]/g
}, e = {
" ":/[\xa0\u2002\u2003\u2009]/g,
"*":/[\xb7]/g,
"'":/[\u2018\u2019]/g,
'"':/[\u201c\u201d]/g,
"...":/[\u2026]/g,
"-":/[\u2013]/g,
"&raquo;":/[\uFFFD]/g
}, n = function(t, e) {
var n, i = t;
for (n in e) i = i.replace(e[n], n);
return i;
}, i = function(t, e) {
t = t || "";
var n = e ? "<" + t + "(?!\\w)[^>]*>([\\s\\S]*?)</" + t + "(?!\\w)>" :"</?" + t + "([^>]+)?>", i = new RegExp(n, "gi");
return i;
};
String.implement({
standardize:function() {
return n(this, t);
},
repeat:function(t) {
return new Array(t + 1).join(this);
},
pad:function(t, e, n) {
if (this.length >= t) return this;
var i = (null == e ? " " :"" + e).repeat(t - this.length).substr(0, t - this.length);
return n && "right" != n ? "left" == n ? i + this :i.substr(0, (i.length / 2).floor()) + this + i.substr(0, (i.length / 2).ceil()) :this + i;
},
getTags:function(t, e) {
return this.match(i(t, e)) || [];
},
stripTags:function(t, e) {
return this.replace(i(t, e), "");
},
tidy:function() {
return n(this, e);
},
truncate:function(t, e, n) {
var i = this;
if (null == e && 1 == arguments.length && (e = "â€¦"), i.length > t) {
if (i = i.substring(0, t), n) {
var r = i.lastIndexOf(n);
-1 != r && (i = i.substr(0, r));
}
e && (i += e);
}
return i;
}
});
}(), Element.implement({
tidy:function() {
this.set("value", this.get("value").tidy());
},
getTextInRange:function(t, e) {
return this.get("value").substring(t, e);
},
getSelectedText:function() {
return this.setSelectionRange ? this.getTextInRange(this.getSelectionStart(), this.getSelectionEnd()) :document.selection.createRange().text;
},
getSelectedRange:function() {
if (null != this.selectionStart) return {
start:this.selectionStart,
end:this.selectionEnd
};
var t = {
start:0,
end:0
}, e = this.getDocument().selection.createRange();
if (!e || e.parentElement() != this) return t;
var n = e.duplicate();
if ("text" == this.type) t.start = 0 - n.moveStart("character", -1e5), t.end = t.start + e.text.length; else {
var i = this.get("value"), r = i.length;
n.moveToElementText(this), n.setEndPoint("StartToEnd", e), n.text.length && (r -= i.match(/[\n\r]*$/)[0].length), 
t.end = r - n.text.length, n.setEndPoint("StartToStart", e), t.start = r - n.text.length;
}
return t;
},
getSelectionStart:function() {
return this.getSelectedRange().start;
},
getSelectionEnd:function() {
return this.getSelectedRange().end;
},
setCaretPosition:function(t) {
return "end" == t && (t = this.get("value").length), this.selectRange(t, t), this;
},
getCaretPosition:function() {
return this.getSelectedRange().start;
},
selectRange:function(t, e) {
if (this.setSelectionRange) this.focus(), this.setSelectionRange(t, e); else {
var n = this.get("value"), i = n.substr(t, e - t).replace(/\r/g, "").length;
t = n.substr(0, t).replace(/\r/g, "").length;
var r = this.createTextRange();
r.collapse(!0), r.moveEnd("character", t + i), r.moveStart("character", t), r.select();
}
return this;
},
insertAtCursor:function(t, e) {
var n = this.getSelectedRange(), i = this.get("value");
return this.set("value", i.substring(0, n.start) + t + i.substring(n.end, i.length)), 
e !== !1 ? this.selectRange(n.start, n.start + t.length) :this.setCaretPosition(n.start + t.length), 
this;
},
insertAroundCursor:function(t, e) {
t = Object.append({
before:"",
defaultMiddle:"",
after:""
}, t);
var n = this.getSelectedText() || t.defaultMiddle, i = this.getSelectedRange(), r = this.get("value");
if (i.start == i.end) this.set("value", r.substring(0, i.start) + t.before + n + t.after + r.substring(i.end, r.length)), 
this.selectRange(i.start + t.before.length, i.end + t.before.length + n.length); else {
var s = r.substring(i.start, i.end);
this.set("value", r.substring(0, i.start) + t.before + s + t.after + r.substring(i.end, r.length));
var a = i.start + t.before.length;
e !== !1 ? this.selectRange(a, a + s.length) :this.setCaretPosition(a + r.length);
}
return this;
}
}), Elements.from = function(t, e) {
(e || null == e) && (t = t.stripScripts());
var n, i = t.match(/^\s*<(t[dhr]|tbody|tfoot|thead)/i);
if (i) {
n = new Element("table");
var r = i[1].toLowerCase();
[ "td", "th", "tr" ].contains(r) && (n = new Element("tbody").inject(n), "tr" != r && (n = new Element("tr").inject(n)));
}
return (n || new Element("div")).set("html", t).getChildren();
}, Fx.Elements = new Class({
Extends:Fx.CSS,
initialize:function(t, e) {
this.elements = this.subject = $$(t), this.parent(e);
},
compute:function(t, e, n) {
var i = {};
for (var r in t) {
var s = t[r], a = e[r], o = i[r] = {};
for (var u in s) o[u] = this.parent(s[u], a[u], n);
}
return i;
},
set:function(t) {
for (var e in t) if (this.elements[e]) {
var n = t[e];
for (var i in n) this.render(this.elements[e], i, n[i], this.options.unit);
}
return this;
},
start:function(t) {
if (!this.check(t)) return this;
var e = {}, n = {};
for (var i in t) if (this.elements[i]) {
var r = t[i], s = e[i] = {}, a = n[i] = {};
for (var o in r) {
var u = this.prepare(this.elements[i], o, r[o]);
s[o] = u.from, a[o] = u.to;
}
}
return this.parent(e, n);
}
}), /*
---

script: Element.Measure.js

name: Element.Measure

description: Extends the Element native object to include methods useful in measuring dimensions.

credits: "Element.measure / .expose methods by Daniel Steigerwald License: MIT-style license. Copyright: Copyright (c) 2008 Daniel Steigerwald, daniel.steigerwald.cz"

license: MIT-style license

authors:
  - Aaron Newton

requires:
  - Core/Element.Style
  - Core/Element.Dimensions
  - /MooTools.More

provides: [Element.Measure]

...
*/
function() {
var t = function(t, e) {
var n = [];
return Object.each(e, function(e) {
Object.each(e, function(e) {
t.each(function(t) {
n.push(t + "-" + e + ("border" == t ? "-width" :""));
});
});
}), n;
}, e = function(t, e) {
var n = 0;
return Object.each(e, function(e, i) {
i.test(t) && (n += e.toInt());
}), n;
}, n = function(t) {
return !(t && !t.offsetHeight && !t.offsetWidth);
};
Element.implement({
measure:function(t) {
if (n(this)) return t.call(this);
for (var e = this.getParent(), i = []; !n(e) && e != document.body; ) i.push(e.expose()), 
e = e.getParent();
var r = this.expose(), s = t.call(this);
return r(), i.each(function(t) {
t();
}), s;
},
expose:function() {
if ("none" != this.getStyle("display")) return function() {};
var t = this.style.cssText;
return this.setStyles({
display:"block",
position:"absolute",
visibility:"hidden"
}), function() {
this.style.cssText = t;
}.bind(this);
},
getDimensions:function(t) {
t = Object.merge({
computeSize:!1
}, t);
var e = {
x:0,
y:0
}, n = function(t, e) {
return e.computeSize ? t.getComputedSize(e) :t.getSize();
}, i = this.getParent("body");
if (i && "none" == this.getStyle("display")) e = this.measure(function() {
return n(this, t);
}); else if (i) try {
e = n(this, t);
} catch (r) {}
return Object.append(e, e.x || 0 === e.x ? {
width:e.x,
height:e.y
} :{
x:e.width,
y:e.height
});
},
getComputedSize:function(n) {
n = Object.merge({
styles:[ "padding", "border" ],
planes:{
height:[ "top", "bottom" ],
width:[ "left", "right" ]
},
mode:"both"
}, n);
var i, r = {}, s = {
width:0,
height:0
};
return "vertical" == n.mode ? (delete s.width, delete n.planes.width) :"horizontal" == n.mode && (delete s.height, 
delete n.planes.height), t(n.styles, n.planes).each(function(t) {
r[t] = this.getStyle(t).toInt();
}, this), Object.each(n.planes, function(t, n) {
var a = n.capitalize(), o = this.getStyle(n);
"auto" != o || i || (i = this.getDimensions()), o = r[n] = "auto" == o ? i[n] :o.toInt(), 
s["total" + a] = o, t.each(function(t) {
var n = e(t, r);
s["computed" + t.capitalize()] = n, s["total" + a] += n;
});
}, this), Object.append(s, r);
}
});
}(), function(t) {
var e = Element.Position = {
options:{
relativeTo:document.body,
position:{
x:"center",
y:"center"
},
offset:{
x:0,
y:0
}
},
getOptions:function(t, n) {
return n = Object.merge({}, e.options, n), e.setPositionOption(n), e.setEdgeOption(n), 
e.setOffsetOption(t, n), e.setDimensionsOption(t, n), n;
},
setPositionOption:function(t) {
t.position = e.getCoordinateFromValue(t.position);
},
setEdgeOption:function(t) {
var n = e.getCoordinateFromValue(t.edge);
t.edge = n ? n :"center" == t.position.x && "center" == t.position.y ? {
x:"center",
y:"center"
} :{
x:"left",
y:"top"
};
},
setOffsetOption:function(t, e) {
var n = {
x:0,
y:0
}, i = t.measure(function() {
return document.id(this.getOffsetParent());
}), r = i.getScroll();
i && i != t.getDocument().body && (n = i.measure(function() {
var t = this.getPosition();
if ("fixed" == this.getStyle("position")) {
var e = window.getScroll();
t.x += e.x, t.y += e.y;
}
return t;
}), e.offset = {
parentPositioned:i != document.id(e.relativeTo),
x:e.offset.x - n.x + r.x,
y:e.offset.y - n.y + r.y
});
},
setDimensionsOption:function(t, e) {
e.dimensions = t.getDimensions({
computeSize:!0,
styles:[ "padding", "border", "margin" ]
});
},
getPosition:function(t, n) {
var i = {};
n = e.getOptions(t, n);
var r = document.id(n.relativeTo) || document.body;
e.setPositionCoordinates(n, i, r), n.edge && e.toEdge(i, n);
var s = n.offset;
return i.left = (i.x >= 0 || s.parentPositioned || n.allowNegative ? i.x :0).toInt(), 
i.top = (i.y >= 0 || s.parentPositioned || n.allowNegative ? i.y :0).toInt(), e.toMinMax(i, n), 
(n.relFixedPosition || "fixed" == r.getStyle("position")) && e.toRelFixedPosition(r, i), 
n.ignoreScroll && e.toIgnoreScroll(r, i), n.ignoreMargins && e.toIgnoreMargins(i, n), 
i.left = Math.ceil(i.left), i.top = Math.ceil(i.top), delete i.x, delete i.y, i;
},
setPositionCoordinates:function(t, e, n) {
var i = t.offset.y, r = t.offset.x, s = n == document.body ? window.getScroll() :n.getPosition(), a = s.y, o = s.x, u = window.getSize();
switch (t.position.x) {
case "left":
e.x = o + r;
break;

case "right":
e.x = o + r + n.offsetWidth;
break;

default:
e.x = o + (n == document.body ? u.x :n.offsetWidth) / 2 + r;
}
switch (t.position.y) {
case "top":
e.y = a + i;
break;

case "bottom":
e.y = a + i + n.offsetHeight;
break;

default:
e.y = a + (n == document.body ? u.y :n.offsetHeight) / 2 + i;
}
},
toMinMax:function(t, e) {
var n, i = {
left:"x",
top:"y"
};
[ "minimum", "maximum" ].each(function(r) {
[ "left", "top" ].each(function(s) {
n = e[r] ? e[r][i[s]] :null, null != n && ("minimum" == r ? t[s] < n :t[s] > n) && (t[s] = n);
});
});
},
toRelFixedPosition:function(t, e) {
var n = window.getScroll();
e.top += n.y, e.left += n.x;
},
toIgnoreScroll:function(t, e) {
var n = t.getScroll();
e.top -= n.y, e.left -= n.x;
},
toIgnoreMargins:function(t, e) {
t.left += "right" == e.edge.x ? e.dimensions["margin-right"] :"center" != e.edge.x ? -e.dimensions["margin-left"] :-e.dimensions["margin-left"] + (e.dimensions["margin-right"] + e.dimensions["margin-left"]) / 2, 
t.top += "bottom" == e.edge.y ? e.dimensions["margin-bottom"] :"center" != e.edge.y ? -e.dimensions["margin-top"] :-e.dimensions["margin-top"] + (e.dimensions["margin-bottom"] + e.dimensions["margin-top"]) / 2;
},
toEdge:function(t, e) {
var n = {}, i = e.dimensions, r = e.edge;
switch (r.x) {
case "left":
n.x = 0;
break;

case "right":
n.x = -i.x - i.computedRight - i.computedLeft;
break;

default:
n.x = -Math.round(i.totalWidth / 2);
}
switch (r.y) {
case "top":
n.y = 0;
break;

case "bottom":
n.y = -i.y - i.computedTop - i.computedBottom;
break;

default:
n.y = -Math.round(i.totalHeight / 2);
}
t.x += n.x, t.y += n.y;
},
getCoordinateFromValue:function(t) {
return "string" != typeOf(t) ? t :(t = t.toLowerCase(), {
x:t.test("left") ? "left" :t.test("right") ? "right" :"center",
y:t.test(/upper|top/) ? "top" :t.test("bottom") ? "bottom" :"center"
});
}
};
Element.implement({
position:function(e) {
if (e && (null != e.x || null != e.y)) return t ? t.apply(this, arguments) :this;
var n = this.setStyle("position", "absolute").calculatePosition(e);
return e && e.returnPos ? n :this.setStyles(n);
},
calculatePosition:function(t) {
return e.getPosition(this, t);
}
});
}(Element.prototype.position), Fx.Move = new Class({
Extends:Fx.Morph,
options:{
relativeTo:document.body,
position:"center",
edge:!1,
offset:{
x:0,
y:0
}
},
start:function(t) {
var e = this.element, n = e.getStyles("top", "left");
return ("auto" == n.top || "auto" == n.left) && e.setPosition(e.getPosition(e.getOffsetParent())), 
this.parent(e.position(Object.merge({}, this.options, t, {
returnPos:!0
})));
}
}), Element.Properties.move = {
set:function(t) {
return this.get("move").cancel().setOptions(t), this;
},
get:function() {
var t = this.retrieve("move");
return t || (t = new Fx.Move(this, {
link:"cancel"
}), this.store("move", t)), t;
}
}, Element.implement({
move:function(t) {
return this.get("move").start(t), this;
}
}), Element.implement({
isDisplayed:function() {
return "none" != this.getStyle("display");
},
isVisible:function() {
var t = this.offsetWidth, e = this.offsetHeight;
return 0 == t && 0 == e ? !1 :t > 0 && e > 0 ? !0 :"none" != this.style.display;
},
toggle:function() {
return this[this.isDisplayed() ? "hide" :"show"]();
},
hide:function() {
var t;
try {
t = this.getStyle("display");
} catch (e) {}
return "none" == t ? this :this.store("element:_originalDisplay", t || "").setStyle("display", "none");
},
show:function(t) {
return !t && this.isDisplayed() ? this :(t = t || this.retrieve("element:_originalDisplay") || "block", 
this.setStyle("display", "none" == t ? "block" :t));
},
swapClass:function(t, e) {
return this.removeClass(t).addClass(e);
}
}), Document.implement({
clearSelection:function() {
if (window.getSelection) {
var t = window.getSelection();
t && t.removeAllRanges && t.removeAllRanges();
} else if (document.selection && document.selection.empty) try {
document.selection.empty();
} catch (e) {}
}
}), function() {
var t = function(t) {
var e = t.options.hideInputs;
if (window.OverText) {
var n = [ null ];
OverText.each(function(t) {
n.include("." + t.options.labelClass);
}), n && (e += n.join(", "));
}
return e ? t.element.getElements(e) :null;
};
Fx.Reveal = new Class({
Extends:Fx.Morph,
options:{
link:"cancel",
styles:[ "padding", "border", "margin" ],
transitionOpacity:!Browser.ie6,
mode:"vertical",
display:function() {
return "tr" != this.element.get("tag") ? "block" :"table-row";
},
opacity:1,
hideInputs:Browser.ie ? "select, input, textarea, object, embed" :null
},
dissolve:function() {
if (this.hiding || this.showing) "chain" == this.options.link ? this.chain(this.dissolve.bind(this)) :"cancel" != this.options.link || this.hiding || (this.cancel(), 
this.dissolve()); else if ("none" != this.element.getStyle("display")) {
this.hiding = !0, this.showing = !1, this.hidden = !0, this.cssText = this.element.style.cssText;
var e = this.element.getComputedSize({
styles:this.options.styles,
mode:this.options.mode
});
this.options.transitionOpacity && (e.opacity = this.options.opacity);
var n = {};
Object.each(e, function(t, e) {
n[e] = [ t, 0 ];
}), this.element.setStyles({
display:Function.from(this.options.display).call(this),
overflow:"hidden"
});
var i = t(this);
i && i.setStyle("visibility", "hidden"), this.$chain.unshift(function() {
this.hidden && (this.hiding = !1, this.element.style.cssText = this.cssText, this.element.setStyle("display", "none"), 
i && i.setStyle("visibility", "visible")), this.fireEvent("hide", this.element), 
this.callChain();
}.bind(this)), this.start(n);
} else this.callChain.delay(10, this), this.fireEvent("complete", this.element), 
this.fireEvent("hide", this.element);
return this;
},
reveal:function() {
if (this.showing || this.hiding) "chain" == this.options.link ? this.chain(this.reveal.bind(this)) :"cancel" != this.options.link || this.showing || (this.cancel(), 
this.reveal()); else if ("none" == this.element.getStyle("display")) {
this.hiding = !1, this.showing = !0, this.hidden = !1, this.cssText = this.element.style.cssText;
var e;
this.element.measure(function() {
e = this.element.getComputedSize({
styles:this.options.styles,
mode:this.options.mode
});
}.bind(this)), null != this.options.heightOverride && (e.height = this.options.heightOverride.toInt()), 
null != this.options.widthOverride && (e.width = this.options.widthOverride.toInt()), 
this.options.transitionOpacity && (this.element.setStyle("opacity", 0), e.opacity = this.options.opacity);
var n = {
height:0,
display:Function.from(this.options.display).call(this)
};
Object.each(e, function(t, e) {
n[e] = 0;
}), n.overflow = "hidden", this.element.setStyles(n);
var i = t(this);
i && i.setStyle("visibility", "hidden"), this.$chain.unshift(function() {
this.element.style.cssText = this.cssText, this.element.setStyle("display", Function.from(this.options.display).call(this)), 
this.hidden || (this.showing = !1), i && i.setStyle("visibility", "visible"), this.callChain(), 
this.fireEvent("show", this.element);
}.bind(this)), this.start(e);
} else this.callChain(), this.fireEvent("complete", this.element), this.fireEvent("show", this.element);
return this;
},
toggle:function() {
return "none" == this.element.getStyle("display") ? this.reveal() :this.dissolve(), 
this;
},
cancel:function() {
return this.parent.apply(this, arguments), null != this.cssText && (this.element.style.cssText = this.cssText), 
this.hiding = !1, this.showing = !1, this;
}
}), Element.Properties.reveal = {
set:function(t) {
return this.get("reveal").cancel().setOptions(t), this;
},
get:function() {
var t = this.retrieve("reveal");
return t || (t = new Fx.Reveal(this), this.store("reveal", t)), t;
}
}, Element.Properties.dissolve = Element.Properties.reveal, Element.implement({
reveal:function(t) {
return this.get("reveal").setOptions(t).reveal(), this;
},
dissolve:function(t) {
return this.get("reveal").setOptions(t).dissolve(), this;
},
nix:function(t) {
var e = Array.link(arguments, {
destroy:Type.isBoolean,
options:Type.isObject
});
return this.get("reveal").setOptions(t).dissolve().chain(function() {
this[e.destroy ? "destroy" :"dispose"]();
}.bind(this)), this;
},
wink:function() {
var t = Array.link(arguments, {
duration:Type.isNumber,
options:Type.isObject
}), e = this.get("reveal").setOptions(t.options);
e.reveal().chain(function() {
(function() {
e.dissolve();
}).delay(t.duration || 2e3);
});
}
});
}(), function() {
function t(t) {
return /^(?:body|html)$/i.test(t.tagName);
}
Fx.Scroll = new Class({
Extends:Fx,
options:{
offset:{
x:0,
y:0
},
wheelStops:!0
},
initialize:function(t, e) {
if (this.element = this.subject = document.id(t), this.parent(e), "element" != typeOf(this.element) && (this.element = document.id(this.element.getDocument().body)), 
this.options.wheelStops) {
var n = this.element, i = this.cancel.pass(!1, this);
this.addEvent("start", function() {
n.addEvent("mousewheel", i);
}, !0), this.addEvent("complete", function() {
n.removeEvent("mousewheel", i);
}, !0);
}
},
set:function() {
var t = Array.flatten(arguments);
return Browser.firefox && (t = [ Math.round(t[0]), Math.round(t[1]) ]), this.element.scrollTo(t[0], t[1]), 
this;
},
compute:function(t, e, n) {
return [ 0, 1 ].map(function(i) {
return Fx.compute(t[i], e[i], n);
});
},
start:function(t, e) {
if (!this.check(t, e)) return this;
var n = this.element.getScroll();
return this.parent([ n.x, n.y ], [ t, e ]);
},
calculateScroll:function(t, e) {
var n = this.element, i = n.getScrollSize(), r = n.getScroll(), s = n.getSize(), a = this.options.offset, o = {
x:t,
y:e
};
for (var u in o) o[u] || 0 === o[u] || (o[u] = r[u]), "number" != typeOf(o[u]) && (o[u] = i[u] - s[u]), 
o[u] += a[u];
return [ o.x, o.y ];
},
toTop:function() {
return this.start.apply(this, this.calculateScroll(!1, 0));
},
toLeft:function() {
return this.start.apply(this, this.calculateScroll(0, !1));
},
toRight:function() {
return this.start.apply(this, this.calculateScroll("right", !1));
},
toBottom:function() {
return this.start.apply(this, this.calculateScroll(!1, "bottom"));
},
toElement:function(e, n) {
n = n ? Array.from(n) :[ "x", "y" ];
var i = t(this.element) ? {
x:0,
y:0
} :this.element.getScroll(), r = Object.map(document.id(e).getPosition(this.element), function(t, e) {
return n.contains(e) ? t + i[e] :!1;
});
return this.start.apply(this, this.calculateScroll(r.x, r.y));
},
toElementEdge:function(t, e, n) {
e = e ? Array.from(e) :[ "x", "y" ], t = document.id(t);
var i = {}, r = t.getPosition(this.element), s = t.getSize(), a = this.element.getScroll(), o = this.element.getSize(), u = {
x:r.x + s.x,
y:r.y + s.y
};
return [ "x", "y" ].each(function(t) {
e.contains(t) && (u[t] > a[t] + o[t] && (i[t] = u[t] - o[t]), r[t] < a[t] && (i[t] = r[t])), 
null == i[t] && (i[t] = a[t]), n && n[t] && (i[t] = i[t] + n[t]);
}, this), (i.x != a.x || i.y != a.y) && this.start(i.x, i.y), this;
},
toElementCenter:function(t, e, n) {
e = e ? Array.from(e) :[ "x", "y" ], t = document.id(t);
var i = {}, r = t.getPosition(this.element), s = t.getSize(), a = this.element.getScroll(), o = this.element.getSize();
return [ "x", "y" ].each(function(t) {
e.contains(t) && (i[t] = r[t] - (o[t] - s[t]) / 2), null == i[t] && (i[t] = a[t]), 
n && n[t] && (i[t] = i[t] + n[t]);
}, this), (i.x != a.x || i.y != a.y) && this.start(i.x, i.y), this;
}
});
}(), Fx.Slide = new Class({
Extends:Fx,
options:{
mode:"vertical",
wrapper:!1,
hideOverflow:!0,
resetHeight:!1
},
initialize:function(t, e) {
t = this.element = this.subject = document.id(t), this.parent(e), e = this.options;
var n = t.retrieve("wrapper"), i = t.getStyles("margin", "position", "overflow");
e.hideOverflow && (i = Object.append(i, {
overflow:"hidden"
})), e.wrapper && (n = document.id(e.wrapper).setStyles(i)), n || (n = new Element("div", {
styles:i
}).wraps(t)), t.store("wrapper", n).setStyle("margin", 0), "visible" == t.getStyle("overflow") && t.setStyle("overflow", "hidden"), 
this.now = [], this.open = !0, this.wrapper = n, this.addEvent("complete", function() {
this.open = 0 != n["offset" + this.layout.capitalize()], this.open && this.options.resetHeight && n.setStyle("height", "");
}, !0);
},
vertical:function() {
this.margin = "margin-top", this.layout = "height", this.offset = this.element.offsetHeight;
},
horizontal:function() {
this.margin = "margin-left", this.layout = "width", this.offset = this.element.offsetWidth;
},
set:function(t) {
return this.element.setStyle(this.margin, t[0]), this.wrapper.setStyle(this.layout, t[1]), 
this;
},
compute:function(t, e, n) {
return [ 0, 1 ].map(function(i) {
return Fx.compute(t[i], e[i], n);
});
},
start:function(t, e) {
if (!this.check(t, e)) return this;
this[e || this.options.mode]();
var n, i = this.element.getStyle(this.margin).toInt(), r = this.wrapper.getStyle(this.layout).toInt(), s = [ [ i, r ], [ 0, this.offset ] ], a = [ [ i, r ], [ -this.offset, 0 ] ];
switch (t) {
case "in":
n = s;
break;

case "out":
n = a;
break;

case "toggle":
n = 0 == r ? s :a;
}
return this.parent(n[0], n[1]);
},
slideIn:function(t) {
return this.start("in", t);
},
slideOut:function(t) {
return this.start("out", t);
},
hide:function(t) {
return this[t || this.options.mode](), this.open = !1, this.set([ -this.offset, 0 ]);
},
show:function(t) {
return this[t || this.options.mode](), this.open = !0, this.set([ 0, this.offset ]);
},
toggle:function(t) {
return this.start("toggle", t);
}
}), Element.Properties.slide = {
set:function(t) {
return this.get("slide").cancel().setOptions(t), this;
},
get:function() {
var t = this.retrieve("slide");
return t || (t = new Fx.Slide(this, {
link:"cancel"
}), this.store("slide", t)), t;
}
}, Element.implement({
slide:function(t, e) {
t = t || "toggle";
var n, i = this.get("slide");
switch (t) {
case "hide":
i.hide(e);
break;

case "show":
i.show(e);
break;

case "toggle":
var r = this.retrieve("slide:flag", i.open);
i[r ? "slideOut" :"slideIn"](e), this.store("slide:flag", !r), n = !0;
break;

default:
i.start(t, e);
}
return n || this.eliminate("slide:flag"), this;
}
}), Fx.SmoothScroll = new Class({
Extends:Fx.Scroll,
options:{
axes:[ "x", "y" ]
},
initialize:function(t, e) {
e = e || document, this.doc = e.getDocument(), this.parent(this.doc, t);
var n = e.getWindow(), i = n.location.href.match(/^[^#]*/)[0] + "#", r = $$(this.options.links || this.doc.links);
r.each(function(t) {
if (0 == t.href.indexOf(i)) {
var e = t.href.substr(i.length);
e && this.useLink(t, e);
}
}, this), this.addEvent("complete", function() {
n.location.hash = this.anchor, this.element.scrollTo(this.to[0], this.to[1]);
}, !0);
},
useLink:function(t, e) {
return t.addEvent("click", function(n) {
var i = document.id(e) || this.doc.getElement("a[name=" + e + "]");
i && (n.preventDefault(), this.toElement(i, this.options.axes).chain(function() {
this.fireEvent("scrolledTo", [ t, i ]);
}.bind(this)), this.anchor = e);
}.bind(this)), this;
}
});

var Drag = new Class({
Implements:[ Events, Options ],
options:{
snap:6,
unit:"px",
grid:!1,
style:!0,
limit:!1,
handle:!1,
invert:!1,
preventDefault:!1,
stopPropagation:!1,
modifiers:{
x:"left",
y:"top"
}
},
initialize:function() {
var t = Array.link(arguments, {
options:Type.isObject,
element:function(t) {
return null != t;
}
});
this.element = document.id(t.element), this.document = this.element.getDocument(), 
this.setOptions(t.options || {});
var e = typeOf(this.options.handle);
this.handles = ("array" == e || "collection" == e ? $$(this.options.handle) :document.id(this.options.handle)) || this.element, 
this.mouse = {
now:{},
pos:{}
}, this.value = {
start:{},
now:{}
}, this.selection = Browser.ie ? "selectstart" :"mousedown", Browser.ie && !Drag.ondragstartFixed && (document.ondragstart = Function.from(!1), 
Drag.ondragstartFixed = !0), this.bound = {
start:this.start.bind(this),
check:this.check.bind(this),
drag:this.drag.bind(this),
stop:this.stop.bind(this),
cancel:this.cancel.bind(this),
eventStop:Function.from(!1)
}, this.attach();
},
attach:function() {
return this.handles.addEvent("mousedown", this.bound.start), this;
},
detach:function() {
return this.handles.removeEvent("mousedown", this.bound.start), this;
},
start:function(t) {
var e = this.options;
if (!t.rightClick) {
e.preventDefault && t.preventDefault(), e.stopPropagation && t.stopPropagation(), 
this.mouse.start = t.page, this.fireEvent("beforeStart", this.element);
var n = e.limit;
this.limit = {
x:[],
y:[]
};
var i, r;
for (i in e.modifiers) if (e.modifiers[i]) {
var s = this.element.getStyle(e.modifiers[i]);
if (s && !s.match(/px$/) && (r || (r = this.element.getCoordinates(this.element.getOffsetParent())), 
s = r[e.modifiers[i]]), this.value.now[i] = e.style ? (s || 0).toInt() :this.element[e.modifiers[i]], 
e.invert && (this.value.now[i] *= -1), this.mouse.pos[i] = t.page[i] - this.value.now[i], 
n && n[i]) for (var a = 2; a--; ) {
var o = n[i][a];
(o || 0 === o) && (this.limit[i][a] = "function" == typeof o ? o() :o);
}
}
"number" == typeOf(this.options.grid) && (this.options.grid = {
x:this.options.grid,
y:this.options.grid
});
var u = {
mousemove:this.bound.check,
mouseup:this.bound.cancel
};
u[this.selection] = this.bound.eventStop, this.document.addEvents(u);
}
},
check:function(t) {
this.options.preventDefault && t.preventDefault();
var e = Math.round(Math.sqrt(Math.pow(t.page.x - this.mouse.start.x, 2) + Math.pow(t.page.y - this.mouse.start.y, 2)));
e > this.options.snap && (this.cancel(), this.document.addEvents({
mousemove:this.bound.drag,
mouseup:this.bound.stop
}), this.fireEvent("start", [ this.element, t ]).fireEvent("snap", this.element));
},
drag:function(t) {
var e = this.options;
e.preventDefault && t.preventDefault(), this.mouse.now = t.page;
for (var n in e.modifiers) e.modifiers[n] && (this.value.now[n] = this.mouse.now[n] - this.mouse.pos[n], 
e.invert && (this.value.now[n] *= -1), e.limit && this.limit[n] && ((this.limit[n][1] || 0 === this.limit[n][1]) && this.value.now[n] > this.limit[n][1] ? this.value.now[n] = this.limit[n][1] :(this.limit[n][0] || 0 === this.limit[n][0]) && this.value.now[n] < this.limit[n][0] && (this.value.now[n] = this.limit[n][0])), 
e.grid[n] && (this.value.now[n] -= (this.value.now[n] - (this.limit[n][0] || 0)) % e.grid[n]), 
e.style ? this.element.setStyle(e.modifiers[n], this.value.now[n] + e.unit) :this.element[e.modifiers[n]] = this.value.now[n]);
this.fireEvent("drag", [ this.element, t ]);
},
cancel:function(t) {
this.document.removeEvents({
mousemove:this.bound.check,
mouseup:this.bound.cancel
}), t && (this.document.removeEvent(this.selection, this.bound.eventStop), this.fireEvent("cancel", this.element));
},
stop:function(t) {
var e = {
mousemove:this.bound.drag,
mouseup:this.bound.stop
};
e[this.selection] = this.bound.eventStop, this.document.removeEvents(e), t && this.fireEvent("complete", [ this.element, t ]);
}
});

Element.implement({
makeResizable:function(t) {
var e = new Drag(this, Object.merge({
modifiers:{
x:"width",
y:"height"
}
}, t));
return this.store("resizer", e), e.addEvent("drag", function() {
this.fireEvent("resize", e);
}.bind(this));
}
}), Drag.Move = new Class({
Extends:Drag,
options:{
droppables:[],
container:!1,
precalculate:!1,
includeMargins:!0,
checkDroppables:!0
},
initialize:function(t, e) {
if (this.parent(t, e), t = this.element, this.droppables = $$(this.options.droppables), 
this.container = document.id(this.options.container), this.container && "element" != typeOf(this.container) && (this.container = document.id(this.container.getDocument().body)), 
this.options.style) {
if ("left" == this.options.modifiers.x && "top" == this.options.modifiers.y) {
var n = t.getOffsetParent(), i = t.getStyles("left", "top");
!n || "auto" != i.left && "auto" != i.top || t.setPosition(t.getPosition(n));
}
"static" == t.getStyle("position") && t.setStyle("position", "absolute");
}
this.addEvent("start", this.checkDroppables, !0), this.overed = null;
},
start:function(t) {
this.container && (this.options.limit = this.calculateLimit()), this.options.precalculate && (this.positions = this.droppables.map(function(t) {
return t.getCoordinates();
})), this.parent(t);
},
calculateLimit:function() {
var t = this.element, e = this.container, n = document.id(t.getOffsetParent()) || document.body, i = e.getCoordinates(n), r = {}, s = {}, a = {}, o = {}, u = {};
[ "top", "right", "bottom", "left" ].each(function(i) {
r[i] = t.getStyle("margin-" + i).toInt(), s[i] = t.getStyle("border-" + i).toInt(), 
a[i] = e.getStyle("margin-" + i).toInt(), o[i] = e.getStyle("border-" + i).toInt(), 
u[i] = n.getStyle("padding-" + i).toInt();
}, this);
var l = t.offsetWidth + r.left + r.right, c = t.offsetHeight + r.top + r.bottom, d = 0, h = 0, m = i.right - o.right - l, f = i.bottom - o.bottom - c;
if (this.options.includeMargins ? (d += r.left, h += r.top) :(m += r.right, f += r.bottom), 
"relative" == t.getStyle("position")) {
var p = t.getCoordinates(n);
p.left -= t.getStyle("left").toInt(), p.top -= t.getStyle("top").toInt(), d -= p.left, 
h -= p.top, "relative" != e.getStyle("position") && (d += o.left, h += o.top), m += r.left - p.left, 
f += r.top - p.top, e != n && (d += a.left + u.left, h += (Browser.ie6 || Browser.ie7 ? 0 :a.top) + u.top);
} else d -= r.left, h -= r.top, e != n && (d += i.left + o.left, h += i.top + o.top);
return {
x:[ d, m ],
y:[ h, f ]
};
},
getDroppableCoordinates:function(t) {
var e = t.getCoordinates();
if ("fixed" == t.getStyle("position")) {
var n = window.getScroll();
e.left += n.x, e.right += n.x, e.top += n.y, e.bottom += n.y;
}
return e;
},
checkDroppables:function() {
var t = this.droppables.filter(function(t, e) {
t = this.positions ? this.positions[e] :this.getDroppableCoordinates(t);
var n = this.mouse.now;
return n.x > t.left && n.x < t.right && n.y < t.bottom && n.y > t.top;
}, this).getLast();
this.overed != t && (this.overed && this.fireEvent("leave", [ this.element, this.overed ]), 
t && this.fireEvent("enter", [ this.element, t ]), this.overed = t);
},
drag:function(t) {
this.parent(t), this.options.checkDroppables && this.droppables.length && this.checkDroppables();
},
stop:function(t) {
return this.checkDroppables(), this.fireEvent("drop", [ this.element, this.overed, t ]), 
this.overed = null, this.parent(t);
}
}), Element.implement({
makeDraggable:function(t) {
var e = new Drag.Move(this, t);
return this.store("dragger", e), e;
}
});

var Asset = {
javascript:function(t, e) {
e || (e = {});
var n = new Element("script", {
src:t,
type:"text/javascript"
}), i = e.document || document, r = e.onload || e.onLoad;
return delete e.onload, delete e.onLoad, delete e.document, r && ("undefined" != typeof n.onreadystatechange ? n.addEvent("readystatechange", function() {
[ "loaded", "complete" ].contains(this.readyState) && r.call(this);
}) :n.addEvent("load", r)), n.set(e).inject(i.head);
},
css:function(t, e) {
e || (e = {});
var n = new Element("link", {
rel:"stylesheet",
media:"screen",
type:"text/css",
href:t
}), i = e.onload || e.onLoad, r = e.document || document;
return delete e.onload, delete e.onLoad, delete e.document, i && n.addEvent("load", i), 
n.set(e).inject(r.head);
},
image:function(t, e) {
e || (e = {});
var n = new Image(), i = document.id(n) || new Element("img");
return [ "load", "abort", "error" ].each(function(t) {
var r = "on" + t, s = "on" + t.capitalize(), a = e[r] || e[s] || function() {};
delete e[s], delete e[r], n[r] = function() {
n && (i.parentNode || (i.width = n.width, i.height = n.height), n = n.onload = n.onabort = n.onerror = null, 
a.delay(1, i, i), i.fireEvent(t, i, 1));
};
}), n.src = i.src = t, n && n.complete && n.onload.delay(1), i.set(e);
},
images:function(t, e) {
t = Array.from(t);
var n = function() {}, i = 0;
return e = Object.merge({
onComplete:n,
onProgress:n,
onError:n,
properties:{}
}, e), new Elements(t.map(function(n, r) {
return Asset.image(n, Object.append(e.properties, {
onload:function() {
i++, e.onProgress.call(this, i, r, n), i == t.length && e.onComplete();
},
onerror:function() {
i++, e.onError.call(this, i, r, n), i == t.length && e.onComplete();
}
}));
}));
}
};

!function() {
[ Element, Window, Document ].invoke("implement", {
hasEvent:function(t) {
var e = this.retrieve("events"), n = e && e[t] ? e[t].values :null;
if (n) for (var i = n.length; i--; ) if (i in n) return !0;
return !1;
}
});
var t = function(t, e, n) {
return e = t[e], n = t[n], function(t, i) {
n && !this.hasEvent(i) && n.call(this, t, i), e && e.call(this, t, i);
};
}, e = function(t, e, n) {
return function(i, r) {
e[n].call(this, i, r), t[n].call(this, i, r);
};
}, n = Element.Events;
Element.defineCustomEvent = function(i, r) {
var s = n[r.base];
return r.onAdd = t(r, "onAdd", "onSetup"), r.onRemove = t(r, "onRemove", "onTeardown"), 
n[i] = s ? Object.append({}, r, {
base:s.base,
condition:function(t, e) {
return !(s.condition && !s.condition.call(this, t, e) || r.condition && !r.condition.call(this, t, e));
},
onAdd:e(r, s, "onAdd"),
onRemove:e(r, s, "onRemove")
}) :r, this;
}, Element.enableCustomEvents = function() {
Object.each(n, function(t, e) {
t.onEnable && t.onEnable.call(t, e);
});
}, Element.disableCustomEvents = function() {
Object.each(n, function(t, e) {
t.onDisable && t.onDisable.call(t, e);
});
};
}(), function() {
var t = this, e = t._, n = {}, i = Array.prototype, r = Object.prototype, s = Function.prototype, a = i.push, o = i.slice, u = i.concat, l = r.toString, c = r.hasOwnProperty, d = i.forEach, h = i.map, m = i.reduce, f = i.reduceRight, p = i.filter, _ = i.every, g = i.some, y = i.indexOf, v = i.lastIndexOf, M = Array.isArray, b = Object.keys, L = s.bind, w = function(t) {
return t instanceof w ? t :this instanceof w ? (this._wrapped = t, void 0) :new w(t);
};
"undefined" != typeof exports ? ("undefined" != typeof module && module.exports && (exports = module.exports = w), 
exports._ = w) :t._ = w, w.VERSION = "1.4.4";
var k = w.each = w.forEach = function(t, e, i) {
if (null != t) if (d && t.forEach === d) t.forEach(e, i); else if (t.length === +t.length) {
for (var r = 0, s = t.length; s > r; r++) if (e.call(i, t[r], r, t) === n) return;
} else for (var a in t) if (w.has(t, a) && e.call(i, t[a], a, t) === n) return;
};
w.map = w.collect = function(t, e, n) {
var i = [];
return null == t ? i :h && t.map === h ? t.map(e, n) :(k(t, function(t, r, s) {
i[i.length] = e.call(n, t, r, s);
}), i);
};
var Y = "Reduce of empty array with no initial value";
w.reduce = w.foldl = w.inject = function(t, e, n, i) {
var r = arguments.length > 2;
if (null == t && (t = []), m && t.reduce === m) return i && (e = w.bind(e, i)), 
r ? t.reduce(e, n) :t.reduce(e);
if (k(t, function(t, s, a) {
r ? n = e.call(i, n, t, s, a) :(n = t, r = !0);
}), !r) throw new TypeError(Y);
return n;
}, w.reduceRight = w.foldr = function(t, e, n, i) {
var r = arguments.length > 2;
if (null == t && (t = []), f && t.reduceRight === f) return i && (e = w.bind(e, i)), 
r ? t.reduceRight(e, n) :t.reduceRight(e);
var s = t.length;
if (s !== +s) {
var a = w.keys(t);
s = a.length;
}
if (k(t, function(o, u, l) {
u = a ? a[--s] :--s, r ? n = e.call(i, n, t[u], u, l) :(n = t[u], r = !0);
}), !r) throw new TypeError(Y);
return n;
}, w.find = w.detect = function(t, e, n) {
var i;
return T(t, function(t, r, s) {
return e.call(n, t, r, s) ? (i = t, !0) :void 0;
}), i;
}, w.filter = w.select = function(t, e, n) {
var i = [];
return null == t ? i :p && t.filter === p ? t.filter(e, n) :(k(t, function(t, r, s) {
e.call(n, t, r, s) && (i[i.length] = t);
}), i);
}, w.reject = function(t, e, n) {
return w.filter(t, function(t, i, r) {
return !e.call(n, t, i, r);
}, n);
}, w.every = w.all = function(t, e, i) {
e || (e = w.identity);
var r = !0;
return null == t ? r :_ && t.every === _ ? t.every(e, i) :(k(t, function(t, s, a) {
return (r = r && e.call(i, t, s, a)) ? void 0 :n;
}), !!r);
};
var T = w.some = w.any = function(t, e, i) {
e || (e = w.identity);
var r = !1;
return null == t ? r :g && t.some === g ? t.some(e, i) :(k(t, function(t, s, a) {
return r || (r = e.call(i, t, s, a)) ? n :void 0;
}), !!r);
};
w.contains = w.include = function(t, e) {
return null == t ? !1 :y && t.indexOf === y ? -1 != t.indexOf(e) :T(t, function(t) {
return t === e;
});
}, w.invoke = function(t, e) {
var n = o.call(arguments, 2), i = w.isFunction(e);
return w.map(t, function(t) {
return (i ? e :t[e]).apply(t, n);
});
}, w.pluck = function(t, e) {
return w.map(t, function(t) {
return t[e];
});
}, w.where = function(t, e, n) {
return w.isEmpty(e) ? n ? null :[] :w[n ? "find" :"filter"](t, function(t) {
for (var n in e) if (e[n] !== t[n]) return !1;
return !0;
});
}, w.findWhere = function(t, e) {
return w.where(t, e, !0);
}, w.max = function(t, e, n) {
if (!e && w.isArray(t) && t[0] === +t[0] && t.length < 65535) return Math.max.apply(Math, t);
if (!e && w.isEmpty(t)) return -1/0;
var i = {
computed:-1/0,
value:-1/0
};
return k(t, function(t, r, s) {
var a = e ? e.call(n, t, r, s) :t;
a >= i.computed && (i = {
value:t,
computed:a
});
}), i.value;
}, w.min = function(t, e, n) {
if (!e && w.isArray(t) && t[0] === +t[0] && t.length < 65535) return Math.min.apply(Math, t);
if (!e && w.isEmpty(t)) return 1/0;
var i = {
computed:1/0,
value:1/0
};
return k(t, function(t, r, s) {
var a = e ? e.call(n, t, r, s) :t;
a < i.computed && (i = {
value:t,
computed:a
});
}), i.value;
}, w.shuffle = function(t) {
var e, n = 0, i = [];
return k(t, function(t) {
e = w.random(n++), i[n - 1] = i[e], i[e] = t;
}), i;
};
var D = function(t) {
return w.isFunction(t) ? t :function(e) {
return e[t];
};
};
w.sortBy = function(t, e, n) {
var i = D(e);
return w.pluck(w.map(t, function(t, e, r) {
return {
value:t,
index:e,
criteria:i.call(n, t, e, r)
};
}).sort(function(t, e) {
var n = t.criteria, i = e.criteria;
if (n !== i) {
if (n > i || void 0 === n) return 1;
if (i > n || void 0 === i) return -1;
}
return t.index < e.index ? -1 :1;
}), "value");
};
var S = function(t, e, n, i) {
var r = {}, s = D(e || w.identity);
return k(t, function(e, a) {
var o = s.call(n, e, a, t);
i(r, o, e);
}), r;
};
w.groupBy = function(t, e, n) {
return S(t, e, n, function(t, e, n) {
(w.has(t, e) ? t[e] :t[e] = []).push(n);
});
}, w.countBy = function(t, e, n) {
return S(t, e, n, function(t, e) {
w.has(t, e) || (t[e] = 0), t[e]++;
});
}, w.sortedIndex = function(t, e, n, i) {
n = null == n ? w.identity :D(n);
for (var r = n.call(i, e), s = 0, a = t.length; a > s; ) {
var o = s + a >>> 1;
n.call(i, t[o]) < r ? s = o + 1 :a = o;
}
return s;
}, w.toArray = function(t) {
return t ? w.isArray(t) ? o.call(t) :t.length === +t.length ? w.map(t, w.identity) :w.values(t) :[];
}, w.size = function(t) {
return null == t ? 0 :t.length === +t.length ? t.length :w.keys(t).length;
}, w.first = w.head = w.take = function(t, e, n) {
return null == t ? void 0 :null == e || n ? t[0] :o.call(t, 0, e);
}, w.initial = function(t, e, n) {
return o.call(t, 0, t.length - (null == e || n ? 1 :e));
}, w.last = function(t, e, n) {
return null == t ? void 0 :null == e || n ? t[t.length - 1] :o.call(t, Math.max(t.length - e, 0));
}, w.rest = w.tail = w.drop = function(t, e, n) {
return o.call(t, null == e || n ? 1 :e);
}, w.compact = function(t) {
return w.filter(t, w.identity);
};
var E = function(t, e, n) {
return k(t, function(t) {
w.isArray(t) ? e ? a.apply(n, t) :E(t, e, n) :n.push(t);
}), n;
};
w.flatten = function(t, e) {
return E(t, e, []);
}, w.without = function(t) {
return w.difference(t, o.call(arguments, 1));
}, w.uniq = w.unique = function(t, e, n, i) {
w.isFunction(e) && (i = n, n = e, e = !1);
var r = n ? w.map(t, n, i) :t, s = [], a = [];
return k(r, function(n, i) {
(e ? i && a[a.length - 1] === n :w.contains(a, n)) || (a.push(n), s.push(t[i]));
}), s;
}, w.union = function() {
return w.uniq(u.apply(i, arguments));
}, w.intersection = function(t) {
var e = o.call(arguments, 1);
return w.filter(w.uniq(t), function(t) {
return w.every(e, function(e) {
return w.indexOf(e, t) >= 0;
});
});
}, w.difference = function(t) {
var e = u.apply(i, o.call(arguments, 1));
return w.filter(t, function(t) {
return !w.contains(e, t);
});
}, w.zip = function() {
for (var t = o.call(arguments), e = w.max(w.pluck(t, "length")), n = new Array(e), i = 0; e > i; i++) n[i] = w.pluck(t, "" + i);
return n;
}, w.object = function(t, e) {
if (null == t) return {};
for (var n = {}, i = 0, r = t.length; r > i; i++) e ? n[t[i]] = e[i] :n[t[i][0]] = t[i][1];
return n;
}, w.indexOf = function(t, e, n) {
if (null == t) return -1;
var i = 0, r = t.length;
if (n) {
if ("number" != typeof n) return i = w.sortedIndex(t, e), t[i] === e ? i :-1;
i = 0 > n ? Math.max(0, r + n) :n;
}
if (y && t.indexOf === y) return t.indexOf(e, n);
for (;r > i; i++) if (t[i] === e) return i;
return -1;
}, w.lastIndexOf = function(t, e, n) {
if (null == t) return -1;
var i = null != n;
if (v && t.lastIndexOf === v) return i ? t.lastIndexOf(e, n) :t.lastIndexOf(e);
for (var r = i ? n :t.length; r--; ) if (t[r] === e) return r;
return -1;
}, w.range = function(t, e, n) {
arguments.length <= 1 && (e = t || 0, t = 0), n = arguments[2] || 1;
for (var i = Math.max(Math.ceil((e - t) / n), 0), r = 0, s = new Array(i); i > r; ) s[r++] = t, 
t += n;
return s;
}, w.bind = function(t, e) {
if (t.bind === L && L) return L.apply(t, o.call(arguments, 1));
var n = o.call(arguments, 2);
return function() {
return t.apply(e, n.concat(o.call(arguments)));
};
}, w.partial = function(t) {
var e = o.call(arguments, 1);
return function() {
return t.apply(this, e.concat(o.call(arguments)));
};
}, w.bindAll = function(t) {
var e = o.call(arguments, 1);
return 0 === e.length && (e = w.functions(t)), k(e, function(e) {
t[e] = w.bind(t[e], t);
}), t;
}, w.memoize = function(t, e) {
var n = {};
return e || (e = w.identity), function() {
var i = e.apply(this, arguments);
return w.has(n, i) ? n[i] :n[i] = t.apply(this, arguments);
};
}, w.delay = function(t, e) {
var n = o.call(arguments, 2);
return setTimeout(function() {
return t.apply(null, n);
}, e);
}, w.defer = function(t) {
return w.delay.apply(w, [ t, 1 ].concat(o.call(arguments, 1)));
}, w.throttle = function(t, e) {
var n, i, r, s, a = 0, o = function() {
a = new Date(), r = null, s = t.apply(n, i);
};
return function() {
var u = new Date(), l = e - (u - a);
return n = this, i = arguments, 0 >= l ? (clearTimeout(r), r = null, a = u, s = t.apply(n, i)) :r || (r = setTimeout(o, l)), 
s;
};
}, w.debounce = function(t, e, n) {
var i, r;
return function() {
var s = this, a = arguments, o = function() {
i = null, n || (r = t.apply(s, a));
}, u = n && !i;
return clearTimeout(i), i = setTimeout(o, e), u && (r = t.apply(s, a)), r;
};
}, w.once = function(t) {
var e, n = !1;
return function() {
return n ? e :(n = !0, e = t.apply(this, arguments), t = null, e);
};
}, w.wrap = function(t, e) {
return function() {
var n = [ t ];
return a.apply(n, arguments), e.apply(this, n);
};
}, w.compose = function() {
var t = arguments;
return function() {
for (var e = arguments, n = t.length - 1; n >= 0; n--) e = [ t[n].apply(this, e) ];
return e[0];
};
}, w.after = function(t, e) {
return 0 >= t ? e() :function() {
return --t < 1 ? e.apply(this, arguments) :void 0;
};
}, w.keys = b || function(t) {
if (t !== Object(t)) throw new TypeError("Invalid object");
var e = [];
for (var n in t) w.has(t, n) && (e[e.length] = n);
return e;
}, w.values = function(t) {
var e = [];
for (var n in t) w.has(t, n) && e.push(t[n]);
return e;
}, w.pairs = function(t) {
var e = [];
for (var n in t) w.has(t, n) && e.push([ n, t[n] ]);
return e;
}, w.invert = function(t) {
var e = {};
for (var n in t) w.has(t, n) && (e[t[n]] = n);
return e;
}, w.functions = w.methods = function(t) {
var e = [];
for (var n in t) w.isFunction(t[n]) && e.push(n);
return e.sort();
}, w.extend = function(t) {
return k(o.call(arguments, 1), function(e) {
if (e) for (var n in e) t[n] = e[n];
}), t;
}, w.pick = function(t) {
var e = {}, n = u.apply(i, o.call(arguments, 1));
return k(n, function(n) {
n in t && (e[n] = t[n]);
}), e;
}, w.omit = function(t) {
var e = {}, n = u.apply(i, o.call(arguments, 1));
for (var r in t) w.contains(n, r) || (e[r] = t[r]);
return e;
}, w.defaults = function(t) {
return k(o.call(arguments, 1), function(e) {
if (e) for (var n in e) null == t[n] && (t[n] = e[n]);
}), t;
}, w.clone = function(t) {
return w.isObject(t) ? w.isArray(t) ? t.slice() :w.extend({}, t) :t;
}, w.tap = function(t, e) {
return e(t), t;
};
var x = function(t, e, n, i) {
if (t === e) return 0 !== t || 1 / t == 1 / e;
if (null == t || null == e) return t === e;
t instanceof w && (t = t._wrapped), e instanceof w && (e = e._wrapped);
var r = l.call(t);
if (r != l.call(e)) return !1;
switch (r) {
case "[object String]":
return t == String(e);

case "[object Number]":
return t != +t ? e != +e :0 == t ? 1 / t == 1 / e :t == +e;

case "[object Date]":
case "[object Boolean]":
return +t == +e;

case "[object RegExp]":
return t.source == e.source && t.global == e.global && t.multiline == e.multiline && t.ignoreCase == e.ignoreCase;
}
if ("object" != typeof t || "object" != typeof e) return !1;
for (var s = n.length; s--; ) if (n[s] == t) return i[s] == e;
n.push(t), i.push(e);
var a = 0, o = !0;
if ("[object Array]" == r) {
if (a = t.length, o = a == e.length) for (;a-- && (o = x(t[a], e[a], n, i)); ) ;
} else {
var u = t.constructor, c = e.constructor;
if (u !== c && !(w.isFunction(u) && u instanceof u && w.isFunction(c) && c instanceof c)) return !1;
for (var d in t) if (w.has(t, d) && (a++, !(o = w.has(e, d) && x(t[d], e[d], n, i)))) break;
if (o) {
for (d in e) if (w.has(e, d) && !a--) break;
o = !a;
}
}
return n.pop(), i.pop(), o;
};
w.isEqual = function(t, e) {
return x(t, e, [], []);
}, w.isEmpty = function(t) {
if (null == t) return !0;
if (w.isArray(t) || w.isString(t)) return 0 === t.length;
for (var e in t) if (w.has(t, e)) return !1;
return !0;
}, w.isElement = function(t) {
return !(!t || 1 !== t.nodeType);
}, w.isArray = M || function(t) {
return "[object Array]" == l.call(t);
}, w.isObject = function(t) {
return t === Object(t);
}, k([ "Arguments", "Function", "String", "Number", "Date", "RegExp" ], function(t) {
w["is" + t] = function(e) {
return l.call(e) == "[object " + t + "]";
};
}), w.isArguments(arguments) || (w.isArguments = function(t) {
return !(!t || !w.has(t, "callee"));
}), "function" != typeof /./ && (w.isFunction = function(t) {
return "function" == typeof t;
}), w.isFinite = function(t) {
return isFinite(t) && !isNaN(parseFloat(t));
}, w.isNaN = function(t) {
return w.isNumber(t) && t != +t;
}, w.isBoolean = function(t) {
return t === !0 || t === !1 || "[object Boolean]" == l.call(t);
}, w.isNull = function(t) {
return null === t;
}, w.isUndefined = function(t) {
return void 0 === t;
}, w.has = function(t, e) {
return c.call(t, e);
}, w.noConflict = function() {
return t._ = e, this;
}, w.identity = function(t) {
return t;
}, w.times = function(t, e, n) {
for (var i = Array(t), r = 0; t > r; r++) i[r] = e.call(n, r);
return i;
}, w.random = function(t, e) {
return null == e && (e = t, t = 0), t + Math.floor(Math.random() * (e - t + 1));
};
var C = {
escape:{
"&":"&amp;",
"<":"&lt;",
">":"&gt;",
'"':"&quot;",
"'":"&#x27;",
"/":"&#x2F;"
}
};
C.unescape = w.invert(C.escape);
var O = {
escape:new RegExp("[" + w.keys(C.escape).join("") + "]", "g"),
unescape:new RegExp("(" + w.keys(C.unescape).join("|") + ")", "g")
};
w.each([ "escape", "unescape" ], function(t) {
w[t] = function(e) {
return null == e ? "" :("" + e).replace(O[t], function(e) {
return C[t][e];
});
};
}), w.result = function(t, e) {
if (null == t) return null;
var n = t[e];
return w.isFunction(n) ? n.call(t) :n;
}, w.mixin = function(t) {
k(w.functions(t), function(e) {
var n = w[e] = t[e];
w.prototype[e] = function() {
var t = [ this._wrapped ];
return a.apply(t, arguments), N.call(this, n.apply(w, t));
};
});
};
var A = 0;
w.uniqueId = function(t) {
var e = ++A + "";
return t ? t + e :e;
}, w.templateSettings = {
evaluate:/<%([\s\S]+?)%>/g,
interpolate:/<%=([\s\S]+?)%>/g,
escape:/<%-([\s\S]+?)%>/g
};
var j = /(.)^/, I = {
"'":"'",
"\\":"\\",
"\r":"r",
"\n":"n",
"	":"t",
"\u2028":"u2028",
"\u2029":"u2029"
}, F = /\\|'|\r|\n|\t|\u2028|\u2029/g;
w.template = function(t, e, n) {
var i;
n = w.defaults({}, n, w.templateSettings);
var r = new RegExp([ (n.escape || j).source, (n.interpolate || j).source, (n.evaluate || j).source ].join("|") + "|$", "g"), s = 0, a = "__p+='";
t.replace(r, function(e, n, i, r, o) {
return a += t.slice(s, o).replace(F, function(t) {
return "\\" + I[t];
}), n && (a += "'+\n((__t=(" + n + "))==null?'':_.escape(__t))+\n'"), i && (a += "'+\n((__t=(" + i + "))==null?'':__t)+\n'"), 
r && (a += "';\n" + r + "\n__p+='"), s = o + e.length, e;
}), a += "';\n", n.variable || (a = "with(obj||{}){\n" + a + "}\n"), a = "var __t,__p='',__j=Array.prototype.join,print=function(){__p+=__j.call(arguments,'');};\n" + a + "return __p;\n";
try {
i = new Function(n.variable || "obj", "_", a);
} catch (o) {
throw o.source = a, o;
}
if (e) return i(e, w);
var u = function(t) {
return i.call(this, t, w);
};
return u.source = "function(" + (n.variable || "obj") + "){\n" + a + "}", u;
}, w.chain = function(t) {
return w(t).chain();
};
var N = function(t) {
return this._chain ? w(t).chain() :t;
};
w.mixin(w), k([ "pop", "push", "reverse", "shift", "sort", "splice", "unshift" ], function(t) {
var e = i[t];
w.prototype[t] = function() {
var n = this._wrapped;
return e.apply(n, arguments), "shift" != t && "splice" != t || 0 !== n.length || delete n[0], 
N.call(this, n);
};
}), k([ "concat", "join", "slice" ], function(t) {
var e = i[t];
w.prototype[t] = function() {
return N.call(this, e.apply(this._wrapped, arguments));
};
}), w.extend(w.prototype, {
chain:function() {
return this._chain = !0, this;
},
value:function() {
return this._wrapped;
}
});
}.call(this), function() {
function t(t) {
var n = !1;
return function() {
if (n) throw new Error("Callback was already called.");
n = !0, t.apply(e, arguments);
};
}
var e, n, i = {};
e = this, null != e && (n = e.async), i.noConflict = function() {
return e.async = n, i;
};
var r = function(t, e) {
if (t.forEach) return t.forEach(e);
for (var n = 0; n < t.length; n += 1) e(t[n], n, t);
}, s = function(t, e) {
if (t.map) return t.map(e);
var n = [];
return r(t, function(t, i, r) {
n.push(e(t, i, r));
}), n;
}, a = function(t, e, n) {
return t.reduce ? t.reduce(e, n) :(r(t, function(t, i, r) {
n = e(n, t, i, r);
}), n);
}, o = function(t) {
if (Object.keys) return Object.keys(t);
var e = [];
for (var n in t) t.hasOwnProperty(n) && e.push(n);
return e;
};
"undefined" != typeof process && process.nextTick ? (i.nextTick = process.nextTick, 
i.setImmediate = "undefined" != typeof setImmediate ? setImmediate :i.nextTick) :"function" == typeof setImmediate ? (i.nextTick = function(t) {
setImmediate(t);
}, i.setImmediate = i.nextTick) :(i.nextTick = function(t) {
setTimeout(t, 0);
}, i.setImmediate = i.nextTick), i.each = function(e, n, i) {
if (i = i || function() {}, !e.length) return i();
var s = 0;
r(e, function(r) {
n(r, t(function(t) {
t ? (i(t), i = function() {}) :(s += 1, s >= e.length && i(null));
}));
});
}, i.forEach = i.each, i.eachSeries = function(t, e, n) {
if (n = n || function() {}, !t.length) return n();
var i = 0, r = function() {
e(t[i], function(e) {
e ? (n(e), n = function() {}) :(i += 1, i >= t.length ? n(null) :r());
});
};
r();
}, i.forEachSeries = i.eachSeries, i.eachLimit = function(t, e, n, i) {
var r = u(e);
r.apply(null, [ t, n, i ]);
}, i.forEachLimit = i.eachLimit;
var u = function(t) {
return function(e, n, i) {
if (i = i || function() {}, !e.length || 0 >= t) return i();
var r = 0, s = 0, a = 0;
!function o() {
if (r >= e.length) return i();
for (;t > a && s < e.length; ) s += 1, a += 1, n(e[s - 1], function(t) {
t ? (i(t), i = function() {}) :(r += 1, a -= 1, r >= e.length ? i() :o());
});
}();
};
}, l = function(t) {
return function() {
var e = Array.prototype.slice.call(arguments);
return t.apply(null, [ i.each ].concat(e));
};
}, c = function(t, e) {
return function() {
var n = Array.prototype.slice.call(arguments);
return e.apply(null, [ u(t) ].concat(n));
};
}, d = function(t) {
return function() {
var e = Array.prototype.slice.call(arguments);
return t.apply(null, [ i.eachSeries ].concat(e));
};
}, h = function(t, e, n, i) {
var r = [];
e = s(e, function(t, e) {
return {
index:e,
value:t
};
}), t(e, function(t, e) {
n(t.value, function(n, i) {
r[t.index] = i, e(n);
});
}, function(t) {
i(t, r);
});
};
i.map = l(h), i.mapSeries = d(h), i.mapLimit = function(t, e, n, i) {
return m(e)(t, n, i);
};
var m = function(t) {
return c(t, h);
};
i.reduce = function(t, e, n, r) {
i.eachSeries(t, function(t, i) {
n(e, t, function(t, n) {
e = n, i(t);
});
}, function(t) {
r(t, e);
});
}, i.inject = i.reduce, i.foldl = i.reduce, i.reduceRight = function(t, e, n, r) {
var a = s(t, function(t) {
return t;
}).reverse();
i.reduce(a, e, n, r);
}, i.foldr = i.reduceRight;
var f = function(t, e, n, i) {
var r = [];
e = s(e, function(t, e) {
return {
index:e,
value:t
};
}), t(e, function(t, e) {
n(t.value, function(n) {
n && r.push(t), e();
});
}, function() {
i(s(r.sort(function(t, e) {
return t.index - e.index;
}), function(t) {
return t.value;
}));
});
};
i.filter = l(f), i.filterSeries = d(f), i.select = i.filter, i.selectSeries = i.filterSeries;
var p = function(t, e, n, i) {
var r = [];
e = s(e, function(t, e) {
return {
index:e,
value:t
};
}), t(e, function(t, e) {
n(t.value, function(n) {
n || r.push(t), e();
});
}, function() {
i(s(r.sort(function(t, e) {
return t.index - e.index;
}), function(t) {
return t.value;
}));
});
};
i.reject = l(p), i.rejectSeries = d(p);
var _ = function(t, e, n, i) {
t(e, function(t, e) {
n(t, function(n) {
n ? (i(t), i = function() {}) :e();
});
}, function() {
i();
});
};
i.detect = l(_), i.detectSeries = d(_), i.some = function(t, e, n) {
i.each(t, function(t, i) {
e(t, function(t) {
t && (n(!0), n = function() {}), i();
});
}, function() {
n(!1);
});
}, i.any = i.some, i.every = function(t, e, n) {
i.each(t, function(t, i) {
e(t, function(t) {
t || (n(!1), n = function() {}), i();
});
}, function() {
n(!0);
});
}, i.all = i.every, i.sortBy = function(t, e, n) {
i.map(t, function(t, n) {
e(t, function(e, i) {
e ? n(e) :n(null, {
value:t,
criteria:i
});
});
}, function(t, e) {
if (t) return n(t);
var i = function(t, e) {
var n = t.criteria, i = e.criteria;
return i > n ? -1 :n > i ? 1 :0;
};
n(null, s(e.sort(i), function(t) {
return t.value;
}));
});
}, i.auto = function(t, e) {
e = e || function() {};
var n = o(t);
if (!n.length) return e(null);
var s = {}, u = [], l = function(t) {
u.unshift(t);
}, c = function(t) {
for (var e = 0; e < u.length; e += 1) if (u[e] === t) return u.splice(e, 1), void 0;
}, d = function() {
r(u.slice(0), function(t) {
t();
});
};
l(function() {
o(s).length === n.length && (e(null, s), e = function() {});
}), r(n, function(n) {
var u = t[n] instanceof Function ? [ t[n] ] :t[n], h = function(t) {
var a = Array.prototype.slice.call(arguments, 1);
if (a.length <= 1 && (a = a[0]), t) {
var u = {};
r(o(s), function(t) {
u[t] = s[t];
}), u[n] = a, e(t, u), e = function() {};
} else s[n] = a, i.setImmediate(d);
}, m = u.slice(0, Math.abs(u.length - 1)) || [], f = function() {
return a(m, function(t, e) {
return t && s.hasOwnProperty(e);
}, !0) && !s.hasOwnProperty(n);
};
if (f()) u[u.length - 1](h, s); else {
var p = function() {
f() && (c(p), u[u.length - 1](h, s));
};
l(p);
}
});
}, i.waterfall = function(t, e) {
if (e = e || function() {}, t.constructor !== Array) {
var n = new Error("First argument to waterfall must be an array of functions");
return e(n);
}
if (!t.length) return e();
var r = function(t) {
return function(n) {
if (n) e.apply(null, arguments), e = function() {}; else {
var s = Array.prototype.slice.call(arguments, 1), a = t.next();
a ? s.push(r(a)) :s.push(e), i.setImmediate(function() {
t.apply(null, s);
});
}
};
};
r(i.iterator(t))();
};
var g = function(t, e, n) {
if (n = n || function() {}, e.constructor === Array) t.map(e, function(t, e) {
t && t(function(t) {
var n = Array.prototype.slice.call(arguments, 1);
n.length <= 1 && (n = n[0]), e.call(null, t, n);
});
}, n); else {
var i = {};
t.each(o(e), function(t, n) {
e[t](function(e) {
var r = Array.prototype.slice.call(arguments, 1);
r.length <= 1 && (r = r[0]), i[t] = r, n(e);
});
}, function(t) {
n(t, i);
});
}
};
i.parallel = function(t, e) {
g({
map:i.map,
each:i.each
}, t, e);
}, i.parallelLimit = function(t, e, n) {
g({
map:m(e),
each:u(e)
}, t, n);
}, i.series = function(t, e) {
if (e = e || function() {}, t.constructor === Array) i.mapSeries(t, function(t, e) {
t && t(function(t) {
var n = Array.prototype.slice.call(arguments, 1);
n.length <= 1 && (n = n[0]), e.call(null, t, n);
});
}, e); else {
var n = {};
i.eachSeries(o(t), function(e, i) {
t[e](function(t) {
var r = Array.prototype.slice.call(arguments, 1);
r.length <= 1 && (r = r[0]), n[e] = r, i(t);
});
}, function(t) {
e(t, n);
});
}
}, i.iterator = function(t) {
var e = function(n) {
var i = function() {
return t.length && t[n].apply(null, arguments), i.next();
};
return i.next = function() {
return n < t.length - 1 ? e(n + 1) :null;
}, i;
};
return e(0);
}, i.apply = function(t) {
var e = Array.prototype.slice.call(arguments, 1);
return function() {
return t.apply(null, e.concat(Array.prototype.slice.call(arguments)));
};
};
var y = function(t, e, n, i) {
var r = [];
t(e, function(t, e) {
n(t, function(t, n) {
r = r.concat(n || []), e(t);
});
}, function(t) {
i(t, r);
});
};
i.concat = l(y), i.concatSeries = d(y), i.whilst = function(t, e, n) {
t() ? e(function(r) {
return r ? n(r) :(i.whilst(t, e, n), void 0);
}) :n();
}, i.doWhilst = function(t, e, n) {
t(function(r) {
return r ? n(r) :(e() ? i.doWhilst(t, e, n) :n(), void 0);
});
}, i.until = function(t, e, n) {
t() ? n() :e(function(r) {
return r ? n(r) :(i.until(t, e, n), void 0);
});
}, i.doUntil = function(t, e, n) {
t(function(r) {
return r ? n(r) :(e() ? n() :i.doUntil(t, e, n), void 0);
});
}, i.queue = function(e, n) {
function s(t, e, s, a) {
e.constructor !== Array && (e = [ e ]), r(e, function(e) {
var r = {
data:e,
callback:"function" == typeof a ? a :null
};
s ? t.tasks.unshift(r) :t.tasks.push(r), t.saturated && t.tasks.length === n && t.saturated(), 
i.setImmediate(t.process);
});
}
void 0 === n && (n = 1);
var a = 0, o = {
tasks:[],
concurrency:n,
saturated:null,
empty:null,
drain:null,
push:function(t, e) {
s(o, t, !1, e);
},
unshift:function(t, e) {
s(o, t, !0, e);
},
process:function() {
if (a < o.concurrency && o.tasks.length) {
var n = o.tasks.shift();
o.empty && 0 === o.tasks.length && o.empty(), a += 1;
var i = function() {
a -= 1, n.callback && n.callback.apply(n, arguments), o.drain && o.tasks.length + a === 0 && o.drain(), 
o.process();
}, r = t(i);
e(n.data, r);
}
},
length:function() {
return o.tasks.length;
},
running:function() {
return a;
}
};
return o;
}, i.cargo = function(t, e) {
var n = !1, a = [], o = {
tasks:a,
payload:e,
saturated:null,
empty:null,
drain:null,
push:function(t, n) {
t.constructor !== Array && (t = [ t ]), r(t, function(t) {
a.push({
data:t,
callback:"function" == typeof n ? n :null
}), o.saturated && a.length === e && o.saturated();
}), i.setImmediate(o.process);
},
process:function u() {
if (!n) {
if (0 === a.length) return o.drain && o.drain(), void 0;
var i = "number" == typeof e ? a.splice(0, e) :a.splice(0), l = s(i, function(t) {
return t.data;
});
o.empty && o.empty(), n = !0, t(l, function() {
n = !1;
var t = arguments;
r(i, function(e) {
e.callback && e.callback.apply(null, t);
}), u();
});
}
},
length:function() {
return a.length;
},
running:function() {
return n;
}
};
return o;
};
var v = function(t) {
return function(e) {
var n = Array.prototype.slice.call(arguments, 1);
e.apply(null, n.concat([ function(e) {
var n = Array.prototype.slice.call(arguments, 1);
"undefined" != typeof console && (e ? console.error && console.error(e) :console[t] && r(n, function(e) {
console[t](e);
}));
} ]));
};
};
i.log = v("log"), i.dir = v("dir"), i.memoize = function(t, e) {
var n = {}, i = {};
e = e || function(t) {
return t;
};
var r = function() {
var r = Array.prototype.slice.call(arguments), s = r.pop(), a = e.apply(null, r);
a in n ? s.apply(null, n[a]) :a in i ? i[a].push(s) :(i[a] = [ s ], t.apply(null, r.concat([ function() {
n[a] = arguments;
var t = i[a];
delete i[a];
for (var e = 0, r = t.length; r > e; e++) t[e].apply(null, arguments);
} ])));
};
return r.memo = n, r.unmemoized = t, r;
}, i.unmemoize = function(t) {
return function() {
return (t.unmemoized || t).apply(null, arguments);
};
}, i.times = function(t, e, n) {
for (var r = [], s = 0; t > s; s++) r.push(s);
return i.map(r, e, n);
}, i.timesSeries = function(t, e, n) {
for (var r = [], s = 0; t > s; s++) r.push(s);
return i.mapSeries(r, e, n);
}, i.compose = function() {
var t = Array.prototype.reverse.call(arguments);
return function() {
var e = this, n = Array.prototype.slice.call(arguments), r = n.pop();
i.reduce(t, n, function(t, n, i) {
n.apply(e, t.concat([ function() {
var t = arguments[0], e = Array.prototype.slice.call(arguments, 1);
i(t, e);
} ]));
}, function(t, n) {
r.apply(e, [ t ].concat(n));
});
};
};
var M = function(t, e) {
var n = function() {
var n = this, i = Array.prototype.slice.call(arguments), r = i.pop();
return t(e, function(t, e) {
t.apply(n, i.concat([ e ]));
}, r);
};
if (arguments.length > 2) {
var i = Array.prototype.slice.call(arguments, 2);
return n.apply(this, i);
}
return n;
};
i.applyEach = l(M), i.applyEachSeries = d(M), i.forever = function(t, e) {
function n(i) {
if (i) {
if (e) return e(i);
throw i;
}
t(n);
}
n();
}, "undefined" != typeof define && define.amd ? define([], function() {
return i;
}) :"undefined" != typeof module && module.exports ? module.exports = i :e.async = i;
}();

var SiftScience = new Class({
initialize:function(t) {
if (this.buildTemplate({
email:t.email,
account_key:"production" === Harrys.ENV ? "6b0666cb6c" :"2e5fcd7b80"
}), Browser.ie8 || Browser.ie7) {
var e = document.createElement("script");
e.text = this.compliedTemplate, e.type = "text/javascript", document.head.appendChild(e);
} else this.scriptTag = new Element("script", {
type:"text/javascript",
text:this.compliedTemplate
}), this.scriptTag.inject($(document.head), "bottom");
},
buildTemplate:function(t) {
var e = _.template("                var _user_id = '<%= email %>';                var _sift = _sift || []; _sift.push(['_setAccount', '<%= account_key %>']); _sift.push(['_setUserId', _user_id]); _sift.push(['_trackPageview']); (function() { function ls() { var e = document.createElement('script'); e.type = 'text/javascript'; e.async = true; e.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.siftscience.com/s.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(e, s); } if (window.attachEvent) { window.attachEvent('onload', ls); } else { window.addEventListener('load', ls, false); }})();");
this.compliedTemplate = e(t);
}
}), Loop = new Class({
loopCount:0,
isLooping:!1,
loopMethod:function() {},
setLoop:function(t, e) {
return wasLooping = this.isLooping, wasLooping && this.stopLoop(), this.loopMethod = t, 
this.loopDelay = e || 3e3, wasLooping && this.startLoop(), this;
},
stopLoop:function() {
return this.isLooping = !1, clearInterval(this.periodical), this;
},
startLoop:function(t, e) {
return this.isLooping || (this.isLooping = !0, e && this.looper(), this.periodical = this.looper.periodical(t || this.loopDelay, this)), 
this;
},
resetLoop:function() {
return this.loopCount = 0, this;
},
looper:function() {
return this.loopCount++, this.loopMethod(this.loopCount), this;
}
});

!function() {
var t = this.SlideShow = new Class({
Implements:[ Options, Events, Loop ],
options:{
delay:7e3,
transition:"crossFade",
duration:500,
autoplay:!1,
dataAttribute:"data-slideshow",
selector:"> *",
initialSlideIndex:0
},
transitioning:!1,
reversed:!1,
initialize:function(t, e, n) {
this.element = document.id(t), this.setOptions(e), n || this.setup();
},
setup:function(t) {
return t && this.setOptions(t), this.slides = this.element.getElements(this.options.selector), 
this.setupElement().setupSlides(), this.current = this.current || this.slides[this.options.initialSlideIndex], 
this.index = this.current.retrieve("slideshow-index"), this.setLoop(this.show.pass(this.reversed ? "previous" :"next", this), this.options.delay), 
this.options.autoplay && this.play(), this;
},
show:function(e, n) {
if (("next" == e || "previous" == e) && (e = this[e + "Slide"]()), "number" == typeof e && (e = this.slides[e]), 
e == this.current || this.transitioning) return this;
this.transitioning = !0, this.current.store("slideshow:oldStyles", this.current.get("style"));
var i = n && n.transition ? n.transition :e.retrieve("slideshow-transition"), r = n && n.duration ? n.duration :e.retrieve("slideshow-duration"), s = this.current.setStyle("z-index", 1), a = this.reset(e).setStyle("z-index", 0), o = this.index = a.retrieve("slideshow-index");
return slideData = {
previous:{
element:s,
index:s.retrieve("slideshow-index")
},
next:{
element:a,
index:o
}
}, this.fireEvent("show", slideData), t.transitions[i]({
previous:s,
next:a,
duration:r,
instance:this
}), function() {
s.setStyle("display", "none"), this.fireEvent("showComplete", slideData), this.transitioning = !1;
}.bind(this).delay(r), this.current = a, this;
},
play:function() {
return this.startLoop(), this.fireEvent("play"), this;
},
pause:function() {
return this.stopLoop(), this.fireEvent("pause"), this;
},
reverse:function() {
return this.setLoop(this.show.pass(this.reversed ? "next" :"previous", this), this.options.delay), 
this.reversed = !this.reversed, this.fireEvent("reverse"), this;
},
setupElement:function() {
return this.storeData(this.element), this.options.duration = this.element.retrieve("slideshow-duration"), 
this.options.transition = this.element.retrieve("slideshow-transition"), this.options.delay = this.element.retrieve("slideshow-delay"), 
"static" == this.element.getStyle("position") && this.element.setStyle("position", "relative"), 
this;
},
setupSlides:function() {
return this.slides.each(function(t, e) {
t.store("slideshow-index", e).store("slideshow:oldStyles", t.get("style")), this.storeData(t), 
t.setStyle("display", this.current || e == this.options.initialSlideIndex ? "" :"none");
}, this), this;
},
storeData:function(t) {
var e = this.options;
t.store("slideshow-transition", e.transition), t.store("slideshow-duration", e.duration), 
t == this.element && t.store("slideshow-delay", e.delay);
var n = t.get(this.options.dataAttribute);
return n ? (Slick.parse(n).expressions[0].each(function(e) {
t.store("slideshow-" + e.tag, e.pseudos[0].key);
}), this) :this;
},
reset:function(t) {
return t.set("style", t.retrieve("slideshow:oldStyles"));
},
nextSlide:function() {
return this.slides[this.index + 1] || this.slides[0];
},
previousSlide:function() {
return this.slides[this.index - 1] || this.slides.getLast();
},
toElement:function() {
return this.element;
}
});
t.transitions = {}, t.defineTransition = function(e, n) {
t.transitions[e] = n;
}, t.defineTransitions = function(e) {
Object.each(e, function(e, n) {
t.defineTransition(n, e);
});
};
}(), Element.Properties.slideshow = {
set:function(t) {
return this.get("slideshow").setup(t), this;
},
get:function() {
var t = this.retrieve("slideshow");
return t || (t = new SlideShow(this, {}, !0), this.store("slideshow", t)), t;
}
}, Element.implement({
playSlideShow:function(t) {
return this.get("slideshow").setup(t).play(), this;
},
pauseSlideShow:function() {
return this.get("slideshow").pause(), this;
}
}), SlideShow.defineTransitions({
none:function(t) {
return t.previous.setStyle("display", "none"), this;
},
fade:function(t) {
return t.previous.set("tween", {
duration:t.duration
}).fade("out"), this;
},
crossFade:function(t) {
return t.previous.set("tween", {
duration:t.duration
}).fade("out"), t.next.set("tween", {
duration:t.duration
}).fade("in"), this;
},
fadeThroughBackground:function(t) {
var e = t.duration / 2;
return t.next.set("tween", {
duration:e
}).fade("hide"), t.previous.set("tween", {
duration:e,
onComplete:function() {
t.next.fade("in");
}
}).fade("out"), this;
}
}), function() {
function t(t) {
return {
property:"left" == t || "right" == t ? "left" :"top",
inverted:"left" == t || "up" == t ? 1 :-1
};
}
function e(t, e, n) {
var i = {
duration:n.duration,
unit:"%"
};
"blind" == t && n.next.setStyle("z-index", 2), "slide" != t && (n.next.set("tween", i).setStyle(e.property, 100 * e.inverted + "%"), 
n.next.tween(e.property, 0)), "blind" != t && n.previous.set("tween", i).tween(e.property, -(100 * e.inverted));
}
[ "left", "right", "up", "down" ].each(function(n) {
var i = n.capitalize(), r = "blind" + i, s = "slide" + i;
[ [ "push" + i, function() {
var i = t(n);
return function(t) {
e("push", i, t);
};
}() ], [ r, function() {
var i = t(n);
return function(t) {
e("blind", i, t);
};
}() ], [ s, function() {
var i = t(n);
return function(t) {
e("slide", i, t);
};
}() ], [ r + "Fade", function(t) {
return this.fade(t)[r](t), this;
} ] ].each(function(t) {
SlideShow.defineTransition(t[0], t[1]);
});
});
}(), function(t) {
function e(t, e) {
return function(n) {
return u(t.call(this, n), e);
};
}
function n(t, e) {
return function(n) {
return this.lang().ordinal(t.call(this, n), e);
};
}
function i() {}
function r(t) {
M(t), a(this, t);
}
function s(t) {
var e = f(t), n = e.year || 0, i = e.month || 0, r = e.week || 0, s = e.day || 0, a = e.hour || 0, o = e.minute || 0, u = e.second || 0, l = e.millisecond || 0;
this._milliseconds = +l + 1e3 * u + 6e4 * o + 36e5 * a, this._days = +s + 7 * r, 
this._months = +i + 12 * n, this._data = {}, this._bubble();
}
function a(t, e) {
for (var n in e) e.hasOwnProperty(n) && (t[n] = e[n]);
return e.hasOwnProperty("toString") && (t.toString = e.toString), e.hasOwnProperty("valueOf") && (t.valueOf = e.valueOf), 
t;
}
function o(t) {
return 0 > t ? Math.ceil(t) :Math.floor(t);
}
function u(t, e, n) {
for (var i = Math.abs(t) + "", r = t >= 0; i.length < e; ) i = "0" + i;
return (r ? n ? "+" :"" :"-") + i;
}
function l(t, e, n, i) {
var r, s, a = e._milliseconds, o = e._days, u = e._months;
a && t._d.setTime(+t._d + a * n), (o || u) && (r = t.minute(), s = t.hour()), o && t.date(t.date() + o * n), 
u && t.month(t.month() + u * n), a && !i && ne.updateOffset(t), (o || u) && (t.minute(r), 
t.hour(s));
}
function c(t) {
return "[object Array]" === Object.prototype.toString.call(t);
}
function d(t) {
return "[object Date]" === Object.prototype.toString.call(t) || t instanceof Date;
}
function h(t, e, n) {
var i, r = Math.min(t.length, e.length), s = Math.abs(t.length - e.length), a = 0;
for (i = 0; r > i; i++) (n && t[i] !== e[i] || !n && _(t[i]) !== _(e[i])) && a++;
return a + s;
}
function m(t) {
if (t) {
var e = t.toLowerCase().replace(/(.)s$/, "$1");
t = Re[t] || $e[e] || e;
}
return t;
}
function f(t) {
var e, n, i = {};
for (n in t) t.hasOwnProperty(n) && (e = m(n), e && (i[e] = t[n]));
return i;
}
function p(e) {
var n, i;
if (0 === e.indexOf("week")) n = 7, i = "day"; else {
if (0 !== e.indexOf("month")) return;
n = 12, i = "month";
}
ne[e] = function(r, s) {
var a, o, u = ne.fn._lang[e], l = [];
if ("number" == typeof r && (s = r, r = t), o = function(t) {
var e = ne().utc().set(i, t);
return u.call(ne.fn._lang, e, r || "");
}, null != s) return o(s);
for (a = 0; n > a; a++) l.push(o(a));
return l;
};
}
function _(t) {
var e = +t, n = 0;
return 0 !== e && isFinite(e) && (n = e >= 0 ? Math.floor(e) :Math.ceil(e)), n;
}
function g(t, e) {
return new Date(Date.UTC(t, e + 1, 0)).getUTCDate();
}
function y(t) {
return v(t) ? 366 :365;
}
function v(t) {
return t % 4 === 0 && t % 100 !== 0 || t % 400 === 0;
}
function M(t) {
var e;
t._a && -2 === t._pf.overflow && (e = t._a[ue] < 0 || t._a[ue] > 11 ? ue :t._a[le] < 1 || t._a[le] > g(t._a[oe], t._a[ue]) ? le :t._a[ce] < 0 || t._a[ce] > 23 ? ce :t._a[de] < 0 || t._a[de] > 59 ? de :t._a[he] < 0 || t._a[he] > 59 ? he :t._a[me] < 0 || t._a[me] > 999 ? me :-1, 
t._pf._overflowDayOfYear && (oe > e || e > le) && (e = le), t._pf.overflow = e);
}
function b(t) {
t._pf = {
empty:!1,
unusedTokens:[],
unusedInput:[],
overflow:-2,
charsLeftOver:0,
nullInput:!1,
invalidMonth:null,
invalidFormat:!1,
userInvalidated:!1,
iso:!1
};
}
function L(t) {
return null == t._isValid && (t._isValid = !isNaN(t._d.getTime()) && t._pf.overflow < 0 && !t._pf.empty && !t._pf.invalidMonth && !t._pf.nullInput && !t._pf.invalidFormat && !t._pf.userInvalidated, 
t._strict && (t._isValid = t._isValid && 0 === t._pf.charsLeftOver && 0 === t._pf.unusedTokens.length)), 
t._isValid;
}
function w(t) {
return t ? t.toLowerCase().replace("_", "-") :t;
}
function k(t, e) {
return e._isUTC ? ne(t).zone(e._offset || 0) :ne(t).local();
}
function Y(t, e) {
return e.abbr = t, fe[t] || (fe[t] = new i()), fe[t].set(e), fe[t];
}
function T(t) {
delete fe[t];
}
function D(t) {
var e, n, i, r, s = 0, a = function(t) {
if (!fe[t] && pe) try {
require("./lang/" + t);
} catch (e) {}
return fe[t];
};
if (!t) return ne.fn._lang;
if (!c(t)) {
if (n = a(t)) return n;
t = [ t ];
}
for (;s < t.length; ) {
for (r = w(t[s]).split("-"), e = r.length, i = w(t[s + 1]), i = i ? i.split("-") :null; e > 0; ) {
if (n = a(r.slice(0, e).join("-"))) return n;
if (i && i.length >= e && h(r, i, !0) >= e - 1) break;
e--;
}
s++;
}
return ne.fn._lang;
}
function S(t) {
return t.match(/\[[\s\S]/) ? t.replace(/^\[|\]$/g, "") :t.replace(/\\/g, "");
}
function E(t) {
var e, n, i = t.match(ve);
for (e = 0, n = i.length; n > e; e++) i[e] = Je[i[e]] ? Je[i[e]] :S(i[e]);
return function(r) {
var s = "";
for (e = 0; n > e; e++) s += i[e] instanceof Function ? i[e].call(r, t) :i[e];
return s;
};
}
function x(t, e) {
return t.isValid() ? (e = C(e, t.lang()), Ue[e] || (Ue[e] = E(e)), Ue[e](t)) :t.lang().invalidDate();
}
function C(t, e) {
function n(t) {
return e.longDateFormat(t) || t;
}
var i = 5;
for (Me.lastIndex = 0; i >= 0 && Me.test(t); ) t = t.replace(Me, n), Me.lastIndex = 0, 
i -= 1;
return t;
}
function O(t, e) {
var n, i = e._strict;
switch (t) {
case "DDDD":
return Oe;

case "YYYY":
case "GGGG":
case "gggg":
return i ? Ae :we;

case "YYYYYY":
case "YYYYY":
case "GGGGG":
case "ggggg":
return i ? je :ke;

case "S":
if (i) return xe;

case "SS":
if (i) return Ce;

case "SSS":
case "DDD":
return i ? Oe :Le;

case "MMM":
case "MMMM":
case "dd":
case "ddd":
case "dddd":
return Te;

case "a":
case "A":
return D(e._l)._meridiemParse;

case "X":
return Ee;

case "Z":
case "ZZ":
return De;

case "T":
return Se;

case "SSSS":
return Ye;

case "MM":
case "DD":
case "YY":
case "GG":
case "gg":
case "HH":
case "hh":
case "mm":
case "ss":
case "ww":
case "WW":
return i ? Ce :be;

case "M":
case "D":
case "d":
case "H":
case "h":
case "m":
case "s":
case "w":
case "W":
case "e":
case "E":
return i ? xe :be;

default:
return n = new RegExp(P(H(t.replace("\\", "")), "i"));
}
}
function A(t) {
t = t || "";
var e = t.match(De) || [], n = e[e.length - 1] || [], i = (n + "").match(He) || [ "-", 0, 0 ], r = +(60 * i[1]) + _(i[2]);
return "+" === i[0] ? -r :r;
}
function j(t, e, n) {
var i, r = n._a;
switch (t) {
case "M":
case "MM":
null != e && (r[ue] = _(e) - 1);
break;

case "MMM":
case "MMMM":
i = D(n._l).monthsParse(e), null != i ? r[ue] = i :n._pf.invalidMonth = e;
break;

case "D":
case "DD":
null != e && (r[le] = _(e));
break;

case "DDD":
case "DDDD":
null != e && (n._dayOfYear = _(e));
break;

case "YY":
r[oe] = _(e) + (_(e) > 68 ? 1900 :2e3);
break;

case "YYYY":
case "YYYYY":
case "YYYYYY":
r[oe] = _(e);
break;

case "a":
case "A":
n._isPm = D(n._l).isPM(e);
break;

case "H":
case "HH":
case "h":
case "hh":
r[ce] = _(e);
break;

case "m":
case "mm":
r[de] = _(e);
break;

case "s":
case "ss":
r[he] = _(e);
break;

case "S":
case "SS":
case "SSS":
case "SSSS":
r[me] = _(1e3 * ("0." + e));
break;

case "X":
n._d = new Date(1e3 * parseFloat(e));
break;

case "Z":
case "ZZ":
n._useUTC = !0, n._tzm = A(e);
break;

case "w":
case "ww":
case "W":
case "WW":
case "d":
case "dd":
case "ddd":
case "dddd":
case "e":
case "E":
t = t.substr(0, 1);

case "gg":
case "gggg":
case "GG":
case "GGGG":
case "GGGGG":
t = t.substr(0, 2), e && (n._w = n._w || {}, n._w[t] = e);
}
}
function I(t) {
var e, n, i, r, s, a, o, u, l, c, d = [];
if (!t._d) {
for (i = N(t), t._w && null == t._a[le] && null == t._a[ue] && (s = function(e) {
var n = parseInt(e, 10);
return e ? e.length < 3 ? n > 68 ? 1900 + n :2e3 + n :n :null == t._a[oe] ? ne().weekYear() :t._a[oe];
}, a = t._w, null != a.GG || null != a.W || null != a.E ? o = X(s(a.GG), a.W || 1, a.E, 4, 1) :(u = D(t._l), 
l = null != a.d ? B(a.d, u) :null != a.e ? parseInt(a.e, 10) + u._week.dow :0, c = parseInt(a.w, 10) || 1, 
null != a.d && l < u._week.dow && c++, o = X(s(a.gg), c, l, u._week.doy, u._week.dow)), 
t._a[oe] = o.year, t._dayOfYear = o.dayOfYear), t._dayOfYear && (r = null == t._a[oe] ? i[oe] :t._a[oe], 
t._dayOfYear > y(r) && (t._pf._overflowDayOfYear = !0), n = q(r, 0, t._dayOfYear), 
t._a[ue] = n.getUTCMonth(), t._a[le] = n.getUTCDate()), e = 0; 3 > e && null == t._a[e]; ++e) t._a[e] = d[e] = i[e];
for (;7 > e; e++) t._a[e] = d[e] = null == t._a[e] ? 2 === e ? 1 :0 :t._a[e];
d[ce] += _((t._tzm || 0) / 60), d[de] += _((t._tzm || 0) % 60), t._d = (t._useUTC ? q :U).apply(null, d);
}
}
function F(t) {
var e;
t._d || (e = f(t._i), t._a = [ e.year, e.month, e.day, e.hour, e.minute, e.second, e.millisecond ], 
I(t));
}
function N(t) {
var e = new Date();
return t._useUTC ? [ e.getUTCFullYear(), e.getUTCMonth(), e.getUTCDate() ] :[ e.getFullYear(), e.getMonth(), e.getDate() ];
}
function z(t) {
t._a = [], t._pf.empty = !0;
var e, n, i, r, s, a = D(t._l), o = "" + t._i, u = o.length, l = 0;
for (i = C(t._f, a).match(ve) || [], e = 0; e < i.length; e++) r = i[e], n = (o.match(O(r, t)) || [])[0], 
n && (s = o.substr(0, o.indexOf(n)), s.length > 0 && t._pf.unusedInput.push(s), 
o = o.slice(o.indexOf(n) + n.length), l += n.length), Je[r] ? (n ? t._pf.empty = !1 :t._pf.unusedTokens.push(r), 
j(r, n, t)) :t._strict && !n && t._pf.unusedTokens.push(r);
t._pf.charsLeftOver = u - l, o.length > 0 && t._pf.unusedInput.push(o), t._isPm && t._a[ce] < 12 && (t._a[ce] += 12), 
t._isPm === !1 && 12 === t._a[ce] && (t._a[ce] = 0), I(t), M(t);
}
function H(t) {
return t.replace(/\\(\[)|\\(\])|\[([^\]\[]*)\]|\\(.)/g, function(t, e, n, i, r) {
return e || n || i || r;
});
}
function P(t) {
return t.replace(/[-\/\\^$*+?.()|[\]{}]/g, "\\$&");
}
function W(t) {
var e, n, i, r, s;
if (0 === t._f.length) return t._pf.invalidFormat = !0, t._d = new Date(0/0), void 0;
for (r = 0; r < t._f.length; r++) s = 0, e = a({}, t), b(e), e._f = t._f[r], z(e), 
L(e) && (s += e._pf.charsLeftOver, s += 10 * e._pf.unusedTokens.length, e._pf.score = s, 
(null == i || i > s) && (i = s, n = e));
a(t, n || e);
}
function R(t) {
var e, n = t._i, i = Ie.exec(n);
if (i) {
for (t._pf.iso = !0, e = 4; e > 0; e--) if (i[e]) {
t._f = Ne[e - 1] + (i[6] || " ");
break;
}
for (e = 0; 4 > e; e++) if (ze[e][1].exec(n)) {
t._f += ze[e][0];
break;
}
n.match(De) && (t._f += "Z"), z(t);
} else t._d = new Date(n);
}
function $(e) {
var n = e._i, i = _e.exec(n);
n === t ? e._d = new Date() :i ? e._d = new Date(+i[1]) :"string" == typeof n ? R(e) :c(n) ? (e._a = n.slice(0), 
I(e)) :d(n) ? e._d = new Date(+n) :"object" == typeof n ? F(e) :e._d = new Date(n);
}
function U(t, e, n, i, r, s, a) {
var o = new Date(t, e, n, i, r, s, a);
return 1970 > t && o.setFullYear(t), o;
}
function q(t) {
var e = new Date(Date.UTC.apply(null, arguments));
return 1970 > t && e.setUTCFullYear(t), e;
}
function B(t, e) {
if ("string" == typeof t) if (isNaN(t)) {
if (t = e.weekdaysParse(t), "number" != typeof t) return null;
} else t = parseInt(t, 10);
return t;
}
function J(t, e, n, i, r) {
return r.relativeTime(e || 1, !!n, t, i);
}
function G(t, e, n) {
var i = ae(Math.abs(t) / 1e3), r = ae(i / 60), s = ae(r / 60), a = ae(s / 24), o = ae(a / 365), u = 45 > i && [ "s", i ] || 1 === r && [ "m" ] || 45 > r && [ "mm", r ] || 1 === s && [ "h" ] || 22 > s && [ "hh", s ] || 1 === a && [ "d" ] || 25 >= a && [ "dd", a ] || 45 >= a && [ "M" ] || 345 > a && [ "MM", ae(a / 30) ] || 1 === o && [ "y" ] || [ "yy", o ];
return u[2] = e, u[3] = t > 0, u[4] = n, J.apply({}, u);
}
function V(t, e, n) {
var i, r = n - e, s = n - t.day();
return s > r && (s -= 7), r - 7 > s && (s += 7), i = ne(t).add("d", s), {
week:Math.ceil(i.dayOfYear() / 7),
year:i.year()
};
}
function X(t, e, n, i, r) {
var s, a, o = new Date(u(t, 6, !0) + "-01-01").getUTCDay();
return n = null != n ? n :r, s = r - o + (o > i ? 7 :0), a = 7 * (e - 1) + (n - r) + s + 1, 
{
year:a > 0 ? t :t - 1,
dayOfYear:a > 0 ? a :y(t - 1) + a
};
}
function K(t) {
var e = t._i, n = t._f;
return "undefined" == typeof t._pf && b(t), null === e ? ne.invalid({
nullInput:!0
}) :("string" == typeof e && (t._i = e = D().preparse(e)), ne.isMoment(e) ? (t = a({}, e), 
t._d = new Date(+e._d)) :n ? c(n) ? W(t) :z(t) :$(t), new r(t));
}
function Q(t, e) {
ne.fn[t] = ne.fn[t + "s"] = function(t) {
var n = this._isUTC ? "UTC" :"";
return null != t ? (this._d["set" + n + e](t), ne.updateOffset(this), this) :this._d["get" + n + e]();
};
}
function Z(t) {
ne.duration.fn[t] = function() {
return this._data[t];
};
}
function te(t, e) {
ne.duration.fn["as" + t] = function() {
return +this / e;
};
}
function ee(t) {
var e = !1, n = ne;
"undefined" == typeof ender && (t ? (se.moment = function() {
return !e && console && console.warn && (e = !0, console.warn("Accessing Moment through the global scope is deprecated, and will be removed in an upcoming release.")), 
n.apply(null, arguments);
}, a(se.moment, n)) :se.moment = ne);
}
for (var ne, ie, re = "2.5.0", se = this, ae = Math.round, oe = 0, ue = 1, le = 2, ce = 3, de = 4, he = 5, me = 6, fe = {}, pe = "undefined" != typeof module && module.exports && "undefined" != typeof require, _e = /^\/?Date\((\-?\d+)/i, ge = /(\-)?(?:(\d*)\.)?(\d+)\:(\d+)(?:\:(\d+)\.?(\d{3})?)?/, ye = /^(-)?P(?:(?:([0-9,.]*)Y)?(?:([0-9,.]*)M)?(?:([0-9,.]*)D)?(?:T(?:([0-9,.]*)H)?(?:([0-9,.]*)M)?(?:([0-9,.]*)S)?)?|([0-9,.]*)W)$/, ve = /(\[[^\[]*\])|(\\)?(Mo|MM?M?M?|Do|DDDo|DD?D?D?|ddd?d?|do?|w[o|w]?|W[o|W]?|YYYYYY|YYYYY|YYYY|YY|gg(ggg?)?|GG(GGG?)?|e|E|a|A|hh?|HH?|mm?|ss?|S{1,4}|X|zz?|ZZ?|.)/g, Me = /(\[[^\[]*\])|(\\)?(LT|LL?L?L?|l{1,4})/g, be = /\d\d?/, Le = /\d{1,3}/, we = /\d{1,4}/, ke = /[+\-]?\d{1,6}/, Ye = /\d+/, Te = /[0-9]*['a-z\u00A0-\u05FF\u0700-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+|[\u0600-\u06FF\/]+(\s*?[\u0600-\u06FF]+){1,2}/i, De = /Z|[\+\-]\d\d:?\d\d/gi, Se = /T/i, Ee = /[\+\-]?\d+(\.\d{1,3})?/, xe = /\d/, Ce = /\d\d/, Oe = /\d{3}/, Ae = /\d{4}/, je = /[+\-]?\d{6}/, Ie = /^\s*\d{4}-(?:(\d\d-\d\d)|(W\d\d$)|(W\d\d-\d)|(\d\d\d))((T| )(\d\d(:\d\d(:\d\d(\.\d+)?)?)?)?([\+\-]\d\d(?::?\d\d)?|\s*Z)?)?$/, Fe = "YYYY-MM-DDTHH:mm:ssZ", Ne = [ "YYYY-MM-DD", "GGGG-[W]WW", "GGGG-[W]WW-E", "YYYY-DDD" ], ze = [ [ "HH:mm:ss.SSSS", /(T| )\d\d:\d\d:\d\d\.\d{1,3}/ ], [ "HH:mm:ss", /(T| )\d\d:\d\d:\d\d/ ], [ "HH:mm", /(T| )\d\d:\d\d/ ], [ "HH", /(T| )\d\d/ ] ], He = /([\+\-]|\d\d)/gi, Pe = "Date|Hours|Minutes|Seconds|Milliseconds".split("|"), We = {
Milliseconds:1,
Seconds:1e3,
Minutes:6e4,
Hours:36e5,
Days:864e5,
Months:2592e6,
Years:31536e6
}, Re = {
ms:"millisecond",
s:"second",
m:"minute",
h:"hour",
d:"day",
D:"date",
w:"week",
W:"isoWeek",
M:"month",
y:"year",
DDD:"dayOfYear",
e:"weekday",
E:"isoWeekday",
gg:"weekYear",
GG:"isoWeekYear"
}, $e = {
dayofyear:"dayOfYear",
isoweekday:"isoWeekday",
isoweek:"isoWeek",
weekyear:"weekYear",
isoweekyear:"isoWeekYear"
}, Ue = {}, qe = "DDD w W M D d".split(" "), Be = "M D H h m s w W".split(" "), Je = {
M:function() {
return this.month() + 1;
},
MMM:function(t) {
return this.lang().monthsShort(this, t);
},
MMMM:function(t) {
return this.lang().months(this, t);
},
D:function() {
return this.date();
},
DDD:function() {
return this.dayOfYear();
},
d:function() {
return this.day();
},
dd:function(t) {
return this.lang().weekdaysMin(this, t);
},
ddd:function(t) {
return this.lang().weekdaysShort(this, t);
},
dddd:function(t) {
return this.lang().weekdays(this, t);
},
w:function() {
return this.week();
},
W:function() {
return this.isoWeek();
},
YY:function() {
return u(this.year() % 100, 2);
},
YYYY:function() {
return u(this.year(), 4);
},
YYYYY:function() {
return u(this.year(), 5);
},
YYYYYY:function() {
var t = this.year(), e = t >= 0 ? "+" :"-";
return e + u(Math.abs(t), 6);
},
gg:function() {
return u(this.weekYear() % 100, 2);
},
gggg:function() {
return this.weekYear();
},
ggggg:function() {
return u(this.weekYear(), 5);
},
GG:function() {
return u(this.isoWeekYear() % 100, 2);
},
GGGG:function() {
return this.isoWeekYear();
},
GGGGG:function() {
return u(this.isoWeekYear(), 5);
},
e:function() {
return this.weekday();
},
E:function() {
return this.isoWeekday();
},
a:function() {
return this.lang().meridiem(this.hours(), this.minutes(), !0);
},
A:function() {
return this.lang().meridiem(this.hours(), this.minutes(), !1);
},
H:function() {
return this.hours();
},
h:function() {
return this.hours() % 12 || 12;
},
m:function() {
return this.minutes();
},
s:function() {
return this.seconds();
},
S:function() {
return _(this.milliseconds() / 100);
},
SS:function() {
return u(_(this.milliseconds() / 10), 2);
},
SSS:function() {
return u(this.milliseconds(), 3);
},
SSSS:function() {
return u(this.milliseconds(), 3);
},
Z:function() {
var t = -this.zone(), e = "+";
return 0 > t && (t = -t, e = "-"), e + u(_(t / 60), 2) + ":" + u(_(t) % 60, 2);
},
ZZ:function() {
var t = -this.zone(), e = "+";
return 0 > t && (t = -t, e = "-"), e + u(_(t / 60), 2) + u(_(t) % 60, 2);
},
z:function() {
return this.zoneAbbr();
},
zz:function() {
return this.zoneName();
},
X:function() {
return this.unix();
},
Q:function() {
return this.quarter();
}
}, Ge = [ "months", "monthsShort", "weekdays", "weekdaysShort", "weekdaysMin" ]; qe.length; ) ie = qe.pop(), 
Je[ie + "o"] = n(Je[ie], ie);
for (;Be.length; ) ie = Be.pop(), Je[ie + ie] = e(Je[ie], 2);
for (Je.DDDD = e(Je.DDD, 3), a(i.prototype, {
set:function(t) {
var e, n;
for (n in t) e = t[n], "function" == typeof e ? this[n] = e :this["_" + n] = e;
},
_months:"January_February_March_April_May_June_July_August_September_October_November_December".split("_"),
months:function(t) {
return this._months[t.month()];
},
_monthsShort:"Jan_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dec".split("_"),
monthsShort:function(t) {
return this._monthsShort[t.month()];
},
monthsParse:function(t) {
var e, n, i;
for (this._monthsParse || (this._monthsParse = []), e = 0; 12 > e; e++) if (this._monthsParse[e] || (n = ne.utc([ 2e3, e ]), 
i = "^" + this.months(n, "") + "|^" + this.monthsShort(n, ""), this._monthsParse[e] = new RegExp(i.replace(".", ""), "i")), 
this._monthsParse[e].test(t)) return e;
},
_weekdays:"Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday".split("_"),
weekdays:function(t) {
return this._weekdays[t.day()];
},
_weekdaysShort:"Sun_Mon_Tue_Wed_Thu_Fri_Sat".split("_"),
weekdaysShort:function(t) {
return this._weekdaysShort[t.day()];
},
_weekdaysMin:"Su_Mo_Tu_We_Th_Fr_Sa".split("_"),
weekdaysMin:function(t) {
return this._weekdaysMin[t.day()];
},
weekdaysParse:function(t) {
var e, n, i;
for (this._weekdaysParse || (this._weekdaysParse = []), e = 0; 7 > e; e++) if (this._weekdaysParse[e] || (n = ne([ 2e3, 1 ]).day(e), 
i = "^" + this.weekdays(n, "") + "|^" + this.weekdaysShort(n, "") + "|^" + this.weekdaysMin(n, ""), 
this._weekdaysParse[e] = new RegExp(i.replace(".", ""), "i")), this._weekdaysParse[e].test(t)) return e;
},
_longDateFormat:{
LT:"h:mm A",
L:"MM/DD/YYYY",
LL:"MMMM D YYYY",
LLL:"MMMM D YYYY LT",
LLLL:"dddd, MMMM D YYYY LT"
},
longDateFormat:function(t) {
var e = this._longDateFormat[t];
return !e && this._longDateFormat[t.toUpperCase()] && (e = this._longDateFormat[t.toUpperCase()].replace(/MMMM|MM|DD|dddd/g, function(t) {
return t.slice(1);
}), this._longDateFormat[t] = e), e;
},
isPM:function(t) {
return "p" === (t + "").toLowerCase().charAt(0);
},
_meridiemParse:/[ap]\.?m?\.?/i,
meridiem:function(t, e, n) {
return t > 11 ? n ? "pm" :"PM" :n ? "am" :"AM";
},
_calendar:{
sameDay:"[Today at] LT",
nextDay:"[Tomorrow at] LT",
nextWeek:"dddd [at] LT",
lastDay:"[Yesterday at] LT",
lastWeek:"[Last] dddd [at] LT",
sameElse:"L"
},
calendar:function(t, e) {
var n = this._calendar[t];
return "function" == typeof n ? n.apply(e) :n;
},
_relativeTime:{
future:"in %s",
past:"%s ago",
s:"a few seconds",
m:"a minute",
mm:"%d minutes",
h:"an hour",
hh:"%d hours",
d:"a day",
dd:"%d days",
M:"a month",
MM:"%d months",
y:"a year",
yy:"%d years"
},
relativeTime:function(t, e, n, i) {
var r = this._relativeTime[n];
return "function" == typeof r ? r(t, e, n, i) :r.replace(/%d/i, t);
},
pastFuture:function(t, e) {
var n = this._relativeTime[t > 0 ? "future" :"past"];
return "function" == typeof n ? n(e) :n.replace(/%s/i, e);
},
ordinal:function(t) {
return this._ordinal.replace("%d", t);
},
_ordinal:"%d",
preparse:function(t) {
return t;
},
postformat:function(t) {
return t;
},
week:function(t) {
return V(t, this._week.dow, this._week.doy).week;
},
_week:{
dow:0,
doy:6
},
_invalidDate:"Invalid date",
invalidDate:function() {
return this._invalidDate;
}
}), ne = function(e, n, i, r) {
return "boolean" == typeof i && (r = i, i = t), K({
_i:e,
_f:n,
_l:i,
_strict:r,
_isUTC:!1
});
}, ne.utc = function(e, n, i, r) {
var s;
return "boolean" == typeof i && (r = i, i = t), s = K({
_useUTC:!0,
_isUTC:!0,
_l:i,
_i:e,
_f:n,
_strict:r
}).utc();
}, ne.unix = function(t) {
return ne(1e3 * t);
}, ne.duration = function(t, e) {
var n, i, r, a = t, o = null;
return ne.isDuration(t) ? a = {
ms:t._milliseconds,
d:t._days,
M:t._months
} :"number" == typeof t ? (a = {}, e ? a[e] = t :a.milliseconds = t) :(o = ge.exec(t)) ? (n = "-" === o[1] ? -1 :1, 
a = {
y:0,
d:_(o[le]) * n,
h:_(o[ce]) * n,
m:_(o[de]) * n,
s:_(o[he]) * n,
ms:_(o[me]) * n
}) :(o = ye.exec(t)) && (n = "-" === o[1] ? -1 :1, r = function(t) {
var e = t && parseFloat(t.replace(",", "."));
return (isNaN(e) ? 0 :e) * n;
}, a = {
y:r(o[2]),
M:r(o[3]),
d:r(o[4]),
h:r(o[5]),
m:r(o[6]),
s:r(o[7]),
w:r(o[8])
}), i = new s(a), ne.isDuration(t) && t.hasOwnProperty("_lang") && (i._lang = t._lang), 
i;
}, ne.version = re, ne.defaultFormat = Fe, ne.updateOffset = function() {}, ne.lang = function(t, e) {
var n;
return t ? (e ? Y(w(t), e) :null === e ? (T(t), t = "en") :fe[t] || D(t), n = ne.duration.fn._lang = ne.fn._lang = D(t), 
n._abbr) :ne.fn._lang._abbr;
}, ne.langData = function(t) {
return t && t._lang && t._lang._abbr && (t = t._lang._abbr), D(t);
}, ne.isMoment = function(t) {
return t instanceof r;
}, ne.isDuration = function(t) {
return t instanceof s;
}, ie = Ge.length - 1; ie >= 0; --ie) p(Ge[ie]);
for (ne.normalizeUnits = function(t) {
return m(t);
}, ne.invalid = function(t) {
var e = ne.utc(0/0);
return null != t ? a(e._pf, t) :e._pf.userInvalidated = !0, e;
}, ne.parseZone = function(t) {
return ne(t).parseZone();
}, a(ne.fn = r.prototype, {
clone:function() {
return ne(this);
},
valueOf:function() {
return +this._d + 6e4 * (this._offset || 0);
},
unix:function() {
return Math.floor(+this / 1e3);
},
toString:function() {
return this.clone().lang("en").format("ddd MMM DD YYYY HH:mm:ss [GMT]ZZ");
},
toDate:function() {
return this._offset ? new Date(+this) :this._d;
},
toISOString:function() {
var t = ne(this).utc();
return 0 < t.year() && t.year() <= 9999 ? x(t, "YYYY-MM-DD[T]HH:mm:ss.SSS[Z]") :x(t, "YYYYYY-MM-DD[T]HH:mm:ss.SSS[Z]");
},
toArray:function() {
var t = this;
return [ t.year(), t.month(), t.date(), t.hours(), t.minutes(), t.seconds(), t.milliseconds() ];
},
isValid:function() {
return L(this);
},
isDSTShifted:function() {
return this._a ? this.isValid() && h(this._a, (this._isUTC ? ne.utc(this._a) :ne(this._a)).toArray()) > 0 :!1;
},
parsingFlags:function() {
return a({}, this._pf);
},
invalidAt:function() {
return this._pf.overflow;
},
utc:function() {
return this.zone(0);
},
local:function() {
return this.zone(0), this._isUTC = !1, this;
},
format:function(t) {
var e = x(this, t || ne.defaultFormat);
return this.lang().postformat(e);
},
add:function(t, e) {
var n;
return n = "string" == typeof t ? ne.duration(+e, t) :ne.duration(t, e), l(this, n, 1), 
this;
},
subtract:function(t, e) {
var n;
return n = "string" == typeof t ? ne.duration(+e, t) :ne.duration(t, e), l(this, n, -1), 
this;
},
diff:function(t, e, n) {
var i, r, s = k(t, this), a = 6e4 * (this.zone() - s.zone());
return e = m(e), "year" === e || "month" === e ? (i = 432e5 * (this.daysInMonth() + s.daysInMonth()), 
r = 12 * (this.year() - s.year()) + (this.month() - s.month()), r += (this - ne(this).startOf("month") - (s - ne(s).startOf("month"))) / i, 
r -= 6e4 * (this.zone() - ne(this).startOf("month").zone() - (s.zone() - ne(s).startOf("month").zone())) / i, 
"year" === e && (r /= 12)) :(i = this - s, r = "second" === e ? i / 1e3 :"minute" === e ? i / 6e4 :"hour" === e ? i / 36e5 :"day" === e ? (i - a) / 864e5 :"week" === e ? (i - a) / 6048e5 :i), 
n ? r :o(r);
},
from:function(t, e) {
return ne.duration(this.diff(t)).lang(this.lang()._abbr).humanize(!e);
},
fromNow:function(t) {
return this.from(ne(), t);
},
calendar:function() {
var t = k(ne(), this).startOf("day"), e = this.diff(t, "days", !0), n = -6 > e ? "sameElse" :-1 > e ? "lastWeek" :0 > e ? "lastDay" :1 > e ? "sameDay" :2 > e ? "nextDay" :7 > e ? "nextWeek" :"sameElse";
return this.format(this.lang().calendar(n, this));
},
isLeapYear:function() {
return v(this.year());
},
isDST:function() {
return this.zone() < this.clone().month(0).zone() || this.zone() < this.clone().month(5).zone();
},
day:function(t) {
var e = this._isUTC ? this._d.getUTCDay() :this._d.getDay();
return null != t ? (t = B(t, this.lang()), this.add({
d:t - e
})) :e;
},
month:function(t) {
var e, n = this._isUTC ? "UTC" :"";
return null != t ? "string" == typeof t && (t = this.lang().monthsParse(t), "number" != typeof t) ? this :(e = this.date(), 
this.date(1), this._d["set" + n + "Month"](t), this.date(Math.min(e, this.daysInMonth())), 
ne.updateOffset(this), this) :this._d["get" + n + "Month"]();
},
startOf:function(t) {
switch (t = m(t)) {
case "year":
this.month(0);

case "month":
this.date(1);

case "week":
case "isoWeek":
case "day":
this.hours(0);

case "hour":
this.minutes(0);

case "minute":
this.seconds(0);

case "second":
this.milliseconds(0);
}
return "week" === t ? this.weekday(0) :"isoWeek" === t && this.isoWeekday(1), this;
},
endOf:function(t) {
return t = m(t), this.startOf(t).add("isoWeek" === t ? "week" :t, 1).subtract("ms", 1);
},
isAfter:function(t, e) {
return e = "undefined" != typeof e ? e :"millisecond", +this.clone().startOf(e) > +ne(t).startOf(e);
},
isBefore:function(t, e) {
return e = "undefined" != typeof e ? e :"millisecond", +this.clone().startOf(e) < +ne(t).startOf(e);
},
isSame:function(t, e) {
return e = e || "ms", +this.clone().startOf(e) === +k(t, this).startOf(e);
},
min:function(t) {
return t = ne.apply(null, arguments), this > t ? this :t;
},
max:function(t) {
return t = ne.apply(null, arguments), t > this ? this :t;
},
zone:function(t) {
var e = this._offset || 0;
return null == t ? this._isUTC ? e :this._d.getTimezoneOffset() :("string" == typeof t && (t = A(t)), 
Math.abs(t) < 16 && (t = 60 * t), this._offset = t, this._isUTC = !0, e !== t && l(this, ne.duration(e - t, "m"), 1, !0), 
this);
},
zoneAbbr:function() {
return this._isUTC ? "UTC" :"";
},
zoneName:function() {
return this._isUTC ? "Coordinated Universal Time" :"";
},
parseZone:function() {
return this._tzm ? this.zone(this._tzm) :"string" == typeof this._i && this.zone(this._i), 
this;
},
hasAlignedHourOffset:function(t) {
return t = t ? ne(t).zone() :0, (this.zone() - t) % 60 === 0;
},
daysInMonth:function() {
return g(this.year(), this.month());
},
dayOfYear:function(t) {
var e = ae((ne(this).startOf("day") - ne(this).startOf("year")) / 864e5) + 1;
return null == t ? e :this.add("d", t - e);
},
quarter:function() {
return Math.ceil((this.month() + 1) / 3);
},
weekYear:function(t) {
var e = V(this, this.lang()._week.dow, this.lang()._week.doy).year;
return null == t ? e :this.add("y", t - e);
},
isoWeekYear:function(t) {
var e = V(this, 1, 4).year;
return null == t ? e :this.add("y", t - e);
},
week:function(t) {
var e = this.lang().week(this);
return null == t ? e :this.add("d", 7 * (t - e));
},
isoWeek:function(t) {
var e = V(this, 1, 4).week;
return null == t ? e :this.add("d", 7 * (t - e));
},
weekday:function(t) {
var e = (this.day() + 7 - this.lang()._week.dow) % 7;
return null == t ? e :this.add("d", t - e);
},
isoWeekday:function(t) {
return null == t ? this.day() || 7 :this.day(this.day() % 7 ? t :t - 7);
},
get:function(t) {
return t = m(t), this[t]();
},
set:function(t, e) {
return t = m(t), "function" == typeof this[t] && this[t](e), this;
},
lang:function(e) {
return e === t ? this._lang :(this._lang = D(e), this);
}
}), ie = 0; ie < Pe.length; ie++) Q(Pe[ie].toLowerCase().replace(/s$/, ""), Pe[ie]);
Q("year", "FullYear"), ne.fn.days = ne.fn.day, ne.fn.months = ne.fn.month, ne.fn.weeks = ne.fn.week, 
ne.fn.isoWeeks = ne.fn.isoWeek, ne.fn.toJSON = ne.fn.toISOString, a(ne.duration.fn = s.prototype, {
_bubble:function() {
var t, e, n, i, r = this._milliseconds, s = this._days, a = this._months, u = this._data;
u.milliseconds = r % 1e3, t = o(r / 1e3), u.seconds = t % 60, e = o(t / 60), u.minutes = e % 60, 
n = o(e / 60), u.hours = n % 24, s += o(n / 24), u.days = s % 30, a += o(s / 30), 
u.months = a % 12, i = o(a / 12), u.years = i;
},
weeks:function() {
return o(this.days() / 7);
},
valueOf:function() {
return this._milliseconds + 864e5 * this._days + this._months % 12 * 2592e6 + 31536e6 * _(this._months / 12);
},
humanize:function(t) {
var e = +this, n = G(e, !t, this.lang());
return t && (n = this.lang().pastFuture(e, n)), this.lang().postformat(n);
},
add:function(t, e) {
var n = ne.duration(t, e);
return this._milliseconds += n._milliseconds, this._days += n._days, this._months += n._months, 
this._bubble(), this;
},
subtract:function(t, e) {
var n = ne.duration(t, e);
return this._milliseconds -= n._milliseconds, this._days -= n._days, this._months -= n._months, 
this._bubble(), this;
},
get:function(t) {
return t = m(t), this[t.toLowerCase() + "s"]();
},
as:function(t) {
return t = m(t), this["as" + t.charAt(0).toUpperCase() + t.slice(1) + "s"]();
},
lang:ne.fn.lang,
toIsoString:function() {
var t = Math.abs(this.years()), e = Math.abs(this.months()), n = Math.abs(this.days()), i = Math.abs(this.hours()), r = Math.abs(this.minutes()), s = Math.abs(this.seconds() + this.milliseconds() / 1e3);
return this.asSeconds() ? (this.asSeconds() < 0 ? "-" :"") + "P" + (t ? t + "Y" :"") + (e ? e + "M" :"") + (n ? n + "D" :"") + (i || r || s ? "T" :"") + (i ? i + "H" :"") + (r ? r + "M" :"") + (s ? s + "S" :"") :"P0D";
}
});
for (ie in We) We.hasOwnProperty(ie) && (te(ie, We[ie]), Z(ie.toLowerCase()));
te("Weeks", 6048e5), ne.duration.fn.asMonths = function() {
return (+this - 31536e6 * this.years()) / 2592e6 + 12 * this.years();
}, ne.lang("en", {
ordinal:function(t) {
var e = t % 10, n = 1 === _(t % 100 / 10) ? "th" :1 === e ? "st" :2 === e ? "nd" :3 === e ? "rd" :"th";
return t + n;
}
}), function(t) {
t(ne);
}(function(t) {
return t.lang("ar-ma", {
months:"ÙŠÙ†Ø§ÙŠØ±_ÙØ¨Ø±Ø§ÙŠØ±_Ù…Ø§Ø±Ø³_Ø£Ø¨Ø±ÙŠÙ„_Ù…Ø§ÙŠ_ÙŠÙˆÙ†ÙŠÙˆ_ÙŠÙˆÙ„ÙŠÙˆØ²_ØºØ´Øª_Ø´ØªÙ†Ø¨Ø±_Ø£ÙƒØªÙˆØ¨Ø±_Ù†ÙˆÙ†Ø¨Ø±_Ø¯Ø¬Ù†Ø¨Ø±".split("_"),
monthsShort:"ÙŠÙ†Ø§ÙŠØ±_ÙØ¨Ø±Ø§ÙŠØ±_Ù…Ø§Ø±Ø³_Ø£Ø¨Ø±ÙŠÙ„_Ù…Ø§ÙŠ_ÙŠÙˆÙ†ÙŠÙˆ_ÙŠÙˆÙ„ÙŠÙˆØ²_ØºØ´Øª_Ø´ØªÙ†Ø¨Ø±_Ø£ÙƒØªÙˆØ¨Ø±_Ù†ÙˆÙ†Ø¨Ø±_Ø¯Ø¬Ù†Ø¨Ø±".split("_"),
weekdays:"Ø§Ù„Ø£Ø­Ø¯_Ø§Ù„Ø¥ØªÙ†ÙŠÙ†_Ø§Ù„Ø«Ù„Ø§Ø«Ø§Ø¡_Ø§Ù„Ø£Ø±Ø¨Ø¹Ø§Ø¡_Ø§Ù„Ø®Ù…ÙŠØ³_Ø§Ù„Ø¬Ù…Ø¹Ø©_Ø§Ù„Ø³Ø¨Øª".split("_"),
weekdaysShort:"Ø§Ø­Ø¯_Ø§ØªÙ†ÙŠÙ†_Ø«Ù„Ø§Ø«Ø§Ø¡_Ø§Ø±Ø¨Ø¹Ø§Ø¡_Ø®Ù…ÙŠØ³_Ø¬Ù…Ø¹Ø©_Ø³Ø¨Øª".split("_"),
weekdaysMin:"Ø­_Ù†_Ø«_Ø±_Ø®_Ø¬_Ø³".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd D MMMM YYYY LT"
},
calendar:{
sameDay:"[Ø§Ù„ÙŠÙˆÙ… Ø¹Ù„Ù‰ Ø§Ù„Ø³Ø§Ø¹Ø©] LT",
nextDay:"[ØºØ¯Ø§ Ø¹Ù„Ù‰ Ø§Ù„Ø³Ø§Ø¹Ø©] LT",
nextWeek:"dddd [Ø¹Ù„Ù‰ Ø§Ù„Ø³Ø§Ø¹Ø©] LT",
lastDay:"[Ø£Ù…Ø³ Ø¹Ù„Ù‰ Ø§Ù„Ø³Ø§Ø¹Ø©] LT",
lastWeek:"dddd [Ø¹Ù„Ù‰ Ø§Ù„Ø³Ø§Ø¹Ø©] LT",
sameElse:"L"
},
relativeTime:{
future:"ÙÙŠ %s",
past:"Ù…Ù†Ø° %s",
s:"Ø«ÙˆØ§Ù†",
m:"Ø¯Ù‚ÙŠÙ‚Ø©",
mm:"%d Ø¯Ù‚Ø§Ø¦Ù‚",
h:"Ø³Ø§Ø¹Ø©",
hh:"%d Ø³Ø§Ø¹Ø§Øª",
d:"ÙŠÙˆÙ…",
dd:"%d Ø£ÙŠØ§Ù…",
M:"Ø´Ù‡Ø±",
MM:"%d Ø£Ø´Ù‡Ø±",
y:"Ø³Ù†Ø©",
yy:"%d Ø³Ù†ÙˆØ§Øª"
},
week:{
dow:6,
doy:12
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("ar", {
months:"ÙŠÙ†Ø§ÙŠØ±/ ÙƒØ§Ù†ÙˆÙ† Ø§Ù„Ø«Ø§Ù†ÙŠ_ÙØ¨Ø±Ø§ÙŠØ±/ Ø´Ø¨Ø§Ø·_Ù…Ø§Ø±Ø³/ Ø¢Ø°Ø§Ø±_Ø£Ø¨Ø±ÙŠÙ„/ Ù†ÙŠØ³Ø§Ù†_Ù…Ø§ÙŠÙˆ/ Ø£ÙŠØ§Ø±_ÙŠÙˆÙ†ÙŠÙˆ/ Ø­Ø²ÙŠØ±Ø§Ù†_ÙŠÙˆÙ„ÙŠÙˆ/ ØªÙ…ÙˆØ²_Ø£ØºØ³Ø·Ø³/ Ø¢Ø¨_Ø³Ø¨ØªÙ…Ø¨Ø±/ Ø£ÙŠÙ„ÙˆÙ„_Ø£ÙƒØªÙˆØ¨Ø±/ ØªØ´Ø±ÙŠÙ† Ø§Ù„Ø£ÙˆÙ„_Ù†ÙˆÙÙ…Ø¨Ø±/ ØªØ´Ø±ÙŠÙ† Ø§Ù„Ø«Ø§Ù†ÙŠ_Ø¯ÙŠØ³Ù…Ø¨Ø±/ ÙƒØ§Ù†ÙˆÙ† Ø§Ù„Ø£ÙˆÙ„".split("_"),
monthsShort:"ÙŠÙ†Ø§ÙŠØ±/ ÙƒØ§Ù†ÙˆÙ† Ø§Ù„Ø«Ø§Ù†ÙŠ_ÙØ¨Ø±Ø§ÙŠØ±/ Ø´Ø¨Ø§Ø·_Ù…Ø§Ø±Ø³/ Ø¢Ø°Ø§Ø±_Ø£Ø¨Ø±ÙŠÙ„/ Ù†ÙŠØ³Ø§Ù†_Ù…Ø§ÙŠÙˆ/ Ø£ÙŠØ§Ø±_ÙŠÙˆÙ†ÙŠÙˆ/ Ø­Ø²ÙŠØ±Ø§Ù†_ÙŠÙˆÙ„ÙŠÙˆ/ ØªÙ…ÙˆØ²_Ø£ØºØ³Ø·Ø³/ Ø¢Ø¨_Ø³Ø¨ØªÙ…Ø¨Ø±/ Ø£ÙŠÙ„ÙˆÙ„_Ø£ÙƒØªÙˆØ¨Ø±/ ØªØ´Ø±ÙŠÙ† Ø§Ù„Ø£ÙˆÙ„_Ù†ÙˆÙÙ…Ø¨Ø±/ ØªØ´Ø±ÙŠÙ† Ø§Ù„Ø«Ø§Ù†ÙŠ_Ø¯ÙŠØ³Ù…Ø¨Ø±/ ÙƒØ§Ù†ÙˆÙ† Ø§Ù„Ø£ÙˆÙ„".split("_"),
weekdays:"Ø§Ù„Ø£Ø­Ø¯_Ø§Ù„Ø¥Ø«Ù†ÙŠÙ†_Ø§Ù„Ø«Ù„Ø§Ø«Ø§Ø¡_Ø§Ù„Ø£Ø±Ø¨Ø¹Ø§Ø¡_Ø§Ù„Ø®Ù…ÙŠØ³_Ø§Ù„Ø¬Ù…Ø¹Ø©_Ø§Ù„Ø³Ø¨Øª".split("_"),
weekdaysShort:"Ø§Ù„Ø£Ø­Ø¯_Ø§Ù„Ø¥Ø«Ù†ÙŠÙ†_Ø§Ù„Ø«Ù„Ø§Ø«Ø§Ø¡_Ø§Ù„Ø£Ø±Ø¨Ø¹Ø§Ø¡_Ø§Ù„Ø®Ù…ÙŠØ³_Ø§Ù„Ø¬Ù…Ø¹Ø©_Ø§Ù„Ø³Ø¨Øª".split("_"),
weekdaysMin:"Ø­_Ù†_Ø«_Ø±_Ø®_Ø¬_Ø³".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd D MMMM YYYY LT"
},
calendar:{
sameDay:"[Ø§Ù„ÙŠÙˆÙ… Ø¹Ù„Ù‰ Ø§Ù„Ø³Ø§Ø¹Ø©] LT",
nextDay:"[ØºØ¯Ø§ Ø¹Ù„Ù‰ Ø§Ù„Ø³Ø§Ø¹Ø©] LT",
nextWeek:"dddd [Ø¹Ù„Ù‰ Ø§Ù„Ø³Ø§Ø¹Ø©] LT",
lastDay:"[Ø£Ù…Ø³ Ø¹Ù„Ù‰ Ø§Ù„Ø³Ø§Ø¹Ø©] LT",
lastWeek:"dddd [Ø¹Ù„Ù‰ Ø§Ù„Ø³Ø§Ø¹Ø©] LT",
sameElse:"L"
},
relativeTime:{
future:"ÙÙŠ %s",
past:"Ù…Ù†Ø° %s",
s:"Ø«ÙˆØ§Ù†",
m:"Ø¯Ù‚ÙŠÙ‚Ø©",
mm:"%d Ø¯Ù‚Ø§Ø¦Ù‚",
h:"Ø³Ø§Ø¹Ø©",
hh:"%d Ø³Ø§Ø¹Ø§Øª",
d:"ÙŠÙˆÙ…",
dd:"%d Ø£ÙŠØ§Ù…",
M:"Ø´Ù‡Ø±",
MM:"%d Ø£Ø´Ù‡Ø±",
y:"Ø³Ù†Ø©",
yy:"%d Ø³Ù†ÙˆØ§Øª"
},
week:{
dow:6,
doy:12
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("bg", {
months:"ÑÐ½ÑƒÐ°Ñ€Ð¸_Ñ„ÐµÐ²Ñ€ÑƒÐ°Ñ€Ð¸_Ð¼Ð°Ñ€Ñ‚_Ð°Ð¿Ñ€Ð¸Ð»_Ð¼Ð°Ð¹_ÑŽÐ½Ð¸_ÑŽÐ»Ð¸_Ð°Ð²Ð³ÑƒÑÑ‚_ÑÐµÐ¿Ñ‚ÐµÐ¼Ð²Ñ€Ð¸_Ð¾ÐºÑ‚Ð¾Ð¼Ð²Ñ€Ð¸_Ð½Ð¾ÐµÐ¼Ð²Ñ€Ð¸_Ð´ÐµÐºÐµÐ¼Ð²Ñ€Ð¸".split("_"),
monthsShort:"ÑÐ½Ñ€_Ñ„ÐµÐ²_Ð¼Ð°Ñ€_Ð°Ð¿Ñ€_Ð¼Ð°Ð¹_ÑŽÐ½Ð¸_ÑŽÐ»Ð¸_Ð°Ð²Ð³_ÑÐµÐ¿_Ð¾ÐºÑ‚_Ð½Ð¾Ðµ_Ð´ÐµÐº".split("_"),
weekdays:"Ð½ÐµÐ´ÐµÐ»Ñ_Ð¿Ð¾Ð½ÐµÐ´ÐµÐ»Ð½Ð¸Ðº_Ð²Ñ‚Ð¾Ñ€Ð½Ð¸Ðº_ÑÑ€ÑÐ´Ð°_Ñ‡ÐµÑ‚Ð²ÑŠÑ€Ñ‚ÑŠÐº_Ð¿ÐµÑ‚ÑŠÐº_ÑÑŠÐ±Ð¾Ñ‚Ð°".split("_"),
weekdaysShort:"Ð½ÐµÐ´_Ð¿Ð¾Ð½_Ð²Ñ‚Ð¾_ÑÑ€Ñ_Ñ‡ÐµÑ‚_Ð¿ÐµÑ‚_ÑÑŠÐ±".split("_"),
weekdaysMin:"Ð½Ð´_Ð¿Ð½_Ð²Ñ‚_ÑÑ€_Ñ‡Ñ‚_Ð¿Ñ‚_ÑÐ±".split("_"),
longDateFormat:{
LT:"H:mm",
L:"D.MM.YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd, D MMMM YYYY LT"
},
calendar:{
sameDay:"[Ð”Ð½ÐµÑ Ð²] LT",
nextDay:"[Ð£Ñ‚Ñ€Ðµ Ð²] LT",
nextWeek:"dddd [Ð²] LT",
lastDay:"[Ð’Ñ‡ÐµÑ€Ð° Ð²] LT",
lastWeek:function() {
switch (this.day()) {
case 0:
case 3:
case 6:
return "[Ð’ Ð¸Ð·Ð¼Ð¸Ð½Ð°Ð»Ð°Ñ‚Ð°] dddd [Ð²] LT";

case 1:
case 2:
case 4:
case 5:
return "[Ð’ Ð¸Ð·Ð¼Ð¸Ð½Ð°Ð»Ð¸Ñ] dddd [Ð²] LT";
}
},
sameElse:"L"
},
relativeTime:{
future:"ÑÐ»ÐµÐ´ %s",
past:"Ð¿Ñ€ÐµÐ´Ð¸ %s",
s:"Ð½ÑÐºÐ¾Ð»ÐºÐ¾ ÑÐµÐºÑƒÐ½Ð´Ð¸",
m:"Ð¼Ð¸Ð½ÑƒÑ‚Ð°",
mm:"%d Ð¼Ð¸Ð½ÑƒÑ‚Ð¸",
h:"Ñ‡Ð°Ñ",
hh:"%d Ñ‡Ð°ÑÐ°",
d:"Ð´ÐµÐ½",
dd:"%d Ð´Ð½Ð¸",
M:"Ð¼ÐµÑÐµÑ†",
MM:"%d Ð¼ÐµÑÐµÑ†Ð°",
y:"Ð³Ð¾Ð´Ð¸Ð½Ð°",
yy:"%d Ð³Ð¾Ð´Ð¸Ð½Ð¸"
},
ordinal:function(t) {
var e = t % 10, n = t % 100;
return 0 === t ? t + "-ÐµÐ²" :0 === n ? t + "-ÐµÐ½" :n > 10 && 20 > n ? t + "-Ñ‚Ð¸" :1 === e ? t + "-Ð²Ð¸" :2 === e ? t + "-Ñ€Ð¸" :7 === e || 8 === e ? t + "-Ð¼Ð¸" :t + "-Ñ‚Ð¸";
},
week:{
dow:1,
doy:7
}
});
}), function(t) {
t(ne);
}(function(e) {
function n(t, e, n) {
var i = {
mm:"munutenn",
MM:"miz",
dd:"devezh"
};
return t + " " + s(i[n], t);
}
function i(t) {
switch (r(t)) {
case 1:
case 3:
case 4:
case 5:
case 9:
return t + " bloaz";

default:
return t + " vloaz";
}
}
function r(t) {
return t > 9 ? r(t % 10) :t;
}
function s(t, e) {
return 2 === e ? a(t) :t;
}
function a(e) {
var n = {
m:"v",
b:"v",
d:"z"
};
return n[e.charAt(0)] === t ? e :n[e.charAt(0)] + e.substring(1);
}
return e.lang("br", {
months:"Genver_C'hwevrer_Meurzh_Ebrel_Mae_Mezheven_Gouere_Eost_Gwengolo_Here_Du_Kerzu".split("_"),
monthsShort:"Gen_C'hwe_Meu_Ebr_Mae_Eve_Gou_Eos_Gwe_Her_Du_Ker".split("_"),
weekdays:"Sul_Lun_Meurzh_Merc'her_Yaou_Gwener_Sadorn".split("_"),
weekdaysShort:"Sul_Lun_Meu_Mer_Yao_Gwe_Sad".split("_"),
weekdaysMin:"Su_Lu_Me_Mer_Ya_Gw_Sa".split("_"),
longDateFormat:{
LT:"h[e]mm A",
L:"DD/MM/YYYY",
LL:"D [a viz] MMMM YYYY",
LLL:"D [a viz] MMMM YYYY LT",
LLLL:"dddd, D [a viz] MMMM YYYY LT"
},
calendar:{
sameDay:"[Hiziv da] LT",
nextDay:"[Warc'hoazh da] LT",
nextWeek:"dddd [da] LT",
lastDay:"[Dec'h da] LT",
lastWeek:"dddd [paset da] LT",
sameElse:"L"
},
relativeTime:{
future:"a-benn %s",
past:"%s 'zo",
s:"un nebeud segondennoÃ¹",
m:"ur vunutenn",
mm:n,
h:"un eur",
hh:"%d eur",
d:"un devezh",
dd:n,
M:"ur miz",
MM:n,
y:"ur bloaz",
yy:i
},
ordinal:function(t) {
var e = 1 === t ? "aÃ±" :"vet";
return t + e;
},
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
function e(t, e, n) {
var i = t + " ";
switch (n) {
case "m":
return e ? "jedna minuta" :"jedne minute";

case "mm":
return i += 1 === t ? "minuta" :2 === t || 3 === t || 4 === t ? "minute" :"minuta";

case "h":
return e ? "jedan sat" :"jednog sata";

case "hh":
return i += 1 === t ? "sat" :2 === t || 3 === t || 4 === t ? "sata" :"sati";

case "dd":
return i += 1 === t ? "dan" :"dana";

case "MM":
return i += 1 === t ? "mjesec" :2 === t || 3 === t || 4 === t ? "mjeseca" :"mjeseci";

case "yy":
return i += 1 === t ? "godina" :2 === t || 3 === t || 4 === t ? "godine" :"godina";
}
}
return t.lang("bs", {
months:"januar_februar_mart_april_maj_juni_juli_avgust_septembar_oktobar_novembar_decembar".split("_"),
monthsShort:"jan._feb._mar._apr._maj._jun._jul._avg._sep._okt._nov._dec.".split("_"),
weekdays:"nedjelja_ponedjeljak_utorak_srijeda_Äetvrtak_petak_subota".split("_"),
weekdaysShort:"ned._pon._uto._sri._Äet._pet._sub.".split("_"),
weekdaysMin:"ne_po_ut_sr_Äe_pe_su".split("_"),
longDateFormat:{
LT:"H:mm",
L:"DD. MM. YYYY",
LL:"D. MMMM YYYY",
LLL:"D. MMMM YYYY LT",
LLLL:"dddd, D. MMMM YYYY LT"
},
calendar:{
sameDay:"[danas u] LT",
nextDay:"[sutra u] LT",
nextWeek:function() {
switch (this.day()) {
case 0:
return "[u] [nedjelju] [u] LT";

case 3:
return "[u] [srijedu] [u] LT";

case 6:
return "[u] [subotu] [u] LT";

case 1:
case 2:
case 4:
case 5:
return "[u] dddd [u] LT";
}
},
lastDay:"[juÄer u] LT",
lastWeek:function() {
switch (this.day()) {
case 0:
case 3:
return "[proÅ¡lu] dddd [u] LT";

case 6:
return "[proÅ¡le] [subote] [u] LT";

case 1:
case 2:
case 4:
case 5:
return "[proÅ¡li] dddd [u] LT";
}
},
sameElse:"L"
},
relativeTime:{
future:"za %s",
past:"prije %s",
s:"par sekundi",
m:e,
mm:e,
h:e,
hh:e,
d:"dan",
dd:e,
M:"mjesec",
MM:e,
y:"godinu",
yy:e
},
ordinal:"%d.",
week:{
dow:1,
doy:7
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("ca", {
months:"Gener_Febrer_MarÃ§_Abril_Maig_Juny_Juliol_Agost_Setembre_Octubre_Novembre_Desembre".split("_"),
monthsShort:"Gen._Febr._Mar._Abr._Mai._Jun._Jul._Ag._Set._Oct._Nov._Des.".split("_"),
weekdays:"Diumenge_Dilluns_Dimarts_Dimecres_Dijous_Divendres_Dissabte".split("_"),
weekdaysShort:"Dg._Dl._Dt._Dc._Dj._Dv._Ds.".split("_"),
weekdaysMin:"Dg_Dl_Dt_Dc_Dj_Dv_Ds".split("_"),
longDateFormat:{
LT:"H:mm",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd D MMMM YYYY LT"
},
calendar:{
sameDay:function() {
return "[avui a " + (1 !== this.hours() ? "les" :"la") + "] LT";
},
nextDay:function() {
return "[demÃ  a " + (1 !== this.hours() ? "les" :"la") + "] LT";
},
nextWeek:function() {
return "dddd [a " + (1 !== this.hours() ? "les" :"la") + "] LT";
},
lastDay:function() {
return "[ahir a " + (1 !== this.hours() ? "les" :"la") + "] LT";
},
lastWeek:function() {
return "[el] dddd [passat a " + (1 !== this.hours() ? "les" :"la") + "] LT";
},
sameElse:"L"
},
relativeTime:{
future:"en %s",
past:"fa %s",
s:"uns segons",
m:"un minut",
mm:"%d minuts",
h:"una hora",
hh:"%d hores",
d:"un dia",
dd:"%d dies",
M:"un mes",
MM:"%d mesos",
y:"un any",
yy:"%d anys"
},
ordinal:"%dÂº",
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
function e(t) {
return t > 1 && 5 > t && 1 !== ~~(t / 10);
}
function n(t, n, i, r) {
var s = t + " ";
switch (i) {
case "s":
return n || r ? "pÃ¡r vteÅ™in" :"pÃ¡r vteÅ™inami";

case "m":
return n ? "minuta" :r ? "minutu" :"minutou";

case "mm":
return n || r ? s + (e(t) ? "minuty" :"minut") :s + "minutami";

case "h":
return n ? "hodina" :r ? "hodinu" :"hodinou";

case "hh":
return n || r ? s + (e(t) ? "hodiny" :"hodin") :s + "hodinami";

case "d":
return n || r ? "den" :"dnem";

case "dd":
return n || r ? s + (e(t) ? "dny" :"dnÃ­") :s + "dny";

case "M":
return n || r ? "mÄ›sÃ­c" :"mÄ›sÃ­cem";

case "MM":
return n || r ? s + (e(t) ? "mÄ›sÃ­ce" :"mÄ›sÃ­cÅ¯") :s + "mÄ›sÃ­ci";

case "y":
return n || r ? "rok" :"rokem";

case "yy":
return n || r ? s + (e(t) ? "roky" :"let") :s + "lety";
}
}
var i = "leden_Ãºnor_bÅ™ezen_duben_kvÄ›ten_Äerven_Äervenec_srpen_zÃ¡Å™Ã­_Å™Ã­jen_listopad_prosinec".split("_"), r = "led_Ãºno_bÅ™e_dub_kvÄ›_Ävn_Ävc_srp_zÃ¡Å™_Å™Ã­j_lis_pro".split("_");
return t.lang("cs", {
months:i,
monthsShort:r,
monthsParse:function(t, e) {
var n, i = [];
for (n = 0; 12 > n; n++) i[n] = new RegExp("^" + t[n] + "$|^" + e[n] + "$", "i");
return i;
}(i, r),
weekdays:"nedÄ›le_pondÄ›lÃ­_ÃºterÃ½_stÅ™eda_Ätvrtek_pÃ¡tek_sobota".split("_"),
weekdaysShort:"ne_po_Ãºt_st_Ät_pÃ¡_so".split("_"),
weekdaysMin:"ne_po_Ãºt_st_Ät_pÃ¡_so".split("_"),
longDateFormat:{
LT:"H:mm",
L:"DD.MM.YYYY",
LL:"D. MMMM YYYY",
LLL:"D. MMMM YYYY LT",
LLLL:"dddd D. MMMM YYYY LT"
},
calendar:{
sameDay:"[dnes v] LT",
nextDay:"[zÃ­tra v] LT",
nextWeek:function() {
switch (this.day()) {
case 0:
return "[v nedÄ›li v] LT";

case 1:
case 2:
return "[v] dddd [v] LT";

case 3:
return "[ve stÅ™edu v] LT";

case 4:
return "[ve Ätvrtek v] LT";

case 5:
return "[v pÃ¡tek v] LT";

case 6:
return "[v sobotu v] LT";
}
},
lastDay:"[vÄera v] LT",
lastWeek:function() {
switch (this.day()) {
case 0:
return "[minulou nedÄ›li v] LT";

case 1:
case 2:
return "[minulÃ©] dddd [v] LT";

case 3:
return "[minulou stÅ™edu v] LT";

case 4:
case 5:
return "[minulÃ½] dddd [v] LT";

case 6:
return "[minulou sobotu v] LT";
}
},
sameElse:"L"
},
relativeTime:{
future:"za %s",
past:"pÅ™ed %s",
s:n,
m:n,
mm:n,
h:n,
hh:n,
d:n,
dd:n,
M:n,
MM:n,
y:n,
yy:n
},
ordinal:"%d.",
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("cv", {
months:"ÐºÄƒÑ€Ð»Ð°Ñ‡_Ð½Ð°Ñ€ÄƒÑ_Ð¿ÑƒÑˆ_Ð°ÐºÐ°_Ð¼Ð°Ð¹_Ã§Ä•Ñ€Ñ‚Ð¼Ðµ_ÑƒÑ‚Äƒ_Ã§ÑƒÑ€Ð»Ð°_Ð°Ð²ÄƒÐ½_ÑŽÐ¿Ð°_Ñ‡Ó³Ðº_Ñ€Ð°ÑˆÑ‚Ð°Ð²".split("_"),
monthsShort:"ÐºÄƒÑ€_Ð½Ð°Ñ€_Ð¿ÑƒÑˆ_Ð°ÐºÐ°_Ð¼Ð°Ð¹_Ã§Ä•Ñ€_ÑƒÑ‚Äƒ_Ã§ÑƒÑ€_Ð°Ð²_ÑŽÐ¿Ð°_Ñ‡Ó³Ðº_Ñ€Ð°Ñˆ".split("_"),
weekdays:"Ð²Ñ‹Ñ€ÑÐ°Ñ€Ð½Ð¸ÐºÑƒÐ½_Ñ‚ÑƒÐ½Ñ‚Ð¸ÐºÑƒÐ½_Ñ‹Ñ‚Ð»Ð°Ñ€Ð¸ÐºÑƒÐ½_ÑŽÐ½ÐºÑƒÐ½_ÐºÄ•Ã§Ð½ÐµÑ€Ð½Ð¸ÐºÑƒÐ½_ÑÑ€Ð½ÐµÐºÑƒÐ½_ÑˆÄƒÐ¼Ð°Ñ‚ÐºÑƒÐ½".split("_"),
weekdaysShort:"Ð²Ñ‹Ñ€_Ñ‚ÑƒÐ½_Ñ‹Ñ‚Ð»_ÑŽÐ½_ÐºÄ•Ã§_ÑÑ€Ð½_ÑˆÄƒÐ¼".split("_"),
weekdaysMin:"Ð²Ñ€_Ñ‚Ð½_Ñ‹Ñ‚_ÑŽÐ½_ÐºÃ§_ÑÑ€_ÑˆÐ¼".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD-MM-YYYY",
LL:"YYYY [Ã§ÑƒÐ»Ñ…Ð¸] MMMM [ÑƒÐ¹ÄƒÑ…Ä•Ð½] D[-Ð¼Ä•ÑˆÄ•]",
LLL:"YYYY [Ã§ÑƒÐ»Ñ…Ð¸] MMMM [ÑƒÐ¹ÄƒÑ…Ä•Ð½] D[-Ð¼Ä•ÑˆÄ•], LT",
LLLL:"dddd, YYYY [Ã§ÑƒÐ»Ñ…Ð¸] MMMM [ÑƒÐ¹ÄƒÑ…Ä•Ð½] D[-Ð¼Ä•ÑˆÄ•], LT"
},
calendar:{
sameDay:"[ÐŸÐ°ÑÐ½] LT [ÑÐµÑ…ÐµÑ‚Ñ€Ðµ]",
nextDay:"[Ð«Ñ€Ð°Ð½] LT [ÑÐµÑ…ÐµÑ‚Ñ€Ðµ]",
lastDay:"[Ä”Ð½ÐµÑ€] LT [ÑÐµÑ…ÐµÑ‚Ñ€Ðµ]",
nextWeek:"[Ã‡Ð¸Ñ‚ÐµÑ] dddd LT [ÑÐµÑ…ÐµÑ‚Ñ€Ðµ]",
lastWeek:"[Ð˜Ñ€Ñ‚Ð½Ä•] dddd LT [ÑÐµÑ…ÐµÑ‚Ñ€Ðµ]",
sameElse:"L"
},
relativeTime:{
future:function(t) {
var e = /ÑÐµÑ…ÐµÑ‚$/i.exec(t) ? "Ñ€ÐµÐ½" :/Ã§ÑƒÐ»$/i.exec(t) ? "Ñ‚Ð°Ð½" :"Ñ€Ð°Ð½";
return t + e;
},
past:"%s ÐºÐ°ÑÐ»Ð»Ð°",
s:"Ð¿Ä•Ñ€-Ð¸Ðº Ã§ÐµÐºÐºÑƒÐ½Ñ‚",
m:"Ð¿Ä•Ñ€ Ð¼Ð¸Ð½ÑƒÑ‚",
mm:"%d Ð¼Ð¸Ð½ÑƒÑ‚",
h:"Ð¿Ä•Ñ€ ÑÐµÑ…ÐµÑ‚",
hh:"%d ÑÐµÑ…ÐµÑ‚",
d:"Ð¿Ä•Ñ€ ÐºÑƒÐ½",
dd:"%d ÐºÑƒÐ½",
M:"Ð¿Ä•Ñ€ ÑƒÐ¹ÄƒÑ…",
MM:"%d ÑƒÐ¹ÄƒÑ…",
y:"Ð¿Ä•Ñ€ Ã§ÑƒÐ»",
yy:"%d Ã§ÑƒÐ»"
},
ordinal:"%d-Ð¼Ä•Ñˆ",
week:{
dow:1,
doy:7
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("cy", {
months:"Ionawr_Chwefror_Mawrth_Ebrill_Mai_Mehefin_Gorffennaf_Awst_Medi_Hydref_Tachwedd_Rhagfyr".split("_"),
monthsShort:"Ion_Chwe_Maw_Ebr_Mai_Meh_Gor_Aws_Med_Hyd_Tach_Rhag".split("_"),
weekdays:"Dydd Sul_Dydd Llun_Dydd Mawrth_Dydd Mercher_Dydd Iau_Dydd Gwener_Dydd Sadwrn".split("_"),
weekdaysShort:"Sul_Llun_Maw_Mer_Iau_Gwe_Sad".split("_"),
weekdaysMin:"Su_Ll_Ma_Me_Ia_Gw_Sa".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd, D MMMM YYYY LT"
},
calendar:{
sameDay:"[Heddiw am] LT",
nextDay:"[Yfory am] LT",
nextWeek:"dddd [am] LT",
lastDay:"[Ddoe am] LT",
lastWeek:"dddd [diwethaf am] LT",
sameElse:"L"
},
relativeTime:{
future:"mewn %s",
past:"%s yn &#244;l",
s:"ychydig eiliadau",
m:"munud",
mm:"%d munud",
h:"awr",
hh:"%d awr",
d:"diwrnod",
dd:"%d diwrnod",
M:"mis",
MM:"%d mis",
y:"blwyddyn",
yy:"%d flynedd"
},
ordinal:function(t) {
var e = t, n = "", i = [ "", "af", "il", "ydd", "ydd", "ed", "ed", "ed", "fed", "fed", "fed", "eg", "fed", "eg", "eg", "fed", "eg", "eg", "fed", "eg", "fed" ];
return e > 20 ? n = 40 === e || 50 === e || 60 === e || 80 === e || 100 === e ? "fed" :"ain" :e > 0 && (n = i[e]), 
t + n;
},
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("da", {
months:"januar_februar_marts_april_maj_juni_juli_august_september_oktober_november_december".split("_"),
monthsShort:"jan_feb_mar_apr_maj_jun_jul_aug_sep_okt_nov_dec".split("_"),
weekdays:"sÃ¸ndag_mandag_tirsdag_onsdag_torsdag_fredag_lÃ¸rdag".split("_"),
weekdaysShort:"sÃ¸n_man_tir_ons_tor_fre_lÃ¸r".split("_"),
weekdaysMin:"sÃ¸_ma_ti_on_to_fr_lÃ¸".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd D. MMMM, YYYY LT"
},
calendar:{
sameDay:"[I dag kl.] LT",
nextDay:"[I morgen kl.] LT",
nextWeek:"dddd [kl.] LT",
lastDay:"[I gÃ¥r kl.] LT",
lastWeek:"[sidste] dddd [kl] LT",
sameElse:"L"
},
relativeTime:{
future:"om %s",
past:"%s siden",
s:"fÃ¥ sekunder",
m:"et minut",
mm:"%d minutter",
h:"en time",
hh:"%d timer",
d:"en dag",
dd:"%d dage",
M:"en mÃ¥ned",
MM:"%d mÃ¥neder",
y:"et Ã¥r",
yy:"%d Ã¥r"
},
ordinal:"%d.",
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
function e(t, e, n) {
var i = {
m:[ "eine Minute", "einer Minute" ],
h:[ "eine Stunde", "einer Stunde" ],
d:[ "ein Tag", "einem Tag" ],
dd:[ t + " Tage", t + " Tagen" ],
M:[ "ein Monat", "einem Monat" ],
MM:[ t + " Monate", t + " Monaten" ],
y:[ "ein Jahr", "einem Jahr" ],
yy:[ t + " Jahre", t + " Jahren" ]
};
return e ? i[n][0] :i[n][1];
}
return t.lang("de", {
months:"Januar_Februar_MÃ¤rz_April_Mai_Juni_Juli_August_September_Oktober_November_Dezember".split("_"),
monthsShort:"Jan._Febr._Mrz._Apr._Mai_Jun._Jul._Aug._Sept._Okt._Nov._Dez.".split("_"),
weekdays:"Sonntag_Montag_Dienstag_Mittwoch_Donnerstag_Freitag_Samstag".split("_"),
weekdaysShort:"So._Mo._Di._Mi._Do._Fr._Sa.".split("_"),
weekdaysMin:"So_Mo_Di_Mi_Do_Fr_Sa".split("_"),
longDateFormat:{
LT:"H:mm [Uhr]",
L:"DD.MM.YYYY",
LL:"D. MMMM YYYY",
LLL:"D. MMMM YYYY LT",
LLLL:"dddd, D. MMMM YYYY LT"
},
calendar:{
sameDay:"[Heute um] LT",
sameElse:"L",
nextDay:"[Morgen um] LT",
nextWeek:"dddd [um] LT",
lastDay:"[Gestern um] LT",
lastWeek:"[letzten] dddd [um] LT"
},
relativeTime:{
future:"in %s",
past:"vor %s",
s:"ein paar Sekunden",
m:e,
mm:"%d Minuten",
h:e,
hh:"%d Stunden",
d:e,
dd:e,
M:e,
MM:e,
y:e,
yy:e
},
ordinal:"%d.",
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("el", {
monthsNominativeEl:"Î™Î±Î½Î¿Ï…Î¬ÏÎ¹Î¿Ï‚_Î¦ÎµÎ²ÏÎ¿Ï…Î¬ÏÎ¹Î¿Ï‚_ÎœÎ¬ÏÏ„Î¹Î¿Ï‚_Î‘Ï€ÏÎ¯Î»Î¹Î¿Ï‚_ÎœÎ¬Î¹Î¿Ï‚_Î™Î¿ÏÎ½Î¹Î¿Ï‚_Î™Î¿ÏÎ»Î¹Î¿Ï‚_Î‘ÏÎ³Î¿Ï…ÏƒÏ„Î¿Ï‚_Î£ÎµÏ€Ï„Î­Î¼Î²ÏÎ¹Î¿Ï‚_ÎŸÎºÏ„ÏŽÎ²ÏÎ¹Î¿Ï‚_ÎÎ¿Î­Î¼Î²ÏÎ¹Î¿Ï‚_Î”ÎµÎºÎ­Î¼Î²ÏÎ¹Î¿Ï‚".split("_"),
monthsGenitiveEl:"Î™Î±Î½Î¿Ï…Î±ÏÎ¯Î¿Ï…_Î¦ÎµÎ²ÏÎ¿Ï…Î±ÏÎ¯Î¿Ï…_ÎœÎ±ÏÏ„Î¯Î¿Ï…_Î‘Ï€ÏÎ¹Î»Î¯Î¿Ï…_ÎœÎ±ÎÎ¿Ï…_Î™Î¿Ï…Î½Î¯Î¿Ï…_Î™Î¿Ï…Î»Î¯Î¿Ï…_Î‘Ï…Î³Î¿ÏÏƒÏ„Î¿Ï…_Î£ÎµÏ€Ï„ÎµÎ¼Î²ÏÎ¯Î¿Ï…_ÎŸÎºÏ„Ï‰Î²ÏÎ¯Î¿Ï…_ÎÎ¿ÎµÎ¼Î²ÏÎ¯Î¿Ï…_Î”ÎµÎºÎµÎ¼Î²ÏÎ¯Î¿Ï…".split("_"),
months:function(t, e) {
return /D/.test(e.substring(0, e.indexOf("MMMM"))) ? this._monthsGenitiveEl[t.month()] :this._monthsNominativeEl[t.month()];
},
monthsShort:"Î™Î±Î½_Î¦ÎµÎ²_ÎœÎ±Ï_Î‘Ï€Ï_ÎœÎ±ÏŠ_Î™Î¿Ï…Î½_Î™Î¿Ï…Î»_Î‘Ï…Î³_Î£ÎµÏ€_ÎŸÎºÏ„_ÎÎ¿Îµ_Î”ÎµÎº".split("_"),
weekdays:"ÎšÏ…ÏÎ¹Î±ÎºÎ®_Î”ÎµÏ…Ï„Î­ÏÎ±_Î¤ÏÎ¯Ï„Î·_Î¤ÎµÏ„Î¬ÏÏ„Î·_Î Î­Î¼Ï€Ï„Î·_Î Î±ÏÎ±ÏƒÎºÎµÏ…Î®_Î£Î¬Î²Î²Î±Ï„Î¿".split("_"),
weekdaysShort:"ÎšÏ…Ï_Î”ÎµÏ…_Î¤ÏÎ¹_Î¤ÎµÏ„_Î ÎµÎ¼_Î Î±Ï_Î£Î±Î²".split("_"),
weekdaysMin:"ÎšÏ…_Î”Îµ_Î¤Ï_Î¤Îµ_Î Îµ_Î Î±_Î£Î±".split("_"),
meridiem:function(t, e, n) {
return t > 11 ? n ? "Î¼Î¼" :"ÎœÎœ" :n ? "Ï€Î¼" :"Î Îœ";
},
longDateFormat:{
LT:"h:mm A",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd, D MMMM YYYY LT"
},
calendarEl:{
sameDay:"[Î£Î®Î¼ÎµÏÎ± {}] LT",
nextDay:"[Î‘ÏÏÎ¹Î¿ {}] LT",
nextWeek:"dddd [{}] LT",
lastDay:"[Î§Î¸ÎµÏ‚ {}] LT",
lastWeek:"[Ï„Î·Î½ Ï€ÏÎ¿Î·Î³Î¿ÏÎ¼ÎµÎ½Î·] dddd [{}] LT",
sameElse:"L"
},
calendar:function(t, e) {
var n = this._calendarEl[t], i = e && e.hours();
return n.replace("{}", i % 12 === 1 ? "ÏƒÏ„Î·" :"ÏƒÏ„Î¹Ï‚");
},
relativeTime:{
future:"ÏƒÎµ %s",
past:"%s Ï€ÏÎ¹Î½",
s:"Î´ÎµÏ…Ï„ÎµÏÏŒÎ»ÎµÏ€Ï„Î±",
m:"Î­Î½Î± Î»ÎµÏ€Ï„ÏŒ",
mm:"%d Î»ÎµÏ€Ï„Î¬",
h:"Î¼Î¯Î± ÏŽÏÎ±",
hh:"%d ÏŽÏÎµÏ‚",
d:"Î¼Î¯Î± Î¼Î­ÏÎ±",
dd:"%d Î¼Î­ÏÎµÏ‚",
M:"Î­Î½Î±Ï‚ Î¼Î®Î½Î±Ï‚",
MM:"%d Î¼Î®Î½ÎµÏ‚",
y:"Î­Î½Î±Ï‚ Ï‡ÏÏŒÎ½Î¿Ï‚",
yy:"%d Ï‡ÏÏŒÎ½Î¹Î±"
},
ordinal:function(t) {
return t + "Î·";
},
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("en-au", {
months:"January_February_March_April_May_June_July_August_September_October_November_December".split("_"),
monthsShort:"Jan_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dec".split("_"),
weekdays:"Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday".split("_"),
weekdaysShort:"Sun_Mon_Tue_Wed_Thu_Fri_Sat".split("_"),
weekdaysMin:"Su_Mo_Tu_We_Th_Fr_Sa".split("_"),
longDateFormat:{
LT:"h:mm A",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd, D MMMM YYYY LT"
},
calendar:{
sameDay:"[Today at] LT",
nextDay:"[Tomorrow at] LT",
nextWeek:"dddd [at] LT",
lastDay:"[Yesterday at] LT",
lastWeek:"[Last] dddd [at] LT",
sameElse:"L"
},
relativeTime:{
future:"in %s",
past:"%s ago",
s:"a few seconds",
m:"a minute",
mm:"%d minutes",
h:"an hour",
hh:"%d hours",
d:"a day",
dd:"%d days",
M:"a month",
MM:"%d months",
y:"a year",
yy:"%d years"
},
ordinal:function(t) {
var e = t % 10, n = 1 === ~~(t % 100 / 10) ? "th" :1 === e ? "st" :2 === e ? "nd" :3 === e ? "rd" :"th";
return t + n;
},
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("en-ca", {
months:"January_February_March_April_May_June_July_August_September_October_November_December".split("_"),
monthsShort:"Jan_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dec".split("_"),
weekdays:"Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday".split("_"),
weekdaysShort:"Sun_Mon_Tue_Wed_Thu_Fri_Sat".split("_"),
weekdaysMin:"Su_Mo_Tu_We_Th_Fr_Sa".split("_"),
longDateFormat:{
LT:"h:mm A",
L:"YYYY-MM-DD",
LL:"D MMMM, YYYY",
LLL:"D MMMM, YYYY LT",
LLLL:"dddd, D MMMM, YYYY LT"
},
calendar:{
sameDay:"[Today at] LT",
nextDay:"[Tomorrow at] LT",
nextWeek:"dddd [at] LT",
lastDay:"[Yesterday at] LT",
lastWeek:"[Last] dddd [at] LT",
sameElse:"L"
},
relativeTime:{
future:"in %s",
past:"%s ago",
s:"a few seconds",
m:"a minute",
mm:"%d minutes",
h:"an hour",
hh:"%d hours",
d:"a day",
dd:"%d days",
M:"a month",
MM:"%d months",
y:"a year",
yy:"%d years"
},
ordinal:function(t) {
var e = t % 10, n = 1 === ~~(t % 100 / 10) ? "th" :1 === e ? "st" :2 === e ? "nd" :3 === e ? "rd" :"th";
return t + n;
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("en-gb", {
months:"January_February_March_April_May_June_July_August_September_October_November_December".split("_"),
monthsShort:"Jan_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dec".split("_"),
weekdays:"Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday".split("_"),
weekdaysShort:"Sun_Mon_Tue_Wed_Thu_Fri_Sat".split("_"),
weekdaysMin:"Su_Mo_Tu_We_Th_Fr_Sa".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd, D MMMM YYYY LT"
},
calendar:{
sameDay:"[Today at] LT",
nextDay:"[Tomorrow at] LT",
nextWeek:"dddd [at] LT",
lastDay:"[Yesterday at] LT",
lastWeek:"[Last] dddd [at] LT",
sameElse:"L"
},
relativeTime:{
future:"in %s",
past:"%s ago",
s:"a few seconds",
m:"a minute",
mm:"%d minutes",
h:"an hour",
hh:"%d hours",
d:"a day",
dd:"%d days",
M:"a month",
MM:"%d months",
y:"a year",
yy:"%d years"
},
ordinal:function(t) {
var e = t % 10, n = 1 === ~~(t % 100 / 10) ? "th" :1 === e ? "st" :2 === e ? "nd" :3 === e ? "rd" :"th";
return t + n;
},
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("eo", {
months:"januaro_februaro_marto_aprilo_majo_junio_julio_aÅ­gusto_septembro_oktobro_novembro_decembro".split("_"),
monthsShort:"jan_feb_mar_apr_maj_jun_jul_aÅ­g_sep_okt_nov_dec".split("_"),
weekdays:"DimanÄ‰o_Lundo_Mardo_Merkredo_Ä´aÅ­do_Vendredo_Sabato".split("_"),
weekdaysShort:"Dim_Lun_Mard_Merk_Ä´aÅ­_Ven_Sab".split("_"),
weekdaysMin:"Di_Lu_Ma_Me_Ä´a_Ve_Sa".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"YYYY-MM-DD",
LL:"D[-an de] MMMM, YYYY",
LLL:"D[-an de] MMMM, YYYY LT",
LLLL:"dddd, [la] D[-an de] MMMM, YYYY LT"
},
meridiem:function(t, e, n) {
return t > 11 ? n ? "p.t.m." :"P.T.M." :n ? "a.t.m." :"A.T.M.";
},
calendar:{
sameDay:"[HodiaÅ­ je] LT",
nextDay:"[MorgaÅ­ je] LT",
nextWeek:"dddd [je] LT",
lastDay:"[HieraÅ­ je] LT",
lastWeek:"[pasinta] dddd [je] LT",
sameElse:"L"
},
relativeTime:{
future:"je %s",
past:"antaÅ­ %s",
s:"sekundoj",
m:"minuto",
mm:"%d minutoj",
h:"horo",
hh:"%d horoj",
d:"tago",
dd:"%d tagoj",
M:"monato",
MM:"%d monatoj",
y:"jaro",
yy:"%d jaroj"
},
ordinal:"%da",
week:{
dow:1,
doy:7
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("es", {
months:"enero_febrero_marzo_abril_mayo_junio_julio_agosto_septiembre_octubre_noviembre_diciembre".split("_"),
monthsShort:"ene._feb._mar._abr._may._jun._jul._ago._sep._oct._nov._dic.".split("_"),
weekdays:"domingo_lunes_martes_miÃ©rcoles_jueves_viernes_sÃ¡bado".split("_"),
weekdaysShort:"dom._lun._mar._miÃ©._jue._vie._sÃ¡b.".split("_"),
weekdaysMin:"Do_Lu_Ma_Mi_Ju_Vi_SÃ¡".split("_"),
longDateFormat:{
LT:"H:mm",
L:"DD/MM/YYYY",
LL:"D [de] MMMM [de] YYYY",
LLL:"D [de] MMMM [de] YYYY LT",
LLLL:"dddd, D [de] MMMM [de] YYYY LT"
},
calendar:{
sameDay:function() {
return "[hoy a la" + (1 !== this.hours() ? "s" :"") + "] LT";
},
nextDay:function() {
return "[maÃ±ana a la" + (1 !== this.hours() ? "s" :"") + "] LT";
},
nextWeek:function() {
return "dddd [a la" + (1 !== this.hours() ? "s" :"") + "] LT";
},
lastDay:function() {
return "[ayer a la" + (1 !== this.hours() ? "s" :"") + "] LT";
},
lastWeek:function() {
return "[el] dddd [pasado a la" + (1 !== this.hours() ? "s" :"") + "] LT";
},
sameElse:"L"
},
relativeTime:{
future:"en %s",
past:"hace %s",
s:"unos segundos",
m:"un minuto",
mm:"%d minutos",
h:"una hora",
hh:"%d horas",
d:"un dÃ­a",
dd:"%d dÃ­as",
M:"un mes",
MM:"%d meses",
y:"un aÃ±o",
yy:"%d aÃ±os"
},
ordinal:"%dÂº",
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
function e(t, e, n, i) {
var r = {
s:[ "mÃµne sekundi", "mÃµni sekund", "paar sekundit" ],
m:[ "Ã¼he minuti", "Ã¼ks minut" ],
mm:[ t + " minuti", t + " minutit" ],
h:[ "Ã¼he tunni", "tund aega", "Ã¼ks tund" ],
hh:[ t + " tunni", t + " tundi" ],
d:[ "Ã¼he pÃ¤eva", "Ã¼ks pÃ¤ev" ],
M:[ "kuu aja", "kuu aega", "Ã¼ks kuu" ],
MM:[ t + " kuu", t + " kuud" ],
y:[ "Ã¼he aasta", "aasta", "Ã¼ks aasta" ],
yy:[ t + " aasta", t + " aastat" ]
};
return e ? r[n][2] ? r[n][2] :r[n][1] :i ? r[n][0] :r[n][1];
}
return t.lang("et", {
months:"jaanuar_veebruar_mÃ¤rts_aprill_mai_juuni_juuli_august_september_oktoober_november_detsember".split("_"),
monthsShort:"jaan_veebr_mÃ¤rts_apr_mai_juuni_juuli_aug_sept_okt_nov_dets".split("_"),
weekdays:"pÃ¼hapÃ¤ev_esmaspÃ¤ev_teisipÃ¤ev_kolmapÃ¤ev_neljapÃ¤ev_reede_laupÃ¤ev".split("_"),
weekdaysShort:"P_E_T_K_N_R_L".split("_"),
weekdaysMin:"P_E_T_K_N_R_L".split("_"),
longDateFormat:{
LT:"H:mm",
L:"DD.MM.YYYY",
LL:"D. MMMM YYYY",
LLL:"D. MMMM YYYY LT",
LLLL:"dddd, D. MMMM YYYY LT"
},
calendar:{
sameDay:"[TÃ¤na,] LT",
nextDay:"[Homme,] LT",
nextWeek:"[JÃ¤rgmine] dddd LT",
lastDay:"[Eile,] LT",
lastWeek:"[Eelmine] dddd LT",
sameElse:"L"
},
relativeTime:{
future:"%s pÃ¤rast",
past:"%s tagasi",
s:e,
m:e,
mm:e,
h:e,
hh:e,
d:e,
dd:"%d pÃ¤eva",
M:e,
MM:e,
y:e,
yy:e
},
ordinal:"%d.",
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("eu", {
months:"urtarrila_otsaila_martxoa_apirila_maiatza_ekaina_uztaila_abuztua_iraila_urria_azaroa_abendua".split("_"),
monthsShort:"urt._ots._mar._api._mai._eka._uzt._abu._ira._urr._aza._abe.".split("_"),
weekdays:"igandea_astelehena_asteartea_asteazkena_osteguna_ostirala_larunbata".split("_"),
weekdaysShort:"ig._al._ar._az._og._ol._lr.".split("_"),
weekdaysMin:"ig_al_ar_az_og_ol_lr".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"YYYY-MM-DD",
LL:"YYYY[ko] MMMM[ren] D[a]",
LLL:"YYYY[ko] MMMM[ren] D[a] LT",
LLLL:"dddd, YYYY[ko] MMMM[ren] D[a] LT",
l:"YYYY-M-D",
ll:"YYYY[ko] MMM D[a]",
lll:"YYYY[ko] MMM D[a] LT",
llll:"ddd, YYYY[ko] MMM D[a] LT"
},
calendar:{
sameDay:"[gaur] LT[etan]",
nextDay:"[bihar] LT[etan]",
nextWeek:"dddd LT[etan]",
lastDay:"[atzo] LT[etan]",
lastWeek:"[aurreko] dddd LT[etan]",
sameElse:"L"
},
relativeTime:{
future:"%s barru",
past:"duela %s",
s:"segundo batzuk",
m:"minutu bat",
mm:"%d minutu",
h:"ordu bat",
hh:"%d ordu",
d:"egun bat",
dd:"%d egun",
M:"hilabete bat",
MM:"%d hilabete",
y:"urte bat",
yy:"%d urte"
},
ordinal:"%d.",
week:{
dow:1,
doy:7
}
});
}), function(t) {
t(ne);
}(function(t) {
var e = {
"1":"Û±",
"2":"Û²",
"3":"Û³",
"4":"Û´",
"5":"Ûµ",
"6":"Û¶",
"7":"Û·",
"8":"Û¸",
"9":"Û¹",
"0":"Û°"
}, n = {
"Û±":"1",
"Û²":"2",
"Û³":"3",
"Û´":"4",
"Ûµ":"5",
"Û¶":"6",
"Û·":"7",
"Û¸":"8",
"Û¹":"9",
"Û°":"0"
};
return t.lang("fa", {
months:"Ú˜Ø§Ù†ÙˆÛŒÙ‡_ÙÙˆØ±ÛŒÙ‡_Ù…Ø§Ø±Ø³_Ø¢ÙˆØ±ÛŒÙ„_Ù…Ù‡_Ú˜ÙˆØ¦Ù†_Ú˜ÙˆØ¦ÛŒÙ‡_Ø§ÙˆØª_Ø³Ù¾ØªØ§Ù…Ø¨Ø±_Ø§Ú©ØªØ¨Ø±_Ù†ÙˆØ§Ù…Ø¨Ø±_Ø¯Ø³Ø§Ù…Ø¨Ø±".split("_"),
monthsShort:"Ú˜Ø§Ù†ÙˆÛŒÙ‡_ÙÙˆØ±ÛŒÙ‡_Ù…Ø§Ø±Ø³_Ø¢ÙˆØ±ÛŒÙ„_Ù…Ù‡_Ú˜ÙˆØ¦Ù†_Ú˜ÙˆØ¦ÛŒÙ‡_Ø§ÙˆØª_Ø³Ù¾ØªØ§Ù…Ø¨Ø±_Ø§Ú©ØªØ¨Ø±_Ù†ÙˆØ§Ù…Ø¨Ø±_Ø¯Ø³Ø§Ù…Ø¨Ø±".split("_"),
weekdays:"ÛŒÚ©â€ŒØ´Ù†Ø¨Ù‡_Ø¯ÙˆØ´Ù†Ø¨Ù‡_Ø³Ù‡â€ŒØ´Ù†Ø¨Ù‡_Ú†Ù‡Ø§Ø±Ø´Ù†Ø¨Ù‡_Ù¾Ù†Ø¬â€ŒØ´Ù†Ø¨Ù‡_Ø¬Ù…Ø¹Ù‡_Ø´Ù†Ø¨Ù‡".split("_"),
weekdaysShort:"ÛŒÚ©â€ŒØ´Ù†Ø¨Ù‡_Ø¯ÙˆØ´Ù†Ø¨Ù‡_Ø³Ù‡â€ŒØ´Ù†Ø¨Ù‡_Ú†Ù‡Ø§Ø±Ø´Ù†Ø¨Ù‡_Ù¾Ù†Ø¬â€ŒØ´Ù†Ø¨Ù‡_Ø¬Ù…Ø¹Ù‡_Ø´Ù†Ø¨Ù‡".split("_"),
weekdaysMin:"ÛŒ_Ø¯_Ø³_Ú†_Ù¾_Ø¬_Ø´".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd, D MMMM YYYY LT"
},
meridiem:function(t) {
return 12 > t ? "Ù‚Ø¨Ù„ Ø§Ø² Ø¸Ù‡Ø±" :"Ø¨Ø¹Ø¯ Ø§Ø² Ø¸Ù‡Ø±";
},
calendar:{
sameDay:"[Ø§Ù…Ø±ÙˆØ² Ø³Ø§Ø¹Øª] LT",
nextDay:"[ÙØ±Ø¯Ø§ Ø³Ø§Ø¹Øª] LT",
nextWeek:"dddd [Ø³Ø§Ø¹Øª] LT",
lastDay:"[Ø¯ÛŒØ±ÙˆØ² Ø³Ø§Ø¹Øª] LT",
lastWeek:"dddd [Ù¾ÛŒØ´] [Ø³Ø§Ø¹Øª] LT",
sameElse:"L"
},
relativeTime:{
future:"Ø¯Ø± %s",
past:"%s Ù¾ÛŒØ´",
s:"Ú†Ù†Ø¯ÛŒÙ† Ø«Ø§Ù†ÛŒÙ‡",
m:"ÛŒÚ© Ø¯Ù‚ÛŒÙ‚Ù‡",
mm:"%d Ø¯Ù‚ÛŒÙ‚Ù‡",
h:"ÛŒÚ© Ø³Ø§Ø¹Øª",
hh:"%d Ø³Ø§Ø¹Øª",
d:"ÛŒÚ© Ø±ÙˆØ²",
dd:"%d Ø±ÙˆØ²",
M:"ÛŒÚ© Ù…Ø§Ù‡",
MM:"%d Ù…Ø§Ù‡",
y:"ÛŒÚ© Ø³Ø§Ù„",
yy:"%d Ø³Ø§Ù„"
},
preparse:function(t) {
return t.replace(/[Û°-Û¹]/g, function(t) {
return n[t];
}).replace(/ØŒ/g, ",");
},
postformat:function(t) {
return t.replace(/\d/g, function(t) {
return e[t];
}).replace(/,/g, "ØŒ");
},
ordinal:"%dÙ…",
week:{
dow:6,
doy:12
}
});
}), function(t) {
t(ne);
}(function(t) {
function e(t, e, i, r) {
var s = "";
switch (i) {
case "s":
return r ? "muutaman sekunnin" :"muutama sekunti";

case "m":
return r ? "minuutin" :"minuutti";

case "mm":
s = r ? "minuutin" :"minuuttia";
break;

case "h":
return r ? "tunnin" :"tunti";

case "hh":
s = r ? "tunnin" :"tuntia";
break;

case "d":
return r ? "pÃ¤ivÃ¤n" :"pÃ¤ivÃ¤";

case "dd":
s = r ? "pÃ¤ivÃ¤n" :"pÃ¤ivÃ¤Ã¤";
break;

case "M":
return r ? "kuukauden" :"kuukausi";

case "MM":
s = r ? "kuukauden" :"kuukautta";
break;

case "y":
return r ? "vuoden" :"vuosi";

case "yy":
s = r ? "vuoden" :"vuotta";
}
return s = n(t, r) + " " + s;
}
function n(t, e) {
return 10 > t ? e ? r[t] :i[t] :t;
}
var i = "nolla yksi kaksi kolme neljÃ¤ viisi kuusi seitsemÃ¤n kahdeksan yhdeksÃ¤n".split(" "), r = [ "nolla", "yhden", "kahden", "kolmen", "neljÃ¤n", "viiden", "kuuden", i[7], i[8], i[9] ];
return t.lang("fi", {
months:"tammikuu_helmikuu_maaliskuu_huhtikuu_toukokuu_kesÃ¤kuu_heinÃ¤kuu_elokuu_syyskuu_lokakuu_marraskuu_joulukuu".split("_"),
monthsShort:"tammi_helmi_maalis_huhti_touko_kesÃ¤_heinÃ¤_elo_syys_loka_marras_joulu".split("_"),
weekdays:"sunnuntai_maanantai_tiistai_keskiviikko_torstai_perjantai_lauantai".split("_"),
weekdaysShort:"su_ma_ti_ke_to_pe_la".split("_"),
weekdaysMin:"su_ma_ti_ke_to_pe_la".split("_"),
longDateFormat:{
LT:"HH.mm",
L:"DD.MM.YYYY",
LL:"Do MMMM[ta] YYYY",
LLL:"Do MMMM[ta] YYYY, [klo] LT",
LLLL:"dddd, Do MMMM[ta] YYYY, [klo] LT",
l:"D.M.YYYY",
ll:"Do MMM YYYY",
lll:"Do MMM YYYY, [klo] LT",
llll:"ddd, Do MMM YYYY, [klo] LT"
},
calendar:{
sameDay:"[tÃ¤nÃ¤Ã¤n] [klo] LT",
nextDay:"[huomenna] [klo] LT",
nextWeek:"dddd [klo] LT",
lastDay:"[eilen] [klo] LT",
lastWeek:"[viime] dddd[na] [klo] LT",
sameElse:"L"
},
relativeTime:{
future:"%s pÃ¤Ã¤stÃ¤",
past:"%s sitten",
s:e,
m:e,
mm:e,
h:e,
hh:e,
d:e,
dd:e,
M:e,
MM:e,
y:e,
yy:e
},
ordinal:"%d.",
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("fo", {
months:"januar_februar_mars_aprÃ­l_mai_juni_juli_august_september_oktober_november_desember".split("_"),
monthsShort:"jan_feb_mar_apr_mai_jun_jul_aug_sep_okt_nov_des".split("_"),
weekdays:"sunnudagur_mÃ¡nadagur_tÃ½sdagur_mikudagur_hÃ³sdagur_frÃ­ggjadagur_leygardagur".split("_"),
weekdaysShort:"sun_mÃ¡n_tÃ½s_mik_hÃ³s_frÃ­_ley".split("_"),
weekdaysMin:"su_mÃ¡_tÃ½_mi_hÃ³_fr_le".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd D. MMMM, YYYY LT"
},
calendar:{
sameDay:"[Ã dag kl.] LT",
nextDay:"[Ã morgin kl.] LT",
nextWeek:"dddd [kl.] LT",
lastDay:"[Ã gjÃ¡r kl.] LT",
lastWeek:"[sÃ­Ã°stu] dddd [kl] LT",
sameElse:"L"
},
relativeTime:{
future:"um %s",
past:"%s sÃ­Ã°ani",
s:"fÃ¡ sekund",
m:"ein minutt",
mm:"%d minuttir",
h:"ein tÃ­mi",
hh:"%d tÃ­mar",
d:"ein dagur",
dd:"%d dagar",
M:"ein mÃ¡naÃ°i",
MM:"%d mÃ¡naÃ°ir",
y:"eitt Ã¡r",
yy:"%d Ã¡r"
},
ordinal:"%d.",
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("fr-ca", {
months:"janvier_fÃ©vrier_mars_avril_mai_juin_juillet_aoÃ»t_septembre_octobre_novembre_dÃ©cembre".split("_"),
monthsShort:"janv._fÃ©vr._mars_avr._mai_juin_juil._aoÃ»t_sept._oct._nov._dÃ©c.".split("_"),
weekdays:"dimanche_lundi_mardi_mercredi_jeudi_vendredi_samedi".split("_"),
weekdaysShort:"dim._lun._mar._mer._jeu._ven._sam.".split("_"),
weekdaysMin:"Di_Lu_Ma_Me_Je_Ve_Sa".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"YYYY-MM-DD",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd D MMMM YYYY LT"
},
calendar:{
sameDay:"[Aujourd'hui Ã ] LT",
nextDay:"[Demain Ã ] LT",
nextWeek:"dddd [Ã ] LT",
lastDay:"[Hier Ã ] LT",
lastWeek:"dddd [dernier Ã ] LT",
sameElse:"L"
},
relativeTime:{
future:"dans %s",
past:"il y a %s",
s:"quelques secondes",
m:"une minute",
mm:"%d minutes",
h:"une heure",
hh:"%d heures",
d:"un jour",
dd:"%d jours",
M:"un mois",
MM:"%d mois",
y:"un an",
yy:"%d ans"
},
ordinal:function(t) {
return t + (1 === t ? "er" :"");
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("fr", {
months:"janvier_fÃ©vrier_mars_avril_mai_juin_juillet_aoÃ»t_septembre_octobre_novembre_dÃ©cembre".split("_"),
monthsShort:"janv._fÃ©vr._mars_avr._mai_juin_juil._aoÃ»t_sept._oct._nov._dÃ©c.".split("_"),
weekdays:"dimanche_lundi_mardi_mercredi_jeudi_vendredi_samedi".split("_"),
weekdaysShort:"dim._lun._mar._mer._jeu._ven._sam.".split("_"),
weekdaysMin:"Di_Lu_Ma_Me_Je_Ve_Sa".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd D MMMM YYYY LT"
},
calendar:{
sameDay:"[Aujourd'hui Ã ] LT",
nextDay:"[Demain Ã ] LT",
nextWeek:"dddd [Ã ] LT",
lastDay:"[Hier Ã ] LT",
lastWeek:"dddd [dernier Ã ] LT",
sameElse:"L"
},
relativeTime:{
future:"dans %s",
past:"il y a %s",
s:"quelques secondes",
m:"une minute",
mm:"%d minutes",
h:"une heure",
hh:"%d heures",
d:"un jour",
dd:"%d jours",
M:"un mois",
MM:"%d mois",
y:"un an",
yy:"%d ans"
},
ordinal:function(t) {
return t + (1 === t ? "er" :"");
},
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("gl", {
months:"Xaneiro_Febreiro_Marzo_Abril_Maio_XuÃ±o_Xullo_Agosto_Setembro_Outubro_Novembro_Decembro".split("_"),
monthsShort:"Xan._Feb._Mar._Abr._Mai._XuÃ±._Xul._Ago._Set._Out._Nov._Dec.".split("_"),
weekdays:"Domingo_Luns_Martes_MÃ©rcores_Xoves_Venres_SÃ¡bado".split("_"),
weekdaysShort:"Dom._Lun._Mar._MÃ©r._Xov._Ven._SÃ¡b.".split("_"),
weekdaysMin:"Do_Lu_Ma_MÃ©_Xo_Ve_SÃ¡".split("_"),
longDateFormat:{
LT:"H:mm",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd D MMMM YYYY LT"
},
calendar:{
sameDay:function() {
return "[hoxe " + (1 !== this.hours() ? "Ã¡s" :"Ã¡") + "] LT";
},
nextDay:function() {
return "[maÃ±Ã¡ " + (1 !== this.hours() ? "Ã¡s" :"Ã¡") + "] LT";
},
nextWeek:function() {
return "dddd [" + (1 !== this.hours() ? "Ã¡s" :"a") + "] LT";
},
lastDay:function() {
return "[onte " + (1 !== this.hours() ? "Ã¡" :"a") + "] LT";
},
lastWeek:function() {
return "[o] dddd [pasado " + (1 !== this.hours() ? "Ã¡s" :"a") + "] LT";
},
sameElse:"L"
},
relativeTime:{
future:function(t) {
return "uns segundos" === t ? "nuns segundos" :"en " + t;
},
past:"hai %s",
s:"uns segundos",
m:"un minuto",
mm:"%d minutos",
h:"unha hora",
hh:"%d horas",
d:"un dÃ­a",
dd:"%d dÃ­as",
M:"un mes",
MM:"%d meses",
y:"un ano",
yy:"%d anos"
},
ordinal:"%dÂº",
week:{
dow:1,
doy:7
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("he", {
months:"×™× ×•××¨_×¤×‘×¨×•××¨_×ž×¨×¥_××¤×¨×™×œ_×ž××™_×™×•× ×™_×™×•×œ×™_××•×’×•×¡×˜_×¡×¤×˜×ž×‘×¨_××•×§×˜×•×‘×¨_× ×•×‘×ž×‘×¨_×“×¦×ž×‘×¨".split("_"),
monthsShort:"×™× ×•×³_×¤×‘×¨×³_×ž×¨×¥_××¤×¨×³_×ž××™_×™×•× ×™_×™×•×œ×™_××•×’×³_×¡×¤×˜×³_××•×§×³_× ×•×‘×³_×“×¦×ž×³".split("_"),
weekdays:"×¨××©×•×Ÿ_×©× ×™_×©×œ×™×©×™_×¨×‘×™×¢×™_×—×ž×™×©×™_×©×™×©×™_×©×‘×ª".split("_"),
weekdaysShort:"××³_×‘×³_×’×³_×“×³_×”×³_×•×³_×©×³".split("_"),
weekdaysMin:"×_×‘_×’_×“_×”_×•_×©".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD/MM/YYYY",
LL:"D [×‘]MMMM YYYY",
LLL:"D [×‘]MMMM YYYY LT",
LLLL:"dddd, D [×‘]MMMM YYYY LT",
l:"D/M/YYYY",
ll:"D MMM YYYY",
lll:"D MMM YYYY LT",
llll:"ddd, D MMM YYYY LT"
},
calendar:{
sameDay:"[×”×™×•× ×‘Ö¾]LT",
nextDay:"[×ž×—×¨ ×‘Ö¾]LT",
nextWeek:"dddd [×‘×©×¢×”] LT",
lastDay:"[××ª×ž×•×œ ×‘Ö¾]LT",
lastWeek:"[×‘×™×•×] dddd [×”××—×¨×•×Ÿ ×‘×©×¢×”] LT",
sameElse:"L"
},
relativeTime:{
future:"×‘×¢×•×“ %s",
past:"×œ×¤× ×™ %s",
s:"×ž×¡×¤×¨ ×©× ×™×•×ª",
m:"×“×§×”",
mm:"%d ×“×§×•×ª",
h:"×©×¢×”",
hh:function(t) {
return 2 === t ? "×©×¢×ª×™×™×" :t + " ×©×¢×•×ª";
},
d:"×™×•×",
dd:function(t) {
return 2 === t ? "×™×•×ž×™×™×" :t + " ×™×ž×™×";
},
M:"×—×•×“×©",
MM:function(t) {
return 2 === t ? "×—×•×“×©×™×™×" :t + " ×—×•×“×©×™×";
},
y:"×©× ×”",
yy:function(t) {
return 2 === t ? "×©× ×ª×™×™×" :t + " ×©× ×™×";
}
}
});
}), function(t) {
t(ne);
}(function(t) {
var e = {
"1":"à¥§",
"2":"à¥¨",
"3":"à¥©",
"4":"à¥ª",
"5":"à¥«",
"6":"à¥¬",
"7":"à¥­",
"8":"à¥®",
"9":"à¥¯",
"0":"à¥¦"
}, n = {
"à¥§":"1",
"à¥¨":"2",
"à¥©":"3",
"à¥ª":"4",
"à¥«":"5",
"à¥¬":"6",
"à¥­":"7",
"à¥®":"8",
"à¥¯":"9",
"à¥¦":"0"
};
return t.lang("hi", {
months:"à¤œà¤¨à¤µà¤°à¥€_à¤«à¤¼à¤°à¤µà¤°à¥€_à¤®à¤¾à¤°à¥à¤š_à¤…à¤ªà¥à¤°à¥ˆà¤²_à¤®à¤ˆ_à¤œà¥‚à¤¨_à¤œà¥à¤²à¤¾à¤ˆ_à¤…à¤—à¤¸à¥à¤¤_à¤¸à¤¿à¤¤à¤®à¥à¤¬à¤°_à¤…à¤•à¥à¤Ÿà¥‚à¤¬à¤°_à¤¨à¤µà¤®à¥à¤¬à¤°_à¤¦à¤¿à¤¸à¤®à¥à¤¬à¤°".split("_"),
monthsShort:"à¤œà¤¨._à¤«à¤¼à¤°._à¤®à¤¾à¤°à¥à¤š_à¤…à¤ªà¥à¤°à¥ˆ._à¤®à¤ˆ_à¤œà¥‚à¤¨_à¤œà¥à¤²._à¤…à¤—._à¤¸à¤¿à¤¤._à¤…à¤•à¥à¤Ÿà¥‚._à¤¨à¤µ._à¤¦à¤¿à¤¸.".split("_"),
weekdays:"à¤°à¤µà¤¿à¤µà¤¾à¤°_à¤¸à¥‹à¤®à¤µà¤¾à¤°_à¤®à¤‚à¤—à¤²à¤µà¤¾à¤°_à¤¬à¥à¤§à¤µà¤¾à¤°_à¤—à¥à¤°à¥‚à¤µà¤¾à¤°_à¤¶à¥à¤•à¥à¤°à¤µà¤¾à¤°_à¤¶à¤¨à¤¿à¤µà¤¾à¤°".split("_"),
weekdaysShort:"à¤°à¤µà¤¿_à¤¸à¥‹à¤®_à¤®à¤‚à¤—à¤²_à¤¬à¥à¤§_à¤—à¥à¤°à¥‚_à¤¶à¥à¤•à¥à¤°_à¤¶à¤¨à¤¿".split("_"),
weekdaysMin:"à¤°_à¤¸à¥‹_à¤®à¤‚_à¤¬à¥_à¤—à¥_à¤¶à¥_à¤¶".split("_"),
longDateFormat:{
LT:"A h:mm à¤¬à¤œà¥‡",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY, LT",
LLLL:"dddd, D MMMM YYYY, LT"
},
calendar:{
sameDay:"[à¤†à¤œ] LT",
nextDay:"[à¤•à¤²] LT",
nextWeek:"dddd, LT",
lastDay:"[à¤•à¤²] LT",
lastWeek:"[à¤ªà¤¿à¤›à¤²à¥‡] dddd, LT",
sameElse:"L"
},
relativeTime:{
future:"%s à¤®à¥‡à¤‚",
past:"%s à¤ªà¤¹à¤²à¥‡",
s:"à¤•à¥à¤› à¤¹à¥€ à¤•à¥à¤·à¤£",
m:"à¤à¤• à¤®à¤¿à¤¨à¤Ÿ",
mm:"%d à¤®à¤¿à¤¨à¤Ÿ",
h:"à¤à¤• à¤˜à¤‚à¤Ÿà¤¾",
hh:"%d à¤˜à¤‚à¤Ÿà¥‡",
d:"à¤à¤• à¤¦à¤¿à¤¨",
dd:"%d à¤¦à¤¿à¤¨",
M:"à¤à¤• à¤®à¤¹à¥€à¤¨à¥‡",
MM:"%d à¤®à¤¹à¥€à¤¨à¥‡",
y:"à¤à¤• à¤µà¤°à¥à¤·",
yy:"%d à¤µà¤°à¥à¤·"
},
preparse:function(t) {
return t.replace(/[à¥§à¥¨à¥©à¥ªà¥«à¥¬à¥­à¥®à¥¯à¥¦]/g, function(t) {
return n[t];
});
},
postformat:function(t) {
return t.replace(/\d/g, function(t) {
return e[t];
});
},
meridiem:function(t) {
return 4 > t ? "à¤°à¤¾à¤¤" :10 > t ? "à¤¸à¥à¤¬à¤¹" :17 > t ? "à¤¦à¥‹à¤ªà¤¹à¤°" :20 > t ? "à¤¶à¤¾à¤®" :"à¤°à¤¾à¤¤";
},
week:{
dow:0,
doy:6
}
});
}), function(t) {
t(ne);
}(function(t) {
function e(t, e, n) {
var i = t + " ";
switch (n) {
case "m":
return e ? "jedna minuta" :"jedne minute";

case "mm":
return i += 1 === t ? "minuta" :2 === t || 3 === t || 4 === t ? "minute" :"minuta";

case "h":
return e ? "jedan sat" :"jednog sata";

case "hh":
return i += 1 === t ? "sat" :2 === t || 3 === t || 4 === t ? "sata" :"sati";

case "dd":
return i += 1 === t ? "dan" :"dana";

case "MM":
return i += 1 === t ? "mjesec" :2 === t || 3 === t || 4 === t ? "mjeseca" :"mjeseci";

case "yy":
return i += 1 === t ? "godina" :2 === t || 3 === t || 4 === t ? "godine" :"godina";
}
}
return t.lang("hr", {
months:"sjeÄanj_veljaÄa_oÅ¾ujak_travanj_svibanj_lipanj_srpanj_kolovoz_rujan_listopad_studeni_prosinac".split("_"),
monthsShort:"sje._vel._oÅ¾u._tra._svi._lip._srp._kol._ruj._lis._stu._pro.".split("_"),
weekdays:"nedjelja_ponedjeljak_utorak_srijeda_Äetvrtak_petak_subota".split("_"),
weekdaysShort:"ned._pon._uto._sri._Äet._pet._sub.".split("_"),
weekdaysMin:"ne_po_ut_sr_Äe_pe_su".split("_"),
longDateFormat:{
LT:"H:mm",
L:"DD. MM. YYYY",
LL:"D. MMMM YYYY",
LLL:"D. MMMM YYYY LT",
LLLL:"dddd, D. MMMM YYYY LT"
},
calendar:{
sameDay:"[danas u] LT",
nextDay:"[sutra u] LT",
nextWeek:function() {
switch (this.day()) {
case 0:
return "[u] [nedjelju] [u] LT";

case 3:
return "[u] [srijedu] [u] LT";

case 6:
return "[u] [subotu] [u] LT";

case 1:
case 2:
case 4:
case 5:
return "[u] dddd [u] LT";
}
},
lastDay:"[juÄer u] LT",
lastWeek:function() {
switch (this.day()) {
case 0:
case 3:
return "[proÅ¡lu] dddd [u] LT";

case 6:
return "[proÅ¡le] [subote] [u] LT";

case 1:
case 2:
case 4:
case 5:
return "[proÅ¡li] dddd [u] LT";
}
},
sameElse:"L"
},
relativeTime:{
future:"za %s",
past:"prije %s",
s:"par sekundi",
m:e,
mm:e,
h:e,
hh:e,
d:"dan",
dd:e,
M:"mjesec",
MM:e,
y:"godinu",
yy:e
},
ordinal:"%d.",
week:{
dow:1,
doy:7
}
});
}), function(t) {
t(ne);
}(function(t) {
function e(t, e, n, i) {
var r = t;
switch (n) {
case "s":
return i || e ? "nÃ©hÃ¡ny mÃ¡sodperc" :"nÃ©hÃ¡ny mÃ¡sodperce";

case "m":
return "egy" + (i || e ? " perc" :" perce");

case "mm":
return r + (i || e ? " perc" :" perce");

case "h":
return "egy" + (i || e ? " Ã³ra" :" Ã³rÃ¡ja");

case "hh":
return r + (i || e ? " Ã³ra" :" Ã³rÃ¡ja");

case "d":
return "egy" + (i || e ? " nap" :" napja");

case "dd":
return r + (i || e ? " nap" :" napja");

case "M":
return "egy" + (i || e ? " hÃ³nap" :" hÃ³napja");

case "MM":
return r + (i || e ? " hÃ³nap" :" hÃ³napja");

case "y":
return "egy" + (i || e ? " Ã©v" :" Ã©ve");

case "yy":
return r + (i || e ? " Ã©v" :" Ã©ve");
}
return "";
}
function n(t) {
return (t ? "" :"[mÃºlt] ") + "[" + i[this.day()] + "] LT[-kor]";
}
var i = "vasÃ¡rnap hÃ©tfÅ‘n kedden szerdÃ¡n csÃ¼tÃ¶rtÃ¶kÃ¶n pÃ©nteken szombaton".split(" ");
return t.lang("hu", {
months:"januÃ¡r_februÃ¡r_mÃ¡rcius_Ã¡prilis_mÃ¡jus_jÃºnius_jÃºlius_augusztus_szeptember_oktÃ³ber_november_december".split("_"),
monthsShort:"jan_feb_mÃ¡rc_Ã¡pr_mÃ¡j_jÃºn_jÃºl_aug_szept_okt_nov_dec".split("_"),
weekdays:"vasÃ¡rnap_hÃ©tfÅ‘_kedd_szerda_csÃ¼tÃ¶rtÃ¶k_pÃ©ntek_szombat".split("_"),
weekdaysShort:"vas_hÃ©t_kedd_sze_csÃ¼t_pÃ©n_szo".split("_"),
weekdaysMin:"v_h_k_sze_cs_p_szo".split("_"),
longDateFormat:{
LT:"H:mm",
L:"YYYY.MM.DD.",
LL:"YYYY. MMMM D.",
LLL:"YYYY. MMMM D., LT",
LLLL:"YYYY. MMMM D., dddd LT"
},
calendar:{
sameDay:"[ma] LT[-kor]",
nextDay:"[holnap] LT[-kor]",
nextWeek:function() {
return n.call(this, !0);
},
lastDay:"[tegnap] LT[-kor]",
lastWeek:function() {
return n.call(this, !1);
},
sameElse:"L"
},
relativeTime:{
future:"%s mÃºlva",
past:"%s",
s:e,
m:e,
mm:e,
h:e,
hh:e,
d:e,
dd:e,
M:e,
MM:e,
y:e,
yy:e
},
ordinal:"%d.",
week:{
dow:1,
doy:7
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("id", {
months:"Januari_Februari_Maret_April_Mei_Juni_Juli_Agustus_September_Oktober_November_Desember".split("_"),
monthsShort:"Jan_Feb_Mar_Apr_Mei_Jun_Jul_Ags_Sep_Okt_Nov_Des".split("_"),
weekdays:"Minggu_Senin_Selasa_Rabu_Kamis_Jumat_Sabtu".split("_"),
weekdaysShort:"Min_Sen_Sel_Rab_Kam_Jum_Sab".split("_"),
weekdaysMin:"Mg_Sn_Sl_Rb_Km_Jm_Sb".split("_"),
longDateFormat:{
LT:"HH.mm",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY [pukul] LT",
LLLL:"dddd, D MMMM YYYY [pukul] LT"
},
meridiem:function(t) {
return 11 > t ? "pagi" :15 > t ? "siang" :19 > t ? "sore" :"malam";
},
calendar:{
sameDay:"[Hari ini pukul] LT",
nextDay:"[Besok pukul] LT",
nextWeek:"dddd [pukul] LT",
lastDay:"[Kemarin pukul] LT",
lastWeek:"dddd [lalu pukul] LT",
sameElse:"L"
},
relativeTime:{
future:"dalam %s",
past:"%s yang lalu",
s:"beberapa detik",
m:"semenit",
mm:"%d menit",
h:"sejam",
hh:"%d jam",
d:"sehari",
dd:"%d hari",
M:"sebulan",
MM:"%d bulan",
y:"setahun",
yy:"%d tahun"
},
week:{
dow:1,
doy:7
}
});
}), function(t) {
t(ne);
}(function(t) {
function e(t) {
return t % 100 === 11 ? !0 :t % 10 === 1 ? !1 :!0;
}
function n(t, n, i, r) {
var s = t + " ";
switch (i) {
case "s":
return n || r ? "nokkrar sekÃºndur" :"nokkrum sekÃºndum";

case "m":
return n ? "mÃ­nÃºta" :"mÃ­nÃºtu";

case "mm":
return e(t) ? s + (n || r ? "mÃ­nÃºtur" :"mÃ­nÃºtum") :n ? s + "mÃ­nÃºta" :s + "mÃ­nÃºtu";

case "hh":
return e(t) ? s + (n || r ? "klukkustundir" :"klukkustundum") :s + "klukkustund";

case "d":
return n ? "dagur" :r ? "dag" :"degi";

case "dd":
return e(t) ? n ? s + "dagar" :s + (r ? "daga" :"dÃ¶gum") :n ? s + "dagur" :s + (r ? "dag" :"degi");

case "M":
return n ? "mÃ¡nuÃ°ur" :r ? "mÃ¡nuÃ°" :"mÃ¡nuÃ°i";

case "MM":
return e(t) ? n ? s + "mÃ¡nuÃ°ir" :s + (r ? "mÃ¡nuÃ°i" :"mÃ¡nuÃ°um") :n ? s + "mÃ¡nuÃ°ur" :s + (r ? "mÃ¡nuÃ°" :"mÃ¡nuÃ°i");

case "y":
return n || r ? "Ã¡r" :"Ã¡ri";

case "yy":
return e(t) ? s + (n || r ? "Ã¡r" :"Ã¡rum") :s + (n || r ? "Ã¡r" :"Ã¡ri");
}
}
return t.lang("is", {
months:"janÃºar_febrÃºar_mars_aprÃ­l_maÃ­_jÃºnÃ­_jÃºlÃ­_Ã¡gÃºst_september_oktÃ³ber_nÃ³vember_desember".split("_"),
monthsShort:"jan_feb_mar_apr_maÃ­_jÃºn_jÃºl_Ã¡gÃº_sep_okt_nÃ³v_des".split("_"),
weekdays:"sunnudagur_mÃ¡nudagur_Ã¾riÃ°judagur_miÃ°vikudagur_fimmtudagur_fÃ¶studagur_laugardagur".split("_"),
weekdaysShort:"sun_mÃ¡n_Ã¾ri_miÃ°_fim_fÃ¶s_lau".split("_"),
weekdaysMin:"Su_MÃ¡_Ãžr_Mi_Fi_FÃ¶_La".split("_"),
longDateFormat:{
LT:"H:mm",
L:"DD/MM/YYYY",
LL:"D. MMMM YYYY",
LLL:"D. MMMM YYYY [kl.] LT",
LLLL:"dddd, D. MMMM YYYY [kl.] LT"
},
calendar:{
sameDay:"[Ã­ dag kl.] LT",
nextDay:"[Ã¡ morgun kl.] LT",
nextWeek:"dddd [kl.] LT",
lastDay:"[Ã­ gÃ¦r kl.] LT",
lastWeek:"[sÃ­Ã°asta] dddd [kl.] LT",
sameElse:"L"
},
relativeTime:{
future:"eftir %s",
past:"fyrir %s sÃ­Ã°an",
s:n,
m:n,
mm:n,
h:"klukkustund",
hh:n,
d:n,
dd:n,
M:n,
MM:n,
y:n,
yy:n
},
ordinal:"%d.",
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("it", {
months:"Gennaio_Febbraio_Marzo_Aprile_Maggio_Giugno_Luglio_Agosto_Settembre_Ottobre_Novembre_Dicembre".split("_"),
monthsShort:"Gen_Feb_Mar_Apr_Mag_Giu_Lug_Ago_Set_Ott_Nov_Dic".split("_"),
weekdays:"Domenica_LunedÃ¬_MartedÃ¬_MercoledÃ¬_GiovedÃ¬_VenerdÃ¬_Sabato".split("_"),
weekdaysShort:"Dom_Lun_Mar_Mer_Gio_Ven_Sab".split("_"),
weekdaysMin:"D_L_Ma_Me_G_V_S".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd, D MMMM YYYY LT"
},
calendar:{
sameDay:"[Oggi alle] LT",
nextDay:"[Domani alle] LT",
nextWeek:"dddd [alle] LT",
lastDay:"[Ieri alle] LT",
lastWeek:"[lo scorso] dddd [alle] LT",
sameElse:"L"
},
relativeTime:{
future:function(t) {
return (/^[0-9].+$/.test(t) ? "tra" :"in") + " " + t;
},
past:"%s fa",
s:"alcuni secondi",
m:"un minuto",
mm:"%d minuti",
h:"un'ora",
hh:"%d ore",
d:"un giorno",
dd:"%d giorni",
M:"un mese",
MM:"%d mesi",
y:"un anno",
yy:"%d anni"
},
ordinal:"%dÂº",
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("ja", {
months:"1æœˆ_2æœˆ_3æœˆ_4æœˆ_5æœˆ_6æœˆ_7æœˆ_8æœˆ_9æœˆ_10æœˆ_11æœˆ_12æœˆ".split("_"),
monthsShort:"1æœˆ_2æœˆ_3æœˆ_4æœˆ_5æœˆ_6æœˆ_7æœˆ_8æœˆ_9æœˆ_10æœˆ_11æœˆ_12æœˆ".split("_"),
weekdays:"æ—¥æ›œæ—¥_æœˆæ›œæ—¥_ç«æ›œæ—¥_æ°´æ›œæ—¥_æœ¨æ›œæ—¥_é‡‘æ›œæ—¥_åœŸæ›œæ—¥".split("_"),
weekdaysShort:"æ—¥_æœˆ_ç«_æ°´_æœ¨_é‡‘_åœŸ".split("_"),
weekdaysMin:"æ—¥_æœˆ_ç«_æ°´_æœ¨_é‡‘_åœŸ".split("_"),
longDateFormat:{
LT:"Ahæ™‚måˆ†",
L:"YYYY/MM/DD",
LL:"YYYYå¹´MæœˆDæ—¥",
LLL:"YYYYå¹´MæœˆDæ—¥LT",
LLLL:"YYYYå¹´MæœˆDæ—¥LT dddd"
},
meridiem:function(t) {
return 12 > t ? "åˆå‰" :"åˆå¾Œ";
},
calendar:{
sameDay:"[ä»Šæ—¥] LT",
nextDay:"[æ˜Žæ—¥] LT",
nextWeek:"[æ¥é€±]dddd LT",
lastDay:"[æ˜¨æ—¥] LT",
lastWeek:"[å‰é€±]dddd LT",
sameElse:"L"
},
relativeTime:{
future:"%så¾Œ",
past:"%så‰",
s:"æ•°ç§’",
m:"1åˆ†",
mm:"%dåˆ†",
h:"1æ™‚é–“",
hh:"%dæ™‚é–“",
d:"1æ—¥",
dd:"%dæ—¥",
M:"1ãƒ¶æœˆ",
MM:"%dãƒ¶æœˆ",
y:"1å¹´",
yy:"%då¹´"
}
});
}), function(t) {
t(ne);
}(function(t) {
function e(t, e) {
var n = {
nominative:"áƒ˜áƒáƒœáƒ•áƒáƒ áƒ˜_áƒ—áƒ”áƒ‘áƒ”áƒ áƒ•áƒáƒšáƒ˜_áƒ›áƒáƒ áƒ¢áƒ˜_áƒáƒžáƒ áƒ˜áƒšáƒ˜_áƒ›áƒáƒ˜áƒ¡áƒ˜_áƒ˜áƒ•áƒœáƒ˜áƒ¡áƒ˜_áƒ˜áƒ•áƒšáƒ˜áƒ¡áƒ˜_áƒáƒ’áƒ•áƒ˜áƒ¡áƒ¢áƒ_áƒ¡áƒ”áƒ¥áƒ¢áƒ”áƒ›áƒ‘áƒ”áƒ áƒ˜_áƒáƒ¥áƒ¢áƒáƒ›áƒ‘áƒ”áƒ áƒ˜_áƒœáƒáƒ”áƒ›áƒ‘áƒ”áƒ áƒ˜_áƒ“áƒ”áƒ™áƒ”áƒ›áƒ‘áƒ”áƒ áƒ˜".split("_"),
accusative:"áƒ˜áƒáƒœáƒ•áƒáƒ áƒ¡_áƒ—áƒ”áƒ‘áƒ”áƒ áƒ•áƒáƒšáƒ¡_áƒ›áƒáƒ áƒ¢áƒ¡_áƒáƒžáƒ áƒ˜áƒšáƒ˜áƒ¡_áƒ›áƒáƒ˜áƒ¡áƒ¡_áƒ˜áƒ•áƒœáƒ˜áƒ¡áƒ¡_áƒ˜áƒ•áƒšáƒ˜áƒ¡áƒ¡_áƒáƒ’áƒ•áƒ˜áƒ¡áƒ¢áƒ¡_áƒ¡áƒ”áƒ¥áƒ¢áƒ”áƒ›áƒ‘áƒ”áƒ áƒ¡_áƒáƒ¥áƒ¢áƒáƒ›áƒ‘áƒ”áƒ áƒ¡_áƒœáƒáƒ”áƒ›áƒ‘áƒ”áƒ áƒ¡_áƒ“áƒ”áƒ™áƒ”áƒ›áƒ‘áƒ”áƒ áƒ¡".split("_")
}, i = /D[oD] *MMMM?/.test(e) ? "accusative" :"nominative";
return n[i][t.month()];
}
function n(t, e) {
var n = {
nominative:"áƒ™áƒ•áƒ˜áƒ áƒ_áƒáƒ áƒ¨áƒáƒ‘áƒáƒ—áƒ˜_áƒ¡áƒáƒ›áƒ¨áƒáƒ‘áƒáƒ—áƒ˜_áƒáƒ—áƒ®áƒ¨áƒáƒ‘áƒáƒ—áƒ˜_áƒ®áƒ£áƒ—áƒ¨áƒáƒ‘áƒáƒ—áƒ˜_áƒžáƒáƒ áƒáƒ¡áƒ™áƒ”áƒ•áƒ˜_áƒ¨áƒáƒ‘áƒáƒ—áƒ˜".split("_"),
accusative:"áƒ™áƒ•áƒ˜áƒ áƒáƒ¡_áƒáƒ áƒ¨áƒáƒ‘áƒáƒ—áƒ¡_áƒ¡áƒáƒ›áƒ¨áƒáƒ‘áƒáƒ—áƒ¡_áƒáƒ—áƒ®áƒ¨áƒáƒ‘áƒáƒ—áƒ¡_áƒ®áƒ£áƒ—áƒ¨áƒáƒ‘áƒáƒ—áƒ¡_áƒžáƒáƒ áƒáƒ¡áƒ™áƒ”áƒ•áƒ¡_áƒ¨áƒáƒ‘áƒáƒ—áƒ¡".split("_")
}, i = /(áƒ¬áƒ˜áƒœáƒ|áƒ¨áƒ”áƒ›áƒ“áƒ”áƒ’)/.test(e) ? "accusative" :"nominative";
return n[i][t.day()];
}
return t.lang("ka", {
months:e,
monthsShort:"áƒ˜áƒáƒœ_áƒ—áƒ”áƒ‘_áƒ›áƒáƒ _áƒáƒžáƒ _áƒ›áƒáƒ˜_áƒ˜áƒ•áƒœ_áƒ˜áƒ•áƒš_áƒáƒ’áƒ•_áƒ¡áƒ”áƒ¥_áƒáƒ¥áƒ¢_áƒœáƒáƒ”_áƒ“áƒ”áƒ™".split("_"),
weekdays:n,
weekdaysShort:"áƒ™áƒ•áƒ˜_áƒáƒ áƒ¨_áƒ¡áƒáƒ›_áƒáƒ—áƒ®_áƒ®áƒ£áƒ—_áƒžáƒáƒ _áƒ¨áƒáƒ‘".split("_"),
weekdaysMin:"áƒ™áƒ•_áƒáƒ _áƒ¡áƒ_áƒáƒ—_áƒ®áƒ£_áƒžáƒ_áƒ¨áƒ".split("_"),
longDateFormat:{
LT:"h:mm A",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd, D MMMM YYYY LT"
},
calendar:{
sameDay:"[áƒ“áƒ¦áƒ”áƒ¡] LT[-áƒ–áƒ”]",
nextDay:"[áƒ®áƒ•áƒáƒš] LT[-áƒ–áƒ”]",
lastDay:"[áƒ’áƒ£áƒ¨áƒ˜áƒœ] LT[-áƒ–áƒ”]",
nextWeek:"[áƒ¨áƒ”áƒ›áƒ“áƒ”áƒ’] dddd LT[-áƒ–áƒ”]",
lastWeek:"[áƒ¬áƒ˜áƒœáƒ] dddd LT-áƒ–áƒ”",
sameElse:"L"
},
relativeTime:{
future:function(t) {
return /(áƒ¬áƒáƒ›áƒ˜|áƒ¬áƒ£áƒ—áƒ˜|áƒ¡áƒáƒáƒ—áƒ˜|áƒ¬áƒ”áƒšáƒ˜)/.test(t) ? t.replace(/áƒ˜$/, "áƒ¨áƒ˜") :t + "áƒ¨áƒ˜";
},
past:function(t) {
return /(áƒ¬áƒáƒ›áƒ˜|áƒ¬áƒ£áƒ—áƒ˜|áƒ¡áƒáƒáƒ—áƒ˜|áƒ“áƒ¦áƒ”|áƒ—áƒ•áƒ”)/.test(t) ? t.replace(/(áƒ˜|áƒ”)$/, "áƒ˜áƒ¡ áƒ¬áƒ˜áƒœ") :/áƒ¬áƒ”áƒšáƒ˜/.test(t) ? t.replace(/áƒ¬áƒ”áƒšáƒ˜$/, "áƒ¬áƒšáƒ˜áƒ¡ áƒ¬áƒ˜áƒœ") :void 0;
},
s:"áƒ áƒáƒ›áƒ“áƒ”áƒœáƒ˜áƒ›áƒ” áƒ¬áƒáƒ›áƒ˜",
m:"áƒ¬áƒ£áƒ—áƒ˜",
mm:"%d áƒ¬áƒ£áƒ—áƒ˜",
h:"áƒ¡áƒáƒáƒ—áƒ˜",
hh:"%d áƒ¡áƒáƒáƒ—áƒ˜",
d:"áƒ“áƒ¦áƒ”",
dd:"%d áƒ“áƒ¦áƒ”",
M:"áƒ—áƒ•áƒ”",
MM:"%d áƒ—áƒ•áƒ”",
y:"áƒ¬áƒ”áƒšáƒ˜",
yy:"%d áƒ¬áƒ”áƒšáƒ˜"
},
ordinal:function(t) {
return 0 === t ? t :1 === t ? t + "-áƒšáƒ˜" :20 > t || 100 >= t && t % 20 === 0 || t % 100 === 0 ? "áƒ›áƒ”-" + t :t + "-áƒ”";
},
week:{
dow:1,
doy:7
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("ko", {
months:"1ì›”_2ì›”_3ì›”_4ì›”_5ì›”_6ì›”_7ì›”_8ì›”_9ì›”_10ì›”_11ì›”_12ì›”".split("_"),
monthsShort:"1ì›”_2ì›”_3ì›”_4ì›”_5ì›”_6ì›”_7ì›”_8ì›”_9ì›”_10ì›”_11ì›”_12ì›”".split("_"),
weekdays:"ì¼ìš”ì¼_ì›”ìš”ì¼_í™”ìš”ì¼_ìˆ˜ìš”ì¼_ëª©ìš”ì¼_ê¸ˆìš”ì¼_í† ìš”ì¼".split("_"),
weekdaysShort:"ì¼_ì›”_í™”_ìˆ˜_ëª©_ê¸ˆ_í† ".split("_"),
weekdaysMin:"ì¼_ì›”_í™”_ìˆ˜_ëª©_ê¸ˆ_í† ".split("_"),
longDateFormat:{
LT:"A hì‹œ mmë¶„",
L:"YYYY.MM.DD",
LL:"YYYYë…„ MMMM Dì¼",
LLL:"YYYYë…„ MMMM Dì¼ LT",
LLLL:"YYYYë…„ MMMM Dì¼ dddd LT"
},
meridiem:function(t) {
return 12 > t ? "ì˜¤ì „" :"ì˜¤í›„";
},
calendar:{
sameDay:"ì˜¤ëŠ˜ LT",
nextDay:"ë‚´ì¼ LT",
nextWeek:"dddd LT",
lastDay:"ì–´ì œ LT",
lastWeek:"ì§€ë‚œì£¼ dddd LT",
sameElse:"L"
},
relativeTime:{
future:"%s í›„",
past:"%s ì „",
s:"ëª‡ì´ˆ",
ss:"%dì´ˆ",
m:"ì¼ë¶„",
mm:"%dë¶„",
h:"í•œì‹œê°„",
hh:"%dì‹œê°„",
d:"í•˜ë£¨",
dd:"%dì¼",
M:"í•œë‹¬",
MM:"%dë‹¬",
y:"ì¼ë…„",
yy:"%dë…„"
},
ordinal:"%dì¼",
meridiemParse:/(ì˜¤ì „|ì˜¤í›„)/,
isPM:function(t) {
return "ì˜¤í›„" === t;
}
});
}), function(t) {
t(ne);
}(function(t) {
function e(t, e, n) {
var i = {
m:[ "eng Minutt", "enger Minutt" ],
h:[ "eng Stonn", "enger Stonn" ],
d:[ "een Dag", "engem Dag" ],
dd:[ t + " Deeg", t + " Deeg" ],
M:[ "ee Mount", "engem Mount" ],
MM:[ t + " MÃ©int", t + " MÃ©int" ],
y:[ "ee Joer", "engem Joer" ],
yy:[ t + " Joer", t + " Joer" ]
};
return e ? i[n][0] :i[n][1];
}
function n(t) {
var e = t.substr(0, t.indexOf(" "));
return a(e) ? "a " + t :"an " + t;
}
function i(t) {
var e = t.substr(0, t.indexOf(" "));
return a(e) ? "viru " + t :"virun " + t;
}
function r() {
var t = this.format("d");
return s(t) ? "[Leschte] dddd [um] LT" :"[Leschten] dddd [um] LT";
}
function s(t) {
switch (t = parseInt(t, 10)) {
case 0:
case 1:
case 3:
case 5:
case 6:
return !0;

default:
return !1;
}
}
function a(t) {
if (t = parseInt(t, 10), isNaN(t)) return !1;
if (0 > t) return !0;
if (10 > t) return t >= 4 && 7 >= t ? !0 :!1;
if (100 > t) {
var e = t % 10, n = t / 10;
return 0 === e ? a(n) :a(e);
}
if (1e4 > t) {
for (;t >= 10; ) t /= 10;
return a(t);
}
return t /= 1e3, a(t);
}
return t.lang("lb", {
months:"Januar_Februar_MÃ¤erz_AbrÃ«ll_Mee_Juni_Juli_August_September_Oktober_November_Dezember".split("_"),
monthsShort:"Jan._Febr._Mrz._Abr._Mee_Jun._Jul._Aug._Sept._Okt._Nov._Dez.".split("_"),
weekdays:"Sonndeg_MÃ©indeg_DÃ«nschdeg_MÃ«ttwoch_Donneschdeg_Freideg_Samschdeg".split("_"),
weekdaysShort:"So._MÃ©._DÃ«._MÃ«._Do._Fr._Sa.".split("_"),
weekdaysMin:"So_MÃ©_DÃ«_MÃ«_Do_Fr_Sa".split("_"),
longDateFormat:{
LT:"H:mm [Auer]",
L:"DD.MM.YYYY",
LL:"D. MMMM YYYY",
LLL:"D. MMMM YYYY LT",
LLLL:"dddd, D. MMMM YYYY LT"
},
calendar:{
sameDay:"[Haut um] LT",
sameElse:"L",
nextDay:"[Muer um] LT",
nextWeek:"dddd [um] LT",
lastDay:"[GÃ«schter um] LT",
lastWeek:r
},
relativeTime:{
future:n,
past:i,
s:"e puer Sekonnen",
m:e,
mm:"%d Minutten",
h:e,
hh:"%d Stonnen",
d:e,
dd:e,
M:e,
MM:e,
y:e,
yy:e
},
ordinal:"%d.",
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
function e(t, e, n, i) {
return e ? "kelios sekundÄ—s" :i ? "keliÅ³ sekundÅ¾iÅ³" :"kelias sekundes";
}
function n(t, e, n, i) {
return e ? r(n)[0] :i ? r(n)[1] :r(n)[2];
}
function i(t) {
return t % 10 === 0 || t > 10 && 20 > t;
}
function r(t) {
return o[t].split("_");
}
function s(t, e, s, a) {
var o = t + " ";
return 1 === t ? o + n(t, e, s[0], a) :e ? o + (i(t) ? r(s)[1] :r(s)[0]) :a ? o + r(s)[1] :o + (i(t) ? r(s)[1] :r(s)[2]);
}
function a(t, e) {
var n = -1 === e.indexOf("dddd LT"), i = u[t.weekday()];
return n ? i :i.substring(0, i.length - 2) + "Ä¯";
}
var o = {
m:"minutÄ—_minutÄ—s_minutÄ™",
mm:"minutÄ—s_minuÄiÅ³_minutes",
h:"valanda_valandos_valandÄ…",
hh:"valandos_valandÅ³_valandas",
d:"diena_dienos_dienÄ…",
dd:"dienos_dienÅ³_dienas",
M:"mÄ—nuo_mÄ—nesio_mÄ—nesÄ¯",
MM:"mÄ—nesiai_mÄ—nesiÅ³_mÄ—nesius",
y:"metai_metÅ³_metus",
yy:"metai_metÅ³_metus"
}, u = "pirmadienis_antradienis_treÄiadienis_ketvirtadienis_penktadienis_Å¡eÅ¡tadienis_sekmadienis".split("_");
return t.lang("lt", {
months:"sausio_vasario_kovo_balandÅ¾io_geguÅ¾Ä—s_birÅ¾Ä—lio_liepos_rugpjÅ«Äio_rugsÄ—jo_spalio_lapkriÄio_gruodÅ¾io".split("_"),
monthsShort:"sau_vas_kov_bal_geg_bir_lie_rgp_rgs_spa_lap_grd".split("_"),
weekdays:a,
weekdaysShort:"Sek_Pir_Ant_Tre_Ket_Pen_Å eÅ¡".split("_"),
weekdaysMin:"S_P_A_T_K_Pn_Å ".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"YYYY-MM-DD",
LL:"YYYY [m.] MMMM D [d.]",
LLL:"YYYY [m.] MMMM D [d.], LT [val.]",
LLLL:"YYYY [m.] MMMM D [d.], dddd, LT [val.]",
l:"YYYY-MM-DD",
ll:"YYYY [m.] MMMM D [d.]",
lll:"YYYY [m.] MMMM D [d.], LT [val.]",
llll:"YYYY [m.] MMMM D [d.], ddd, LT [val.]"
},
calendar:{
sameDay:"[Å iandien] LT",
nextDay:"[Rytoj] LT",
nextWeek:"dddd LT",
lastDay:"[Vakar] LT",
lastWeek:"[PraÄ—jusÄ¯] dddd LT",
sameElse:"L"
},
relativeTime:{
future:"po %s",
past:"prieÅ¡ %s",
s:e,
m:n,
mm:s,
h:n,
hh:s,
d:n,
dd:s,
M:n,
MM:s,
y:n,
yy:s
},
ordinal:function(t) {
return t + "-oji";
},
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
function e(t, e, n) {
var i = t.split("_");
return n ? e % 10 === 1 && 11 !== e ? i[2] :i[3] :e % 10 === 1 && 11 !== e ? i[0] :i[1];
}
function n(t, n, r) {
return t + " " + e(i[r], t, n);
}
var i = {
mm:"minÅ«ti_minÅ«tes_minÅ«te_minÅ«tes",
hh:"stundu_stundas_stunda_stundas",
dd:"dienu_dienas_diena_dienas",
MM:"mÄ“nesi_mÄ“neÅ¡us_mÄ“nesis_mÄ“neÅ¡i",
yy:"gadu_gadus_gads_gadi"
};
return t.lang("lv", {
months:"janvÄris_februÄris_marts_aprÄ«lis_maijs_jÅ«nijs_jÅ«lijs_augusts_septembris_oktobris_novembris_decembris".split("_"),
monthsShort:"jan_feb_mar_apr_mai_jÅ«n_jÅ«l_aug_sep_okt_nov_dec".split("_"),
weekdays:"svÄ“tdiena_pirmdiena_otrdiena_treÅ¡diena_ceturtdiena_piektdiena_sestdiena".split("_"),
weekdaysShort:"Sv_P_O_T_C_Pk_S".split("_"),
weekdaysMin:"Sv_P_O_T_C_Pk_S".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD.MM.YYYY",
LL:"YYYY. [gada] D. MMMM",
LLL:"YYYY. [gada] D. MMMM, LT",
LLLL:"YYYY. [gada] D. MMMM, dddd, LT"
},
calendar:{
sameDay:"[Å odien pulksten] LT",
nextDay:"[RÄ«t pulksten] LT",
nextWeek:"dddd [pulksten] LT",
lastDay:"[Vakar pulksten] LT",
lastWeek:"[PagÄjuÅ¡Ä] dddd [pulksten] LT",
sameElse:"L"
},
relativeTime:{
future:"%s vÄ“lÄk",
past:"%s agrÄk",
s:"daÅ¾as sekundes",
m:"minÅ«ti",
mm:n,
h:"stundu",
hh:n,
d:"dienu",
dd:n,
M:"mÄ“nesi",
MM:n,
y:"gadu",
yy:n
},
ordinal:"%d.",
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("mk", {
months:"Ñ˜Ð°Ð½ÑƒÐ°Ñ€Ð¸_Ñ„ÐµÐ²Ñ€ÑƒÐ°Ñ€Ð¸_Ð¼Ð°Ñ€Ñ‚_Ð°Ð¿Ñ€Ð¸Ð»_Ð¼Ð°Ñ˜_Ñ˜ÑƒÐ½Ð¸_Ñ˜ÑƒÐ»Ð¸_Ð°Ð²Ð³ÑƒÑÑ‚_ÑÐµÐ¿Ñ‚ÐµÐ¼Ð²Ñ€Ð¸_Ð¾ÐºÑ‚Ð¾Ð¼Ð²Ñ€Ð¸_Ð½Ð¾ÐµÐ¼Ð²Ñ€Ð¸_Ð´ÐµÐºÐµÐ¼Ð²Ñ€Ð¸".split("_"),
monthsShort:"Ñ˜Ð°Ð½_Ñ„ÐµÐ²_Ð¼Ð°Ñ€_Ð°Ð¿Ñ€_Ð¼Ð°Ñ˜_Ñ˜ÑƒÐ½_Ñ˜ÑƒÐ»_Ð°Ð²Ð³_ÑÐµÐ¿_Ð¾ÐºÑ‚_Ð½Ð¾Ðµ_Ð´ÐµÐº".split("_"),
weekdays:"Ð½ÐµÐ´ÐµÐ»Ð°_Ð¿Ð¾Ð½ÐµÐ´ÐµÐ»Ð½Ð¸Ðº_Ð²Ñ‚Ð¾Ñ€Ð½Ð¸Ðº_ÑÑ€ÐµÐ´Ð°_Ñ‡ÐµÑ‚Ð²Ñ€Ñ‚Ð¾Ðº_Ð¿ÐµÑ‚Ð¾Ðº_ÑÐ°Ð±Ð¾Ñ‚Ð°".split("_"),
weekdaysShort:"Ð½ÐµÐ´_Ð¿Ð¾Ð½_Ð²Ñ‚Ð¾_ÑÑ€Ðµ_Ñ‡ÐµÑ‚_Ð¿ÐµÑ‚_ÑÐ°Ð±".split("_"),
weekdaysMin:"Ð½e_Ð¿o_Ð²Ñ‚_ÑÑ€_Ñ‡Ðµ_Ð¿Ðµ_Ña".split("_"),
longDateFormat:{
LT:"H:mm",
L:"D.MM.YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd, D MMMM YYYY LT"
},
calendar:{
sameDay:"[Ð”ÐµÐ½ÐµÑ Ð²Ð¾] LT",
nextDay:"[Ð£Ñ‚Ñ€Ðµ Ð²Ð¾] LT",
nextWeek:"dddd [Ð²Ð¾] LT",
lastDay:"[Ð’Ñ‡ÐµÑ€Ð° Ð²Ð¾] LT",
lastWeek:function() {
switch (this.day()) {
case 0:
case 3:
case 6:
return "[Ð’Ð¾ Ð¸Ð·Ð¼Ð¸Ð½Ð°Ñ‚Ð°Ñ‚Ð°] dddd [Ð²Ð¾] LT";

case 1:
case 2:
case 4:
case 5:
return "[Ð’Ð¾ Ð¸Ð·Ð¼Ð¸Ð½Ð°Ñ‚Ð¸Ð¾Ñ‚] dddd [Ð²Ð¾] LT";
}
},
sameElse:"L"
},
relativeTime:{
future:"Ð¿Ð¾ÑÐ»Ðµ %s",
past:"Ð¿Ñ€ÐµÐ´ %s",
s:"Ð½ÐµÐºÐ¾Ð»ÐºÑƒ ÑÐµÐºÑƒÐ½Ð´Ð¸",
m:"Ð¼Ð¸Ð½ÑƒÑ‚Ð°",
mm:"%d Ð¼Ð¸Ð½ÑƒÑ‚Ð¸",
h:"Ñ‡Ð°Ñ",
hh:"%d Ñ‡Ð°ÑÐ°",
d:"Ð´ÐµÐ½",
dd:"%d Ð´ÐµÐ½Ð°",
M:"Ð¼ÐµÑÐµÑ†",
MM:"%d Ð¼ÐµÑÐµÑ†Ð¸",
y:"Ð³Ð¾Ð´Ð¸Ð½Ð°",
yy:"%d Ð³Ð¾Ð´Ð¸Ð½Ð¸"
},
ordinal:function(t) {
var e = t % 10, n = t % 100;
return 0 === t ? t + "-ÐµÐ²" :0 === n ? t + "-ÐµÐ½" :n > 10 && 20 > n ? t + "-Ñ‚Ð¸" :1 === e ? t + "-Ð²Ð¸" :2 === e ? t + "-Ñ€Ð¸" :7 === e || 8 === e ? t + "-Ð¼Ð¸" :t + "-Ñ‚Ð¸";
},
week:{
dow:1,
doy:7
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("ml", {
months:"à´œà´¨àµà´µà´°à´¿_à´«àµ†à´¬àµà´°àµà´µà´°à´¿_à´®à´¾àµ¼à´šàµà´šàµ_à´à´ªàµà´°à´¿àµ½_à´®àµ‡à´¯àµ_à´œàµ‚àµº_à´œàµ‚à´²àµˆ_à´“à´—à´¸àµà´±àµà´±àµ_à´¸àµ†à´ªàµà´±àµà´±à´‚à´¬àµ¼_à´’à´•àµà´Ÿàµ‹à´¬àµ¼_à´¨à´µà´‚à´¬àµ¼_à´¡à´¿à´¸à´‚à´¬àµ¼".split("_"),
monthsShort:"à´œà´¨àµ._à´«àµ†à´¬àµà´°àµ._à´®à´¾àµ¼._à´à´ªàµà´°à´¿._à´®àµ‡à´¯àµ_à´œàµ‚àµº_à´œàµ‚à´²àµˆ._à´“à´—._à´¸àµ†à´ªàµà´±àµà´±._à´’à´•àµà´Ÿàµ‹._à´¨à´µà´‚._à´¡à´¿à´¸à´‚.".split("_"),
weekdays:"à´žà´¾à´¯à´±à´¾à´´àµà´š_à´¤à´¿à´™àµà´•à´³à´¾à´´àµà´š_à´šàµŠà´µàµà´µà´¾à´´àµà´š_à´¬àµà´§à´¨à´¾à´´àµà´š_à´µàµà´¯à´¾à´´à´¾à´´àµà´š_à´µàµ†à´³àµà´³à´¿à´¯à´¾à´´àµà´š_à´¶à´¨à´¿à´¯à´¾à´´àµà´š".split("_"),
weekdaysShort:"à´žà´¾à´¯àµ¼_à´¤à´¿à´™àµà´•àµ¾_à´šàµŠà´µàµà´µ_à´¬àµà´§àµ»_à´µàµà´¯à´¾à´´à´‚_à´µàµ†à´³àµà´³à´¿_à´¶à´¨à´¿".split("_"),
weekdaysMin:"à´žà´¾_à´¤à´¿_à´šàµŠ_à´¬àµ_à´µàµà´¯à´¾_à´µàµ†_à´¶".split("_"),
longDateFormat:{
LT:"A h:mm -à´¨àµ",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY, LT",
LLLL:"dddd, D MMMM YYYY, LT"
},
calendar:{
sameDay:"[à´‡à´¨àµà´¨àµ] LT",
nextDay:"[à´¨à´¾à´³àµ†] LT",
nextWeek:"dddd, LT",
lastDay:"[à´‡à´¨àµà´¨à´²àµ†] LT",
lastWeek:"[à´•à´´à´¿à´žàµà´ž] dddd, LT",
sameElse:"L"
},
relativeTime:{
future:"%s à´•à´´à´¿à´žàµà´žàµ",
past:"%s à´®àµàµ»à´ªàµ",
s:"à´…àµ½à´ª à´¨à´¿à´®à´¿à´·à´™àµà´™àµ¾",
m:"à´’à´°àµ à´®à´¿à´¨à´¿à´±àµà´±àµ",
mm:"%d à´®à´¿à´¨à´¿à´±àµà´±àµ",
h:"à´’à´°àµ à´®à´£à´¿à´•àµà´•àµ‚àµ¼",
hh:"%d à´®à´£à´¿à´•àµà´•àµ‚àµ¼",
d:"à´’à´°àµ à´¦à´¿à´µà´¸à´‚",
dd:"%d à´¦à´¿à´µà´¸à´‚",
M:"à´’à´°àµ à´®à´¾à´¸à´‚",
MM:"%d à´®à´¾à´¸à´‚",
y:"à´’à´°àµ à´µàµ¼à´·à´‚",
yy:"%d à´µàµ¼à´·à´‚"
},
meridiem:function(t) {
return 4 > t ? "à´°à´¾à´¤àµà´°à´¿" :12 > t ? "à´°à´¾à´µà´¿à´²àµ†" :17 > t ? "à´‰à´šàµà´š à´•à´´à´¿à´žàµà´žàµ" :20 > t ? "à´µàµˆà´•àµà´¨àµà´¨àµ‡à´°à´‚" :"à´°à´¾à´¤àµà´°à´¿";
}
});
}), function(t) {
t(ne);
}(function(t) {
var e = {
"1":"à¥§",
"2":"à¥¨",
"3":"à¥©",
"4":"à¥ª",
"5":"à¥«",
"6":"à¥¬",
"7":"à¥­",
"8":"à¥®",
"9":"à¥¯",
"0":"à¥¦"
}, n = {
"à¥§":"1",
"à¥¨":"2",
"à¥©":"3",
"à¥ª":"4",
"à¥«":"5",
"à¥¬":"6",
"à¥­":"7",
"à¥®":"8",
"à¥¯":"9",
"à¥¦":"0"
};
return t.lang("mr", {
months:"à¤œà¤¾à¤¨à¥‡à¤µà¤¾à¤°à¥€_à¤«à¥‡à¤¬à¥à¤°à¥à¤µà¤¾à¤°à¥€_à¤®à¤¾à¤°à¥à¤š_à¤à¤ªà¥à¤°à¤¿à¤²_à¤®à¥‡_à¤œà¥‚à¤¨_à¤œà¥à¤²à¥ˆ_à¤‘à¤—à¤¸à¥à¤Ÿ_à¤¸à¤ªà¥à¤Ÿà¥‡à¤‚à¤¬à¤°_à¤‘à¤•à¥à¤Ÿà¥‹à¤¬à¤°_à¤¨à¥‹à¤µà¥à¤¹à¥‡à¤‚à¤¬à¤°_à¤¡à¤¿à¤¸à¥‡à¤‚à¤¬à¤°".split("_"),
monthsShort:"à¤œà¤¾à¤¨à¥‡._à¤«à¥‡à¤¬à¥à¤°à¥._à¤®à¤¾à¤°à¥à¤š._à¤à¤ªà¥à¤°à¤¿._à¤®à¥‡._à¤œà¥‚à¤¨._à¤œà¥à¤²à¥ˆ._à¤‘à¤—._à¤¸à¤ªà¥à¤Ÿà¥‡à¤‚._à¤‘à¤•à¥à¤Ÿà¥‹._à¤¨à¥‹à¤µà¥à¤¹à¥‡à¤‚._à¤¡à¤¿à¤¸à¥‡à¤‚.".split("_"),
weekdays:"à¤°à¤µà¤¿à¤µà¤¾à¤°_à¤¸à¥‹à¤®à¤µà¤¾à¤°_à¤®à¤‚à¤—à¤³à¤µà¤¾à¤°_à¤¬à¥à¤§à¤µà¤¾à¤°_à¤—à¥à¤°à¥‚à¤µà¤¾à¤°_à¤¶à¥à¤•à¥à¤°à¤µà¤¾à¤°_à¤¶à¤¨à¤¿à¤µà¤¾à¤°".split("_"),
weekdaysShort:"à¤°à¤µà¤¿_à¤¸à¥‹à¤®_à¤®à¤‚à¤—à¤³_à¤¬à¥à¤§_à¤—à¥à¤°à¥‚_à¤¶à¥à¤•à¥à¤°_à¤¶à¤¨à¤¿".split("_"),
weekdaysMin:"à¤°_à¤¸à¥‹_à¤®à¤‚_à¤¬à¥_à¤—à¥_à¤¶à¥_à¤¶".split("_"),
longDateFormat:{
LT:"A h:mm à¤µà¤¾à¤œà¤¤à¤¾",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY, LT",
LLLL:"dddd, D MMMM YYYY, LT"
},
calendar:{
sameDay:"[à¤†à¤œ] LT",
nextDay:"[à¤‰à¤¦à¥à¤¯à¤¾] LT",
nextWeek:"dddd, LT",
lastDay:"[à¤•à¤¾à¤²] LT",
lastWeek:"[à¤®à¤¾à¤—à¥€à¤²] dddd, LT",
sameElse:"L"
},
relativeTime:{
future:"%s à¤¨à¤‚à¤¤à¤°",
past:"%s à¤ªà¥‚à¤°à¥à¤µà¥€",
s:"à¤¸à¥‡à¤•à¤‚à¤¦",
m:"à¤à¤• à¤®à¤¿à¤¨à¤¿à¤Ÿ",
mm:"%d à¤®à¤¿à¤¨à¤¿à¤Ÿà¥‡",
h:"à¤à¤• à¤¤à¤¾à¤¸",
hh:"%d à¤¤à¤¾à¤¸",
d:"à¤à¤• à¤¦à¤¿à¤µà¤¸",
dd:"%d à¤¦à¤¿à¤µà¤¸",
M:"à¤à¤• à¤®à¤¹à¤¿à¤¨à¤¾",
MM:"%d à¤®à¤¹à¤¿à¤¨à¥‡",
y:"à¤à¤• à¤µà¤°à¥à¤·",
yy:"%d à¤µà¤°à¥à¤·à¥‡"
},
preparse:function(t) {
return t.replace(/[à¥§à¥¨à¥©à¥ªà¥«à¥¬à¥­à¥®à¥¯à¥¦]/g, function(t) {
return n[t];
});
},
postformat:function(t) {
return t.replace(/\d/g, function(t) {
return e[t];
});
},
meridiem:function(t) {
return 4 > t ? "à¤°à¤¾à¤¤à¥à¤°à¥€" :10 > t ? "à¤¸à¤•à¤¾à¤³à¥€" :17 > t ? "à¤¦à¥à¤ªà¤¾à¤°à¥€" :20 > t ? "à¤¸à¤¾à¤¯à¤‚à¤•à¤¾à¤³à¥€" :"à¤°à¤¾à¤¤à¥à¤°à¥€";
},
week:{
dow:0,
doy:6
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("ms-my", {
months:"Januari_Februari_Mac_April_Mei_Jun_Julai_Ogos_September_Oktober_November_Disember".split("_"),
monthsShort:"Jan_Feb_Mac_Apr_Mei_Jun_Jul_Ogs_Sep_Okt_Nov_Dis".split("_"),
weekdays:"Ahad_Isnin_Selasa_Rabu_Khamis_Jumaat_Sabtu".split("_"),
weekdaysShort:"Ahd_Isn_Sel_Rab_Kha_Jum_Sab".split("_"),
weekdaysMin:"Ah_Is_Sl_Rb_Km_Jm_Sb".split("_"),
longDateFormat:{
LT:"HH.mm",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY [pukul] LT",
LLLL:"dddd, D MMMM YYYY [pukul] LT"
},
meridiem:function(t) {
return 11 > t ? "pagi" :15 > t ? "tengahari" :19 > t ? "petang" :"malam";
},
calendar:{
sameDay:"[Hari ini pukul] LT",
nextDay:"[Esok pukul] LT",
nextWeek:"dddd [pukul] LT",
lastDay:"[Kelmarin pukul] LT",
lastWeek:"dddd [lepas pukul] LT",
sameElse:"L"
},
relativeTime:{
future:"dalam %s",
past:"%s yang lepas",
s:"beberapa saat",
m:"seminit",
mm:"%d minit",
h:"sejam",
hh:"%d jam",
d:"sehari",
dd:"%d hari",
M:"sebulan",
MM:"%d bulan",
y:"setahun",
yy:"%d tahun"
},
week:{
dow:1,
doy:7
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("nb", {
months:"januar_februar_mars_april_mai_juni_juli_august_september_oktober_november_desember".split("_"),
monthsShort:"jan._feb._mars_april_mai_juni_juli_aug._sep._okt._nov._des.".split("_"),
weekdays:"sÃ¸ndag_mandag_tirsdag_onsdag_torsdag_fredag_lÃ¸rdag".split("_"),
weekdaysShort:"sÃ¸._ma._ti._on._to._fr._lÃ¸.".split("_"),
weekdaysMin:"sÃ¸_ma_ti_on_to_fr_lÃ¸".split("_"),
longDateFormat:{
LT:"H.mm",
L:"DD.MM.YYYY",
LL:"D. MMMM YYYY",
LLL:"D. MMMM YYYY [kl.] LT",
LLLL:"dddd D. MMMM YYYY [kl.] LT"
},
calendar:{
sameDay:"[i dag kl.] LT",
nextDay:"[i morgen kl.] LT",
nextWeek:"dddd [kl.] LT",
lastDay:"[i gÃ¥r kl.] LT",
lastWeek:"[forrige] dddd [kl.] LT",
sameElse:"L"
},
relativeTime:{
future:"om %s",
past:"for %s siden",
s:"noen sekunder",
m:"ett minutt",
mm:"%d minutter",
h:"en time",
hh:"%d timer",
d:"en dag",
dd:"%d dager",
M:"en mÃ¥ned",
MM:"%d mÃ¥neder",
y:"ett Ã¥r",
yy:"%d Ã¥r"
},
ordinal:"%d.",
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
var e = {
"1":"à¥§",
"2":"à¥¨",
"3":"à¥©",
"4":"à¥ª",
"5":"à¥«",
"6":"à¥¬",
"7":"à¥­",
"8":"à¥®",
"9":"à¥¯",
"0":"à¥¦"
}, n = {
"à¥§":"1",
"à¥¨":"2",
"à¥©":"3",
"à¥ª":"4",
"à¥«":"5",
"à¥¬":"6",
"à¥­":"7",
"à¥®":"8",
"à¥¯":"9",
"à¥¦":"0"
};
return t.lang("ne", {
months:"à¤œà¤¨à¤µà¤°à¥€_à¤«à¥‡à¤¬à¥à¤°à¥à¤µà¤°à¥€_à¤®à¤¾à¤°à¥à¤š_à¤…à¤ªà¥à¤°à¤¿à¤²_à¤®à¤ˆ_à¤œà¥à¤¨_à¤œà¥à¤²à¤¾à¤ˆ_à¤…à¤—à¤·à¥à¤Ÿ_à¤¸à¥‡à¤ªà¥à¤Ÿà¥‡à¤®à¥à¤¬à¤°_à¤…à¤•à¥à¤Ÿà¥‹à¤¬à¤°_à¤¨à¥‹à¤­à¥‡à¤®à¥à¤¬à¤°_à¤¡à¤¿à¤¸à¥‡à¤®à¥à¤¬à¤°".split("_"),
monthsShort:"à¤œà¤¨._à¤«à¥‡à¤¬à¥à¤°à¥._à¤®à¤¾à¤°à¥à¤š_à¤…à¤ªà¥à¤°à¤¿._à¤®à¤ˆ_à¤œà¥à¤¨_à¤œà¥à¤²à¤¾à¤ˆ._à¤…à¤—._à¤¸à¥‡à¤ªà¥à¤Ÿ._à¤…à¤•à¥à¤Ÿà¥‹._à¤¨à¥‹à¤­à¥‡._à¤¡à¤¿à¤¸à¥‡.".split("_"),
weekdays:"à¤†à¤‡à¤¤à¤¬à¤¾à¤°_à¤¸à¥‹à¤®à¤¬à¤¾à¤°_à¤®à¤™à¥à¤—à¤²à¤¬à¤¾à¤°_à¤¬à¥à¤§à¤¬à¤¾à¤°_à¤¬à¤¿à¤¹à¤¿à¤¬à¤¾à¤°_à¤¶à¥à¤•à¥à¤°à¤¬à¤¾à¤°_à¤¶à¤¨à¤¿à¤¬à¤¾à¤°".split("_"),
weekdaysShort:"à¤†à¤‡à¤¤._à¤¸à¥‹à¤®._à¤®à¤™à¥à¤—à¤²._à¤¬à¥à¤§._à¤¬à¤¿à¤¹à¤¿._à¤¶à¥à¤•à¥à¤°._à¤¶à¤¨à¤¿.".split("_"),
weekdaysMin:"à¤†à¤‡._à¤¸à¥‹._à¤®à¤™à¥_à¤¬à¥._à¤¬à¤¿._à¤¶à¥._à¤¶.".split("_"),
longDateFormat:{
LT:"Aà¤•à¥‹ h:mm à¤¬à¤œà¥‡",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY, LT",
LLLL:"dddd, D MMMM YYYY, LT"
},
preparse:function(t) {
return t.replace(/[à¥§à¥¨à¥©à¥ªà¥«à¥¬à¥­à¥®à¥¯à¥¦]/g, function(t) {
return n[t];
});
},
postformat:function(t) {
return t.replace(/\d/g, function(t) {
return e[t];
});
},
meridiem:function(t) {
return 3 > t ? "à¤°à¤¾à¤¤à¥€" :10 > t ? "à¤¬à¤¿à¤¹à¤¾à¤¨" :15 > t ? "à¤¦à¤¿à¤‰à¤à¤¸à¥‹" :18 > t ? "à¤¬à¥‡à¤²à¥à¤•à¤¾" :20 > t ? "à¤¸à¤¾à¤à¤" :"à¤°à¤¾à¤¤à¥€";
},
calendar:{
sameDay:"[à¤†à¤œ] LT",
nextDay:"[à¤­à¥‹à¤²à¥€] LT",
nextWeek:"[à¤†à¤‰à¤à¤¦à¥‹] dddd[,] LT",
lastDay:"[à¤¹à¤¿à¤œà¥‹] LT",
lastWeek:"[à¤—à¤à¤•à¥‹] dddd[,] LT",
sameElse:"L"
},
relativeTime:{
future:"%sà¤®à¤¾",
past:"%s à¤…à¤—à¤¾à¤¡à¥€",
s:"à¤•à¥‡à¤¹à¥€ à¤¸à¤®à¤¯",
m:"à¤à¤• à¤®à¤¿à¤¨à¥‡à¤Ÿ",
mm:"%d à¤®à¤¿à¤¨à¥‡à¤Ÿ",
h:"à¤à¤• à¤˜à¤£à¥à¤Ÿà¤¾",
hh:"%d à¤˜à¤£à¥à¤Ÿà¤¾",
d:"à¤à¤• à¤¦à¤¿à¤¨",
dd:"%d à¤¦à¤¿à¤¨",
M:"à¤à¤• à¤®à¤¹à¤¿à¤¨à¤¾",
MM:"%d à¤®à¤¹à¤¿à¤¨à¤¾",
y:"à¤à¤• à¤¬à¤°à¥à¤·",
yy:"%d à¤¬à¤°à¥à¤·"
},
week:{
dow:1,
doy:7
}
});
}), function(t) {
t(ne);
}(function(t) {
var e = "jan._feb._mrt._apr._mei_jun._jul._aug._sep._okt._nov._dec.".split("_"), n = "jan_feb_mrt_apr_mei_jun_jul_aug_sep_okt_nov_dec".split("_");
return t.lang("nl", {
months:"januari_februari_maart_april_mei_juni_juli_augustus_september_oktober_november_december".split("_"),
monthsShort:function(t, i) {
return /-MMM-/.test(i) ? n[t.month()] :e[t.month()];
},
weekdays:"zondag_maandag_dinsdag_woensdag_donderdag_vrijdag_zaterdag".split("_"),
weekdaysShort:"zo._ma._di._wo._do._vr._za.".split("_"),
weekdaysMin:"Zo_Ma_Di_Wo_Do_Vr_Za".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD-MM-YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd D MMMM YYYY LT"
},
calendar:{
sameDay:"[vandaag om] LT",
nextDay:"[morgen om] LT",
nextWeek:"dddd [om] LT",
lastDay:"[gisteren om] LT",
lastWeek:"[afgelopen] dddd [om] LT",
sameElse:"L"
},
relativeTime:{
future:"over %s",
past:"%s geleden",
s:"een paar seconden",
m:"Ã©Ã©n minuut",
mm:"%d minuten",
h:"Ã©Ã©n uur",
hh:"%d uur",
d:"Ã©Ã©n dag",
dd:"%d dagen",
M:"Ã©Ã©n maand",
MM:"%d maanden",
y:"Ã©Ã©n jaar",
yy:"%d jaar"
},
ordinal:function(t) {
return t + (1 === t || 8 === t || t >= 20 ? "ste" :"de");
},
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("nn", {
months:"januar_februar_mars_april_mai_juni_juli_august_september_oktober_november_desember".split("_"),
monthsShort:"jan_feb_mar_apr_mai_jun_jul_aug_sep_okt_nov_des".split("_"),
weekdays:"sundag_mÃ¥ndag_tysdag_onsdag_torsdag_fredag_laurdag".split("_"),
weekdaysShort:"sun_mÃ¥n_tys_ons_tor_fre_lau".split("_"),
weekdaysMin:"su_mÃ¥_ty_on_to_fr_lÃ¸".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD.MM.YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd D MMMM YYYY LT"
},
calendar:{
sameDay:"[I dag klokka] LT",
nextDay:"[I morgon klokka] LT",
nextWeek:"dddd [klokka] LT",
lastDay:"[I gÃ¥r klokka] LT",
lastWeek:"[FÃ¸regÃ¥ende] dddd [klokka] LT",
sameElse:"L"
},
relativeTime:{
future:"om %s",
past:"for %s siden",
s:"noen sekund",
m:"ett minutt",
mm:"%d minutt",
h:"en time",
hh:"%d timar",
d:"en dag",
dd:"%d dagar",
M:"en mÃ¥nad",
MM:"%d mÃ¥nader",
y:"ett Ã¥r",
yy:"%d Ã¥r"
},
ordinal:"%d.",
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
function e(t) {
return 5 > t % 10 && t % 10 > 1 && ~~(t / 10) % 10 !== 1;
}
function n(t, n, i) {
var r = t + " ";
switch (i) {
case "m":
return n ? "minuta" :"minutÄ™";

case "mm":
return r + (e(t) ? "minuty" :"minut");

case "h":
return n ? "godzina" :"godzinÄ™";

case "hh":
return r + (e(t) ? "godziny" :"godzin");

case "MM":
return r + (e(t) ? "miesiÄ…ce" :"miesiÄ™cy");

case "yy":
return r + (e(t) ? "lata" :"lat");
}
}
var i = "styczeÅ„_luty_marzec_kwiecieÅ„_maj_czerwiec_lipiec_sierpieÅ„_wrzesieÅ„_paÅºdziernik_listopad_grudzieÅ„".split("_"), r = "stycznia_lutego_marca_kwietnia_maja_czerwca_lipca_sierpnia_wrzeÅ›nia_paÅºdziernika_listopada_grudnia".split("_");
return t.lang("pl", {
months:function(t, e) {
return /D MMMM/.test(e) ? r[t.month()] :i[t.month()];
},
monthsShort:"sty_lut_mar_kwi_maj_cze_lip_sie_wrz_paÅº_lis_gru".split("_"),
weekdays:"niedziela_poniedziaÅ‚ek_wtorek_Å›roda_czwartek_piÄ…tek_sobota".split("_"),
weekdaysShort:"nie_pon_wt_Å›r_czw_pt_sb".split("_"),
weekdaysMin:"N_Pn_Wt_Åšr_Cz_Pt_So".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD.MM.YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd, D MMMM YYYY LT"
},
calendar:{
sameDay:"[DziÅ› o] LT",
nextDay:"[Jutro o] LT",
nextWeek:"[W] dddd [o] LT",
lastDay:"[Wczoraj o] LT",
lastWeek:function() {
switch (this.day()) {
case 0:
return "[W zeszÅ‚Ä… niedzielÄ™ o] LT";

case 3:
return "[W zeszÅ‚Ä… Å›rodÄ™ o] LT";

case 6:
return "[W zeszÅ‚Ä… sobotÄ™ o] LT";

default:
return "[W zeszÅ‚y] dddd [o] LT";
}
},
sameElse:"L"
},
relativeTime:{
future:"za %s",
past:"%s temu",
s:"kilka sekund",
m:n,
mm:n,
h:n,
hh:n,
d:"1 dzieÅ„",
dd:"%d dni",
M:"miesiÄ…c",
MM:n,
y:"rok",
yy:n
},
ordinal:"%d.",
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("pt-br", {
months:"Janeiro_Fevereiro_MarÃ§o_Abril_Maio_Junho_Julho_Agosto_Setembro_Outubro_Novembro_Dezembro".split("_"),
monthsShort:"Jan_Fev_Mar_Abr_Mai_Jun_Jul_Ago_Set_Out_Nov_Dez".split("_"),
weekdays:"Domingo_Segunda-feira_TerÃ§a-feira_Quarta-feira_Quinta-feira_Sexta-feira_SÃ¡bado".split("_"),
weekdaysShort:"Dom_Seg_Ter_Qua_Qui_Sex_SÃ¡b".split("_"),
weekdaysMin:"Dom_2Âª_3Âª_4Âª_5Âª_6Âª_SÃ¡b".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD/MM/YYYY",
LL:"D [de] MMMM [de] YYYY",
LLL:"D [de] MMMM [de] YYYY LT",
LLLL:"dddd, D [de] MMMM [de] YYYY LT"
},
calendar:{
sameDay:"[Hoje Ã s] LT",
nextDay:"[AmanhÃ£ Ã s] LT",
nextWeek:"dddd [Ã s] LT",
lastDay:"[Ontem Ã s] LT",
lastWeek:function() {
return 0 === this.day() || 6 === this.day() ? "[Ãšltimo] dddd [Ã s] LT" :"[Ãšltima] dddd [Ã s] LT";
},
sameElse:"L"
},
relativeTime:{
future:"em %s",
past:"%s atrÃ¡s",
s:"segundos",
m:"um minuto",
mm:"%d minutos",
h:"uma hora",
hh:"%d horas",
d:"um dia",
dd:"%d dias",
M:"um mÃªs",
MM:"%d meses",
y:"um ano",
yy:"%d anos"
},
ordinal:"%dÂº"
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("pt", {
months:"Janeiro_Fevereiro_MarÃ§o_Abril_Maio_Junho_Julho_Agosto_Setembro_Outubro_Novembro_Dezembro".split("_"),
monthsShort:"Jan_Fev_Mar_Abr_Mai_Jun_Jul_Ago_Set_Out_Nov_Dez".split("_"),
weekdays:"Domingo_Segunda-feira_TerÃ§a-feira_Quarta-feira_Quinta-feira_Sexta-feira_SÃ¡bado".split("_"),
weekdaysShort:"Dom_Seg_Ter_Qua_Qui_Sex_SÃ¡b".split("_"),
weekdaysMin:"Dom_2Âª_3Âª_4Âª_5Âª_6Âª_SÃ¡b".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD/MM/YYYY",
LL:"D [de] MMMM [de] YYYY",
LLL:"D [de] MMMM [de] YYYY LT",
LLLL:"dddd, D [de] MMMM [de] YYYY LT"
},
calendar:{
sameDay:"[Hoje Ã s] LT",
nextDay:"[AmanhÃ£ Ã s] LT",
nextWeek:"dddd [Ã s] LT",
lastDay:"[Ontem Ã s] LT",
lastWeek:function() {
return 0 === this.day() || 6 === this.day() ? "[Ãšltimo] dddd [Ã s] LT" :"[Ãšltima] dddd [Ã s] LT";
},
sameElse:"L"
},
relativeTime:{
future:"em %s",
past:"%s atrÃ¡s",
s:"segundos",
m:"um minuto",
mm:"%d minutos",
h:"uma hora",
hh:"%d horas",
d:"um dia",
dd:"%d dias",
M:"um mÃªs",
MM:"%d meses",
y:"um ano",
yy:"%d anos"
},
ordinal:"%dÂº",
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
function e(t, e, n) {
var i = {
mm:"minute",
hh:"ore",
dd:"zile",
MM:"luni",
yy:"ani"
}, r = " ";
return (t % 100 >= 20 || t >= 100 && t % 100 === 0) && (r = " de "), t + r + i[n];
}
return t.lang("ro", {
months:"ianuarie_februarie_martie_aprilie_mai_iunie_iulie_august_septembrie_octombrie_noiembrie_decembrie".split("_"),
monthsShort:"ian_feb_mar_apr_mai_iun_iul_aug_sep_oct_noi_dec".split("_"),
weekdays:"duminicÄƒ_luni_marÈ›i_miercuri_joi_vineri_sÃ¢mbÄƒtÄƒ".split("_"),
weekdaysShort:"Dum_Lun_Mar_Mie_Joi_Vin_SÃ¢m".split("_"),
weekdaysMin:"Du_Lu_Ma_Mi_Jo_Vi_SÃ¢".split("_"),
longDateFormat:{
LT:"H:mm",
L:"DD.MM.YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY H:mm",
LLLL:"dddd, D MMMM YYYY H:mm"
},
calendar:{
sameDay:"[azi la] LT",
nextDay:"[mÃ¢ine la] LT",
nextWeek:"dddd [la] LT",
lastDay:"[ieri la] LT",
lastWeek:"[fosta] dddd [la] LT",
sameElse:"L"
},
relativeTime:{
future:"peste %s",
past:"%s Ã®n urmÄƒ",
s:"cÃ¢teva secunde",
m:"un minut",
mm:e,
h:"o orÄƒ",
hh:e,
d:"o zi",
dd:e,
M:"o lunÄƒ",
MM:e,
y:"un an",
yy:e
},
week:{
dow:1,
doy:7
}
});
}), function(t) {
t(ne);
}(function(t) {
function e(t, e, n) {
var i = t + " ";
switch (n) {
case "m":
return e ? "jedna minuta" :"jedne minute";

case "mm":
return i += 1 === t ? "minuta" :2 === t || 3 === t || 4 === t ? "minute" :"minuta";

case "h":
return e ? "jedan sat" :"jednog sata";

case "hh":
return i += 1 === t ? "sat" :2 === t || 3 === t || 4 === t ? "sata" :"sati";

case "dd":
return i += 1 === t ? "dan" :"dana";

case "MM":
return i += 1 === t ? "mesec" :2 === t || 3 === t || 4 === t ? "meseca" :"meseci";

case "yy":
return i += 1 === t ? "godina" :2 === t || 3 === t || 4 === t ? "godine" :"godina";
}
}
return t.lang("rs", {
months:"januar_februar_mart_april_maj_jun_jul_avgust_septembar_oktobar_novembar_decembar".split("_"),
monthsShort:"jan._feb._mar._apr._maj._jun._jul._avg._sep._okt._nov._dec.".split("_"),
weekdays:"nedelja_ponedeljak_utorak_sreda_Äetvrtak_petak_subota".split("_"),
weekdaysShort:"ned._pon._uto._sre._Äet._pet._sub.".split("_"),
weekdaysMin:"ne_po_ut_sr_Äe_pe_su".split("_"),
longDateFormat:{
LT:"H:mm",
L:"DD. MM. YYYY",
LL:"D. MMMM YYYY",
LLL:"D. MMMM YYYY LT",
LLLL:"dddd, D. MMMM YYYY LT"
},
calendar:{
sameDay:"[danas u] LT",
nextDay:"[sutra u] LT",
nextWeek:function() {
switch (this.day()) {
case 0:
return "[u] [nedelju] [u] LT";

case 3:
return "[u] [sredu] [u] LT";

case 6:
return "[u] [subotu] [u] LT";

case 1:
case 2:
case 4:
case 5:
return "[u] dddd [u] LT";
}
},
lastDay:"[juÄe u] LT",
lastWeek:function() {
switch (this.day()) {
case 0:
case 3:
return "[proÅ¡lu] dddd [u] LT";

case 6:
return "[proÅ¡le] [subote] [u] LT";

case 1:
case 2:
case 4:
case 5:
return "[proÅ¡li] dddd [u] LT";
}
},
sameElse:"L"
},
relativeTime:{
future:"za %s",
past:"pre %s",
s:"par sekundi",
m:e,
mm:e,
h:e,
hh:e,
d:"dan",
dd:e,
M:"mesec",
MM:e,
y:"godinu",
yy:e
},
ordinal:"%d.",
week:{
dow:1,
doy:7
}
});
}), function(t) {
t(ne);
}(function(t) {
function e(t, e) {
var n = t.split("_");
return e % 10 === 1 && e % 100 !== 11 ? n[0] :e % 10 >= 2 && 4 >= e % 10 && (10 > e % 100 || e % 100 >= 20) ? n[1] :n[2];
}
function n(t, n, i) {
var r = {
mm:"Ð¼Ð¸Ð½ÑƒÑ‚Ð°_Ð¼Ð¸Ð½ÑƒÑ‚Ñ‹_Ð¼Ð¸Ð½ÑƒÑ‚",
hh:"Ñ‡Ð°Ñ_Ñ‡Ð°ÑÐ°_Ñ‡Ð°ÑÐ¾Ð²",
dd:"Ð´ÐµÐ½ÑŒ_Ð´Ð½Ñ_Ð´Ð½ÐµÐ¹",
MM:"Ð¼ÐµÑÑÑ†_Ð¼ÐµÑÑÑ†Ð°_Ð¼ÐµÑÑÑ†ÐµÐ²",
yy:"Ð³Ð¾Ð´_Ð³Ð¾Ð´Ð°_Ð»ÐµÑ‚"
};
return "m" === i ? n ? "Ð¼Ð¸Ð½ÑƒÑ‚Ð°" :"Ð¼Ð¸Ð½ÑƒÑ‚Ñƒ" :t + " " + e(r[i], +t);
}
function i(t, e) {
var n = {
nominative:"ÑÐ½Ð²Ð°Ñ€ÑŒ_Ñ„ÐµÐ²Ñ€Ð°Ð»ÑŒ_Ð¼Ð°Ñ€Ñ‚_Ð°Ð¿Ñ€ÐµÐ»ÑŒ_Ð¼Ð°Ð¹_Ð¸ÑŽÐ½ÑŒ_Ð¸ÑŽÐ»ÑŒ_Ð°Ð²Ð³ÑƒÑÑ‚_ÑÐµÐ½Ñ‚ÑÐ±Ñ€ÑŒ_Ð¾ÐºÑ‚ÑÐ±Ñ€ÑŒ_Ð½Ð¾ÑÐ±Ñ€ÑŒ_Ð´ÐµÐºÐ°Ð±Ñ€ÑŒ".split("_"),
accusative:"ÑÐ½Ð²Ð°Ñ€Ñ_Ñ„ÐµÐ²Ñ€Ð°Ð»Ñ_Ð¼Ð°Ñ€Ñ‚Ð°_Ð°Ð¿Ñ€ÐµÐ»Ñ_Ð¼Ð°Ñ_Ð¸ÑŽÐ½Ñ_Ð¸ÑŽÐ»Ñ_Ð°Ð²Ð³ÑƒÑÑ‚Ð°_ÑÐµÐ½Ñ‚ÑÐ±Ñ€Ñ_Ð¾ÐºÑ‚ÑÐ±Ñ€Ñ_Ð½Ð¾ÑÐ±Ñ€Ñ_Ð´ÐµÐºÐ°Ð±Ñ€Ñ".split("_")
}, i = /D[oD]?(\[[^\[\]]*\]|\s+)+MMMM?/.test(e) ? "accusative" :"nominative";
return n[i][t.month()];
}
function r(t, e) {
var n = {
nominative:"ÑÐ½Ð²_Ñ„ÐµÐ²_Ð¼Ð°Ñ€_Ð°Ð¿Ñ€_Ð¼Ð°Ð¹_Ð¸ÑŽÐ½ÑŒ_Ð¸ÑŽÐ»ÑŒ_Ð°Ð²Ð³_ÑÐµÐ½_Ð¾ÐºÑ‚_Ð½Ð¾Ñ_Ð´ÐµÐº".split("_"),
accusative:"ÑÐ½Ð²_Ñ„ÐµÐ²_Ð¼Ð°Ñ€_Ð°Ð¿Ñ€_Ð¼Ð°Ñ_Ð¸ÑŽÐ½Ñ_Ð¸ÑŽÐ»Ñ_Ð°Ð²Ð³_ÑÐµÐ½_Ð¾ÐºÑ‚_Ð½Ð¾Ñ_Ð´ÐµÐº".split("_")
}, i = /D[oD]?(\[[^\[\]]*\]|\s+)+MMMM?/.test(e) ? "accusative" :"nominative";
return n[i][t.month()];
}
function s(t, e) {
var n = {
nominative:"Ð²Ð¾ÑÐºÑ€ÐµÑÐµÐ½ÑŒÐµ_Ð¿Ð¾Ð½ÐµÐ´ÐµÐ»ÑŒÐ½Ð¸Ðº_Ð²Ñ‚Ð¾Ñ€Ð½Ð¸Ðº_ÑÑ€ÐµÐ´Ð°_Ñ‡ÐµÑ‚Ð²ÐµÑ€Ð³_Ð¿ÑÑ‚Ð½Ð¸Ñ†Ð°_ÑÑƒÐ±Ð±Ð¾Ñ‚Ð°".split("_"),
accusative:"Ð²Ð¾ÑÐºÑ€ÐµÑÐµÐ½ÑŒÐµ_Ð¿Ð¾Ð½ÐµÐ´ÐµÐ»ÑŒÐ½Ð¸Ðº_Ð²Ñ‚Ð¾Ñ€Ð½Ð¸Ðº_ÑÑ€ÐµÐ´Ñƒ_Ñ‡ÐµÑ‚Ð²ÐµÑ€Ð³_Ð¿ÑÑ‚Ð½Ð¸Ñ†Ñƒ_ÑÑƒÐ±Ð±Ð¾Ñ‚Ñƒ".split("_")
}, i = /\[ ?[Ð’Ð²] ?(?:Ð¿Ñ€Ð¾ÑˆÐ»ÑƒÑŽ|ÑÐ»ÐµÐ´ÑƒÑŽÑ‰ÑƒÑŽ)? ?\] ?dddd/.test(e) ? "accusative" :"nominative";
return n[i][t.day()];
}
return t.lang("ru", {
months:i,
monthsShort:r,
weekdays:s,
weekdaysShort:"Ð²Ñ_Ð¿Ð½_Ð²Ñ‚_ÑÑ€_Ñ‡Ñ‚_Ð¿Ñ‚_ÑÐ±".split("_"),
weekdaysMin:"Ð²Ñ_Ð¿Ð½_Ð²Ñ‚_ÑÑ€_Ñ‡Ñ‚_Ð¿Ñ‚_ÑÐ±".split("_"),
monthsParse:[ /^ÑÐ½Ð²/i, /^Ñ„ÐµÐ²/i, /^Ð¼Ð°Ñ€/i, /^Ð°Ð¿Ñ€/i, /^Ð¼Ð°[Ð¹|Ñ]/i, /^Ð¸ÑŽÐ½/i, /^Ð¸ÑŽÐ»/i, /^Ð°Ð²Ð³/i, /^ÑÐµÐ½/i, /^Ð¾ÐºÑ‚/i, /^Ð½Ð¾Ñ/i, /^Ð´ÐµÐº/i ],
longDateFormat:{
LT:"HH:mm",
L:"DD.MM.YYYY",
LL:"D MMMM YYYY Ð³.",
LLL:"D MMMM YYYY Ð³., LT",
LLLL:"dddd, D MMMM YYYY Ð³., LT"
},
calendar:{
sameDay:"[Ð¡ÐµÐ³Ð¾Ð´Ð½Ñ Ð²] LT",
nextDay:"[Ð—Ð°Ð²Ñ‚Ñ€Ð° Ð²] LT",
lastDay:"[Ð’Ñ‡ÐµÑ€Ð° Ð²] LT",
nextWeek:function() {
return 2 === this.day() ? "[Ð’Ð¾] dddd [Ð²] LT" :"[Ð’] dddd [Ð²] LT";
},
lastWeek:function() {
switch (this.day()) {
case 0:
return "[Ð’ Ð¿Ñ€Ð¾ÑˆÐ»Ð¾Ðµ] dddd [Ð²] LT";

case 1:
case 2:
case 4:
return "[Ð’ Ð¿Ñ€Ð¾ÑˆÐ»Ñ‹Ð¹] dddd [Ð²] LT";

case 3:
case 5:
case 6:
return "[Ð’ Ð¿Ñ€Ð¾ÑˆÐ»ÑƒÑŽ] dddd [Ð²] LT";
}
},
sameElse:"L"
},
relativeTime:{
future:"Ñ‡ÐµÑ€ÐµÐ· %s",
past:"%s Ð½Ð°Ð·Ð°Ð´",
s:"Ð½ÐµÑÐºÐ¾Ð»ÑŒÐºÐ¾ ÑÐµÐºÑƒÐ½Ð´",
m:n,
mm:n,
h:"Ñ‡Ð°Ñ",
hh:n,
d:"Ð´ÐµÐ½ÑŒ",
dd:n,
M:"Ð¼ÐµÑÑÑ†",
MM:n,
y:"Ð³Ð¾Ð´",
yy:n
},
meridiem:function(t) {
return 4 > t ? "Ð½Ð¾Ñ‡Ð¸" :12 > t ? "ÑƒÑ‚Ñ€Ð°" :17 > t ? "Ð´Ð½Ñ" :"Ð²ÐµÑ‡ÐµÑ€Ð°";
},
ordinal:function(t, e) {
switch (e) {
case "M":
case "d":
case "DDD":
return t + "-Ð¹";

case "D":
return t + "-Ð³Ð¾";

case "w":
case "W":
return t + "-Ñ";

default:
return t;
}
},
week:{
dow:1,
doy:7
}
});
}), function(t) {
t(ne);
}(function(t) {
function e(t) {
return t > 1 && 5 > t;
}
function n(t, n, i, r) {
var s = t + " ";
switch (i) {
case "s":
return n || r ? "pÃ¡r sekÃºnd" :"pÃ¡r sekundami";

case "m":
return n ? "minÃºta" :r ? "minÃºtu" :"minÃºtou";

case "mm":
return n || r ? s + (e(t) ? "minÃºty" :"minÃºt") :s + "minÃºtami";

case "h":
return n ? "hodina" :r ? "hodinu" :"hodinou";

case "hh":
return n || r ? s + (e(t) ? "hodiny" :"hodÃ­n") :s + "hodinami";

case "d":
return n || r ? "deÅˆ" :"dÅˆom";

case "dd":
return n || r ? s + (e(t) ? "dni" :"dnÃ­") :s + "dÅˆami";

case "M":
return n || r ? "mesiac" :"mesiacom";

case "MM":
return n || r ? s + (e(t) ? "mesiace" :"mesiacov") :s + "mesiacmi";

case "y":
return n || r ? "rok" :"rokom";

case "yy":
return n || r ? s + (e(t) ? "roky" :"rokov") :s + "rokmi";
}
}
var i = "januÃ¡r_februÃ¡r_marec_aprÃ­l_mÃ¡j_jÃºn_jÃºl_august_september_oktÃ³ber_november_december".split("_"), r = "jan_feb_mar_apr_mÃ¡j_jÃºn_jÃºl_aug_sep_okt_nov_dec".split("_");
return t.lang("sk", {
months:i,
monthsShort:r,
monthsParse:function(t, e) {
var n, i = [];
for (n = 0; 12 > n; n++) i[n] = new RegExp("^" + t[n] + "$|^" + e[n] + "$", "i");
return i;
}(i, r),
weekdays:"nedeÄ¾a_pondelok_utorok_streda_Å¡tvrtok_piatok_sobota".split("_"),
weekdaysShort:"ne_po_ut_st_Å¡t_pi_so".split("_"),
weekdaysMin:"ne_po_ut_st_Å¡t_pi_so".split("_"),
longDateFormat:{
LT:"H:mm",
L:"DD.MM.YYYY",
LL:"D. MMMM YYYY",
LLL:"D. MMMM YYYY LT",
LLLL:"dddd D. MMMM YYYY LT"
},
calendar:{
sameDay:"[dnes o] LT",
nextDay:"[zajtra o] LT",
nextWeek:function() {
switch (this.day()) {
case 0:
return "[v nedeÄ¾u o] LT";

case 1:
case 2:
return "[v] dddd [o] LT";

case 3:
return "[v stredu o] LT";

case 4:
return "[vo Å¡tvrtok o] LT";

case 5:
return "[v piatok o] LT";

case 6:
return "[v sobotu o] LT";
}
},
lastDay:"[vÄera o] LT",
lastWeek:function() {
switch (this.day()) {
case 0:
return "[minulÃº nedeÄ¾u o] LT";

case 1:
case 2:
return "[minulÃ½] dddd [o] LT";

case 3:
return "[minulÃº stredu o] LT";

case 4:
case 5:
return "[minulÃ½] dddd [o] LT";

case 6:
return "[minulÃº sobotu o] LT";
}
},
sameElse:"L"
},
relativeTime:{
future:"za %s",
past:"pred %s",
s:n,
m:n,
mm:n,
h:n,
hh:n,
d:n,
dd:n,
M:n,
MM:n,
y:n,
yy:n
},
ordinal:"%d.",
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
function e(t, e, n) {
var i = t + " ";
switch (n) {
case "m":
return e ? "ena minuta" :"eno minuto";

case "mm":
return i += 1 === t ? "minuta" :2 === t ? "minuti" :3 === t || 4 === t ? "minute" :"minut";

case "h":
return e ? "ena ura" :"eno uro";

case "hh":
return i += 1 === t ? "ura" :2 === t ? "uri" :3 === t || 4 === t ? "ure" :"ur";

case "dd":
return i += 1 === t ? "dan" :"dni";

case "MM":
return i += 1 === t ? "mesec" :2 === t ? "meseca" :3 === t || 4 === t ? "mesece" :"mesecev";

case "yy":
return i += 1 === t ? "leto" :2 === t ? "leti" :3 === t || 4 === t ? "leta" :"let";
}
}
return t.lang("sl", {
months:"januar_februar_marec_april_maj_junij_julij_avgust_september_oktober_november_december".split("_"),
monthsShort:"jan._feb._mar._apr._maj._jun._jul._avg._sep._okt._nov._dec.".split("_"),
weekdays:"nedelja_ponedeljek_torek_sreda_Äetrtek_petek_sobota".split("_"),
weekdaysShort:"ned._pon._tor._sre._Äet._pet._sob.".split("_"),
weekdaysMin:"ne_po_to_sr_Äe_pe_so".split("_"),
longDateFormat:{
LT:"H:mm",
L:"DD. MM. YYYY",
LL:"D. MMMM YYYY",
LLL:"D. MMMM YYYY LT",
LLLL:"dddd, D. MMMM YYYY LT"
},
calendar:{
sameDay:"[danes ob] LT",
nextDay:"[jutri ob] LT",
nextWeek:function() {
switch (this.day()) {
case 0:
return "[v] [nedeljo] [ob] LT";

case 3:
return "[v] [sredo] [ob] LT";

case 6:
return "[v] [soboto] [ob] LT";

case 1:
case 2:
case 4:
case 5:
return "[v] dddd [ob] LT";
}
},
lastDay:"[vÄeraj ob] LT",
lastWeek:function() {
switch (this.day()) {
case 0:
case 3:
case 6:
return "[prejÅ¡nja] dddd [ob] LT";

case 1:
case 2:
case 4:
case 5:
return "[prejÅ¡nji] dddd [ob] LT";
}
},
sameElse:"L"
},
relativeTime:{
future:"Äez %s",
past:"%s nazaj",
s:"nekaj sekund",
m:e,
mm:e,
h:e,
hh:e,
d:"en dan",
dd:e,
M:"en mesec",
MM:e,
y:"eno leto",
yy:e
},
ordinal:"%d.",
week:{
dow:1,
doy:7
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("sq", {
months:"Janar_Shkurt_Mars_Prill_Maj_Qershor_Korrik_Gusht_Shtator_Tetor_NÃ«ntor_Dhjetor".split("_"),
monthsShort:"Jan_Shk_Mar_Pri_Maj_Qer_Kor_Gus_Sht_Tet_NÃ«n_Dhj".split("_"),
weekdays:"E Diel_E HÃ«nÃ«_E Marte_E MÃ«rkure_E Enjte_E Premte_E ShtunÃ«".split("_"),
weekdaysShort:"Die_HÃ«n_Mar_MÃ«r_Enj_Pre_Sht".split("_"),
weekdaysMin:"D_H_Ma_MÃ«_E_P_Sh".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd, D MMMM YYYY LT"
},
calendar:{
sameDay:"[Sot nÃ«] LT",
nextDay:"[Neser nÃ«] LT",
nextWeek:"dddd [nÃ«] LT",
lastDay:"[Dje nÃ«] LT",
lastWeek:"dddd [e kaluar nÃ«] LT",
sameElse:"L"
},
relativeTime:{
future:"nÃ« %s",
past:"%s me parÃ«",
s:"disa sekonda",
m:"njÃ« minut",
mm:"%d minuta",
h:"njÃ« orÃ«",
hh:"%d orÃ«",
d:"njÃ« ditÃ«",
dd:"%d ditÃ«",
M:"njÃ« muaj",
MM:"%d muaj",
y:"njÃ« vit",
yy:"%d vite"
},
ordinal:"%d.",
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("sv", {
months:"januari_februari_mars_april_maj_juni_juli_augusti_september_oktober_november_december".split("_"),
monthsShort:"jan_feb_mar_apr_maj_jun_jul_aug_sep_okt_nov_dec".split("_"),
weekdays:"sÃ¶ndag_mÃ¥ndag_tisdag_onsdag_torsdag_fredag_lÃ¶rdag".split("_"),
weekdaysShort:"sÃ¶n_mÃ¥n_tis_ons_tor_fre_lÃ¶r".split("_"),
weekdaysMin:"sÃ¶_mÃ¥_ti_on_to_fr_lÃ¶".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"YYYY-MM-DD",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd D MMMM YYYY LT"
},
calendar:{
sameDay:"[Idag] LT",
nextDay:"[Imorgon] LT",
lastDay:"[IgÃ¥r] LT",
nextWeek:"dddd LT",
lastWeek:"[FÃ¶rra] dddd[en] LT",
sameElse:"L"
},
relativeTime:{
future:"om %s",
past:"fÃ¶r %s sedan",
s:"nÃ¥gra sekunder",
m:"en minut",
mm:"%d minuter",
h:"en timme",
hh:"%d timmar",
d:"en dag",
dd:"%d dagar",
M:"en mÃ¥nad",
MM:"%d mÃ¥nader",
y:"ett Ã¥r",
yy:"%d Ã¥r"
},
ordinal:function(t) {
var e = t % 10, n = 1 === ~~(t % 100 / 10) ? "e" :1 === e ? "a" :2 === e ? "a" :3 === e ? "e" :"e";
return t + n;
},
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("ta", {
months:"à®œà®©à®µà®°à®¿_à®ªà®¿à®ªà¯à®°à®µà®°à®¿_à®®à®¾à®°à¯à®šà¯_à®à®ªà¯à®°à®²à¯_à®®à¯‡_à®œà¯‚à®©à¯_à®œà¯‚à®²à¯ˆ_à®†à®•à®¸à¯à®Ÿà¯_à®šà¯†à®ªà¯à®Ÿà¯†à®®à¯à®ªà®°à¯_à®…à®•à¯à®Ÿà¯‡à®¾à®ªà®°à¯_à®¨à®µà®®à¯à®ªà®°à¯_à®Ÿà®¿à®šà®®à¯à®ªà®°à¯".split("_"),
monthsShort:"à®œà®©à®µà®°à®¿_à®ªà®¿à®ªà¯à®°à®µà®°à®¿_à®®à®¾à®°à¯à®šà¯_à®à®ªà¯à®°à®²à¯_à®®à¯‡_à®œà¯‚à®©à¯_à®œà¯‚à®²à¯ˆ_à®†à®•à®¸à¯à®Ÿà¯_à®šà¯†à®ªà¯à®Ÿà¯†à®®à¯à®ªà®°à¯_à®…à®•à¯à®Ÿà¯‡à®¾à®ªà®°à¯_à®¨à®µà®®à¯à®ªà®°à¯_à®Ÿà®¿à®šà®®à¯à®ªà®°à¯".split("_"),
weekdays:"à®žà®¾à®¯à®¿à®±à¯à®±à¯à®•à¯à®•à®¿à®´à®®à¯ˆ_à®¤à®¿à®™à¯à®•à®Ÿà¯à®•à®¿à®´à®®à¯ˆ_à®šà¯†à®µà¯à®µà®¾à®¯à¯à®•à®¿à®´à®®à¯ˆ_à®ªà¯à®¤à®©à¯à®•à®¿à®´à®®à¯ˆ_à®µà®¿à®¯à®¾à®´à®•à¯à®•à®¿à®´à®®à¯ˆ_à®µà¯†à®³à¯à®³à®¿à®•à¯à®•à®¿à®´à®®à¯ˆ_à®šà®©à®¿à®•à¯à®•à®¿à®´à®®à¯ˆ".split("_"),
weekdaysShort:"à®žà®¾à®¯à®¿à®±à¯_à®¤à®¿à®™à¯à®•à®³à¯_à®šà¯†à®µà¯à®µà®¾à®¯à¯_à®ªà¯à®¤à®©à¯_à®µà®¿à®¯à®¾à®´à®©à¯_à®µà¯†à®³à¯à®³à®¿_à®šà®©à®¿".split("_"),
weekdaysMin:"à®žà®¾_à®¤à®¿_à®šà¯†_à®ªà¯_à®µà®¿_à®µà¯†_à®š".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY, LT",
LLLL:"dddd, D MMMM YYYY, LT"
},
calendar:{
sameDay:"[à®‡à®©à¯à®±à¯] LT",
nextDay:"[à®¨à®¾à®³à¯ˆ] LT",
nextWeek:"dddd, LT",
lastDay:"[à®¨à¯‡à®±à¯à®±à¯] LT",
lastWeek:"[à®•à®Ÿà®¨à¯à®¤ à®µà®¾à®°à®®à¯] dddd, LT",
sameElse:"L"
},
relativeTime:{
future:"%s à®‡à®²à¯",
past:"%s à®®à¯à®©à¯",
s:"à®’à®°à¯ à®šà®¿à®² à®µà®¿à®¨à®¾à®Ÿà®¿à®•à®³à¯",
m:"à®’à®°à¯ à®¨à®¿à®®à®¿à®Ÿà®®à¯",
mm:"%d à®¨à®¿à®®à®¿à®Ÿà®™à¯à®•à®³à¯",
h:"à®’à®°à¯ à®®à®£à®¿ à®¨à¯‡à®°à®®à¯",
hh:"%d à®®à®£à®¿ à®¨à¯‡à®°à®®à¯",
d:"à®’à®°à¯ à®¨à®¾à®³à¯",
dd:"%d à®¨à®¾à®Ÿà¯à®•à®³à¯",
M:"à®’à®°à¯ à®®à®¾à®¤à®®à¯",
MM:"%d à®®à®¾à®¤à®™à¯à®•à®³à¯",
y:"à®’à®°à¯ à®µà®°à¯à®Ÿà®®à¯",
yy:"%d à®†à®£à¯à®Ÿà¯à®•à®³à¯"
},
ordinal:function(t) {
return t + "à®µà®¤à¯";
},
meridiem:function(t) {
return t >= 6 && 10 >= t ? " à®•à®¾à®²à¯ˆ" :t >= 10 && 14 >= t ? " à®¨à®£à¯à®ªà®•à®²à¯" :t >= 14 && 18 >= t ? " à®Žà®±à¯à®ªà®¾à®Ÿà¯" :t >= 18 && 20 >= t ? " à®®à®¾à®²à¯ˆ" :t >= 20 && 24 >= t ? " à®‡à®°à®µà¯" :t >= 0 && 6 >= t ? " à®µà¯ˆà®•à®±à¯ˆ" :void 0;
},
week:{
dow:0,
doy:6
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("th", {
months:"à¸¡à¸à¸£à¸²à¸„à¸¡_à¸à¸¸à¸¡à¸ à¸²à¸žà¸±à¸™à¸˜à¹Œ_à¸¡à¸µà¸™à¸²à¸„à¸¡_à¹€à¸¡à¸©à¸²à¸¢à¸™_à¸žà¸¤à¸©à¸ à¸²à¸„à¸¡_à¸¡à¸´à¸–à¸¸à¸™à¸²à¸¢à¸™_à¸à¸£à¸à¸Žà¸²à¸„à¸¡_à¸ªà¸´à¸‡à¸«à¸²à¸„à¸¡_à¸à¸±à¸™à¸¢à¸²à¸¢à¸™_à¸•à¸¸à¸¥à¸²à¸„à¸¡_à¸žà¸¤à¸¨à¸ˆà¸´à¸à¸²à¸¢à¸™_à¸˜à¸±à¸™à¸§à¸²à¸„à¸¡".split("_"),
monthsShort:"à¸¡à¸à¸£à¸²_à¸à¸¸à¸¡à¸ à¸²_à¸¡à¸µà¸™à¸²_à¹€à¸¡à¸©à¸²_à¸žà¸¤à¸©à¸ à¸²_à¸¡à¸´à¸–à¸¸à¸™à¸²_à¸à¸£à¸à¸Žà¸²_à¸ªà¸´à¸‡à¸«à¸²_à¸à¸±à¸™à¸¢à¸²_à¸•à¸¸à¸¥à¸²_à¸žà¸¤à¸¨à¸ˆà¸´à¸à¸²_à¸˜à¸±à¸™à¸§à¸²".split("_"),
weekdays:"à¸­à¸²à¸—à¸´à¸•à¸¢à¹Œ_à¸ˆà¸±à¸™à¸—à¸£à¹Œ_à¸­à¸±à¸‡à¸„à¸²à¸£_à¸žà¸¸à¸˜_à¸žà¸¤à¸«à¸±à¸ªà¸šà¸”à¸µ_à¸¨à¸¸à¸à¸£à¹Œ_à¹€à¸ªà¸²à¸£à¹Œ".split("_"),
weekdaysShort:"à¸­à¸²à¸—à¸´à¸•à¸¢à¹Œ_à¸ˆà¸±à¸™à¸—à¸£à¹Œ_à¸­à¸±à¸‡à¸„à¸²à¸£_à¸žà¸¸à¸˜_à¸žà¸¤à¸«à¸±à¸ª_à¸¨à¸¸à¸à¸£à¹Œ_à¹€à¸ªà¸²à¸£à¹Œ".split("_"),
weekdaysMin:"à¸­à¸²._à¸ˆ._à¸­._à¸ž._à¸žà¸¤._à¸¨._à¸ª.".split("_"),
longDateFormat:{
LT:"H à¸™à¸²à¸¬à¸´à¸à¸² m à¸™à¸²à¸—à¸µ",
L:"YYYY/MM/DD",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY à¹€à¸§à¸¥à¸² LT",
LLLL:"à¸§à¸±à¸™ddddà¸—à¸µà¹ˆ D MMMM YYYY à¹€à¸§à¸¥à¸² LT"
},
meridiem:function(t) {
return 12 > t ? "à¸à¹ˆà¸­à¸™à¹€à¸—à¸µà¹ˆà¸¢à¸‡" :"à¸«à¸¥à¸±à¸‡à¹€à¸—à¸µà¹ˆà¸¢à¸‡";
},
calendar:{
sameDay:"[à¸§à¸±à¸™à¸™à¸µà¹‰ à¹€à¸§à¸¥à¸²] LT",
nextDay:"[à¸žà¸£à¸¸à¹ˆà¸‡à¸™à¸µà¹‰ à¹€à¸§à¸¥à¸²] LT",
nextWeek:"dddd[à¸«à¸™à¹‰à¸² à¹€à¸§à¸¥à¸²] LT",
lastDay:"[à¹€à¸¡à¸·à¹ˆà¸­à¸§à¸²à¸™à¸™à¸µà¹‰ à¹€à¸§à¸¥à¸²] LT",
lastWeek:"[à¸§à¸±à¸™]dddd[à¸—à¸µà¹ˆà¹à¸¥à¹‰à¸§ à¹€à¸§à¸¥à¸²] LT",
sameElse:"L"
},
relativeTime:{
future:"à¸­à¸µà¸ %s",
past:"%sà¸—à¸µà¹ˆà¹à¸¥à¹‰à¸§",
s:"à¹„à¸¡à¹ˆà¸à¸µà¹ˆà¸§à¸´à¸™à¸²à¸—à¸µ",
m:"1 à¸™à¸²à¸—à¸µ",
mm:"%d à¸™à¸²à¸—à¸µ",
h:"1 à¸Šà¸±à¹ˆà¸§à¹‚à¸¡à¸‡",
hh:"%d à¸Šà¸±à¹ˆà¸§à¹‚à¸¡à¸‡",
d:"1 à¸§à¸±à¸™",
dd:"%d à¸§à¸±à¸™",
M:"1 à¹€à¸”à¸·à¸­à¸™",
MM:"%d à¹€à¸”à¸·à¸­à¸™",
y:"1 à¸›à¸µ",
yy:"%d à¸›à¸µ"
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("tl-ph", {
months:"Enero_Pebrero_Marso_Abril_Mayo_Hunyo_Hulyo_Agosto_Setyembre_Oktubre_Nobyembre_Disyembre".split("_"),
monthsShort:"Ene_Peb_Mar_Abr_May_Hun_Hul_Ago_Set_Okt_Nob_Dis".split("_"),
weekdays:"Linggo_Lunes_Martes_Miyerkules_Huwebes_Biyernes_Sabado".split("_"),
weekdaysShort:"Lin_Lun_Mar_Miy_Huw_Biy_Sab".split("_"),
weekdaysMin:"Li_Lu_Ma_Mi_Hu_Bi_Sab".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"MM/D/YYYY",
LL:"MMMM D, YYYY",
LLL:"MMMM D, YYYY LT",
LLLL:"dddd, MMMM DD, YYYY LT"
},
calendar:{
sameDay:"[Ngayon sa] LT",
nextDay:"[Bukas sa] LT",
nextWeek:"dddd [sa] LT",
lastDay:"[Kahapon sa] LT",
lastWeek:"dddd [huling linggo] LT",
sameElse:"L"
},
relativeTime:{
future:"sa loob ng %s",
past:"%s ang nakalipas",
s:"ilang segundo",
m:"isang minuto",
mm:"%d minuto",
h:"isang oras",
hh:"%d oras",
d:"isang araw",
dd:"%d araw",
M:"isang buwan",
MM:"%d buwan",
y:"isang taon",
yy:"%d taon"
},
ordinal:function(t) {
return t;
},
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
var e = {
1:"'inci",
5:"'inci",
8:"'inci",
70:"'inci",
80:"'inci",
2:"'nci",
7:"'nci",
20:"'nci",
50:"'nci",
3:"'Ã¼ncÃ¼",
4:"'Ã¼ncÃ¼",
100:"'Ã¼ncÃ¼",
6:"'ncÄ±",
9:"'uncu",
10:"'uncu",
30:"'uncu",
60:"'Ä±ncÄ±",
90:"'Ä±ncÄ±"
};
return t.lang("tr", {
months:"Ocak_Åžubat_Mart_Nisan_MayÄ±s_Haziran_Temmuz_AÄŸustos_EylÃ¼l_Ekim_KasÄ±m_AralÄ±k".split("_"),
monthsShort:"Oca_Åžub_Mar_Nis_May_Haz_Tem_AÄŸu_Eyl_Eki_Kas_Ara".split("_"),
weekdays:"Pazar_Pazartesi_SalÄ±_Ã‡arÅŸamba_PerÅŸembe_Cuma_Cumartesi".split("_"),
weekdaysShort:"Paz_Pts_Sal_Ã‡ar_Per_Cum_Cts".split("_"),
weekdaysMin:"Pz_Pt_Sa_Ã‡a_Pe_Cu_Ct".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD.MM.YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd, D MMMM YYYY LT"
},
calendar:{
sameDay:"[bugÃ¼n saat] LT",
nextDay:"[yarÄ±n saat] LT",
nextWeek:"[haftaya] dddd [saat] LT",
lastDay:"[dÃ¼n] LT",
lastWeek:"[geÃ§en hafta] dddd [saat] LT",
sameElse:"L"
},
relativeTime:{
future:"%s sonra",
past:"%s Ã¶nce",
s:"birkaÃ§ saniye",
m:"bir dakika",
mm:"%d dakika",
h:"bir saat",
hh:"%d saat",
d:"bir gÃ¼n",
dd:"%d gÃ¼n",
M:"bir ay",
MM:"%d ay",
y:"bir yÄ±l",
yy:"%d yÄ±l"
},
ordinal:function(t) {
if (0 === t) return t + "'Ä±ncÄ±";
var n = t % 10, i = t % 100 - n, r = t >= 100 ? 100 :null;
return t + (e[n] || e[i] || e[r]);
},
week:{
dow:1,
doy:7
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("tzm-la", {
months:"innayr_brË¤ayrË¤_marË¤sË¤_ibrir_mayyw_ywnyw_ywlywz_É£wÅ¡t_Å¡wtanbir_ktË¤wbrË¤_nwwanbir_dwjnbir".split("_"),
monthsShort:"innayr_brË¤ayrË¤_marË¤sË¤_ibrir_mayyw_ywnyw_ywlywz_É£wÅ¡t_Å¡wtanbir_ktË¤wbrË¤_nwwanbir_dwjnbir".split("_"),
weekdays:"asamas_aynas_asinas_akras_akwas_asimwas_asiá¸yas".split("_"),
weekdaysShort:"asamas_aynas_asinas_akras_akwas_asimwas_asiá¸yas".split("_"),
weekdaysMin:"asamas_aynas_asinas_akras_akwas_asimwas_asiá¸yas".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd D MMMM YYYY LT"
},
calendar:{
sameDay:"[asdkh g] LT",
nextDay:"[aska g] LT",
nextWeek:"dddd [g] LT",
lastDay:"[assant g] LT",
lastWeek:"dddd [g] LT",
sameElse:"L"
},
relativeTime:{
future:"dadkh s yan %s",
past:"yan %s",
s:"imik",
m:"minuá¸",
mm:"%d minuá¸",
h:"saÉ›a",
hh:"%d tassaÉ›in",
d:"ass",
dd:"%d ossan",
M:"ayowr",
MM:"%d iyyirn",
y:"asgas",
yy:"%d isgasn"
},
week:{
dow:6,
doy:12
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("tzm", {
months:"âµ‰âµâµâ´°âµ¢âµ”_â´±âµ•â´°âµ¢âµ•_âµŽâ´°âµ•âµš_âµ‰â´±âµ”âµ‰âµ”_âµŽâ´°âµ¢âµ¢âµ“_âµ¢âµ“âµâµ¢âµ“_âµ¢âµ“âµâµ¢âµ“âµ£_âµ–âµ“âµ›âµœ_âµ›âµ“âµœâ´°âµâ´±âµ‰âµ”_â´½âµŸâµ“â´±âµ•_âµâµ“âµ¡â´°âµâ´±âµ‰âµ”_â´·âµ“âµŠâµâ´±âµ‰âµ”".split("_"),
monthsShort:"âµ‰âµâµâ´°âµ¢âµ”_â´±âµ•â´°âµ¢âµ•_âµŽâ´°âµ•âµš_âµ‰â´±âµ”âµ‰âµ”_âµŽâ´°âµ¢âµ¢âµ“_âµ¢âµ“âµâµ¢âµ“_âµ¢âµ“âµâµ¢âµ“âµ£_âµ–âµ“âµ›âµœ_âµ›âµ“âµœâ´°âµâ´±âµ‰âµ”_â´½âµŸâµ“â´±âµ•_âµâµ“âµ¡â´°âµâ´±âµ‰âµ”_â´·âµ“âµŠâµâ´±âµ‰âµ”".split("_"),
weekdays:"â´°âµ™â´°âµŽâ´°âµ™_â´°âµ¢âµâ´°âµ™_â´°âµ™âµ‰âµâ´°âµ™_â´°â´½âµ”â´°âµ™_â´°â´½âµ¡â´°âµ™_â´°âµ™âµ‰âµŽâµ¡â´°âµ™_â´°âµ™âµ‰â´¹âµ¢â´°âµ™".split("_"),
weekdaysShort:"â´°âµ™â´°âµŽâ´°âµ™_â´°âµ¢âµâ´°âµ™_â´°âµ™âµ‰âµâ´°âµ™_â´°â´½âµ”â´°âµ™_â´°â´½âµ¡â´°âµ™_â´°âµ™âµ‰âµŽâµ¡â´°âµ™_â´°âµ™âµ‰â´¹âµ¢â´°âµ™".split("_"),
weekdaysMin:"â´°âµ™â´°âµŽâ´°âµ™_â´°âµ¢âµâ´°âµ™_â´°âµ™âµ‰âµâ´°âµ™_â´°â´½âµ”â´°âµ™_â´°â´½âµ¡â´°âµ™_â´°âµ™âµ‰âµŽâµ¡â´°âµ™_â´°âµ™âµ‰â´¹âµ¢â´°âµ™".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"dddd D MMMM YYYY LT"
},
calendar:{
sameDay:"[â´°âµ™â´·âµ… â´´] LT",
nextDay:"[â´°âµ™â´½â´° â´´] LT",
nextWeek:"dddd [â´´] LT",
lastDay:"[â´°âµšâ´°âµâµœ â´´] LT",
lastWeek:"dddd [â´´] LT",
sameElse:"L"
},
relativeTime:{
future:"â´·â´°â´·âµ… âµ™ âµ¢â´°âµ %s",
past:"âµ¢â´°âµ %s",
s:"âµ‰âµŽâµ‰â´½",
m:"âµŽâµ‰âµâµ“â´º",
mm:"%d âµŽâµ‰âµâµ“â´º",
h:"âµ™â´°âµ„â´°",
hh:"%d âµœâ´°âµ™âµ™â´°âµ„âµ‰âµ",
d:"â´°âµ™âµ™",
dd:"%d oâµ™âµ™â´°âµ",
M:"â´°âµ¢oâµ“âµ”",
MM:"%d âµ‰âµ¢âµ¢âµ‰âµ”âµ",
y:"â´°âµ™â´³â´°âµ™",
yy:"%d âµ‰âµ™â´³â´°âµ™âµ"
},
week:{
dow:6,
doy:12
}
});
}), function(t) {
t(ne);
}(function(t) {
function e(t, e) {
var n = t.split("_");
return e % 10 === 1 && e % 100 !== 11 ? n[0] :e % 10 >= 2 && 4 >= e % 10 && (10 > e % 100 || e % 100 >= 20) ? n[1] :n[2];
}
function n(t, n, i) {
var r = {
mm:"Ñ…Ð²Ð¸Ð»Ð¸Ð½Ð°_Ñ…Ð²Ð¸Ð»Ð¸Ð½Ð¸_Ñ…Ð²Ð¸Ð»Ð¸Ð½",
hh:"Ð³Ð¾Ð´Ð¸Ð½Ð°_Ð³Ð¾Ð´Ð¸Ð½Ð¸_Ð³Ð¾Ð´Ð¸Ð½",
dd:"Ð´ÐµÐ½ÑŒ_Ð´Ð½Ñ–_Ð´Ð½Ñ–Ð²",
MM:"Ð¼Ñ–ÑÑÑ†ÑŒ_Ð¼Ñ–ÑÑÑ†Ñ–_Ð¼Ñ–ÑÑÑ†Ñ–Ð²",
yy:"Ñ€Ñ–Ðº_Ñ€Ð¾ÐºÐ¸_Ñ€Ð¾ÐºÑ–Ð²"
};
return "m" === i ? n ? "Ñ…Ð²Ð¸Ð»Ð¸Ð½Ð°" :"Ñ…Ð²Ð¸Ð»Ð¸Ð½Ñƒ" :"h" === i ? n ? "Ð³Ð¾Ð´Ð¸Ð½Ð°" :"Ð³Ð¾Ð´Ð¸Ð½Ñƒ" :t + " " + e(r[i], +t);
}
function i(t, e) {
var n = {
nominative:"ÑÑ–Ñ‡ÐµÐ½ÑŒ_Ð»ÑŽÑ‚Ð¸Ð¹_Ð±ÐµÑ€ÐµÐ·ÐµÐ½ÑŒ_ÐºÐ²Ñ–Ñ‚ÐµÐ½ÑŒ_Ñ‚Ñ€Ð°Ð²ÐµÐ½ÑŒ_Ñ‡ÐµÑ€Ð²ÐµÐ½ÑŒ_Ð»Ð¸Ð¿ÐµÐ½ÑŒ_ÑÐµÑ€Ð¿ÐµÐ½ÑŒ_Ð²ÐµÑ€ÐµÑÐµÐ½ÑŒ_Ð¶Ð¾Ð²Ñ‚ÐµÐ½ÑŒ_Ð»Ð¸ÑÑ‚Ð¾Ð¿Ð°Ð´_Ð³Ñ€ÑƒÐ´ÐµÐ½ÑŒ".split("_"),
accusative:"ÑÑ–Ñ‡Ð½Ñ_Ð»ÑŽÑ‚Ð¾Ð³Ð¾_Ð±ÐµÑ€ÐµÐ·Ð½Ñ_ÐºÐ²Ñ–Ñ‚Ð½Ñ_Ñ‚Ñ€Ð°Ð²Ð½Ñ_Ñ‡ÐµÑ€Ð²Ð½Ñ_Ð»Ð¸Ð¿Ð½Ñ_ÑÐµÑ€Ð¿Ð½Ñ_Ð²ÐµÑ€ÐµÑÐ½Ñ_Ð¶Ð¾Ð²Ñ‚Ð½Ñ_Ð»Ð¸ÑÑ‚Ð¾Ð¿Ð°Ð´Ð°_Ð³Ñ€ÑƒÐ´Ð½Ñ".split("_")
}, i = /D[oD]? *MMMM?/.test(e) ? "accusative" :"nominative";
return n[i][t.month()];
}
function r(t, e) {
var n = {
nominative:"Ð½ÐµÐ´Ñ–Ð»Ñ_Ð¿Ð¾Ð½ÐµÐ´Ñ–Ð»Ð¾Ðº_Ð²Ñ–Ð²Ñ‚Ð¾Ñ€Ð¾Ðº_ÑÐµÑ€ÐµÐ´Ð°_Ñ‡ÐµÑ‚Ð²ÐµÑ€_Ð¿â€™ÑÑ‚Ð½Ð¸Ñ†Ñ_ÑÑƒÐ±Ð¾Ñ‚Ð°".split("_"),
accusative:"Ð½ÐµÐ´Ñ–Ð»ÑŽ_Ð¿Ð¾Ð½ÐµÐ´Ñ–Ð»Ð¾Ðº_Ð²Ñ–Ð²Ñ‚Ð¾Ñ€Ð¾Ðº_ÑÐµÑ€ÐµÐ´Ñƒ_Ñ‡ÐµÑ‚Ð²ÐµÑ€_Ð¿â€™ÑÑ‚Ð½Ð¸Ñ†ÑŽ_ÑÑƒÐ±Ð¾Ñ‚Ñƒ".split("_"),
genitive:"Ð½ÐµÐ´Ñ–Ð»Ñ–_Ð¿Ð¾Ð½ÐµÐ´Ñ–Ð»ÐºÐ°_Ð²Ñ–Ð²Ñ‚Ð¾Ñ€ÐºÐ°_ÑÐµÑ€ÐµÐ´Ð¸_Ñ‡ÐµÑ‚Ð²ÐµÑ€Ð³Ð°_Ð¿â€™ÑÑ‚Ð½Ð¸Ñ†Ñ–_ÑÑƒÐ±Ð¾Ñ‚Ð¸".split("_")
}, i = /(\[[Ð’Ð²Ð£Ñƒ]\]) ?dddd/.test(e) ? "accusative" :/\[?(?:Ð¼Ð¸Ð½ÑƒÐ»Ð¾Ñ—|Ð½Ð°ÑÑ‚ÑƒÐ¿Ð½Ð¾Ñ—)? ?\] ?dddd/.test(e) ? "genitive" :"nominative";
return n[i][t.day()];
}
function s(t) {
return function() {
return t + "Ð¾" + (11 === this.hours() ? "Ð±" :"") + "] LT";
};
}
return t.lang("uk", {
months:i,
monthsShort:"ÑÑ–Ñ‡_Ð»ÑŽÑ‚_Ð±ÐµÑ€_ÐºÐ²Ñ–Ñ‚_Ñ‚Ñ€Ð°Ð²_Ñ‡ÐµÑ€Ð²_Ð»Ð¸Ð¿_ÑÐµÑ€Ð¿_Ð²ÐµÑ€_Ð¶Ð¾Ð²Ñ‚_Ð»Ð¸ÑÑ‚_Ð³Ñ€ÑƒÐ´".split("_"),
weekdays:r,
weekdaysShort:"Ð½Ð´_Ð¿Ð½_Ð²Ñ‚_ÑÑ€_Ñ‡Ñ‚_Ð¿Ñ‚_ÑÐ±".split("_"),
weekdaysMin:"Ð½Ð´_Ð¿Ð½_Ð²Ñ‚_ÑÑ€_Ñ‡Ñ‚_Ð¿Ñ‚_ÑÐ±".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD.MM.YYYY",
LL:"D MMMM YYYY Ñ€.",
LLL:"D MMMM YYYY Ñ€., LT",
LLLL:"dddd, D MMMM YYYY Ñ€., LT"
},
calendar:{
sameDay:s("[Ð¡ÑŒÐ¾Ð³Ð¾Ð´Ð½Ñ– "),
nextDay:s("[Ð—Ð°Ð²Ñ‚Ñ€Ð° "),
lastDay:s("[Ð’Ñ‡Ð¾Ñ€Ð° "),
nextWeek:s("[Ð£] dddd ["),
lastWeek:function() {
switch (this.day()) {
case 0:
case 3:
case 5:
case 6:
return s("[ÐœÐ¸Ð½ÑƒÐ»Ð¾Ñ—] dddd [").call(this);

case 1:
case 2:
case 4:
return s("[ÐœÐ¸Ð½ÑƒÐ»Ð¾Ð³Ð¾] dddd [").call(this);
}
},
sameElse:"L"
},
relativeTime:{
future:"Ð·Ð° %s",
past:"%s Ñ‚Ð¾Ð¼Ñƒ",
s:"Ð´ÐµÐºÑ–Ð»ÑŒÐºÐ° ÑÐµÐºÑƒÐ½Ð´",
m:n,
mm:n,
h:"Ð³Ð¾Ð´Ð¸Ð½Ñƒ",
hh:n,
d:"Ð´ÐµÐ½ÑŒ",
dd:n,
M:"Ð¼Ñ–ÑÑÑ†ÑŒ",
MM:n,
y:"Ñ€Ñ–Ðº",
yy:n
},
meridiem:function(t) {
return 4 > t ? "Ð½Ð¾Ñ‡Ñ–" :12 > t ? "Ñ€Ð°Ð½ÐºÑƒ" :17 > t ? "Ð´Ð½Ñ" :"Ð²ÐµÑ‡Ð¾Ñ€Ð°";
},
ordinal:function(t, e) {
switch (e) {
case "M":
case "d":
case "DDD":
case "w":
case "W":
return t + "-Ð¹";

case "D":
return t + "-Ð³Ð¾";

default:
return t;
}
},
week:{
dow:1,
doy:7
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("uz", {
months:"ÑÐ½Ð²Ð°Ñ€ÑŒ_Ñ„ÐµÐ²Ñ€Ð°Ð»ÑŒ_Ð¼Ð°Ñ€Ñ‚_Ð°Ð¿Ñ€ÐµÐ»ÑŒ_Ð¼Ð°Ð¹_Ð¸ÑŽÐ½ÑŒ_Ð¸ÑŽÐ»ÑŒ_Ð°Ð²Ð³ÑƒÑÑ‚_ÑÐµÐ½Ñ‚ÑÐ±Ñ€ÑŒ_Ð¾ÐºÑ‚ÑÐ±Ñ€ÑŒ_Ð½Ð¾ÑÐ±Ñ€ÑŒ_Ð´ÐµÐºÐ°Ð±Ñ€ÑŒ".split("_"),
monthsShort:"ÑÐ½Ð²_Ñ„ÐµÐ²_Ð¼Ð°Ñ€_Ð°Ð¿Ñ€_Ð¼Ð°Ð¹_Ð¸ÑŽÐ½_Ð¸ÑŽÐ»_Ð°Ð²Ð³_ÑÐµÐ½_Ð¾ÐºÑ‚_Ð½Ð¾Ñ_Ð´ÐµÐº".split("_"),
weekdays:"Ð¯ÐºÑˆÐ°Ð½Ð±Ð°_Ð”ÑƒÑˆÐ°Ð½Ð±Ð°_Ð¡ÐµÑˆÐ°Ð½Ð±Ð°_Ð§Ð¾Ñ€ÑˆÐ°Ð½Ð±Ð°_ÐŸÐ°Ð¹ÑˆÐ°Ð½Ð±Ð°_Ð–ÑƒÐ¼Ð°_Ð¨Ð°Ð½Ð±Ð°".split("_"),
weekdaysShort:"Ð¯ÐºÑˆ_Ð”ÑƒÑˆ_Ð¡ÐµÑˆ_Ð§Ð¾Ñ€_ÐŸÐ°Ð¹_Ð–ÑƒÐ¼_Ð¨Ð°Ð½".split("_"),
weekdaysMin:"Ð¯Ðº_Ð”Ñƒ_Ð¡Ðµ_Ð§Ð¾_ÐŸÐ°_Ð–Ñƒ_Ð¨Ð°".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD/MM/YYYY",
LL:"D MMMM YYYY",
LLL:"D MMMM YYYY LT",
LLLL:"D MMMM YYYY, dddd LT"
},
calendar:{
sameDay:"[Ð‘ÑƒÐ³ÑƒÐ½ ÑÐ¾Ð°Ñ‚] LT [Ð´Ð°]",
nextDay:"[Ð­Ñ€Ñ‚Ð°Ð³Ð°] LT [Ð´Ð°]",
nextWeek:"dddd [ÐºÑƒÐ½Ð¸ ÑÐ¾Ð°Ñ‚] LT [Ð´Ð°]",
lastDay:"[ÐšÐµÑ‡Ð° ÑÐ¾Ð°Ñ‚] LT [Ð´Ð°]",
lastWeek:"[Ð£Ñ‚Ð³Ð°Ð½] dddd [ÐºÑƒÐ½Ð¸ ÑÐ¾Ð°Ñ‚] LT [Ð´Ð°]",
sameElse:"L"
},
relativeTime:{
future:"Ð¯ÐºÐ¸Ð½ %s Ð¸Ñ‡Ð¸Ð´Ð°",
past:"Ð‘Ð¸Ñ€ Ð½ÐµÑ‡Ð° %s Ð¾Ð»Ð´Ð¸Ð½",
s:"Ñ„ÑƒÑ€ÑÐ°Ñ‚",
m:"Ð±Ð¸Ñ€ Ð´Ð°ÐºÐ¸ÐºÐ°",
mm:"%d Ð´Ð°ÐºÐ¸ÐºÐ°",
h:"Ð±Ð¸Ñ€ ÑÐ¾Ð°Ñ‚",
hh:"%d ÑÐ¾Ð°Ñ‚",
d:"Ð±Ð¸Ñ€ ÐºÑƒÐ½",
dd:"%d ÐºÑƒÐ½",
M:"Ð±Ð¸Ñ€ Ð¾Ð¹",
MM:"%d Ð¾Ð¹",
y:"Ð±Ð¸Ñ€ Ð¹Ð¸Ð»",
yy:"%d Ð¹Ð¸Ð»"
},
week:{
dow:1,
doy:7
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("vn", {
months:"thÃ¡ng 1_thÃ¡ng 2_thÃ¡ng 3_thÃ¡ng 4_thÃ¡ng 5_thÃ¡ng 6_thÃ¡ng 7_thÃ¡ng 8_thÃ¡ng 9_thÃ¡ng 10_thÃ¡ng 11_thÃ¡ng 12".split("_"),
monthsShort:"Th01_Th02_Th03_Th04_Th05_Th06_Th07_Th08_Th09_Th10_Th11_Th12".split("_"),
weekdays:"chá»§ nháº­t_thá»© hai_thá»© ba_thá»© tÆ°_thá»© nÄƒm_thá»© sÃ¡u_thá»© báº£y".split("_"),
weekdaysShort:"CN_T2_T3_T4_T5_T6_T7".split("_"),
weekdaysMin:"CN_T2_T3_T4_T5_T6_T7".split("_"),
longDateFormat:{
LT:"HH:mm",
L:"DD/MM/YYYY",
LL:"D MMMM [nÄƒm] YYYY",
LLL:"D MMMM [nÄƒm] YYYY LT",
LLLL:"dddd, D MMMM [nÄƒm] YYYY LT",
l:"DD/M/YYYY",
ll:"D MMM YYYY",
lll:"D MMM YYYY LT",
llll:"ddd, D MMM YYYY LT"
},
calendar:{
sameDay:"[HÃ´m nay lÃºc] LT",
nextDay:"[NgÃ y mai lÃºc] LT",
nextWeek:"dddd [tuáº§n tá»›i lÃºc] LT",
lastDay:"[HÃ´m qua lÃºc] LT",
lastWeek:"dddd [tuáº§n rá»“i lÃºc] LT",
sameElse:"L"
},
relativeTime:{
future:"%s tá»›i",
past:"%s trÆ°á»›c",
s:"vÃ i giÃ¢y",
m:"má»™t phÃºt",
mm:"%d phÃºt",
h:"má»™t giá»",
hh:"%d giá»",
d:"má»™t ngÃ y",
dd:"%d ngÃ y",
M:"má»™t thÃ¡ng",
MM:"%d thÃ¡ng",
y:"má»™t nÄƒm",
yy:"%d nÄƒm"
},
ordinal:function(t) {
return t;
},
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("zh-cn", {
months:"ä¸€æœˆ_äºŒæœˆ_ä¸‰æœˆ_å››æœˆ_äº”æœˆ_å…­æœˆ_ä¸ƒæœˆ_å…«æœˆ_ä¹æœˆ_åæœˆ_åä¸€æœˆ_åäºŒæœˆ".split("_"),
monthsShort:"1æœˆ_2æœˆ_3æœˆ_4æœˆ_5æœˆ_6æœˆ_7æœˆ_8æœˆ_9æœˆ_10æœˆ_11æœˆ_12æœˆ".split("_"),
weekdays:"æ˜ŸæœŸæ—¥_æ˜ŸæœŸä¸€_æ˜ŸæœŸäºŒ_æ˜ŸæœŸä¸‰_æ˜ŸæœŸå››_æ˜ŸæœŸäº”_æ˜ŸæœŸå…­".split("_"),
weekdaysShort:"å‘¨æ—¥_å‘¨ä¸€_å‘¨äºŒ_å‘¨ä¸‰_å‘¨å››_å‘¨äº”_å‘¨å…­".split("_"),
weekdaysMin:"æ—¥_ä¸€_äºŒ_ä¸‰_å››_äº”_å…­".split("_"),
longDateFormat:{
LT:"Ahç‚¹mm",
L:"YYYY-MM-DD",
LL:"YYYYå¹´MMMDæ—¥",
LLL:"YYYYå¹´MMMDæ—¥LT",
LLLL:"YYYYå¹´MMMDæ—¥ddddLT",
l:"YYYY-MM-DD",
ll:"YYYYå¹´MMMDæ—¥",
lll:"YYYYå¹´MMMDæ—¥LT",
llll:"YYYYå¹´MMMDæ—¥ddddLT"
},
meridiem:function(t, e) {
var n = 100 * t + e;
return 600 > n ? "å‡Œæ™¨" :900 > n ? "æ—©ä¸Š" :1130 > n ? "ä¸Šåˆ" :1230 > n ? "ä¸­åˆ" :1800 > n ? "ä¸‹åˆ" :"æ™šä¸Š";
},
calendar:{
sameDay:function() {
return 0 === this.minutes() ? "[ä»Šå¤©]Ah[ç‚¹æ•´]" :"[ä»Šå¤©]LT";
},
nextDay:function() {
return 0 === this.minutes() ? "[æ˜Žå¤©]Ah[ç‚¹æ•´]" :"[æ˜Žå¤©]LT";
},
lastDay:function() {
return 0 === this.minutes() ? "[æ˜¨å¤©]Ah[ç‚¹æ•´]" :"[æ˜¨å¤©]LT";
},
nextWeek:function() {
var e, n;
return e = t().startOf("week"), n = this.unix() - e.unix() >= 604800 ? "[ä¸‹]" :"[æœ¬]", 
0 === this.minutes() ? n + "dddAhç‚¹æ•´" :n + "dddAhç‚¹mm";
},
lastWeek:function() {
var e, n;
return e = t().startOf("week"), n = this.unix() < e.unix() ? "[ä¸Š]" :"[æœ¬]", 0 === this.minutes() ? n + "dddAhç‚¹æ•´" :n + "dddAhç‚¹mm";
},
sameElse:"LL"
},
ordinal:function(t, e) {
switch (e) {
case "d":
case "D":
case "DDD":
return t + "æ—¥";

case "M":
return t + "æœˆ";

case "w":
case "W":
return t + "å‘¨";

default:
return t;
}
},
relativeTime:{
future:"%så†…",
past:"%så‰",
s:"å‡ ç§’",
m:"1åˆ†é’Ÿ",
mm:"%dåˆ†é’Ÿ",
h:"1å°æ—¶",
hh:"%då°æ—¶",
d:"1å¤©",
dd:"%då¤©",
M:"1ä¸ªæœˆ",
MM:"%dä¸ªæœˆ",
y:"1å¹´",
yy:"%då¹´"
},
week:{
dow:1,
doy:4
}
});
}), function(t) {
t(ne);
}(function(t) {
return t.lang("zh-tw", {
months:"ä¸€æœˆ_äºŒæœˆ_ä¸‰æœˆ_å››æœˆ_äº”æœˆ_å…­æœˆ_ä¸ƒæœˆ_å…«æœˆ_ä¹æœˆ_åæœˆ_åä¸€æœˆ_åäºŒæœˆ".split("_"),
monthsShort:"1æœˆ_2æœˆ_3æœˆ_4æœˆ_5æœˆ_6æœˆ_7æœˆ_8æœˆ_9æœˆ_10æœˆ_11æœˆ_12æœˆ".split("_"),
weekdays:"æ˜ŸæœŸæ—¥_æ˜ŸæœŸä¸€_æ˜ŸæœŸäºŒ_æ˜ŸæœŸä¸‰_æ˜ŸæœŸå››_æ˜ŸæœŸäº”_æ˜ŸæœŸå…­".split("_"),
weekdaysShort:"é€±æ—¥_é€±ä¸€_é€±äºŒ_é€±ä¸‰_é€±å››_é€±äº”_é€±å…­".split("_"),
weekdaysMin:"æ—¥_ä¸€_äºŒ_ä¸‰_å››_äº”_å…­".split("_"),
longDateFormat:{
LT:"Ahé»žmm",
L:"YYYYå¹´MMMDæ—¥",
LL:"YYYYå¹´MMMDæ—¥",
LLL:"YYYYå¹´MMMDæ—¥LT",
LLLL:"YYYYå¹´MMMDæ—¥ddddLT",
l:"YYYYå¹´MMMDæ—¥",
ll:"YYYYå¹´MMMDæ—¥",
lll:"YYYYå¹´MMMDæ—¥LT",
llll:"YYYYå¹´MMMDæ—¥ddddLT"
},
meridiem:function(t, e) {
var n = 100 * t + e;
return 900 > n ? "æ—©ä¸Š" :1130 > n ? "ä¸Šåˆ" :1230 > n ? "ä¸­åˆ" :1800 > n ? "ä¸‹åˆ" :"æ™šä¸Š";
},
calendar:{
sameDay:"[ä»Šå¤©]LT",
nextDay:"[æ˜Žå¤©]LT",
nextWeek:"[ä¸‹]ddddLT",
lastDay:"[æ˜¨å¤©]LT",
lastWeek:"[ä¸Š]ddddLT",
sameElse:"L"
},
ordinal:function(t, e) {
switch (e) {
case "d":
case "D":
case "DDD":
return t + "æ—¥";

case "M":
return t + "æœˆ";

case "w":
case "W":
return t + "é€±";

default:
return t;
}
},
relativeTime:{
future:"%så…§",
past:"%så‰",
s:"å¹¾ç§’",
m:"ä¸€åˆ†é˜",
mm:"%dåˆ†é˜",
h:"ä¸€å°æ™‚",
hh:"%då°æ™‚",
d:"ä¸€å¤©",
dd:"%då¤©",
M:"ä¸€å€‹æœˆ",
MM:"%då€‹æœˆ",
y:"ä¸€å¹´",
yy:"%då¹´"
}
});
}), ne.lang("en"), pe ? (module.exports = ne, ee(!0)) :"function" == typeof define && define.amd ? define("moment", function(e, n, i) {
return i.config && i.config() && i.config().noGlobal !== !0 && ee(i.config().noGlobal === t), 
ne;
}) :ee();
}.call(this);

/*
 * Mailcheck https://github.com/Kicksend/mailcheck
 * Author
 * Derrick Ko (@derrickko)
 *
 * License
 * Copyright (c) 2012 Receivd, Inc.
 *
 * Licensed under the MIT License.
 *
 * v 1.1
 */
var Kicksend = {
mailcheck:{
threshold:3,
defaultDomains:[ "yahoo.com", "google.com", "hotmail.com", "gmail.com", "me.com", "aol.com", "mac.com", "live.com", "comcast.net", "googlemail.com", "msn.com", "hotmail.co.uk", "yahoo.co.uk", "facebook.com", "verizon.net", "sbcglobal.net", "att.net", "gmx.com", "mail.com", "outlook.com", "icloud.com" ],
defaultTopLevelDomains:[ "co.jp", "co.uk", "com", "net", "org", "info", "edu", "gov", "mil", "ca" ],
run:function(t) {
t.domains = t.domains || Kicksend.mailcheck.defaultDomains, t.topLevelDomains = t.topLevelDomains || Kicksend.mailcheck.defaultTopLevelDomains, 
t.distanceFunction = t.distanceFunction || Kicksend.sift3Distance;
var e = function(t) {
return t;
}, n = t.suggested || e, i = t.empty || e, r = Kicksend.mailcheck.suggest(encodeURI(t.email), t.domains, t.topLevelDomains, t.distanceFunction);
return r ? n(r) :i();
},
suggest:function(t, e, n, i) {
t = t.toLowerCase();
var r = this.splitEmail(t), s = this.findClosestDomain(r.domain, e, i);
if (s) {
if (s != r.domain) return {
address:r.address,
domain:s,
full:r.address + "@" + s
};
} else {
var a = this.findClosestDomain(r.topLevelDomain, n);
if (r.domain && a && a != r.topLevelDomain) {
var o = r.domain;
return s = o.substring(0, o.lastIndexOf(r.topLevelDomain)) + a, {
address:r.address,
domain:s,
full:r.address + "@" + s
};
}
}
return !1;
},
findClosestDomain:function(t, e, n) {
var i, r = 99, s = null;
if (!t || !e) return !1;
n || (n = this.sift3Distance);
for (var a = 0; a < e.length; a++) {
if (t === e[a]) return t;
i = n(t, e[a]), r > i && (r = i, s = e[a]);
}
return r <= this.threshold && null !== s ? s :!1;
},
sift3Distance:function(t, e) {
if (null == t || 0 === t.length) return null == e || 0 === e.length ? 0 :e.length;
if (null == e || 0 === e.length) return t.length;
for (var n = 0, i = 0, r = 0, s = 0, a = 5; n + i < t.length && n + r < e.length; ) {
if (t.charAt(n + i) == e.charAt(n + r)) s++; else {
i = 0, r = 0;
for (var o = 0; a > o; o++) {
if (n + o < t.length && t.charAt(n + o) == e.charAt(n)) {
i = o;
break;
}
if (n + o < e.length && t.charAt(n) == e.charAt(n + o)) {
r = o;
break;
}
}
}
n++;
}
return (t.length + e.length) / 2 - s;
},
splitEmail:function(t) {
var e = t.split("@");
if (e.length < 2) return !1;
for (var n = 0; n < e.length; n++) if ("" === e[n]) return !1;
var i = e.pop(), r = i.split("."), s = "";
if (0 == r.length) return !1;
if (1 == r.length) s = r[0]; else {
for (var n = 1; n < r.length; n++) s += r[n] + ".";
r.length >= 2 && (s = s.substring(0, s.length - 1));
}
return {
topLevelDomain:s,
domain:i,
address:e.join("@")
};
}
}
};

"undefined" != typeof module && module.exports && (module.exports = Kicksend.mailcheck), 
"undefined" != typeof window && window.jQuery && !function(t) {
t.fn.mailcheck = function(t) {
var e = this;
if (t.suggested) {
var n = t.suggested;
t.suggested = function(t) {
n(e, t);
};
}
if (t.empty) {
var i = t.empty;
t.empty = function() {
i.call(null, e);
};
}
t.email = this.val(), Kicksend.mailcheck.run(t);
};
}(jQuery);

var NREUM = NREUM || void 0, SignedRequest = new Class({
Extends:Request,
HARRYS_API_TOKEN:"a08c0c07a7f3c12d87a05f9773742bb2",
initialize:function(t) {
this.parent(t), this.setHeader("X-HARRYS-API-TOKEN", this.HARRYS_API_TOKEN);
var e = document.getElement("meta[name='csrf-token']");
e && this.setHeader("X-CSRF-Token", e.get("content")), this.addEvent("success", function(t) {
var e, n;
t.success || (e = _.map(t.errors, function(t) {
var e;
switch (t.type) {
case "validation":
e = t.field.replace("_", " ") + " " + t.message, e.capitalize();
break;

default:
e = t.message;
}
return e;
}), n = new Error(e.join(",") || "SignedRequest responded with an Error."), NREUM && "function" == typeof NREUM.noticeError && NREUM.noticeError(n));
});
}
});

SignedRequest.JSON = new Class({
Extends:Request.JSON,
HARRYS_API_TOKEN:"a08c0c07a7f3c12d87a05f9773742bb2",
initialize:function(t) {
this.parent(t), this.setHeader("X-HARRYS-API-TOKEN", this.HARRYS_API_TOKEN);
var e = document.getElement("meta[name='csrf-token']");
e && this.setHeader("X-CSRF-Token", e.get("content")), this.addEvent("success", function(t) {
var e, n;
t.success || (e = _.map(t.errors, function(t) {
var e;
switch (t.type) {
case "validation":
e = t.field.replace("_", " ") + " " + t.message, e.capitalize();
break;

default:
e = t.message;
}
return e;
}), n = new Error(e.join(",") || "SignedRequest.JSON responded with an Error."), 
NREUM && "function" == typeof NREUM.noticeError && NREUM.noticeError(n));
});
}
});

var Harrys = Harrys || {};

Harrys.I18n = {
global:{
error:{
cannot_connect:"Unable to connect",
cannot_connect_try_again:"Unable to connect. Try again.",
connection:"Connection error, please try again.",
missing_required_short:"Missing Required Fields",
missing_required:"You are missing a required field.",
missing_required_multiple:"You're missing some required fields.",
required_fields:"An error occurred, it is likely you were missing some required field(s).",
other:"Uh oh, something went wrong.",
unknown:"An unknown error occurred",
inventory_unavailable:"The product: %{product} is out of stock"
},
stripe:{
error:{
international:"We currently do not accept international payment details. Please try again with U.S. or Canadian payment details. If the problem persists with U.S. or Canadian payment details, please try another card, or contact our Customer Experience team at 888-212-6855.",
avs:"The billing address you've entered does not match the billing address your bank has on file. Double check that you've entered that information exactly as it appears on your credit card statement. If you've recently moved, you might also try your previous billing address.",
declined:"Your card was declined. Double check that the account has sufficient funds and try again. If the problem persists, contact your bank to rectify the issue.",
other:"Oops! Something seems to be wrong. Please wait 5 minutes and try your order again. %{message}"
}
}
},
CheckoutOrder:{
submit:{
fail:"Server error submitting checkout"
},
handleStatus:{
fail:"Unknown checkout status"
},
timedOut:{
fail:"Timed out in checkout queue"
}
},
CheckoutInit:{
warn:"You're about to leave the checkout page, losing all of your progress (shipping, billing, etc.).\n\nIf you'd like to make changes to a previous checkout section, please use the breadcrumbs at the top of the page."
},
AddressForm:{
_checkProvincePostalCode:{
ca_postal_code_mismatch:"Postal Code Does Not Match",
ca_province_mismatch:"Province Does Not Match",
ca_postal_code_province_mismatch:"Province and Postal Code Do Not Match"
},
errors:{
phone_number_too_short:"The Phone Number is too short",
phone_number_too_long:"The Phone Number is too long"
}
},
Discount:{
check:{
error:"Invalid Coupon Code"
}
},
Inputs:{
EmailInput:{
error:"Not Valid Email Address"
},
PasswordInput:{
error:"Minimum 8 Characters"
},
EngravingInput:{
error:"Engraving length must be 1-3. Only A-Z and 0-9 allowed."
},
CreditCardInput:{
error:"Credit Card Number Not Valid"
}
},
Modals:{
AddressModal:{
setupSuggestion:"We couldn't find that address, is this one correct?",
setupNotFound:"We couldn't find that address.<br>Please fix any errors, or ignore this warning."
}
},
WaitlistModal:{
send:{
success:"Successfully added to waitlist.",
error:"We encountered an error, please try again.",
fail:"Sorry, we couldn't connect. Please try again."
}
},
PaymentForm:{
_checkExpirationDate:{
error:"Invalid Expiration Date"
}
},
redeem:{
promoApplied:"Your promo code has been successfully applied to your order"
},
auto_refill_build:{
survey:{
success:"Thank you for your response! We think we have a plan for your shave schedule."
}
}
}, Harrys.STRIPE_PUBLISHABLE_KEY = "pk_live_GnR3g9DetBVQnwXDT8KGMJn1", Harrys.VALIDATION = {
user:{
email:"^[\\w+\\-._]+@[a-zA-z\\d\\-]+(\\.[A-Za-z]+)*\\.[a-zA-Z]+$"
}
};

var I18n = I18n || {};

I18n.translate = function(t, e) {
try {
var n = I18n.getMessage(t, Harrys.I18n);
return e && _.each(e, function(t, e) {
n = n.replace("%{" + e + "}", t);
}), n;
} catch (i) {
if ("production" === Harrys.ENV) return "";
throw new Error(t + " is not defined");
}
}, I18n.getMessage = function(t) {
var e = t.split("."), n = _.reduce(e, function(t, e) {
return t[e];
}, Harrys.I18n);
if (!n && "production" !== Harrys.ENV) throw new Error(t + " is not defined");
return n || "";
}, I18n.t = I18n.translate;

var Harrys = Harrys || {};

Harrys.CHECKOUT_QUEUE_TIMEOUT = 60, Harrys.zip_format = function(t) {
return Harrys.COUNTRIES[t].zip_format.replace("\\A", "^").replace("\\z", "$");
}, Harrys.VALIDATION.user.email = Harrys.VALIDATION.user.email.replace("\\A", "^").replace("\\z", "$");

var Analytics = new Class({
Implements:Events,
initialize:function() {
this.EPHEMERAL_COOKIE_NAME = "h_eph_sess", this.trackUserID(), this.trackParams(), 
this.trackCustomerType(), this.trackEphemeralSession(), this.trackSplitVariation(), 
this.trackPageView();
},
trackSplitVariation:function() {
try {
var t = JSON.parse(Cookie.read("split"));
if (t) {
var e = {};
Object.each(t, function(t, n) {
!n.contains(":finished") && Harrys.ACTIVE_TESTS.contains(n) && (e[n] = t);
}), Object.each(t, function(t, n) {
if (n.contains(":finished")) {
var i = n.replace(":finished", "");
t === !0 && e[i] && delete e[i];
}
}), Object.each(e, function(t, e) {
dataLayer.push({
"split-dimension":e + "/" + t
}), heap.track("Split Variation", {
test_name:e,
test_alternative:t
});
});
}
} catch (n) {
return !1;
}
},
trackPageView:function() {
dataLayer.push({
event:"sendPageview"
});
},
trackUserID:function() {
var t;
try {
t = JSON.parse(Cookie.read("h_user"));
} catch (e) {}
t && t.id && dataLayer.push({
userID:t.id
});
},
trackParams:function() {
var t = new URI();
if (!t.parsed.query) return !1;
t.parsed.query.parseQueryString();
t.set("query", null);
},
trackCartAdd:function(t, e, n) {
n = n || {}, e = e || 1;
var i = Harrys.productsManager.findById(t), r = {
event:"addToCart",
ecommerce:{
add:{
products:[ {
name:i.name,
id:i.id,
price:i.price,
quantity:e,
variant:n.is_auto_refill ? "shave plan" :""
} ]
}
}
};
dataLayer.push(r);
},
trackCartRemove:function(t, e, n) {
n = n || {}, e = e || 1;
var i = Harrys.productsManager.findById(t), r = {
event:"removeFromCart",
ecommerce:{
remove:{
products:[ {
name:i.name,
id:i.id,
price:i.price,
quantity:e,
variant:n.is_auto_refill ? "shave plan" :""
} ]
}
}
};
dataLayer.push(r);
},
trackCartQuantityChange:function(t, e, n) {
n = n || {}, e > 0 ? this.trackCartAdd(t, Math.abs(e), n) :0 > e && this.trackCartRemove(t, Math.abs(e), n);
},
checkout_sections:[ "Cart", "Login Wall", "Shipping", "Billing", "Review" ],
trackCheckoutSection:function(t) {
var e = this.checkout_sections.indexOf(t) + 1, n = _.map(Harrys.cart.cartItems, function(t) {
return {
name:t.product.name,
id:t.product.id,
price:t.product.price,
quantity:t.quantity
};
}), i = {
event:"checkout",
ecommerce:{
checkout:{
actionField:{
step:e
},
products:n
}
}
};
dataLayer.push(i), dataLayer.push({
vpv:"/checkout/virtual/" + t,
event:"sendVirtualPageview"
});
},
trackCheckoutSectionOption:function(t, e) {
var n = this.checkout_sections.indexOf(t) + 1, i = {
event:"checkoutOption",
ecommerce:{
checkout_option:{
actionField:{
step:n,
option:e
}
}
}
};
dataLayer.push(i);
},
trackAutoRefillEnroll:function(t) {
dataLayer.push({
eventCategory:"Auto Refill",
eventAction:"Enroll",
eventLabel:t,
event:"GAEvent"
});
},
trackAutoRefillEdit:function(t) {
dataLayer.push({
eventCategory:"Auto Refill",
eventAction:"Edit",
eventLabel:t,
event:"GAEvent"
});
},
trackAutoRefillCancel:function(t) {
dataLayer.push({
eventCategory:"Auto Refill",
eventAction:"Cancel",
eventLabel:t,
event:"GAEvent"
});
},
trackHelpQuestionOpen:function(t) {
dataLayer.push({
eventCategory:"Help Question",
eventAction:"Open",
eventLabel:t,
event:"GAEvent"
});
},
trackLogin:function(t) {
dataLayer.push({
eventCategory:"Session",
eventAction:"Login",
eventLabel:t,
event:"GAEvent"
});
},
trackPasswordForgot:function() {
dataLayer.push({
eventCategory:"Session",
eventAction:"Password",
eventLabel:"forgot",
event:"GAEvent"
});
},
trackPasswordSubmit:function() {
dataLayer.push({
eventCategory:"Session",
eventAction:"Password",
eventLabel:"submit",
event:"GAEvent"
});
},
trackCreateAccount:function(t) {
dataLayer.push({
eventCategory:"Session",
eventAction:"Account",
eventLabel:"create with " + t,
event:"GAEvent"
});
},
trackLogout:function() {
dataLayer.push({
eventCategory:"Session",
eventAction:"Logout",
event:"GAEvent"
});
},
trackCustomerType:function() {
var t = Cookie.read("h_custype");
if (null === t) {
var e = Cookie.read("h_personalization"), n = "new";
null !== e && (n = "returning"), dataLayer.push({
customerType:n
}), Cookie.write("h_custype", "1", {
duration:.0208
});
}
},
GA_EVENT_NAME:"GAEvent",
REQUIRED_GA_KEYS:[ "eventCategory", "eventAction" ],
CLICK_EVENT_ACTION:"Click",
IMPRESSION_EVENT_ACTION:"Impression",
trackClick:function(t) {
t = _.defaults(t, {
eventAction:this.CLICK_EVENT_ACTION
}), this.trackEvent(t);
},
trackImpression:function(t) {
t = _.defaults(t, {
eventAction:this.IMPRESSION_EVENT_ACTION
}), this.trackEvent(t);
},
trackEvent:function(t) {
_.each(this.REQUIRED_GA_KEYS, function(e) {
if (!t[e]) throw "Missing Required Analytics Field: " + e;
}), t = _.defaults(t, {
event:this.GA_EVENT_NAME
}), this.track(t);
},
track:function(t) {
dataLayer.push(t);
},
trackEphemeralSession:function() {
var t = Cookie.read(this.EPHEMERAL_COOKIE_NAME);
null === t && (t = (Math.random().toString(36) + "00000000000000000").slice(2, 18), 
Cookie.write(this.EPHEMERAL_COOKIE_NAME, t, {
duration:.0208
})), dataLayer.push({
ephemeralSessionId:t
});
}
}), Impressionable = new Class({
initialize:function(t) {
this.el = t, this.position = this.el.get("data-position"), this.list = this.el.get("data-list"), 
this.product = Harrys.productsManager.findById(this.el.get("data-id"));
var e = {
name:this.product.name,
id:this.product.id,
price:this.product.price,
position:this.position,
list:this.list
}, n = _.find(dataLayer, function(t) {
return t.ecommerce && t.ecommerce.impressions;
});
n ? n.ecommerce.impressions.push(e) :dataLayer.push({
ecommerce:{
impressions:[ e ]
}
});
}
}), ClickTrackable = new Class({
initialize:function(t) {
this.el = t, this.href = this.el.get("href"), this.position = this.el.get("data-position"), 
this.list = this.el.get("data-list"), this.product = Harrys.productsManager.findById(this.el.get("data-id")), 
this.data_obj = {
event:"productClick",
ecommerce:{
click:{
actionField:{
list:this.list
},
products:[ {
name:this.product.name,
id:this.product.id,
price:this.product.price
} ]
}
},
eventCallback:function() {
document.location = this.href;
}.bind(this)
}, this.el.addEvent("click", function(t) {
t.preventDefault(), dataLayer.push(this.data_obj);
}.bind(this));
}
}), User = new Class({
Implements:Events,
initialize:function() {
var t, e = Cookie.read("h_user");
e && (t = JSON.decode(e), this.id = t.id, this.email = t.email, this.first_name = t.first_name, 
this.last_name = t.last_name, this.assumed = t.assumed, this.assumed && (this.timeout = t.timeout, 
this.bar = new AssumedUserBar(this)), Harrys.smart_app_banner && Harrys.smart_app_banner.setEmail(this.email));
},
getFullName:function() {
var t;
if (this.first_name && this.last_name) t = this.first_name + " " + this.last_name; else {
if (!this.email) return !1;
t = this.email;
}
return t;
},
getEmail:function() {
return this.email || !1;
},
signedIn:function() {
return void 0 !== this.id;
}
}), AssumedUserBar = new Class({
template:_.template('<div class="admin-header clear"><div class="float-left">Logged in as <%= email %></div><span>Inspiration: <%= quote %></span><div class="float-right"><span id="admin-timer">..</span> minutes left &bull; <a href="#" id="admin-logout">Log Out</a></div><form id="admin-restore" action="<%= logout_link %>" method="post"><input name="authenticity_token" type="hidden" value="<%= csrf %>"></form></div>'),
inspiration:[ '"Put your heart, mind, and soul into even your smallest acts. This is the secret of success."', '"Believe you can and you\'re halfway there."', '"Doubt whom you will, but never yourself."', '"The power of imagination makes us infinite."', '"With will one can do anything."', '"A loving heart is the truest wisdom."', '"You must be the change you wish to see in the world."', '"Make each day your masterpiece."', '"Donâ€™t count the days, make the days count."', '"The creation of a thousand forests is in one acorn."' ],
initialize:function(t) {
this.user = t, this.timeout = this.user.timeout, this.showBar(), this.checkLogout(), 
this.startLogoutTimer();
},
showBar:function() {
var t = document.getElement("meta[name='csrf-token']"), e = Elements.from(this.template({
email:this.user.email,
logout_link:"/auth/restore_admin",
quote:this.inspiration[Math.floor(Math.random() * this.inspiration.length)],
csrf:t.get("content")
}));
e.inject($("header"), "after"), $("admin-logout").addEvent("click", this.goToProfile);
},
goToProfile:function() {
Cookie.write("h_assumed_user_logout", !0), window.location = "/profile";
},
checkLogout:function() {
var t = Cookie.read("h_assumed_user_logout");
t && (Cookie.dispose("h_assumed_user_logout"), this.logoutAdmin());
},
startLogoutTimer:function() {
this.timer = setInterval(this.updateTimeout.bind(this), 1e3);
},
updateTimeout:function() {
var t = Cookie.read("h_user");
if (t) {
if (this.timeout -= 1, data = JSON.decode(t), data.timeout < 1) return clearInterval(this.timer), 
this.goToProfile(), void 0;
data.timeout = this.timeout, Cookie.write("h_user", JSON.encode(data));
var e = this.timeout / 60;
$("admin-timer").set("html", parseInt(e));
}
},
logoutAdmin:function() {
clearInterval(this.timer), $("admin-restore").submit();
}
}), Product = new Class({
Implements:Events,
initialize:function(t) {
_.each(t, function(t, e) {
this[e] = t;
}.bind(this));
}
}), ProductsManager = new Class({
Implements:Events,
initialize:function(t) {
this.products = _.map(t, function(t) {
return new Product(t);
});
},
find:function(t) {
return _.findWhere(this.getProductsByOrder(), t);
},
filter:function(t) {
return _.where(this.getProductsByOrder(), t);
},
getProductsByOrder:function() {
return _.sortBy(this.products, function(t) {
return t.order;
});
},
findByUid:function(t) {
return this.find({
uid:t
});
},
findById:function(t) {
return this.find({
id:t.toInt()
});
},
findByPackSize:function(t) {
return this.find({
pack_size:"" + t
});
},
findOtherColorsByName:function(t) {
return _.filter(this.products, function(e) {
return e.name === t && !!e.color;
});
},
findProductsWithIds:function(t) {
return _.filter(this.products, function(e) {
return _.contains(t, e.id);
});
}
}), CartItem = new Class({
Implements:[ Events, Options ],
options:{
id:null,
quantity:1,
customizations:{}
},
initialize:function(t) {
this.setOptions(t), this.product = Harrys.productsManager.findById(this.options.id), 
this.quantity = this.options.quantity, this.customizations = this.options.customizations, 
this.product.is_engravable || delete this.options.customizations.engraving, _.each(this.options.customizations, function(t, e) {
this[e] = t;
}.bind(this)), this._setKey();
},
toHash:function() {
return {
id:this.product.id,
uid:this.product.uid,
quantity:this.quantity,
customizations:this.options.customizations
};
},
getCustomizationsString:function() {
var t = "";
return _.each(this.options.customizations, function(e, n) {
("secondary_engraving" !== n || "same_value_as_engraving" !== this.product.properties.is_secondary_engravable) && e && (t += " " + e);
}.bind(this)), t;
},
getPrice:function() {
return this.options.customizations.redemption_code ? 0 :this.product.price;
},
getActualPrice:function() {
return this.product.price;
},
_setKey:function() {
this.key = "" + this.product.id, _.each(this.options.customizations, function(t, e) {
t && (this.key += "-" + e.toUpperCase() + "_" + t);
}.bind(this));
}
}), Cart = new Class({
Implements:Events,
initialize:function() {
this.migrated = !1, this.found_a_bad_id = !1, this.COOKIE_NAME = "h_cart", this.COUPON_COOKIE_NAME = "h_dc", 
this.COOKIE_VERSION = "2", this.cartItems = this._loadCookie(), (this.migrated || this.found_a_bad_id) && this._saveCookie();
},
addItem:function(t, e) {
var n = this.cartItems[t.key];
n ? this.changeQuantity(n.key, t.quantity, e) :(this.cartItems[t.key] = t, this._saveCookie(), 
this.fireEvent("item_added", [ this.cartItems[t.key], e ]));
},
setQuantity:function(t, e, n) {
n = n || {};
var i = this.cartItems[t];
if (!i) throw new Error("Cart Item Not Found with Key: " + t);
e = e.toInt(), e > 0 ? (n.change = e - i.quantity, i.quantity = e, this._saveCookie(), 
this.fireEvent("item_changed", [ i, n ])) :this._removeItem(i, n);
},
changeQuantity:function(t, e, n) {
var i = this.cartItems[t];
if (!i) throw new Error("Cart Item Not Found with Key: " + t);
var r = i.quantity.toInt() + e.toInt();
this.setQuantity(t, r, n);
},
getSubtotal:function() {
var t = 0;
return _.each(this.cartItems, function(e) {
e.customizations.first_send_date || (t += e.getPrice().toInt() * e.quantity.toInt());
}.bind(this)), t;
},
getActualSubtotal:function() {
var t = 0;
return _.each(this.cartItems, function(e) {
e.customizations.first_send_date || (t += e.getActualPrice().toInt() * e.quantity.toInt());
}.bind(this)), t;
},
getItemCount:function() {
var t = 0;
return _.each(this.cartItems, function(e) {
t += e.quantity.toInt();
}.bind(this)), t;
},
clear:function() {
this.cartItems = {}, this._saveCookie();
},
setCoupon:function(t) {
Cookie.write(this.COUPON_COOKIE_NAME, t);
},
clearCoupon:function() {
Cookie.dispose(this.COUPON_COOKIE_NAME);
},
clearRedemption:function() {
_.each(this.cartItems, function(t) {
t.customizations.redemption_code && this._removeItem(t);
}.bind(this));
},
containsNonRedemptionSubscriptions:function() {
return _.some(this.cartItems, function(t) {
return t.customizations.interval && !t.customizations.redemption_code;
});
},
isDigitalOnly:function() {
return _.every(this.cartItems, function(t) {
return t.product.is_digital;
});
},
requiresShippingInfo:function() {
return !this.isDigitalOnly();
},
_removeItem:function(t, e) {
e = e || {}, e.change = 0 - t.quantity, t.quantity = 0, delete this.cartItems[t.key], 
this._saveCookie(), this.fireEvent("item_removed", [ t, e ]);
},
_loadCookie:function() {
var t = {}, e = Cookie.read(this.COOKIE_NAME);
return e && (e = JSON.decode(e), e = this._migrateCookie(e), _.each(e.items, function(e, n) {
this._isValidId(e.id) ? t[n] = new CartItem(e) :this.found_a_bad_id = !0;
}, this)), t;
},
_isValidId:function(t) {
return !!Harrys.productsManager.findById(t);
},
_saveCookie:function() {
var t = {
version:this.COOKIE_VERSION,
items:{}
};
_.each(this.cartItems, function(e, n) {
t.items[n] = e.toHash();
});
var e = JSON.encode(t);
Cookie.write(this.COOKIE_NAME, e);
},
_migrateCookie:function(t) {
var e = t;
return t.version || (e = {
items:{},
version:this.COOKIE_VERSION
}, t.each(function(t) {
itemHash = {
customizations:{}
}, itemHash.id = t.id, itemHash.quantity = t.quantity, itemHash.uid = Harrys.productsManager.findById(t.id).uid, 
t.engraving && (itemHash.customizations.engraving = t.engraving), t.secondary_engraving && (itemHash.customizations.secondary_engraving = t.secondary_engraving);
var n = new CartItem(itemHash).key;
e.items[n] = itemHash;
}), this.migrated = !0), "1" === t.version && (e = t, e.version = this.COOKIE_VERSION, 
_.each(e.items, function(t) {
var e = Harrys.productsManager.findByUid(t.sku);
t.id = e.id, t.uid = e.uid;
}), this.migrated = !0), t.version && (e = t, _.each(t.items, function(t, n) {
if (product = Harrys.productsManager.findById(t.id)) {
var i = new CartItem(t);
n[0].match(/[A-Z]/) && (delete e.items[n], this.migrated = !0), e.items[i.key] = t;
}
}.bind(this))), e;
}
}), Discount = new Class({
Implements:Events,
initialize:function() {
var t = Cookie.read("h_dc");
t && this.check(t, function(t, e) {
t ? this._unsave() :this.fireEvent("discount_changed", e);
}.bind(this));
},
check:function(t, e) {
"" === t ? e("Code cannot be blank.") :(this._save(t), new SignedRequest.JSON({
url:"/api/OrderService/getDiscountForProposedOrder",
method:"get",
onSuccess:function(t) {
t.success ? e(null, t.data) :(this._unsave(), e(I18n.t("Discount.check.error")));
}.bind(this),
onFailure:function() {
e(I18n.t("global.error.cannot_connect_try_again"));
}.bind(this)
}).send());
},
_save:function(t) {
return this.code = t, Cookie.write("h_dc", t), this;
},
_unsave:function() {
return this.code = null, Cookie.dispose("h_dc"), this;
}
}), Order = new Class({
Implements:Events,
initialize:function() {
this.shipping = 0, this.state = null, this.country = null, this.zip = null, this.discount = 0, 
this.base_discount_amount = 0;
},
balance:function(t) {
t && ((t.shipping || 0 === t.shipping) && _.isNumber(t.shipping.toFloat()) && this.setShipping(t.shipping), 
t.state && this.setState(t.state), t.country && this.setCountry(t.country), t.zip && this.setZip(t.zip), 
(t.discount || 0 === t.discount) && _.isNumber(t.discount.toFloat()) && this.setDiscount(t.discount)), 
async.auto({
discount:this.getDiscount.bind(this),
shipping:this.getShipping.bind(this),
tax_rate:this.getTaxRate.bind(this),
subtotal:this.getSubtotal.bind(this)
}, function(t, e) {
t ? this.fireEvent("error", t) :this.fireEvent("balanced", this._calculate(e));
}.bind(this));
},
getDiscount:function(t) {
t(null, this.discount);
},
getShipping:function(t) {
t(null, this.shipping.toInt());
},
getTaxRate:function(t) {
if (this.country && (this.state || this.zip)) {
new SignedRequest.JSON({
url:"/api/TaxService/getTaxRateByAddress",
method:"get",
data:{
state:this.state,
country:this.country,
zip:this.zip
},
onSuccess:function(e) {
var n;
n = e.data ? e.data.toFloat() :0, t(null, n);
},
onFailure:function() {
t("Could Not Connect", null);
}
}).send();
} else t(null, 0);
},
getSubtotal:function(t) {
t(null, Harrys.cart.getSubtotal());
},
setState:function(t) {
return this.state = t || this.state, this;
},
unsetState:function() {
return this.state = null, this;
},
setCountry:function(t) {
return this.country = t || this.country, this;
},
setZip:function(t) {
return this.zip = t || this.zip, this;
},
setShipping:function(t) {
return this.shipping = t, this;
},
setDiscount:function(t) {
return this.discount = t, this;
},
setBaseDiscount:function(t) {
return this.base_discount_amount = t, this;
},
_calculate:function(t) {
var e = t.subtotal || 0, n = t.discount || this.base_discount_amount, i = t.shipping || 0, r = t.tax_rate || 0, s = e + i - n, a = s * (r / 100);
return s += a, {
subtotal:e,
discount:n,
shipping:i,
taxes:a,
total:s
};
}
}), Input = new Class({
Implements:[ Events, Options ],
options:{
validateOnBlur:!0,
required:!1,
pattern:null,
flashMessage:!0,
setErrorClass:!0,
appendErrors:!1,
capitalize:!1,
raiseError:!1
},
initialize:function(t, e) {
if (this.setOptions(e), this.checks = [], this.name = t.get("name"), !t || "input" !== t.get("tag")) throw new Error("Input needs to take an Input Element");
this.options.validateOnBlur && t.addEvent("blur", function() {
try {
this.validate();
} catch (t) {}
}.bind(this)), t.addEvent("input", function() {
this.onValidationPass();
}.bind(this)), t.addEvents({
change:function() {
this.fireEvent("change", this.getValue());
}.bind(this)
}), this.options.required && this.checks.push(this._checkRequired.bind(this)), this.options.capitalize && t.addEvent("input", function() {
t.set("value", t.get("value").toUpperCase());
}), this.el = t;
},
getValue:function() {
return this.el.get("value");
},
setValue:function(t) {
return this.el.set("value", t), this;
},
setPattern:function(t) {
return this.el.set("pattern", t), this.setOptions({
pattern:t
}), this;
},
setPlaceholder:function(t) {
return this.el.set("placeholder", t), this;
},
validate:function(t) {
this.checks.length > 0 ? async.auto(this.checks, function(e, n) {
t && t(e, n), e ? this.onValidationFailure(e, this.options.raiseError) :this.onValidationPass();
}.bind(this)) :t && t(null, {
success:!0
});
},
onValidationPass:function() {
return this.options.setErrorClass && this.el.removeClass("error"), this.options.appendErrors && this.el.getParent().getElements(".error-msg").destroy(), 
this;
},
onValidationFailure:function(t, e) {
if (this.options.setErrorClass && this.el.addClass("error"), this.options.appendErrors) {
var n = this.el.getParent().getElements(".error-msg");
n.length > 0 ? n.set("text", t) :new Element("span.error-msg", {
text:t
}).inject(this.el, "after");
}
if (this.options.flashMessage && new Flash(t, "errors"), e) throw new Error(t);
return this;
},
_checkRequired:function(t) {
var e = this.el.get("value");
e ? t(null, {
success:!0
}) :t("Missing Required Field");
},
enable:function() {
this.el.set("disabled", "");
},
disable:function() {
this.el.set("disabled", "disabled");
},
clear:function() {
this.setValue("");
}
}), RegexInput = new Class({
Extends:Input,
options:{
testFailureMsg:"Input Invalid"
},
initialize:function(t, e) {
if (!e || !e.regex) throw new Error("RegexInput needs RegExp for validating");
if (!(e.regex instanceof RegExp)) {
if ("string" != typeof e.regex) throw new Error("RegexInput needs RegExp for validating");
e.regex = new RegExp(e.regex);
}
this.setOptions(e), this.parent(t, this.options), this.checks.push(this._checkRegex.bind(this));
},
setRegex:function(t) {
if (!(t instanceof RegExp)) {
if ("string" != typeof t) throw new Error("RegexInput needs RegExp for validating");
t = new RegExp(t);
}
return this.setOptions({
regex:t
}), this;
},
_checkRegex:function(t) {
var e = this.el.get("value");
"" === e || this.options.regex.test(e) ? t(null, {
success:!0
}) :t(this.options.testFailureMsg);
}
}), EmailInput = new Class({
Extends:RegexInput,
options:{
regex:Harrys.VALIDATION.user.email,
required:!0,
showSuggestion:!0,
testFailureMsg:I18n.t("Inputs.EmailInput.error")
},
initialize:function(t, e) {
this.setOptions(e), this.parent(t, this.options), this.options.validateOnBlur && t.removeEvents("blur").addEvent("blur", function() {
this.options.showSuggestion ? this._mailcheck(function(t) {
t.suggestion || this.validate();
}.bind(this)) :this.validate();
}.bind(this));
},
_mailcheck:function(t) {
Kicksend.mailcheck.run({
email:this.getValue(),
suggested:function(e) {
this.el.addClass("suggestion");
var n = this.el.getParent().getElement(".suggestion-msg");
n || (n = new Element("span.suggestion-msg").inject(this.el, "after")), n.set("html", "Did you mean: <strong>" + e.full + "</strong>?"), 
n.getElement("strong").removeEvents("click").addEvent("click", function() {
this.setValue(e.full), this._mailcheck();
}.bind(this)), t && t({
suggestion:!0
});
}.bind(this),
empty:function() {
this.el.removeClass("suggestion"), this.el.getParent().getElements(".suggestion-msg").destroy(), 
t && t({
suggestion:!1
});
}.bind(this)
});
}
}), EngravingInput = new Class({
Extends:RegexInput,
options:{
regex:/^[A-Z0-9]{1,3}$/,
required:!0,
testFailureMsg:I18n.t("Inputs.EngravingInput.error")
},
initialize:function(t, e) {
this.setOptions(e), this.parent(t, this.options), this.options.lowercase && (this.options.regex = /^[a-z0-9]{1,3}$/), 
this.el.addEvent("input", function() {
this.options.lowercase ? this.el.set("value", this.el.get("value").toLowerCase()) :this.el.set("value", this.el.get("value").toUpperCase());
}.bind(this));
}
}), IntervalInput = new Class({
Extends:Input,
initialize:function(t, e) {
this.setOptions(e), this.parent(t, this.options), this.increase_el = this.el.getSiblings(".increase")[0], 
this.decrease_el = this.el.getSiblings(".decrease")[0], this.text_el = this.el.getSiblings(".text")[0], 
this.increase_el && this.increase_el.addEvent("click", function() {
var t = this.el.get("value").toInt();
6 > t && this.el.set("value", ++t), this.updateText(t), this.fireEvent("change", this.getValue());
}.bind(this)), this.decrease_el && this.decrease_el.addEvent("click", function() {
var t = this.el.get("value").toInt();
t > 1 && this.el.set("value", --t), this.updateText(t), this.fireEvent("change", this.getValue());
}.bind(this));
},
updateText:function(t) {
this.text_el.set("text", "Every " + t + " Month" + (1 !== t ? "s" :""));
},
getValue:function() {
return 30 * this.el.get("value").toInt();
}
}), NextSendInput = new Class({
Extends:Input,
initialize:function(t, e) {
this.setOptions(e), this.parent(t, this.options), this.increase_el = this.el.getSiblings(".increase")[0], 
this.decrease_el = this.el.getSiblings(".decrease")[0], this.text_el = this.el.getSiblings(".text")[0], 
this.increase_el && this.increase_el.addEvent("click", function(t) {
t && t.stop();
var e = moment(this.el.get("value"), "YYYY-MM-DD");
e.add("days", 1), this.el.set("value", e.format("YYYY-MM-DD")), this.updateText(e), 
this.fireEvent("change", this.getValue());
}.bind(this)), this.decrease_el && this.decrease_el.addEvent("click", function(t) {
t && t.stop();
var e = moment(this.el.get("value"), "YYYY-MM-DD"), n = moment().add("days", 2);
e.isSame(n, "days") || e.subtract("days", 1), this.el.set("value", e.format("YYYY-MM-DD")), 
this.updateText(e), this.fireEvent("change", this.getValue());
}.bind(this));
},
updateText:function(t) {
ns_format = Harrys.IS_MOBILE ? "MM/DD/YYYY" :"D MMMM, YYYY", this.text_el.set("text", t.format(ns_format));
},
getValue:function() {
return this.el.get("value");
}
}), PasswordInput = new Class({
Extends:Input,
options:{
required:!0
},
initialize:function(t, e) {
this.setOptions(e), this.parent(t, this.options), this.checks.push(this._lengthCheck.bind(this));
},
_lengthCheck:function(t) {
var e = this.el.get("value");
0 === e.length || e.length >= 8 ? t() :t(I18n.t("Inputs.PasswordInput.error"));
}
}), QuantityInput = new Class({
Extends:RegexInput,
options:{
regex:/^\d+$/
},
initialize:function(t, e) {
this.setOptions(e), this.parent(t, this.options), this.el.addEvents({
input:function() {
this.el.get("value").toInt() < 0 && this.el.set("value", 1);
}.bind(this),
blur:function() {
("" === this.el.get("value") || this.el.get("value").toInt() < 1) && this.el.set("value", 1);
}.bind(this),
keyup:function(t) {
var e;
t && "up" == t.key ? (e = this.get("value").toInt(), this.set("value", ++e), this.fireEvent("change", e)) :t && "down" == t.key && (e = this.get("value").toInt(), 
this.set("value", --e), this.fireEvent("change", e));
}
}), this.increase_el = this.el.getSiblings(".increase")[0], this.decrease_el = this.el.getSiblings(".decrease")[0], 
this.increase_el && this.increase_el.addEvent("click", function() {
var t = this.el.get("value").toInt();
this.el.set("value", ++t), this.fireEvent("change", this.getValue());
}.bind(this)), this.decrease_el && this.decrease_el.addEvent("click", function() {
var t = this.el.get("value").toInt();
t > 1 && this.el.set("value", --t), this.fireEvent("change", this.getValue());
}.bind(this));
}
}), CreditCardInput = new Class({
Extends:RegexInput,
options:{
regex:/[0-9-\s]+/,
required:!0,
testFailureMsg:I18n.t("Inputs.CreditCardInput.error")
},
initialize:function(t, e) {
this.setOptions(e), this.parent(t, this.options), this.checks.push(this._luhnCheck.bind(this));
},
_luhnCheck:function(t) {
var e = this.el.get("value"), n = 0, i = 0, r = !1;
e = e.replace(/\D/g, "");
for (var s = e.length - 1; s >= 0; s--) {
var a = e.charAt(s);
i = parseInt(a, 10), r && (i *= 2) > 9 && (i -= 9), n += i, r = !r;
}
n % 10 === 0 ? t(null, {
success:!0
}) :t(this.options.testFailureMsg);
}
}), Textarea = new Class({
Extends:Input,
initialize:function(t, e) {
if (this.setOptions(e), this.checks = [], !t || "textarea" !== t.get("tag")) throw new Error("Textarea needs to take an Textarea Element");
this.options.validateOnBlur && t.addEvent("blur", function() {
this.validate();
}.bind(this)), this.options.required && this.checks.push(this._checkRequired.bind(this)), 
this.options.capitalize && t.addEvent("input", function() {
t.set("value", t.get("value").toUpperCase());
}), this.el = t;
}
}), Select = new Class({
Extends:Input,
initialize:function(t, e) {
function n() {
try {
this.validate();
} catch (t) {}
}
if (this.setOptions(e), this.checks = [], !t || "select" !== t.get("tag")) throw new Error("Select needs to take an Select Element");
this.name = t.get("name"), t.addEvents({
change:function() {
this.fireEvent("change", this.getValue());
}.bind(this)
}), this.options.validateOnBlur && t.addEvents({
blur:n.bind(this),
change:n.bind(this)
}), this.options.required && this.checks.push(this._checkRequired.bind(this)), this.el = t;
},
replaceOptionEls:function(t, e) {
return this.el.empty(), this.addOptionEl(t, "", {
disabled:"disabled",
selected:"selected"
}), _.each(e, function(t, e) {
this.addOptionEl(t, e);
}.bind(this)), this;
},
updateOptionEls:function(t) {
return _.each(t, function(t) {
this.updateOptionEl(t.text, t.value, t.other_properties);
}.bind(this)), this;
},
getOptionEls:function() {
return this.el.getElements("option");
},
findOptionEl:function(t) {
return _.find(this.getOptionEls(), function(e) {
return e.get("value") === t;
});
},
addOptionEl:function(t, e, n) {
var i = _.extend({
text:t,
value:e
}, n);
return this.el.adopt(new Element("option", i)), this;
},
removeOptionEl:function(t) {
return this.findOptionEl(t).destroy(), this;
},
updateOptionEl:function(t, e, n) {
var i = this.findOptionEl(e), r = _.extend({
text:t,
value:e
}, n);
return i.set(r), this;
}
}), MonthSelect = new Class({
Extends:Select,
clear:function() {
var t = new Date();
this.setValue(t.getMonth() + 1);
}
}), YearSelect = new Class({
Extends:Select,
clear:function() {
var t = new Date();
this.setValue(t.getFullYear());
}
}), Checkbox = new Class({
Extends:Input,
options:{
required:!1
},
initialize:function(t, e) {
this.setOptions(e), this.checks = [], this.root_el = t, this.checkbox = this.root_el.getElement('input[type="checkbox"]'), 
this.checkbox.addEvent("change", function() {
this.fireEvent("change", this.checkbox.get("checked") ? this.checkbox.get("data-selected-value") :this.checkbox.get("data-unselected-value"));
}.bind(this)), this.el = t;
},
isChecked:function() {
return this.checkbox.match(":checked");
},
check:function() {
this.checkbox.set("checked", !0), this.checkbox.fireEvent("change");
},
uncheck:function() {
this.checkbox.set("checked", !1), this.checkbox.fireEvent("change");
},
getValue:function() {
return this.isChecked();
},
setValue:function(t) {
return t ? this.check() :this.uncheck(), this;
}
}), Toggle = new Class({
Implements:Events,
initialize:function(t) {
this.root_el = t, this.choices = this.root_el.getElements('input[type="radio"]'), 
_.each(this.choices, function(t) {
t.addEvent("change", function() {
t.get("checked") !== !0 || this.noEvent || this.fireEvent("change", t.get("value"));
}.bind(this));
}.bind(this));
},
getCheckedChoice:function() {
return this.root_el.getElement('input[type="radio"]:checked');
},
getValue:function() {
return this.getCheckedChoice().get("value");
},
setValue:function(t, e) {
e = e || {}, this.noEvent = e.noEvent;
var n = this.root_el.getElement('input[value="' + t + '"]');
return _.each(this.choices, function(t) {
t.set("checked", !1);
}), n.set("checked", !0), this.noEvent || this.fireEvent("change", n.get("value")), 
this.noEvent = !1, this;
},
enable:function() {
_.each(this.choices, function(t) {
t.set("disabled", "");
});
},
disable:function() {
_.each(this.choices, function(t) {
t.set("disabled", "disabled");
});
}
}), SlideToggle = new Class({
Extends:Toggle,
initialize:function(t) {
this.parent(t), this.holder_el = this.root_el.getElement(".holder"), this.holder_width = this.holder_el.getSize().x, 
this.arrow_next_el = this.root_el.getElement(".arrow.right"), this.arrow_prev_el = this.root_el.getElement(".arrow.left"), 
this.arrow_next_el.addEvent("click", function() {
var t = this.getNewElement("next");
this.changeSelection(t), this.slideTo(t);
}.bind(this)), this.arrow_prev_el.addEvent("click", function() {
var t = this.getNewElement("previous");
this.changeSelection(t), this.slideTo(t);
}.bind(this));
var e = this.getCheckedChoice().getParent();
this.changeSelection(e), this.slideTo(e);
},
getNewElement:function(t) {
var e = this.getCheckedChoice().getParent();
switch (t) {
case "next":
e = e.getNext() || e;
break;

case "previous":
e = e.getPrevious() || e;
}
return e;
},
changeSelection:function(t) {
var e = t.getElement('input[type="radio"]').get("value");
console.log(e), this.setValue(e);
},
slideTo:function(t) {
var e = t.getPosition(this.holder_el).x;
this.holder_el.setStyle("left", -e);
}
}), InputEventCompatibility = {
isCompatible:function() {
return "safari" === Browser.name && _.contains([ 1, 2, 3, 4, 5, 6 ], Browser.version) ? !1 :!0;
}
}, PhoneInput = new Class({
Extends:Input,
options:{
numberTooShortMsg:I18n.t("AddressForm.errors.phone_number_too_short"),
numberTooLongMsg:I18n.t("AddressForm.errors.phone_number_too_long")
},
initialize:function(t, e) {
this.setOptions(e), this.parent(t, this.options), this.checks.push(this._checkNumber.bind(this)), 
this.regexpTemplate = /^(\d{0,3})(\d{0,3})(\d{0,4})\d*/, this.outputTemplate = "($1) $2-$3", 
InputEventCompatibility.isCompatible() && this.el.addEvent("input", this._formatNumber.bind(this));
},
_checkNumber:function(t) {
var e = this.el.get("value");
e = e.replace(/(?:^\D*\+\D*1|\D)/g, ""), 10 === e.length ? t(null, {
success:!0
}) :e.length < 10 ? t(this.options.numberTooShortMsg) :e.length > 10 && t(this.options.numberTooLongMsg);
},
_formatNumber:function() {
var t = this.el.value;
if (t) {
t = t.replace(/(^\D*\+?\D*[01]+|\D)/g, "");
var e = t.replace(this.regexpTemplate, this.outputTemplate);
e = e.replace(/\D*$/, "");
var n = this.el.selectionStart, i = this.el.selectionEnd, r = e.length - this.el.value.length;
this.el.value = e, this.selectionStart = n + r, this.selectionEnd = i + r, this.el.selectionStart = this.selectionStart, 
this.el.selectionEnd = this.selectionEnd, setTimeout(function() {
this.el.setSelectionRange(this.selectionStart, this.selectionEnd);
}.bind(this), 0);
}
}
}), Button = new Class({
Implements:[ Events, Options ],
options:{},
initialize:function(t, e) {
this.el = t, this.setOptions(e), this.default_text = this.el.get("text"), this.el.addEvent("click", function(t) {
this.fireEvent("click", t);
}.bind(this));
},
setText:function(t) {
this.el.set("text", t);
},
get:function(t) {
return this.el.get(t);
},
enable:function(t) {
this.el.set("text", t || this.default_text).removeClass("disabled").set("disabled", "").removeEvents("click").addEvent("click", function() {
this.fireEvent("click");
}.bind(this));
},
disable:function(t) {
this.el.set("text", t || "Loading").addClass("disabled").set("disabled", "true").removeEvents("click");
}
}), Tooltip = new Class({
Implements:Events,
initialize:function(t) {
t.addEvent("mouseenter", function(e) {
this.buildTooltip(t, e);
}.bind(this)), t.addEvent("mouseleave", function() {
this.destroyTooltip();
}.bind(this)), t.get("data-tooltip-image") && Asset.image(t.get("data-tooltip-image"));
},
buildTooltip:function(t) {
if (this.el) {
if ("hidden" !== this.el.getStyle("visibility")) return;
this.el.empty();
} else this.el = new Element("div", {
"class":"tooltip"
});
if (t.get("data-tooltip-image")) {
var e = new Element("img", {
src:t.get("data-tooltip-image")
});
this.el.adopt(e);
} else if (t.get("data-tooltip-div")) {
var n = new Element("div", {
"class":t.get("data-tooltip-div")
});
this.el.adopt(n);
}
var i = new Element("span", {
html:t.get("data-tooltip-content")
});
this.el.adopt(i), t.adopt(this.el);
var r = t.getComputedSize(), s = this.el.getDimensions(), a = t.get("data-tooltip-orientation") && "reverse" == t.get("data-tooltip-orientation");
a ? this.el.setStyles({
top:r.height + 25 + "px",
right:-(s.width / 2) + r.width / 2 + "px"
}).fade("in") :this.el.setStyles({
bottom:r.height + 20 + "px",
right:-(s.width / 2) + r.width / 2 + "px"
}).fade("in");
},
destroyTooltip:function() {
this.el.fade("out");
}
}), AddressPage = new Class({
Implements:Events,
initialize:function(t, e, n, i) {
this.rootEl = t;
var r = t.getElement(e);
r && r.addEvent("change", function() {
var e = this.get("value"), r = t.getElement(n), s = $(i);
s.empty(), r.set("pattern", Harrys.COUNTRIES[e].zip_pattern), r.set("placeholder", Harrys.COUNTRIES[e].zip_label), 
new Element("option").inject(s), $each(Harrys.COUNTRIES[e].states, function(t) {
new Element("option").set("text", t).set("value", t).inject(s);
});
});
}
}), Flash = new Class({
Implements:Events,
initialize:function(t, e) {
this.flashesEl = $("flashes"), e = e || "notice", this.build(t, e), Harrys.IS_MOBILE || this.scroll();
},
build:function(t, e) {
var n = '<p id="flash_' + e + '" class="messages ' + e + '">' + t + "</p>", i = Elements.from(n);
this.flashesEl || (this.flashesEl = $("flashes")), this.flashesEl.adopt(i);
var r = this;
i.each(function(t) {
setTimeout(function() {
r.remove(t);
}, 5e3);
});
},
scroll:function() {
new Fx.Scroll(window).toElement(this.flashesEl);
},
remove:function(t) {
var e = new Fx.Tween(t, {
duration:500,
unit:"px",
link:"chain",
property:"height"
});
e.addEvent("complete", function() {
t.dispose();
}), e.start(0);
}
}), CacheableFlash = new Class({
initialize:function() {
var t = JSON.parse(unescape(Cookie.read("flash") || "{}"));
t || (t = {}), this.data = t, Cookie.write("flash", null, {
path:"/",
domain:""
});
},
writeDataTo:function(t, e) {
var n = "";
this.data[t] && (n = this.data[t].toString().replace(/\+/g, " "), new Flash(n, t), 
e && "function" == typeof e && e());
}
});

dataLayer = dataLayer || [];

var Harrys = Harrys || {};

window.addEvent("domready", function() {
Harrys.productsManager = new ProductsManager(Harrys.products), Harrys.cart = new Cart(), 
Harrys.analytics = new Analytics(), Harrys.user = new User(), Harrys.DISABLE_ANALYTICS || (Harrys.siftScience = new SiftScience(Harrys.user)), 
Harrys.order = new Order(), Harrys.cart.addEvents({
item_added:function(t) {
var e = {}, n = t.product.id;
t.customizations.interval && (e.is_auto_refill = !0), Harrys.analytics.trackCartAdd(n, t.quantity, e);
},
item_changed:function(t, e) {
var n = {}, i = t.product.id;
t.customizations.interval && (n.is_auto_refill = !0), Harrys.analytics.trackCartQuantityChange(i, e.change, n);
},
item_removed:function(t, e) {
var n = {}, i = t.product.id;
t.customizations.interval && (n.is_auto_refill = !0), Harrys.analytics.trackCartRemove(i, e.change, n);
}
});
var t = $$('[data-tooltip="true"]');
t.each(function(t) {
new Tooltip(t);
}), _.each($$("[data-impressionable]"), function(t) {
new Impressionable(t);
});
var e = JSON.parse(Cookie.read("flash")) || {};
e.error && e.error.match(/invalid.*email.*password/i) && Harrys.analytics.trackLogin("failure", "native"), 
e.notice && e.notice.match(/signed.*in.*successfully/i) && Harrys.analytics.trackLogin("success", "native"), 
e.notice && e.notice.match(/signed.*out.*successfully/i) && Harrys.analytics.trackLogout(), 
e.notice && e.notice.match(/reset.*your.*password/i) && Harrys.analytics.trackPasswordSubmit(), 
e.notice && e.notice.match(/account.*created.*successfully/i) && (document.referrer.match(/facebook\.com/) ? Harrys.analytics.trackCreateAccount("facebook") :Harrys.analytics.trackCreateAccount("email")), 
Harrys.CacheableFlash = new CacheableFlash(), Harrys.CacheableFlash.writeDataTo("error"), 
Harrys.CacheableFlash.writeDataTo("errors"), Harrys.CacheableFlash.writeDataTo("notice"), 
Harrys.CacheableFlash.writeDataTo("alert");
});

var Harrys = Harrys || {};

Harrys.I18n = Object.merge(Harrys.I18n, {
global:{
error:{
cannot_connect:"Unable to connect",
cannot_connect_try_again:"Unable to connect. Try again.",
connection:"Connection error, please try again.",
missing_required_short:"Missing Required Fields",
missing_required:"You are missing a required field.",
missing_required_multiple:"You're missing some required fields.",
required_fields:"An error occurred, it is likely you were missing some required field(s).",
other:"Uh oh, something went wrong.",
unknown:"An unknown error occurred",
inventory_unavailable:"The product: %{product} is out of stock"
},
stripe:{
error:{
international:"We currently do not accept international payment details. Please try again with U.S. or Canadian payment details. If the problem persists with U.S. or Canadian payment details, please try another card, or contact our Customer Experience team at 888-212-6855.",
avs:"The billing address you've entered does not match the billing address your bank has on file. Double check that you've entered that information exactly as it appears on your credit card statement. If you've recently moved, you might also try your previous billing address.",
declined:"Your card was declined. Double check that the account has sufficient funds and try again. If the problem persists, contact your bank to rectify the issue.",
other:"Oops! Something seems to be wrong. Please wait 5 minutes and try your order again. %{message}"
}
}
},
init:{
cart:{
item_removed:"%{product} removed from cart",
item_changed:"%{product} changed"
},
unsubscribed:"%{unsub} has been unsubscribed."
},
DiscountInt:{
initialize:{
success:"Discount Applied.",
removed:"Discount removed.",
error:"Your Coupon Code was entered incorrectly."
},
check:{
error:"Code is blank"
}
},
CartInit:{
added_to_cart:"%{product} added to cart"
},
Validation:{
addressCheck:{
alternate_address:"Alternate Address Found"
},
expirationCheck:{
error:"Credit card expired"
},
luhnCheck:{
error:"Invalid Credit Card"
},
emailCheck:{
error:"Invalid Email Address"
},
passwordCheck:{
error:{
password_confirm_mismatch:"Password and confirmation do not match",
password_length:"Password must be 8 characters or more"
}
},
zipCodeCheck:{
error:"%{zip_label} invalid"
}
},
PlanInt:{
changePlan:{
success:"Shaving Plan Changed"
},
cancelPlan:{
success:"Shaving Plan Ended"
}
},
EmailInt:{
checkEmail:{
error:'"%{email}" is not a valid email address.'
},
getMessage:{
error:"Must include a message."
},
send:{
success:"Emails sent successfully."
}
},
CheckoutOrder:{
submit:{
fail:"Server error submitting checkout"
},
handleStatus:{
fail:"Unknown checkout status"
},
timedOut:{
fail:"Timed out in checkout queue"
}
},
CheckoutInit:{
warn:"You're about to leave the checkout page, losing all of your progress (shipping, billing, etc.).\n\nIf you'd like to make changes to a previous checkout section, please use the breadcrumbs at the top of the page."
},
AddressForm:{
_checkProvincePostalCode:{
ca_postal_code_mismatch:"Postal Code Does Not Match",
ca_province_mismatch:"Province Does Not Match",
ca_postal_code_province_mismatch:"Province and Postal Code Do Not Match"
},
errors:{
phone_number_too_short:"The Phone Number is too short",
phone_number_too_long:"The Phone Number is too long"
}
},
Discount:{
check:{
error:"Invalid Coupon Code"
}
},
Inputs:{
EmailInput:{
error:"Not Valid Email Address"
},
PasswordInput:{
error:"Minimum 8 Characters"
},
EngravingInput:{
error:"Engraving length must be 1-3. Only A-Z and 0-9 allowed."
},
CreditCardInput:{
error:"Credit Card Number Not Valid"
}
},
Modals:{
AddressModal:{
setupSuggestion:"We couldn't find that address, is this one correct?",
setupNotFound:"We couldn't find that address.<br>Please fix any errors, or ignore this warning."
}
},
WaitlistModal:{
send:{
success:"Successfully added to waitlist.",
error:"We encountered an error, please try again.",
fail:"Sorry, we couldn't connect. Please try again."
}
},
PaymentForm:{
_checkExpirationDate:{
error:"Invalid Expiration Date"
}
},
redeem:{
promoApplied:"Your promo code has been successfully applied to your order"
}
}), QuickTap.prototype = {
handleEvent:function(t) {
switch (t.type) {
case "touchstart":
this.onTouchStart(t);
break;

case "touchmove":
this.onTouchMove(t);
break;

case "touchend":
this.onTouchEnd(t);
}
},
onTouchStart:function(t) {
this.start = {
pageX:t.touches[0].pageX,
pageY:t.touches[0].pageY,
time:Number(new Date())
}, this.isScrolling = void 0, this.deltaX = 0, this.element.addEventListener("touchmove", this, !1), 
this.element.addEventListener("touchend", this, !1);
},
onTouchMove:function(t) {
t.touches.length > 1 || t.scale && 1 !== t.scale || (this.deltaX = t.touches[0].pageX - this.start.pageX, 
"undefined" == typeof this.isScrolling && (this.isScrolling = !!(this.isScrolling || Math.abs(this.deltaX) < Math.abs(t.touches[0].pageY - this.start.pageY))));
},
onTouchEnd:function(t) {
if (t.preventDefault(), this.element.removeEventListener("touchmove", this, !1), 
this.element.removeEventListener("touchend", this, !1), !this.isScrolling) {
var e = document.createEvent("MouseEvents");
e.initEvent("click", !0, !0), this.element.dispatchEvent(e);
}
}
}, function() {
var t, e, n = "swipe", i = n + ":distance", r = n + ":cancelVertical", s = 50, a = {}, o = function() {
e = !1;
}, u = {
touchstart:function(t) {
if (!(t.touches.length > 1)) {
var n = t.touches[0];
e = !0, a = {
x:n.pageX,
y:n.pageY
}, t.preventDefault();
}
},
touchmove:function(o) {
if (!t && e) {
var u = o.changedTouches[0], l = {
x:u.pageX,
y:u.pageY
};
if (this.retrieve(r) && Math.abs(a.y - l.y) > 10) return e = !1, void 0;
var c = this.retrieve(i, s), d = l.x - a.x, h = -c > d, m = d > c;
(m || h) && (o.preventDefault(), e = !1, o.direction = h ? "left" :"right", o.start = a, 
o.end = l, this.fireEvent(n, o));
}
},
touchend:o,
touchcancel:o
};
Element.defineCustomEvent(n, {
onSetup:function() {
this.addEvents(u);
},
onTeardown:function() {
this.removeEvents(u);
},
onEnable:function() {
t = !1;
},
onDisable:function() {
t = !0, o();
}
});
}(), /*! Hammer.JS - v2.0.4 - 2014-09-28
 * http://hammerjs.github.io/
 *
 * Copyright (c) 2014 Jorik Tangelder;
 * Licensed under the MIT license */
!function(t, e, n, i) {
"use strict";
function r(t, e, n) {
return setTimeout(c(t, n), e);
}
function s(t, e, n) {
return Array.isArray(t) ? (a(t, n[e], n), !0) :!1;
}
function a(t, e, n) {
var r;
if (t) if (t.forEach) t.forEach(e, n); else if (t.length !== i) for (r = 0; r < t.length; ) e.call(n, t[r], r, t), 
r++; else for (r in t) t.hasOwnProperty(r) && e.call(n, t[r], r, t);
}
function o(t, e, n) {
for (var r = Object.keys(e), s = 0; s < r.length; ) (!n || n && t[r[s]] === i) && (t[r[s]] = e[r[s]]), 
s++;
return t;
}
function u(t, e) {
return o(t, e, !0);
}
function l(t, e, n) {
var i, r = e.prototype;
i = t.prototype = Object.create(r), i.constructor = t, i._super = r, n && o(i, n);
}
function c(t, e) {
return function() {
return t.apply(e, arguments);
};
}
function d(t, e) {
return typeof t == ce ? t.apply(e ? e[0] || i :i, e) :t;
}
function h(t, e) {
return t === i ? e :t;
}
function m(t, e, n) {
a(g(e), function(e) {
t.addEventListener(e, n, !1);
});
}
function f(t, e, n) {
a(g(e), function(e) {
t.removeEventListener(e, n, !1);
});
}
function p(t, e) {
for (;t; ) {
if (t == e) return !0;
t = t.parentNode;
}
return !1;
}
function _(t, e) {
return t.indexOf(e) > -1;
}
function g(t) {
return t.trim().split(/\s+/g);
}
function y(t, e, n) {
if (t.indexOf && !n) return t.indexOf(e);
for (var i = 0; i < t.length; ) {
if (n && t[i][n] == e || !n && t[i] === e) return i;
i++;
}
return -1;
}
function v(t) {
return Array.prototype.slice.call(t, 0);
}
function M(t, e, n) {
for (var i = [], r = [], s = 0; s < t.length; ) {
var a = e ? t[s][e] :t[s];
y(r, a) < 0 && i.push(t[s]), r[s] = a, s++;
}
return n && (i = e ? i.sort(function(t, n) {
return t[e] > n[e];
}) :i.sort()), i;
}
function b(t, e) {
for (var n, r, s = e[0].toUpperCase() + e.slice(1), a = 0; a < ue.length; ) {
if (n = ue[a], r = n ? n + s :e, r in t) return r;
a++;
}
return i;
}
function L() {
return fe++;
}
function w(t) {
var e = t.ownerDocument;
return e.defaultView || e.parentWindow;
}
function k(t, e) {
var n = this;
this.manager = t, this.callback = e, this.element = t.element, this.target = t.options.inputTarget, 
this.domHandler = function(e) {
d(t.options.enable, [ t ]) && n.handler(e);
}, this.init();
}
function Y(t) {
var e, n = t.options.inputClass;
return new (e = n ? n :ge ? H :ye ? R :_e ? U :z)(t, T);
}
function T(t, e, n) {
var i = n.pointers.length, r = n.changedPointers.length, s = e & ke && i - r === 0, a = e & (Te | De) && i - r === 0;
n.isFirst = !!s, n.isFinal = !!a, s && (t.session = {}), n.eventType = e, D(t, n), 
t.emit("hammer.input", n), t.recognize(n), t.session.prevInput = n;
}
function D(t, e) {
var n = t.session, i = e.pointers, r = i.length;
n.firstInput || (n.firstInput = x(e)), r > 1 && !n.firstMultiple ? n.firstMultiple = x(e) :1 === r && (n.firstMultiple = !1);
var s = n.firstInput, a = n.firstMultiple, o = a ? a.center :s.center, u = e.center = C(i);
e.timeStamp = me(), e.deltaTime = e.timeStamp - s.timeStamp, e.angle = I(o, u), 
e.distance = j(o, u), S(n, e), e.offsetDirection = A(e.deltaX, e.deltaY), e.scale = a ? N(a.pointers, i) :1, 
e.rotation = a ? F(a.pointers, i) :0, E(n, e);
var l = t.element;
p(e.srcEvent.target, l) && (l = e.srcEvent.target), e.target = l;
}
function S(t, e) {
var n = e.center, i = t.offsetDelta || {}, r = t.prevDelta || {}, s = t.prevInput || {};
(e.eventType === ke || s.eventType === Te) && (r = t.prevDelta = {
x:s.deltaX || 0,
y:s.deltaY || 0
}, i = t.offsetDelta = {
x:n.x,
y:n.y
}), e.deltaX = r.x + (n.x - i.x), e.deltaY = r.y + (n.y - i.y);
}
function E(t, e) {
var n, r, s, a, o = t.lastInterval || e, u = e.timeStamp - o.timeStamp;
if (e.eventType != De && (u > we || o.velocity === i)) {
var l = o.deltaX - e.deltaX, c = o.deltaY - e.deltaY, d = O(u, l, c);
r = d.x, s = d.y, n = he(d.x) > he(d.y) ? d.x :d.y, a = A(l, c), t.lastInterval = e;
} else n = o.velocity, r = o.velocityX, s = o.velocityY, a = o.direction;
e.velocity = n, e.velocityX = r, e.velocityY = s, e.direction = a;
}
function x(t) {
for (var e = [], n = 0; n < t.pointers.length; ) e[n] = {
clientX:de(t.pointers[n].clientX),
clientY:de(t.pointers[n].clientY)
}, n++;
return {
timeStamp:me(),
pointers:e,
center:C(e),
deltaX:t.deltaX,
deltaY:t.deltaY
};
}
function C(t) {
var e = t.length;
if (1 === e) return {
x:de(t[0].clientX),
y:de(t[0].clientY)
};
for (var n = 0, i = 0, r = 0; e > r; ) n += t[r].clientX, i += t[r].clientY, r++;
return {
x:de(n / e),
y:de(i / e)
};
}
function O(t, e, n) {
return {
x:e / t || 0,
y:n / t || 0
};
}
function A(t, e) {
return t === e ? Se :he(t) >= he(e) ? t > 0 ? Ee :xe :e > 0 ? Ce :Oe;
}
function j(t, e, n) {
n || (n = Fe);
var i = e[n[0]] - t[n[0]], r = e[n[1]] - t[n[1]];
return Math.sqrt(i * i + r * r);
}
function I(t, e, n) {
n || (n = Fe);
var i = e[n[0]] - t[n[0]], r = e[n[1]] - t[n[1]];
return 180 * Math.atan2(r, i) / Math.PI;
}
function F(t, e) {
return I(e[1], e[0], Ne) - I(t[1], t[0], Ne);
}
function N(t, e) {
return j(e[0], e[1], Ne) / j(t[0], t[1], Ne);
}
function z() {
this.evEl = He, this.evWin = Pe, this.allow = !0, this.pressed = !1, k.apply(this, arguments);
}
function H() {
this.evEl = $e, this.evWin = Ue, k.apply(this, arguments), this.store = this.manager.session.pointerEvents = [];
}
function P() {
this.evTarget = Be, this.evWin = Je, this.started = !1, k.apply(this, arguments);
}
function W(t, e) {
var n = v(t.touches), i = v(t.changedTouches);
return e & (Te | De) && (n = M(n.concat(i), "identifier", !0)), [ n, i ];
}
function R() {
this.evTarget = Ve, this.targetIds = {}, k.apply(this, arguments);
}
function $(t, e) {
var n = v(t.touches), i = this.targetIds;
if (e & (ke | Ye) && 1 === n.length) return i[n[0].identifier] = !0, [ n, n ];
var r, s, a = v(t.changedTouches), o = [], u = this.target;
if (s = n.filter(function(t) {
return p(t.target, u);
}), e === ke) for (r = 0; r < s.length; ) i[s[r].identifier] = !0, r++;
for (r = 0; r < a.length; ) i[a[r].identifier] && o.push(a[r]), e & (Te | De) && delete i[a[r].identifier], 
r++;
return o.length ? [ M(s.concat(o), "identifier", !0), o ] :void 0;
}
function U() {
k.apply(this, arguments);
var t = c(this.handler, this);
this.touch = new R(this.manager, t), this.mouse = new z(this.manager, t);
}
function q(t, e) {
this.manager = t, this.set(e);
}
function B(t) {
if (_(t, en)) return en;
var e = _(t, nn), n = _(t, rn);
return e && n ? nn + " " + rn :e || n ? e ? nn :rn :_(t, tn) ? tn :Ze;
}
function J(t) {
this.id = L(), this.manager = null, this.options = u(t || {}, this.defaults), this.options.enable = h(this.options.enable, !0), 
this.state = sn, this.simultaneous = {}, this.requireFail = [];
}
function G(t) {
return t & cn ? "cancel" :t & un ? "end" :t & on ? "move" :t & an ? "start" :"";
}
function V(t) {
return t == Oe ? "down" :t == Ce ? "up" :t == Ee ? "left" :t == xe ? "right" :"";
}
function X(t, e) {
var n = e.manager;
return n ? n.get(t) :t;
}
function K() {
J.apply(this, arguments);
}
function Q() {
K.apply(this, arguments), this.pX = null, this.pY = null;
}
function Z() {
K.apply(this, arguments);
}
function te() {
J.apply(this, arguments), this._timer = null, this._input = null;
}
function ee() {
K.apply(this, arguments);
}
function ne() {
K.apply(this, arguments);
}
function ie() {
J.apply(this, arguments), this.pTime = !1, this.pCenter = !1, this._timer = null, 
this._input = null, this.count = 0;
}
function re(t, e) {
return e = e || {}, e.recognizers = h(e.recognizers, re.defaults.preset), new se(t, e);
}
function se(t, e) {
e = e || {}, this.options = u(e, re.defaults), this.options.inputTarget = this.options.inputTarget || t, 
this.handlers = {}, this.session = {}, this.recognizers = [], this.element = t, 
this.input = Y(this), this.touchAction = new q(this, this.options.touchAction), 
ae(this, !0), a(e.recognizers, function(t) {
var e = this.add(new t[0](t[1]));
t[2] && e.recognizeWith(t[2]), t[3] && e.requireFailure(t[3]);
}, this);
}
function ae(t, e) {
var n = t.element;
a(t.options.cssProps, function(t, i) {
n.style[b(n.style, i)] = e ? t :"";
});
}
function oe(t, n) {
var i = e.createEvent("Event");
i.initEvent(t, !0, !0), i.gesture = n, n.target.dispatchEvent(i);
}
var ue = [ "", "webkit", "moz", "MS", "ms", "o" ], le = e.createElement("div"), ce = "function", de = Math.round, he = Math.abs, me = Date.now, fe = 1, pe = /mobile|tablet|ip(ad|hone|od)|android/i, _e = "ontouchstart" in t, ge = b(t, "PointerEvent") !== i, ye = _e && pe.test(navigator.userAgent), ve = "touch", Me = "pen", be = "mouse", Le = "kinect", we = 25, ke = 1, Ye = 2, Te = 4, De = 8, Se = 1, Ee = 2, xe = 4, Ce = 8, Oe = 16, Ae = Ee | xe, je = Ce | Oe, Ie = Ae | je, Fe = [ "x", "y" ], Ne = [ "clientX", "clientY" ];
k.prototype = {
handler:function() {},
init:function() {
this.evEl && m(this.element, this.evEl, this.domHandler), this.evTarget && m(this.target, this.evTarget, this.domHandler), 
this.evWin && m(w(this.element), this.evWin, this.domHandler);
},
destroy:function() {
this.evEl && f(this.element, this.evEl, this.domHandler), this.evTarget && f(this.target, this.evTarget, this.domHandler), 
this.evWin && f(w(this.element), this.evWin, this.domHandler);
}
};
var ze = {
mousedown:ke,
mousemove:Ye,
mouseup:Te
}, He = "mousedown", Pe = "mousemove mouseup";
l(z, k, {
handler:function(t) {
var e = ze[t.type];
e & ke && 0 === t.button && (this.pressed = !0), e & Ye && 1 !== t.which && (e = Te), 
this.pressed && this.allow && (e & Te && (this.pressed = !1), this.callback(this.manager, e, {
pointers:[ t ],
changedPointers:[ t ],
pointerType:be,
srcEvent:t
}));
}
});
var We = {
pointerdown:ke,
pointermove:Ye,
pointerup:Te,
pointercancel:De,
pointerout:De
}, Re = {
2:ve,
3:Me,
4:be,
5:Le
}, $e = "pointerdown", Ue = "pointermove pointerup pointercancel";
t.MSPointerEvent && ($e = "MSPointerDown", Ue = "MSPointerMove MSPointerUp MSPointerCancel"), 
l(H, k, {
handler:function(t) {
var e = this.store, n = !1, i = t.type.toLowerCase().replace("ms", ""), r = We[i], s = Re[t.pointerType] || t.pointerType, a = s == ve, o = y(e, t.pointerId, "pointerId");
r & ke && (0 === t.button || a) ? 0 > o && (e.push(t), o = e.length - 1) :r & (Te | De) && (n = !0), 
0 > o || (e[o] = t, this.callback(this.manager, r, {
pointers:e,
changedPointers:[ t ],
pointerType:s,
srcEvent:t
}), n && e.splice(o, 1));
}
});
var qe = {
touchstart:ke,
touchmove:Ye,
touchend:Te,
touchcancel:De
}, Be = "touchstart", Je = "touchstart touchmove touchend touchcancel";
l(P, k, {
handler:function(t) {
var e = qe[t.type];
if (e === ke && (this.started = !0), this.started) {
var n = W.call(this, t, e);
e & (Te | De) && n[0].length - n[1].length === 0 && (this.started = !1), this.callback(this.manager, e, {
pointers:n[0],
changedPointers:n[1],
pointerType:ve,
srcEvent:t
});
}
}
});
var Ge = {
touchstart:ke,
touchmove:Ye,
touchend:Te,
touchcancel:De
}, Ve = "touchstart touchmove touchend touchcancel";
l(R, k, {
handler:function(t) {
var e = Ge[t.type], n = $.call(this, t, e);
n && this.callback(this.manager, e, {
pointers:n[0],
changedPointers:n[1],
pointerType:ve,
srcEvent:t
});
}
}), l(U, k, {
handler:function(t, e, n) {
var i = n.pointerType == ve, r = n.pointerType == be;
if (i) this.mouse.allow = !1; else if (r && !this.mouse.allow) return;
e & (Te | De) && (this.mouse.allow = !0), this.callback(t, e, n);
},
destroy:function() {
this.touch.destroy(), this.mouse.destroy();
}
});
var Xe = b(le.style, "touchAction"), Ke = Xe !== i, Qe = "compute", Ze = "auto", tn = "manipulation", en = "none", nn = "pan-x", rn = "pan-y";
q.prototype = {
set:function(t) {
t == Qe && (t = this.compute()), Ke && (this.manager.element.style[Xe] = t), this.actions = t.toLowerCase().trim();
},
update:function() {
this.set(this.manager.options.touchAction);
},
compute:function() {
var t = [];
return a(this.manager.recognizers, function(e) {
d(e.options.enable, [ e ]) && (t = t.concat(e.getTouchAction()));
}), B(t.join(" "));
},
preventDefaults:function(t) {
if (!Ke) {
var e = t.srcEvent, n = t.offsetDirection;
if (this.manager.session.prevented) return void e.preventDefault();
var i = this.actions, r = _(i, en), s = _(i, rn), a = _(i, nn);
return r || s && n & Ae || a && n & je ? this.preventSrc(e) :void 0;
}
},
preventSrc:function(t) {
this.manager.session.prevented = !0, t.preventDefault();
}
};
var sn = 1, an = 2, on = 4, un = 8, ln = un, cn = 16, dn = 32;
J.prototype = {
defaults:{},
set:function(t) {
return o(this.options, t), this.manager && this.manager.touchAction.update(), this;
},
recognizeWith:function(t) {
if (s(t, "recognizeWith", this)) return this;
var e = this.simultaneous;
return t = X(t, this), e[t.id] || (e[t.id] = t, t.recognizeWith(this)), this;
},
dropRecognizeWith:function(t) {
return s(t, "dropRecognizeWith", this) ? this :(t = X(t, this), delete this.simultaneous[t.id], 
this);
},
requireFailure:function(t) {
if (s(t, "requireFailure", this)) return this;
var e = this.requireFail;
return t = X(t, this), -1 === y(e, t) && (e.push(t), t.requireFailure(this)), this;
},
dropRequireFailure:function(t) {
if (s(t, "dropRequireFailure", this)) return this;
t = X(t, this);
var e = y(this.requireFail, t);
return e > -1 && this.requireFail.splice(e, 1), this;
},
hasRequireFailures:function() {
return this.requireFail.length > 0;
},
canRecognizeWith:function(t) {
return !!this.simultaneous[t.id];
},
emit:function(t) {
function e(e) {
n.manager.emit(n.options.event + (e ? G(i) :""), t);
}
var n = this, i = this.state;
un > i && e(!0), e(), i >= un && e(!0);
},
tryEmit:function(t) {
return this.canEmit() ? this.emit(t) :void (this.state = dn);
},
canEmit:function() {
for (var t = 0; t < this.requireFail.length; ) {
if (!(this.requireFail[t].state & (dn | sn))) return !1;
t++;
}
return !0;
},
recognize:function(t) {
var e = o({}, t);
return d(this.options.enable, [ this, e ]) ? (this.state & (ln | cn | dn) && (this.state = sn), 
this.state = this.process(e), void (this.state & (an | on | un | cn) && this.tryEmit(e))) :(this.reset(), 
void (this.state = dn));
},
process:function() {},
getTouchAction:function() {},
reset:function() {}
}, l(K, J, {
defaults:{
pointers:1
},
attrTest:function(t) {
var e = this.options.pointers;
return 0 === e || t.pointers.length === e;
},
process:function(t) {
var e = this.state, n = t.eventType, i = e & (an | on), r = this.attrTest(t);
return i && (n & De || !r) ? e | cn :i || r ? n & Te ? e | un :e & an ? e | on :an :dn;
}
}), l(Q, K, {
defaults:{
event:"pan",
threshold:10,
pointers:1,
direction:Ie
},
getTouchAction:function() {
var t = this.options.direction, e = [];
return t & Ae && e.push(rn), t & je && e.push(nn), e;
},
directionTest:function(t) {
var e = this.options, n = !0, i = t.distance, r = t.direction, s = t.deltaX, a = t.deltaY;
return r & e.direction || (e.direction & Ae ? (r = 0 === s ? Se :0 > s ? Ee :xe, 
n = s != this.pX, i = Math.abs(t.deltaX)) :(r = 0 === a ? Se :0 > a ? Ce :Oe, n = a != this.pY, 
i = Math.abs(t.deltaY))), t.direction = r, n && i > e.threshold && r & e.direction;
},
attrTest:function(t) {
return K.prototype.attrTest.call(this, t) && (this.state & an || !(this.state & an) && this.directionTest(t));
},
emit:function(t) {
this.pX = t.deltaX, this.pY = t.deltaY;
var e = V(t.direction);
e && this.manager.emit(this.options.event + e, t), this._super.emit.call(this, t);
}
}), l(Z, K, {
defaults:{
event:"pinch",
threshold:0,
pointers:2
},
getTouchAction:function() {
return [ en ];
},
attrTest:function(t) {
return this._super.attrTest.call(this, t) && (Math.abs(t.scale - 1) > this.options.threshold || this.state & an);
},
emit:function(t) {
if (this._super.emit.call(this, t), 1 !== t.scale) {
var e = t.scale < 1 ? "in" :"out";
this.manager.emit(this.options.event + e, t);
}
}
}), l(te, J, {
defaults:{
event:"press",
pointers:1,
time:500,
threshold:5
},
getTouchAction:function() {
return [ Ze ];
},
process:function(t) {
var e = this.options, n = t.pointers.length === e.pointers, i = t.distance < e.threshold, s = t.deltaTime > e.time;
if (this._input = t, !i || !n || t.eventType & (Te | De) && !s) this.reset(); else if (t.eventType & ke) this.reset(), 
this._timer = r(function() {
this.state = ln, this.tryEmit();
}, e.time, this); else if (t.eventType & Te) return ln;
return dn;
},
reset:function() {
clearTimeout(this._timer);
},
emit:function(t) {
this.state === ln && (t && t.eventType & Te ? this.manager.emit(this.options.event + "up", t) :(this._input.timeStamp = me(), 
this.manager.emit(this.options.event, this._input)));
}
}), l(ee, K, {
defaults:{
event:"rotate",
threshold:0,
pointers:2
},
getTouchAction:function() {
return [ en ];
},
attrTest:function(t) {
return this._super.attrTest.call(this, t) && (Math.abs(t.rotation) > this.options.threshold || this.state & an);
}
}), l(ne, K, {
defaults:{
event:"swipe",
threshold:10,
velocity:.65,
direction:Ae | je,
pointers:1
},
getTouchAction:function() {
return Q.prototype.getTouchAction.call(this);
},
attrTest:function(t) {
var e, n = this.options.direction;
return n & (Ae | je) ? e = t.velocity :n & Ae ? e = t.velocityX :n & je && (e = t.velocityY), 
this._super.attrTest.call(this, t) && n & t.direction && t.distance > this.options.threshold && he(e) > this.options.velocity && t.eventType & Te;
},
emit:function(t) {
var e = V(t.direction);
e && this.manager.emit(this.options.event + e, t), this.manager.emit(this.options.event, t);
}
}), l(ie, J, {
defaults:{
event:"tap",
pointers:1,
taps:1,
interval:300,
time:250,
threshold:2,
posThreshold:10
},
getTouchAction:function() {
return [ tn ];
},
process:function(t) {
var e = this.options, n = t.pointers.length === e.pointers, i = t.distance < e.threshold, s = t.deltaTime < e.time;
if (this.reset(), t.eventType & ke && 0 === this.count) return this.failTimeout();
if (i && s && n) {
if (t.eventType != Te) return this.failTimeout();
var a = this.pTime ? t.timeStamp - this.pTime < e.interval :!0, o = !this.pCenter || j(this.pCenter, t.center) < e.posThreshold;
this.pTime = t.timeStamp, this.pCenter = t.center, o && a ? this.count += 1 :this.count = 1, 
this._input = t;
var u = this.count % e.taps;
if (0 === u) return this.hasRequireFailures() ? (this._timer = r(function() {
this.state = ln, this.tryEmit();
}, e.interval, this), an) :ln;
}
return dn;
},
failTimeout:function() {
return this._timer = r(function() {
this.state = dn;
}, this.options.interval, this), dn;
},
reset:function() {
clearTimeout(this._timer);
},
emit:function() {
this.state == ln && (this._input.tapCount = this.count, this.manager.emit(this.options.event, this._input));
}
}), re.VERSION = "2.0.4", re.defaults = {
domEvents:!1,
touchAction:Qe,
enable:!0,
inputTarget:null,
inputClass:null,
preset:[ [ ee, {
enable:!1
} ], [ Z, {
enable:!1
}, [ "rotate" ] ], [ ne, {
direction:Ae
} ], [ Q, {
direction:Ae
}, [ "swipe" ] ], [ ie ], [ ie, {
event:"doubletap",
taps:2
}, [ "tap" ] ], [ te ] ],
cssProps:{
userSelect:"none",
touchSelect:"none",
touchCallout:"none",
contentZooming:"none",
userDrag:"none",
tapHighlightColor:"rgba(0,0,0,0)"
}
};
var hn = 1, mn = 2;
se.prototype = {
set:function(t) {
return o(this.options, t), t.touchAction && this.touchAction.update(), t.inputTarget && (this.input.destroy(), 
this.input.target = t.inputTarget, this.input.init()), this;
},
stop:function(t) {
this.session.stopped = t ? mn :hn;
},
recognize:function(t) {
var e = this.session;
if (!e.stopped) {
this.touchAction.preventDefaults(t);
var n, i = this.recognizers, r = e.curRecognizer;
(!r || r && r.state & ln) && (r = e.curRecognizer = null);
for (var s = 0; s < i.length; ) n = i[s], e.stopped === mn || r && n != r && !n.canRecognizeWith(r) ? n.reset() :n.recognize(t), 
!r && n.state & (an | on | un) && (r = e.curRecognizer = n), s++;
}
},
get:function(t) {
if (t instanceof J) return t;
for (var e = this.recognizers, n = 0; n < e.length; n++) if (e[n].options.event == t) return e[n];
return null;
},
add:function(t) {
if (s(t, "add", this)) return this;
var e = this.get(t.options.event);
return e && this.remove(e), this.recognizers.push(t), t.manager = this, this.touchAction.update(), 
t;
},
remove:function(t) {
if (s(t, "remove", this)) return this;
var e = this.recognizers;
return t = this.get(t), e.splice(y(e, t), 1), this.touchAction.update(), this;
},
on:function(t, e) {
var n = this.handlers;
return a(g(t), function(t) {
n[t] = n[t] || [], n[t].push(e);
}), this;
},
off:function(t, e) {
var n = this.handlers;
return a(g(t), function(t) {
e ? n[t].splice(y(n[t], e), 1) :delete n[t];
}), this;
},
emit:function(t, e) {
this.options.domEvents && oe(t, e);
var n = this.handlers[t] && this.handlers[t].slice();
if (n && n.length) {
e.type = t, e.preventDefault = function() {
e.srcEvent.preventDefault();
};
for (var i = 0; i < n.length; ) n[i](e), i++;
}
},
destroy:function() {
this.element && ae(this, !1), this.handlers = {}, this.session = {}, this.input.destroy(), 
this.element = null;
}
}, o(re, {
INPUT_START:ke,
INPUT_MOVE:Ye,
INPUT_END:Te,
INPUT_CANCEL:De,
STATE_POSSIBLE:sn,
STATE_BEGAN:an,
STATE_CHANGED:on,
STATE_ENDED:un,
STATE_RECOGNIZED:ln,
STATE_CANCELLED:cn,
STATE_FAILED:dn,
DIRECTION_NONE:Se,
DIRECTION_LEFT:Ee,
DIRECTION_RIGHT:xe,
DIRECTION_UP:Ce,
DIRECTION_DOWN:Oe,
DIRECTION_HORIZONTAL:Ae,
DIRECTION_VERTICAL:je,
DIRECTION_ALL:Ie,
Manager:se,
Input:k,
TouchAction:q,
TouchInput:R,
MouseInput:z,
PointerEventInput:H,
TouchMouseInput:U,
SingleTouchInput:P,
Recognizer:J,
AttrRecognizer:K,
Tap:ie,
Pan:Q,
Swipe:ne,
Pinch:Z,
Rotate:ee,
Press:te,
on:m,
off:f,
each:a,
merge:u,
extend:o,
inherit:l,
bindFn:c,
prefixed:b
}), typeof define == ce && define.amd ? define(function() {
return re;
}) :"undefined" != typeof module && module.exports ? module.exports = re :t[n] = re;
}(window, document, "Hammer");

var Validation = new Class({
Implements:Events,
initialize:function(t, e) {
switch (this.type = e, this.data = t, this.type) {
case "address":
this.valid = this.addressCheck();
break;

case "credit card":
this.valid = this.luhnCheck();
break;

case "expiration":
this.valid = this.expirationCheck();
break;

case "luhn":
this.valid = this.luhnCheck();
break;

case "email":
this.valid = this.emailCheck();
break;

case "password":
this.valid = this.passwordCheck();
break;

case "zip code":
this.valid = this.zipCodeCheck();
break;

case "po box":
this.valid = this.poBoxCheck();
}
return this.valid;
},
addressCheck:function() {
new SignedRequest.JSON({
url:"/api/ShippingAddressService/verifyAddress",
method:"get",
data:this.data,
onSuccess:function(t) {
t.success || (t.errors = [ t.data.errors ]), t.data.returned_address && (t.errors = [ I18n.t("Validation.addressCheck.alternate_address") ]), 
this.fireEvent("address_response", t);
}.bind(this),
onFailure:function() {
this.fireEvent("address_response", {
success:!1,
errors:[ I18n.t("global.error.cannot_connect") ]
});
}.bind(this)
}).send();
},
expirationCheck:function() {
var t = this.data.month, e = this.data.year;
if (!t || !e) return {
success:!0
};
t = t.toInt(), e = e.toInt();
var n = new Date();
return expBeginning = moment({
year:e,
month:t - 1
}), expEnd = expBeginning.add("months", 1), n > expEnd ? {
success:!1,
errors:[ I18n.t("Validation.expirationCheck.error") ]
} :{
success:!0
};
},
luhnCheck:function() {
var t, e, n = this.data.number.trim(), i = n.length, r = n.toInt(), s = 0;
if (0 === i) return {
success:!1,
errors:[ I18n.t("Validation.luhnCheck.error") ]
};
if (/^.+?billing_profile\/edit\/\d+$/.test(document.URL)) {
var a = this.data.month, o = this.data.year, u = document.getElement(".month");
if (yearEl = document.getElement(".year"), /^XXXX\d{4}$/.test(n) && (a && o || !a && !o)) return {
success:!0
};
var l = !0;
if (a ? u.removeClass("error") :(l = !1, u.addClass("error"), this.fireEvent("requirement_error")), 
o ? yearEl.removeClass("error") :(l = !1, yearEl.addClass("error"), this.fireEvent("requirement_error")), 
!l) return {
success:!1,
errors:[ I18n.t("global.error.missing_required_short") ]
};
}
if (isNaN(r) || !/^[0-9]+$/.test(n)) return {
success:!1,
errors:[ I18n.t("Validation.luhnCheck.error") ]
};
for (var c = i; c > 0; c--) {
switch (t = Math.floor(r) % 10, s += t, c--, r /= 10, t = Math.floor(r) % 10, e = 2 * t) {
case 10:
e = 1;
break;

case 12:
e = 3;
break;

case 14:
e = 5;
break;

case 16:
e = 7;
break;

case 18:
e = 9;
break;

default:
e = e;
}
r /= 10, s += e;
}
var d = s % 10 === 0;
return d ? {
success:!0
} :{
success:!1,
errors:[ I18n.t("Validation.luhnCheck.error") ]
};
},
emailCheck:function() {
var t = this.data.email.test(/^([^\s]+)((?:[-a-z0-9]\.)[a-z]{2,})$/i);
return t ? {
success:!0
} :{
success:!1,
errors:[ I18n.t("Validation.emailCheck.error") ]
};
},
passwordCheck:function() {
var t = this.data.password, e = this.data.password_confirm, n = !0, i = [];
return t !== e && (n = !1, i.push(I18n.t("Validation.passwordCheck.error.password_confirm_mismatch"))), 
(t.length < 8 || e.length < 8) && (n = !1, i.push(I18n.t("Validation.passwordCheck.error.password_length"))), 
n ? {
success:!0
} :{
success:!1,
errors:i
};
},
zipCodeCheck:function() {
var t = this.data.zip.trim().test(new RegExp(Harrys.zip_format(this.data.country)));
return t ? {
success:!0
} :{
success:!1,
errors:[ I18n.t("Validation.zipCodeCheck.error", {
zip_label:Harrys.COUNTRIES[this.data.country].zip_label
}) ]
};
},
poBoxCheck:function() {
var t = this.data.address.test(/\b[P|p]*(OST|ost)*\.*\s*[O|o|0]*(ffice|FFICE)*\.*\s*[B|b][O|o|0][X|x]\b/);
return t ? {
success:!0
} :{
success:!1,
errors:[]
};
}
}), Required = new Class({
Implements:Events,
initialize:function(t) {
this.rootEl = t, this.requiredEls = this.rootEl.getElements('[data-require="true"]'), 
_.each(this.requiredEls, function(t) {
t.addEvents({
blur:function() {
this.check(t);
}.bind(this)
});
}.bind(this));
},
check:function(t) {
var e = !0, n = t.get("value");
return n && "" !== n ? t.removeClass("error") :(e = !1, t.addClass("error"), this.fireEvent("requirement_error")), 
e;
},
checkAll:function() {
var t = !0;
return _.each(this.requiredEls, function(e) {
this.check(e) || (t = !1);
}.bind(this)), t ? {
success:!0
} :{
success:!1,
errors:[ I18n.t("global.error.missing_required_short") ]
};
}
}), SmartAppBanner = new Class({
initialize:function() {
this.isSafarioIos() && this.didResetPasswordFromIos() && (this.meta = new Element("meta", {
name:"apple-itunes-app",
content:"app-id=, app-argument=https://www.harrys.com"
}), this.meta.inject(document.head)), Cookie.dispose("h_reset_password_from_ios");
},
isSafarioIos:function() {
return "ios" === Browser.Platform.name;
},
didResetPasswordFromIos:function() {
return "1" === Cookie.read("h_reset_password_from_ios");
},
setEmail:function(t) {
this.meta && this.meta.set("content", this.meta.get("content") + "?email=" + t);
}
}), Btn = new Class({
Implements:Events,
initialize:function(t) {
this.el = t, this.text = this.el.get("text"), this.el.addEvents({
touchstart:function() {
this.el.addClass("pressed");
}.bind(this),
touchend:function() {
this.el.removeClass("pressed");
}.bind(this),
loadstart:function() {
this.el.addClass("loading"), this.el.set("text", "Loading"), this.el.removeEvents("touchstart"), 
this.el.removeEvents("touchend");
}.bind(this),
loadend:function() {
this.el.removeClass("loading"), this.el.set("text", this.text), this.el.addEvent("touchstart", function() {
this.el.addClass("pressed");
}.bind(this)), this.el.addEvent("touchend", function() {
this.el.removeClass("pressed");
}.bind(this));
}.bind(this)
});
}
}), HeaderInt = new Class({
Implements:Events,
initialize:function(t) {
this.rootEl = t, this.menu_button = this.rootEl.getElement("#global_header_button"), 
this.cartCountEl = this.rootEl.getElement("#header_cart_count"), this.menusEl = this.rootEl.getSiblings("#global_menus")[0], 
this.menusFrameEl = this.menusEl.getElement("#menus_frame"), this.globalMenuEl = this.menusEl.getElement("#menu_global"), 
this.menu_button && this.menu_button.addEvent("click", function(t) {
t.stop();
var e = "open" == this.menu_button.get("data-status");
this.toggleMenus(e);
}.bind(this)), this.menuHeight = this.menusFrameEl.getDimensions().height + this.rootEl.getDimensions().height;
},
toggleMenus:function(t) {
var e = new Fx.Tween(this.menusEl, {
duration:"short",
property:"height"
});
t ? (e.start(0), this.menu_button.getElement(".sprite").removeClass("x-white").addClass("burger"), 
this.menu_button.set("data-status", "closed")) :(e.start(this.menuHeight), this.menu_button.getElement(".sprite").addClass("x-white").removeClass("burger"), 
this.menu_button.set("data-status", "open"));
}
}), Harrys = Harrys || {};

window.addEvent("domready", function() {
function t() {
var t = Harrys.cart.getItemCount();
c && c.set("text", t), t && e();
}
function e() {
return l.hasClass("active") ? l.addClass("pop") :l.addClass("blast").addClass("active"), 
u.addClass("active"), setTimeout(function() {
u.removeClass("active");
}.bind(this), 1500), setTimeout(function() {
l.removeClass("blast");
}.bind(this), 150), setTimeout(function() {
l.removeClass("pop");
}.bind(this), 150), this;
}
"production" === Harrys.ENV && ("undefined" != typeof window.console && window.console || (window.console = {}), 
window.console.log = window.console.error = window.console.info = window.console.debug = window.console.warn = window.console.trace = window.console.dir = window.console.dirxml = window.console.group = window.console.groupEnd = window.console.time = window.console.timeEnd = window.console.assert = window.console.profile = function() {}), 
Harrys.cart.addEvents({
item_added:function(t, e) {
e && e.no_show_mini_cart || (window.location = "/cart#item_added=" + t.product.name.replace(" ", "_"));
},
item_removed:function(e) {
t(), new Flash(I18n.t("init.cart.item_removed", {
product:e.product.name
}));
},
item_changed:function(e) {
t(), new Flash(I18n.t("init.cart.item_changed", {
product:e.product.name
}));
}
}), document.getElements(".quicktap").each(function(t) {
new QuickTap(t);
});
var n = $("global_header");
n && (Harrys.HeaderInt = new HeaderInt(n));
var i = document.getElements(".btn");
_.each(i, function(t) {
new Btn(t);
});
var r = $("switch_to_desktop");
new QuickTap(r), r.addEvents({
click:function(t) {
t.stop(), Cookie.write("h_mobile", "0"), window.location.reload();
}
});
var s = Cookie.read("h_unsub");
s && (new Flash(I18n.t("init.unsubscribed", {
unsub:s
}), "notice"), Cookie.dispose("h_unsub"));
var a = $("shipping_address_form");
a && (Harrys.shippingAddressPage = new AddressPage(a, "#shipping_address_country", "#shipping_address_zip", "shipping_address_state"));
var o = $("billing_address_form");
o && (Harrys.billingProfilePage = new AddressPage(o, "#billing_country", "#billing_zip", "billing_state"));
var u = $("cart_header_button"), l = $("cart_header_button").getElement(".badge"), c = $("cart_header_button").getElement("#header_cart_count");
t();
});