function mr_parallax() {
    function e(e) {
        for (var t = 0; t < e.length; t++)if ("undefined" != typeof document.body.style[e[t]])return e[t];
        return null
    }

    function t() {
        var e = 0;
        return e = D ? jQuery(".viu").find("nav:first").outerHeight(!0) : jQuery(document).find("nav:first").outerHeight(!0)
    }

    function n(e, t, n, o) {
        var r = e - 1;
        return r /= o, e /= o, r--, e--, n * (e * e * e * e * e + 1) + t - (n * (r * r * r * r * r + 1) + t)
    }

    function o() {
        if (M) {
            for (var e = s.length, t = a(); e--;)r(s[e], t);
            M = !1
        }
        h && (x += -g * n(p, 0, T, H), (x > E || -E > x) && (j.scrollBy(0, x), x = 0), p++, p > H && (p = 0, h = !1, w = !0, g = 0, v = 0, y = 0, x = 0)), u(o)
    }

    function r(e, t) {
        if (D) {
            if (t + c > e.elemTop && t < e.elemBottom)if (e.isFirstSection) {
                var n = "translate3d(0, " + t / 2 + "px, 0)";
                e.imageHolder.style[m] = n
            } else {
                var n = "translate3d(0, " + (t - e.elemTop - f) / 2 + "px, 0)";
                e.imageHolder.style[m] = n
            }
        } else if (t + c > e.elemTop && t < e.elemBottom)if (e.isFirstSection) {
            var n = "translate3d(0, " + t / 2 + "px, 0)";
            e.imageHolder.style[m] = n
        } else {
            var n = "translate3d(0, " + (t + c - e.elemTop) / 2 + "px, 0)";
            e.imageHolder.style[m] = n
        }
    }

    function a() {
        return j != window ? j.scrollTop : 0 == document.documentElement.scrollTop ? document.body.scrollTop : document.documentElement.scrollTop
    }

    function i() {
        M = !0
    }

    function l(e) {
        var t = {};
        return e && "[object Function]" === t.toString.call(e)
    }

    var s, u = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame, d = ["transform", "msTransform", "webkitTransform", "mozTransform", "oTransform"], m = e(d), c = Math.max(document.documentElement.clientHeight, window.innerHeight || 0), f = 0, h = !1, w = !0, p = 0, g = 0, v = 0, y = 0, x = 0, T = 300, E = 1, H = 30, x = 0, j = window, D = void 0 == window.mr_variant ? !1 : !0, M = !1, Q = this;
    jQuery(document).ready(function () {
        Q.documentReady()
    }), jQuery(window).load(function () {
        Q.windowLoad()
    }), this.getScrollingState = function () {
        return p > 0 ? !0 : !1
    }, this.documentReady = function (e) {
        "use strict";
        return c = Math.max(document.documentElement.clientHeight, window.innerHeight || 0), /Android|iPad|iPhone|iPod|BlackBerry|Windows Phone/i.test(navigator.userAgent || navigator.vendor || window.opera) ? jQuery(".parallax").removeClass("parallax") : u && (Q.profileParallaxElements(), Q.setupParallax()), l(e) ? void e() : void 0
    }, this.windowLoad = function () {
        c = Math.max(document.documentElement.clientHeight, window.innerHeight || 0), f = t(), window.mr_parallax.profileParallaxElements()
    }, this.setupParallax = function () {
        D = void 0 == window.mr_variant ? !1 : !0, D && (j = jQuery(".viu").get(0), void 0 != j && (j.scrollBy = function (e, t) {
            this.scrollTop += t
        })), void 0 != j && (j.addEventListener("scroll", i, !1), window.addEventListener("resize", function () {
            c = Math.max(document.documentElement.clientHeight, window.innerHeight || 0), f = t(), Q.profileParallaxElements()
        }, !1), o())
    }, this.profileParallaxElements = function () {
        s = [], f = t(), selector = ".parallax > .background-image-holder, .parallax ul.slides > li > .background-image-holder", D && (selector = ".viu .parallax > .background-image-holder, .viu .parallax ul.slides > li > .background-image-holder"), jQuery(selector).each(function (e, t) {
            var n = jQuery(this).closest(".parallax"), o = D ? n.position().top : n.offset().top;
            s.push({
                section: n.get(0),
                outerHeight: n.outerHeight(),
                elemTop: o,
                elemBottom: o + n.outerHeight(),
                isFirstSection: n.is(":nth-of-type(1)") ? !0 : !1,
                imageHolder: jQuery(this).get(0)
            }), D ? D && (n.is(":nth-of-type(1)") ? Q.mr_setTranslate3DTransform(jQuery(this).get(0), 0 == a() ? 0 : a() / 2) : Q.mr_setTranslate3DTransform(jQuery(this).get(0), (a() - o - f) / 2)) : n.is(":nth-of-type(1)") ? Q.mr_setTranslate3DTransform(jQuery(this).get(0), 0 == a() ? 0 : a() / 2) : Q.mr_setTranslate3DTransform(jQuery(this).get(0), (a() + c - o) / 2)
        })
    }, this.mr_setTranslate3DTransform = function (e, t) {
        e.style[m] = "translate3d(0, " + t + "px, 0)"
    }
}
window.mr_parallax = new mr_parallax, function (e, t) {
    function n(t, n, i, l) {
        t[o](a + n, "wheel" == r ? i : function (t) {
            !t && (t = e.event);
            var n = {
                originalEvent: t,
                target: t.target || t.srcElement,
                type: "wheel",
                deltaMode: "MozMousePixelScroll" == t.type ? 0 : 1,
                deltaX: 0,
                deltaZ: 0,
                notRealWheel: 1,
                preventDefault: function () {
                    t.preventDefault ? t.preventDefault() : t.returnValue = !1
                }
            };
            return "mousewheel" == r ? (n.deltaY = -1 / 40 * t.wheelDelta, t.wheelDeltaX && (n.deltaX = -1 / 40 * t.wheelDeltaX)) : n.deltaY = t.detail / 3, i(n)
        }, l || !1)
    }

    var o, r, a = "";
    e.addEventListener ? o = "addEventListener" : (o = "attachEvent", a = "on"), r = "onwheel" in t.createElement("div") ? "wheel" : void 0 !== t.onmousewheel ? "mousewheel" : "DOMMouseScroll", e.addWheelListener = function (e, t, o) {
        n(e, r, t, o), "DOMMouseScroll" == r && n(e, "MozMousePixelScroll", t, o)
    }
}(window, document);