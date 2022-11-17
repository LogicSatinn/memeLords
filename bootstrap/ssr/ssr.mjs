import { createServer } from "http";
import * as runtimeDom from "@vue/runtime-dom";
import { registerRuntimeCompiler, initCustomFormatter, warn, ref, computed, defineComponent, h, Fragment, onMounted, watch, onUnmounted, provide, inject, watchEffect, Teleport, reactive, unref, nextTick, cloneVNode, openBlock, createBlock, createCommentVNode, createElementBlock, normalizeStyle, KeepAlive, createVNode, renderList, onBeforeUnmount, renderSlot, withModifiers, createElementVNode, resolveComponent, withCtx, normalizeProps, mergeProps, createSSRApp } from "@vue/runtime-dom";
import { compile } from "@vue/compiler-dom";
import { isString, NOOP, extend, generateCodeFrame } from "@vue/shared";
import { renderToString } from "@vue/server-renderer";
import ze from "axios";
function initDev() {
  {
    initCustomFormatter();
  }
}
if (process.env.NODE_ENV !== "production") {
  initDev();
}
const compileCache = /* @__PURE__ */ Object.create(null);
function compileToFunction(template, options) {
  if (!isString(template)) {
    if (template.nodeType) {
      template = template.innerHTML;
    } else {
      process.env.NODE_ENV !== "production" && warn(`invalid template option: `, template);
      return NOOP;
    }
  }
  const key = template;
  const cached = compileCache[key];
  if (cached) {
    return cached;
  }
  if (template[0] === "#") {
    const el2 = document.querySelector(template);
    if (process.env.NODE_ENV !== "production" && !el2) {
      warn(`Template element not found or is empty: ${template}`);
    }
    template = el2 ? el2.innerHTML : ``;
  }
  const opts = extend({
    hoistStatic: true,
    onError: process.env.NODE_ENV !== "production" ? onError : void 0,
    onWarn: process.env.NODE_ENV !== "production" ? (e) => onError(e, true) : NOOP
  }, options);
  if (!opts.isCustomElement && typeof customElements !== "undefined") {
    opts.isCustomElement = (tag) => !!customElements.get(tag);
  }
  const { code } = compile(template, opts);
  function onError(err, asWarning = false) {
    const message = asWarning ? err.message : `Template compilation error: ${err.message}`;
    const codeFrame = err.loc && generateCodeFrame(template, err.loc.start.offset, err.loc.end.offset);
    warn(codeFrame ? `${message}
${codeFrame}` : message);
  }
  const render = new Function("Vue", code)(runtimeDom);
  render._rc = true;
  return compileCache[key] = render;
}
registerRuntimeCompiler(compileToFunction);
function Ia(e, t) {
  for (var r = -1, n = e == null ? 0 : e.length; ++r < n && t(e[r], r, e) !== false; )
    ;
  return e;
}
function Pa(e) {
  return function(t, r, n) {
    for (var i = -1, a = Object(t), s = n(t), o = s.length; o--; ) {
      var l = s[e ? o : ++i];
      if (r(a[l], l, a) === false)
        break;
    }
    return t;
  };
}
var Ca = Pa();
const Da = Ca;
function qa(e, t) {
  for (var r = -1, n = Array(e); ++r < e; )
    n[r] = t(r);
  return n;
}
var Fa = typeof global == "object" && global && global.Object === Object && global;
const ii = Fa;
var La = typeof self == "object" && self && self.Object === Object && self, ja = ii || La || Function("return this")();
const le = ja;
var Ba = le.Symbol;
const Se = Ba;
var ai = Object.prototype, ka = ai.hasOwnProperty, Ra = ai.toString, it = Se ? Se.toStringTag : void 0;
function Ma(e) {
  var t = ka.call(e, it), r = e[it];
  try {
    e[it] = void 0;
    var n = true;
  } catch {
  }
  var i = Ra.call(e);
  return n && (t ? e[it] = r : delete e[it]), i;
}
var Na = Object.prototype, Va = Na.toString;
function Ha(e) {
  return Va.call(e);
}
var Ua = "[object Null]", Wa = "[object Undefined]", vn = Se ? Se.toStringTag : void 0;
function _e(e) {
  return e == null ? e === void 0 ? Wa : Ua : vn && vn in Object(e) ? Ma(e) : Ha(e);
}
function Oe(e) {
  return e != null && typeof e == "object";
}
var za = "[object Arguments]";
function gn(e) {
  return Oe(e) && _e(e) == za;
}
var si = Object.prototype, Ga = si.hasOwnProperty, Ka = si.propertyIsEnumerable, Xa = gn(function() {
  return arguments;
}()) ? gn : function(e) {
  return Oe(e) && Ga.call(e, "callee") && !Ka.call(e, "callee");
};
const oi = Xa;
var Qa = Array.isArray;
const j = Qa;
function Ja() {
  return false;
}
var li = typeof exports == "object" && exports && !exports.nodeType && exports, yn = li && typeof module == "object" && module && !module.nodeType && module, Ya = yn && yn.exports === li, bn = Ya ? le.Buffer : void 0, Za = bn ? bn.isBuffer : void 0, es = Za || Ja;
const dr = es;
var ts = 9007199254740991, rs = /^(?:0|[1-9]\d*)$/;
function Dr(e, t) {
  var r = typeof e;
  return t = t == null ? ts : t, !!t && (r == "number" || r != "symbol" && rs.test(e)) && e > -1 && e % 1 == 0 && e < t;
}
var ns = 9007199254740991;
function qr(e) {
  return typeof e == "number" && e > -1 && e % 1 == 0 && e <= ns;
}
var is = "[object Arguments]", as = "[object Array]", ss = "[object Boolean]", os = "[object Date]", ls = "[object Error]", us = "[object Function]", cs = "[object Map]", fs = "[object Number]", ds = "[object Object]", ps = "[object RegExp]", hs = "[object Set]", ms = "[object String]", vs = "[object WeakMap]", gs = "[object ArrayBuffer]", ys = "[object DataView]", bs = "[object Float32Array]", ws = "[object Float64Array]", Ss = "[object Int8Array]", Os = "[object Int16Array]", $s = "[object Int32Array]", Es = "[object Uint8Array]", xs = "[object Uint8ClampedArray]", _s = "[object Uint16Array]", Ts = "[object Uint32Array]", D = {};
D[bs] = D[ws] = D[Ss] = D[Os] = D[$s] = D[Es] = D[xs] = D[_s] = D[Ts] = true;
D[is] = D[as] = D[gs] = D[ss] = D[ys] = D[os] = D[ls] = D[us] = D[cs] = D[fs] = D[ds] = D[ps] = D[hs] = D[ms] = D[vs] = false;
function As(e) {
  return Oe(e) && qr(e.length) && !!D[_e(e)];
}
function Is(e) {
  return function(t) {
    return e(t);
  };
}
var ui = typeof exports == "object" && exports && !exports.nodeType && exports, ot = ui && typeof module == "object" && module && !module.nodeType && module, Ps = ot && ot.exports === ui, nr = Ps && ii.process, Cs = function() {
  try {
    var e = ot && ot.require && ot.require("util").types;
    return e || nr && nr.binding && nr.binding("util");
  } catch {
  }
}();
const wn = Cs;
var Sn = wn && wn.isTypedArray, Ds = Sn ? Is(Sn) : As;
const ci = Ds;
var qs = Object.prototype, Fs = qs.hasOwnProperty;
function Ls(e, t) {
  var r = j(e), n = !r && oi(e), i = !r && !n && dr(e), a = !r && !n && !i && ci(e), s = r || n || i || a, o = s ? qa(e.length, String) : [], l = o.length;
  for (var u in e)
    (t || Fs.call(e, u)) && !(s && (u == "length" || i && (u == "offset" || u == "parent") || a && (u == "buffer" || u == "byteLength" || u == "byteOffset") || Dr(u, l))) && o.push(u);
  return o;
}
var js = Object.prototype;
function Bs(e) {
  var t = e && e.constructor, r = typeof t == "function" && t.prototype || js;
  return e === r;
}
function ks(e, t) {
  return function(r) {
    return e(t(r));
  };
}
var Rs = ks(Object.keys, Object);
const Ms = Rs;
var Ns = Object.prototype, Vs = Ns.hasOwnProperty;
function Hs(e) {
  if (!Bs(e))
    return Ms(e);
  var t = [];
  for (var r in Object(e))
    Vs.call(e, r) && r != "constructor" && t.push(r);
  return t;
}
function te(e) {
  var t = typeof e;
  return e != null && (t == "object" || t == "function");
}
var Us = "[object AsyncFunction]", Ws = "[object Function]", zs = "[object GeneratorFunction]", Gs = "[object Proxy]";
function fi(e) {
  if (!te(e))
    return false;
  var t = _e(e);
  return t == Ws || t == zs || t == Us || t == Gs;
}
function Rt(e) {
  return e != null && qr(e.length) && !fi(e);
}
function Mt(e) {
  return Rt(e) ? Ls(e) : Hs(e);
}
function Fr(e, t) {
  return e && Da(e, t, Mt);
}
function Ks(e, t) {
  return function(r, n) {
    if (r == null)
      return r;
    if (!Rt(r))
      return e(r, n);
    for (var i = r.length, a = t ? i : -1, s = Object(r); (t ? a-- : ++a < i) && n(s[a], a, s) !== false; )
      ;
    return r;
  };
}
var Xs = Ks(Fr);
const Lr = Xs;
function di(e) {
  return e;
}
function pi(e) {
  return typeof e == "function" ? e : di;
}
function Qs(e, t) {
  var r = j(e) ? Ia : Lr;
  return r(e, pi(t));
}
function J(e, t) {
  return e && Fr(e, pi(t));
}
var Js = Array.prototype, Ys = Js.reverse;
function Zs(e) {
  return e == null ? e : Ys.call(e);
}
const qt = ref(0), pr = ref(1), L = ref({}), ne = ref(0), $e = typeof window > "u";
function eo(e, t, r) {
  $e || window.addEventListener("popstate", to.bind(this)), Object.keys(t).length > 0 && qt.value++, kr(r), Nt(r.head), Rr(e);
  const n = $e ? "" : location.href, i = jr(
    n,
    r.head,
    e,
    t,
    {},
    pr.value,
    qt.value
  );
  hi(i);
}
function to(e) {
  !e.state || (L.value = e.state, ne.value = 0, Mr.value = {}, Nt(L.value.head), Rr(L.value.html, L.value.rememberedState.scrollY));
}
function jr(e, t, r, n, i, a, s) {
  const o = {
    url: e,
    head: t,
    html: r,
    dynamics: n,
    rememberedState: i,
    pageVisitId: a,
    dynamicVisitId: s
  };
  return L.value = o, o;
}
function ro(e) {
  $e || window.history.pushState(e, "", e.url);
}
function no(e) {
  const t = jr(
    e,
    JSON.parse(JSON.stringify(L.value.head)),
    L.value.html,
    L.value.dynamics,
    { ...L.value.rememberedState },
    L.value.pageVisitId,
    L.value.dynamicVisitId
  );
  $e || window.history.replaceState(t, "", t.url);
}
function hi(e) {
  $e || window.history.replaceState(e, "", e.url);
}
const ir = ref(0);
function io(e, t) {
  ir.value++;
  const r = e.request.responseURL;
  if (e.data.splade.lazy)
    return;
  if (e.data.splade.modal && ne.value++, kr(e.data.splade), Nt(e.data.splade.head), r === L.value.url && (t = true), e.data.splade.modal)
    return Ei(e.data.html, e.data.splade.modal);
  if (e.data.splade.preventRefresh)
    return;
  ne.value = 0;
  let n = e.data.html, i = e.data.dynamics;
  const a = Object.keys(L.value.dynamics).length > 0, s = Object.keys(i).length > 0;
  t ? (s && J(i, (l, u) => {
    i[u] += `<!-- ${ir.value} -->`;
  }), (!s || !a) && (n += `<!-- ${ir.value} -->`)) : (s && qt.value++, (!s || !a) && pr.value++), Rr(n, 0);
  const o = jr(
    r,
    e.data.splade.head,
    n,
    i,
    L.value.rememberedState ? { ...L.value.rememberedState } : {},
    pr.value,
    qt.value
  );
  t ? hi(o) : ro(o);
}
function ao() {
  ne.value--, Nt(oo(ne.value));
}
const mi = ref({}), vi = (e) => mi.value[e], so = (e) => Object.keys(vi.value[e]).length > 0, gi = ref({}), oo = (e) => gi.value[e], yi = ref({}), lo = (e) => yi.value[e], Ge = ref([]);
function uo(e) {
  Ge.value.push(e);
}
const co = computed(() => Zs(Ge.value));
function fo(e) {
  Ge.value[e].dismissed = true, Ge.value[e].html = null;
}
const Br = ref(null);
function po(e, t, r, n) {
  let i, a;
  const s = new Promise((o, l) => {
    i = o, a = l;
  });
  return Br.value = {
    title: e,
    text: t,
    confirmButton: r,
    cancelButton: n,
    resolvePromise: i,
    rejectPromise: a
  }, s;
}
function ho() {
  Br.value = null;
}
const bi = ref({});
function kr(e) {
  bi.value = e.shared ? e.shared : {}, yi.value[ne.value] = e.flash ? e.flash : {}, gi.value[ne.value] = e.head ? e.head : {}, Qs(e.toasts ? e.toasts : [], (t) => {
    Ge.value.push(t);
  }), mi.value[ne.value] = e.errors ? e.errors : {};
}
const wi = ref(() => {
}), Si = ref(() => {
}), Oi = ref(() => {
}), $i = ref(() => {
});
function Nt(e) {
  wi.value(e);
}
function Rr(e, t) {
  Si.value(e, t);
}
function Ei(e, t) {
  Oi.value(e, t);
}
function mo(e) {
  $i.value(e);
}
const xi = ref({});
function _i(e, t, r) {
  xi.value[e] = t, r && vo(e, t);
}
function vo(e, t) {
  let r = JSON.parse(localStorage.getItem("splade") || "{}") || {};
  r[e] = t, localStorage.setItem("splade", JSON.stringify(r));
}
function go(e, t) {
  return t ? (JSON.parse(localStorage.getItem("splade") || "{}") || {})[e] : xi.value[e];
}
function Et(e, t) {
  $e || document.dispatchEvent(new CustomEvent(`splade:${e}`, { detail: t }));
}
function Ye(e, t, r, n, i) {
  $e || _i("scrollY", window.scrollY), Et("request", { url: e, method: t, data: r, headers: n, replace: i });
  const a = ze({
    method: t,
    url: e,
    data: r,
    headers: {
      "X-Splade": true,
      "X-Requested-With": "XMLHttpRequest",
      Accept: "text/html, application/xhtml+xml",
      ...n
    },
    onUploadProgress: (s) => {
      r instanceof FormData && (s.percentage = Math.round(s.loaded / s.total * 100), Et("request-progress", { url: e, method: t, data: r, headers: n, replace: i, progress: s }));
    }
  });
  return a.then((s) => {
    io(s, i), Et("request-response", { url: e, method: t, data: r, headers: n, replace: i, response: s });
  }).catch((s) => {
    if (Et("request-error", { url: e, method: t, data: r, headers: n, replace: i, error: s }), s.response.status == 409 && s.response.headers["x-splade-redirect-away"])
      return window.location = s.response.headers["x-splade-redirect-away"];
    const o = s.response.data.splade;
    o && (o.lazy || kr(o)), s.response.status != 422 && mo(
      s.response.data.html ? s.response.data.html : s.response.data
    );
  }), a;
}
function Ti(e) {
  return Ye(e, "GET", {}, {}, true);
}
function yo(e) {
  return Ye(e, "GET", {}, {}, false);
}
function bo(e) {
  return Ye(e, "GET", {}, { "X-Splade-Modal": "modal" }, false);
}
const Mr = ref({});
function wo(e) {
  const t = Mr.value[e];
  return t ? (ne.value++, Ei(t.html, t.type), true) : false;
}
function So(e, t, r) {
  Mr.value[e] = { html: t, type: r };
}
function Oo(e) {
  return Ye(e, "GET", {}, { "X-Splade-Modal": "slideover" }, false);
}
function $o(e, t) {
  return Ye(e, "GET", {}, { "X-Splade-Lazy": t }, false);
}
function Eo() {
  return Ti(L.value.url);
}
const m = {
  init: eo,
  replace: Ti,
  visit: yo,
  modal: bo,
  slideover: Oo,
  refresh: Eo,
  request: Ye,
  lazy: $o,
  replaceUrlOfCurrentPage: no,
  htmlForDynamicComponent(e) {
    return L.value.dynamics[e];
  },
  setOnHead(e) {
    wi.value = e;
  },
  setOnHtml(e) {
    Si.value = e;
  },
  setOnModal(e) {
    Oi.value = e;
  },
  setOnServerError(e) {
    $i.value = e;
  },
  hasValidationErrors: so,
  validationErrors: vi,
  sharedData: bi,
  flashData: lo,
  toasts: Ge,
  toastsReversed: co,
  confirmModal: Br,
  confirm: po,
  clearConfirmModal: ho,
  pushToast: uo,
  dismissToast: fo,
  restore: go,
  remember: _i,
  popStack: ao,
  currentStack: ne,
  pageVisitId: computed(() => L.value.pageVisitId),
  dynamicVisitId: computed(() => L.value.dynamicVisitId),
  isSsr: $e,
  openPreloadedModal: wo,
  registerPreloadedModal: So
};
var xo = "[object String]";
function xt(e) {
  return typeof e == "string" || !j(e) && Oe(e) && _e(e) == xo;
}
const ue = {
  __name: "Render",
  props: {
    html: {
      type: String,
      required: false,
      default: ""
    }
  },
  setup(e) {
    const t = e, r = ref(null);
    function n() {
      r.value = h({
        template: t.html
      });
    }
    return watch(() => t.html, n, { immediate: true }), (i, a) => e.html ? (openBlock(), createBlock(unref(r), { key: 0 })) : createCommentVNode("", true);
  }
}, _o = {
  __name: "ServerError",
  props: {
    html: {
      type: String,
      required: true
    }
  },
  emits: ["close"],
  setup(e, { emit: t }) {
    const r = e, n = ref(null);
    function i() {
      const o = document.createElement("html");
      o.innerHTML = r.html, o.querySelectorAll("a").forEach((u) => u.setAttribute("target", "_top")), document.body.style.overflow = "hidden";
      const l = n.value;
      if (!l.contentWindow)
        throw new Error("iframe not yet ready.");
      l.contentWindow.document.open(), l.contentWindow.document.write(o.outerHTML), l.contentWindow.document.close(), document.addEventListener("keydown", a);
    }
    function a(o) {
      o.keyCode === 27 && s();
    }
    function s() {
      document.body.style.overflow = "visible", document.removeEventListener("keydown", a), t("close");
    }
    return onMounted(() => i()), (o, l) => (openBlock(), createElementBlock("div", {
      style: { position: "fixed", top: "0px", right: "0px", bottom: "0px", left: "0px", "z-index": "200000", "box-sizing": "border-box", height: "100vh", width: "100vw", "background-color": "rgb(0 0 0 / 0.75)", padding: "2rem" },
      onClick: s
    }, [
      createElementVNode("iframe", {
        ref_key: "iframeElement",
        ref: n,
        class: "bg-white w-full h-full"
      }, null, 512)
    ]));
  }
}, To = {
  __name: "SpladeApp",
  props: {
    el: {
      type: [String, Object],
      required: false,
      default: ""
    },
    components: {
      type: String,
      required: false,
      default: (e) => {
        if (!m.isSsr) {
          const t = xt(e.el) ? document.getElementById(e.el) : e.el;
          return JSON.parse(t.dataset.components) || "";
        }
      }
    },
    initialHtml: {
      type: String,
      required: false,
      default: (e) => {
        if (!m.isSsr) {
          const t = xt(e.el) ? document.getElementById(e.el) : e.el;
          return JSON.parse(t.dataset.html) || "";
        }
      }
    },
    initialDynamics: {
      type: Object,
      required: false,
      default: (e) => {
        if (!m.isSsr) {
          const t = xt(e.el) ? document.getElementById(e.el) : e.el;
          return JSON.parse(t.dataset.dynamics) || {};
        }
      }
    },
    initialSpladeData: {
      type: Object,
      required: false,
      default: (e) => {
        if (!m.isSsr) {
          const t = xt(e.el) ? document.getElementById(e.el) : e.el;
          return JSON.parse(t.dataset.splade) || {};
        }
      }
    }
  },
  setup(e) {
    const t = e;
    provide("stack", 0);
    const r = ref(), n = ref([]), i = ref(null), a = ref(null), s = inject("$spladeOptions") || {}, o = computed(() => m.currentStack.value < 1 ? [] : {
      filter: "blur(4px)",
      "transition-property": "filter",
      "transition-duration": "150ms",
      "transition-timing-function": "cubic-bezier(0.4, 0, 0.2, 1)"
    });
    function l() {
      i.value = null;
    }
    function u(f) {
      n[f] = null, m.popStack();
    }
    function c(f) {
      const d = document.createElement("meta");
      J(f, (h2, g) => {
        d[g] = h2;
      }), document.getElementsByTagName("head")[0].appendChild(d);
    }
    function p(f) {
      var h2;
      let d = "meta";
      J(f, (g, w) => {
        d = `${d}[${w}="${g}"]`;
      });
      try {
        (h2 = document.querySelector(d)) == null || h2.remove();
      } catch {
      }
    }
    return m.setOnHead((f) => {
      var d;
      if (!m.isSsr) {
        if (a.value === null) {
          a.value = f.meta;
          return;
        }
        if (a.value.forEach((h2) => {
          p(h2);
        }), a.value = f.meta, document.title = f.title, f.meta.forEach((h2) => {
          c(h2);
        }), (d = document.querySelector('link[rel="canonical"]')) == null || d.remove(), f.canonical) {
          const h2 = document.createElement("link");
          h2.rel = "canonical", h2.href = f.canonical, document.getElementsByTagName("head")[0].appendChild(h2);
        }
      }
    }), m.setOnHtml((f, d) => {
      n.value = [], r.value = f, nextTick(() => {
        m.isSsr || window.scrollTo(0, d), s.transform_anchors && [...document.querySelectorAll("a")].forEach((h2) => {
          h2.href == "" || h2.href.charAt(0) == "#" || h2.__vnode.dynamicProps === null && (h2.hasAttribute("download") || (h2.onclick = function(g) {
            g.preventDefault(), m.visit(h2.href);
          }));
        });
      });
    }), m.setOnModal(function(f, d) {
      n.value[m.currentStack.value] = { html: f, type: d };
    }), m.setOnServerError(function(f) {
      i.value = f;
    }), m.init(t.initialHtml, t.initialDynamics, t.initialSpladeData), (f, d) => (openBlock(), createElementBlock("div", null, [
      unref(m).isSsr ? (openBlock(), createBlock(ue, {
        key: `visit.${unref(m).pageVisitId.value}`,
        style: normalizeStyle(unref(o)),
        html: r.value
      }, null, 8, ["style", "html"])) : (openBlock(), createBlock(KeepAlive, {
        key: 0,
        max: unref(s).max_keep_alive
      }, [
        (openBlock(), createBlock(ue, {
          key: `visit.${unref(m).pageVisitId.value}`,
          style: normalizeStyle(unref(o)),
          html: r.value
        }, null, 8, ["style", "html"]))
      ], 1032, ["max"])),
      createVNode(ue, { html: e.components }, null, 8, ["html"]),
      (openBlock(true), createElementBlock(Fragment, null, renderList(unref(m).currentStack.value, (h2) => (openBlock(), createBlock(ue, {
        key: `modal.${h2}`,
        type: n.value[h2].type,
        html: n.value[h2].html,
        stack: h2,
        "on-top-of-stack": unref(m).currentStack.value === h2,
        onClose: (g) => u(h2)
      }, null, 8, ["type", "html", "stack", "on-top-of-stack", "onClose"]))), 128)),
      i.value ? (openBlock(), createBlock(_o, {
        key: 2,
        html: i.value,
        onClose: l
      }, null, 8, ["html"])) : createCommentVNode("", true)
    ]));
  }
};
function Zd(e) {
  return () => h(To, e);
}
var Ao = Object.prototype, Io = Ao.hasOwnProperty;
function Po(e, t) {
  return e != null && Io.call(e, t);
}
var Co = "[object Symbol]";
function Vt(e) {
  return typeof e == "symbol" || Oe(e) && _e(e) == Co;
}
var Do = /\.|\[(?:[^[\]]*|(["'])(?:(?!\1)[^\\]|\\.)*?\1)\]/, qo = /^\w*$/;
function Nr(e, t) {
  if (j(e))
    return false;
  var r = typeof e;
  return r == "number" || r == "symbol" || r == "boolean" || e == null || Vt(e) ? true : qo.test(e) || !Do.test(e) || t != null && e in Object(t);
}
var Fo = le["__core-js_shared__"];
const ar = Fo;
var On = function() {
  var e = /[^.]+$/.exec(ar && ar.keys && ar.keys.IE_PROTO || "");
  return e ? "Symbol(src)_1." + e : "";
}();
function Lo(e) {
  return !!On && On in e;
}
var jo = Function.prototype, Bo = jo.toString;
function Re(e) {
  if (e != null) {
    try {
      return Bo.call(e);
    } catch {
    }
    try {
      return e + "";
    } catch {
    }
  }
  return "";
}
var ko = /[\\^$.*+?()[\]{}|]/g, Ro = /^\[object .+?Constructor\]$/, Mo = Function.prototype, No = Object.prototype, Vo = Mo.toString, Ho = No.hasOwnProperty, Uo = RegExp(
  "^" + Vo.call(Ho).replace(ko, "\\$&").replace(/hasOwnProperty|(function).*?(?=\\\()| for .+?(?=\\\])/g, "$1.*?") + "$"
);
function Wo(e) {
  if (!te(e) || Lo(e))
    return false;
  var t = fi(e) ? Uo : Ro;
  return t.test(Re(e));
}
function zo(e, t) {
  return e == null ? void 0 : e[t];
}
function Me(e, t) {
  var r = zo(e, t);
  return Wo(r) ? r : void 0;
}
var Go = Me(Object, "create");
const ct = Go;
function Ko() {
  this.__data__ = ct ? ct(null) : {}, this.size = 0;
}
function Xo(e) {
  var t = this.has(e) && delete this.__data__[e];
  return this.size -= t ? 1 : 0, t;
}
var Qo = "__lodash_hash_undefined__", Jo = Object.prototype, Yo = Jo.hasOwnProperty;
function Zo(e) {
  var t = this.__data__;
  if (ct) {
    var r = t[e];
    return r === Qo ? void 0 : r;
  }
  return Yo.call(t, e) ? t[e] : void 0;
}
var el = Object.prototype, tl = el.hasOwnProperty;
function rl(e) {
  var t = this.__data__;
  return ct ? t[e] !== void 0 : tl.call(t, e);
}
var nl = "__lodash_hash_undefined__";
function il(e, t) {
  var r = this.__data__;
  return this.size += this.has(e) ? 0 : 1, r[e] = ct && t === void 0 ? nl : t, this;
}
function je(e) {
  var t = -1, r = e == null ? 0 : e.length;
  for (this.clear(); ++t < r; ) {
    var n = e[t];
    this.set(n[0], n[1]);
  }
}
je.prototype.clear = Ko;
je.prototype.delete = Xo;
je.prototype.get = Zo;
je.prototype.has = rl;
je.prototype.set = il;
function al() {
  this.__data__ = [], this.size = 0;
}
function Vr(e, t) {
  return e === t || e !== e && t !== t;
}
function Ht(e, t) {
  for (var r = e.length; r--; )
    if (Vr(e[r][0], t))
      return r;
  return -1;
}
var sl = Array.prototype, ol = sl.splice;
function ll(e) {
  var t = this.__data__, r = Ht(t, e);
  if (r < 0)
    return false;
  var n = t.length - 1;
  return r == n ? t.pop() : ol.call(t, r, 1), --this.size, true;
}
function ul(e) {
  var t = this.__data__, r = Ht(t, e);
  return r < 0 ? void 0 : t[r][1];
}
function cl(e) {
  return Ht(this.__data__, e) > -1;
}
function fl(e, t) {
  var r = this.__data__, n = Ht(r, e);
  return n < 0 ? (++this.size, r.push([e, t])) : r[n][1] = t, this;
}
function me(e) {
  var t = -1, r = e == null ? 0 : e.length;
  for (this.clear(); ++t < r; ) {
    var n = e[t];
    this.set(n[0], n[1]);
  }
}
me.prototype.clear = al;
me.prototype.delete = ll;
me.prototype.get = ul;
me.prototype.has = cl;
me.prototype.set = fl;
var dl = Me(le, "Map");
const ft = dl;
function pl() {
  this.size = 0, this.__data__ = {
    hash: new je(),
    map: new (ft || me)(),
    string: new je()
  };
}
function hl(e) {
  var t = typeof e;
  return t == "string" || t == "number" || t == "symbol" || t == "boolean" ? e !== "__proto__" : e === null;
}
function Ut(e, t) {
  var r = e.__data__;
  return hl(t) ? r[typeof t == "string" ? "string" : "hash"] : r.map;
}
function ml(e) {
  var t = Ut(this, e).delete(e);
  return this.size -= t ? 1 : 0, t;
}
function vl(e) {
  return Ut(this, e).get(e);
}
function gl(e) {
  return Ut(this, e).has(e);
}
function yl(e, t) {
  var r = Ut(this, e), n = r.size;
  return r.set(e, t), this.size += r.size == n ? 0 : 1, this;
}
function ve(e) {
  var t = -1, r = e == null ? 0 : e.length;
  for (this.clear(); ++t < r; ) {
    var n = e[t];
    this.set(n[0], n[1]);
  }
}
ve.prototype.clear = pl;
ve.prototype.delete = ml;
ve.prototype.get = vl;
ve.prototype.has = gl;
ve.prototype.set = yl;
var bl = "Expected a function";
function Hr(e, t) {
  if (typeof e != "function" || t != null && typeof t != "function")
    throw new TypeError(bl);
  var r = function() {
    var n = arguments, i = t ? t.apply(this, n) : n[0], a = r.cache;
    if (a.has(i))
      return a.get(i);
    var s = e.apply(this, n);
    return r.cache = a.set(i, s) || a, s;
  };
  return r.cache = new (Hr.Cache || ve)(), r;
}
Hr.Cache = ve;
var wl = 500;
function Sl(e) {
  var t = Hr(e, function(n) {
    return r.size === wl && r.clear(), n;
  }), r = t.cache;
  return t;
}
var Ol = /[^.[\]]+|\[(?:(-?\d+(?:\.\d+)?)|(["'])((?:(?!\2)[^\\]|\\.)*?)\2)\]|(?=(?:\.|\[\])(?:\.|\[\]|$))/g, $l = /\\(\\)?/g, El = Sl(function(e) {
  var t = [];
  return e.charCodeAt(0) === 46 && t.push(""), e.replace(Ol, function(r, n, i, a) {
    t.push(i ? a.replace($l, "$1") : n || r);
  }), t;
});
const xl = El;
function Ai(e, t) {
  for (var r = -1, n = e == null ? 0 : e.length, i = Array(n); ++r < n; )
    i[r] = t(e[r], r, e);
  return i;
}
var _l = 1 / 0, $n = Se ? Se.prototype : void 0, En = $n ? $n.toString : void 0;
function Wt(e) {
  if (typeof e == "string")
    return e;
  if (j(e))
    return Ai(e, Wt) + "";
  if (Vt(e))
    return En ? En.call(e) : "";
  var t = e + "";
  return t == "0" && 1 / e == -_l ? "-0" : t;
}
function Ur(e) {
  return e == null ? "" : Wt(e);
}
function Wr(e, t) {
  return j(e) ? e : Nr(e, t) ? [e] : xl(Ur(e));
}
var Tl = 1 / 0;
function vt(e) {
  if (typeof e == "string" || Vt(e))
    return e;
  var t = e + "";
  return t == "0" && 1 / e == -Tl ? "-0" : t;
}
function Ii(e, t, r) {
  t = Wr(t, e);
  for (var n = -1, i = t.length, a = false; ++n < i; ) {
    var s = vt(t[n]);
    if (!(a = e != null && r(e, s)))
      break;
    e = e[s];
  }
  return a || ++n != i ? a : (i = e == null ? 0 : e.length, !!i && qr(i) && Dr(s, i) && (j(e) || oi(e)));
}
function G(e, t) {
  return e != null && Ii(e, t, Po);
}
function Y(e, t, ...r) {
  if (e in t) {
    let i = t[e];
    return typeof i == "function" ? i(...r) : i;
  }
  let n = new Error(`Tried to handle "${e}" but there is no handler defined. Only defined handlers are: ${Object.keys(t).map((i) => `"${i}"`).join(", ")}.`);
  throw Error.captureStackTrace && Error.captureStackTrace(n, Y), n;
}
var Ft = ((e) => (e[e.None = 0] = "None", e[e.RenderStrategy = 1] = "RenderStrategy", e[e.Static = 2] = "Static", e))(Ft || {}), we = ((e) => (e[e.Unmount = 0] = "Unmount", e[e.Hidden = 1] = "Hidden", e))(we || {});
function z({ visible: e = true, features: t = 0, ourProps: r, theirProps: n, ...i }) {
  var a;
  let s = Al(n, r), o = Object.assign(i, { props: s });
  if (e || t & 2 && s.static)
    return sr(o);
  if (t & 1) {
    let l = (a = s.unmount) == null || a ? 0 : 1;
    return Y(l, { [0]() {
      return null;
    }, [1]() {
      return sr({ ...i, props: { ...s, hidden: true, style: { display: "none" } } });
    } });
  }
  return sr(o);
}
function sr({ props: e, attrs: t, slots: r, slot: n, name: i }) {
  var a;
  let { as: s, ...o } = Ci(e, ["unmount", "static"]), l = (a = r.default) == null ? void 0 : a.call(r, n), u = {};
  if (n) {
    let c = false, p = [];
    for (let [f, d] of Object.entries(n))
      typeof d == "boolean" && (c = true), d === true && p.push(f);
    c && (u["data-headlessui-state"] = p.join(" "));
  }
  if (s === "template") {
    if (l = Pi(l != null ? l : []), Object.keys(o).length > 0 || Object.keys(t).length > 0) {
      let [c, ...p] = l != null ? l : [];
      if (!Il(c) || p.length > 0)
        throw new Error(['Passing props on "template"!', "", `The current component <${i} /> is rendering a "template".`, "However we need to passthrough the following props:", Object.keys(o).concat(Object.keys(t)).sort((f, d) => f.localeCompare(d)).map((f) => `  - ${f}`).join(`
`), "", "You can apply a few solutions:", ['Add an `as="..."` prop, to ensure that we render an actual element instead of a "template".', "Render a single element as the child so that we can forward the props onto that element."].map((f) => `  - ${f}`).join(`
`)].join(`
`));
      return cloneVNode(c, Object.assign({}, o, u));
    }
    return Array.isArray(l) && l.length === 1 ? l[0] : l;
  }
  return h(s, Object.assign({}, o, u), { default: () => l });
}
function Pi(e) {
  return e.flatMap((t) => t.type === Fragment ? Pi(t.children) : [t]);
}
function Al(...e) {
  if (e.length === 0)
    return {};
  if (e.length === 1)
    return e[0];
  let t = {}, r = {};
  for (let n of e)
    for (let i in n)
      i.startsWith("on") && typeof n[i] == "function" ? (r[i] != null || (r[i] = []), r[i].push(n[i])) : t[i] = n[i];
  if (t.disabled || t["aria-disabled"])
    return Object.assign(t, Object.fromEntries(Object.keys(r).map((n) => [n, void 0])));
  for (let n in r)
    Object.assign(t, { [n](i, ...a) {
      let s = r[n];
      for (let o of s) {
        if (i instanceof Event && i.defaultPrevented)
          return;
        o(i, ...a);
      }
    } });
  return t;
}
function Ci(e, t = []) {
  let r = Object.assign({}, e);
  for (let n of t)
    n in r && delete r[n];
  return r;
}
function Il(e) {
  return e == null ? false : typeof e.type == "string" || typeof e.type == "object" || typeof e.type == "function";
}
let Pl = 0;
function Cl() {
  return ++Pl;
}
function Ne() {
  return Cl();
}
var Di = ((e) => (e.Space = " ", e.Enter = "Enter", e.Escape = "Escape", e.Backspace = "Backspace", e.Delete = "Delete", e.ArrowLeft = "ArrowLeft", e.ArrowUp = "ArrowUp", e.ArrowRight = "ArrowRight", e.ArrowDown = "ArrowDown", e.Home = "Home", e.End = "End", e.PageUp = "PageUp", e.PageDown = "PageDown", e.Tab = "Tab", e))(Di || {});
function he(e) {
  var t;
  return e == null || e.value == null ? null : (t = e.value.$el) != null ? t : e.value;
}
let qi = Symbol("Context");
var Be = ((e) => (e[e.Open = 0] = "Open", e[e.Closed = 1] = "Closed", e))(Be || {});
function Dl() {
  return zr() !== null;
}
function zr() {
  return inject(qi, null);
}
function ql(e) {
  provide(qi, e);
}
const zt = typeof window > "u" || typeof document > "u";
function Ze(e) {
  if (zt)
    return null;
  if (e instanceof Node)
    return e.ownerDocument;
  if (e != null && e.hasOwnProperty("value")) {
    let t = he(e);
    if (t)
      return t.ownerDocument;
  }
  return document;
}
let hr = ["[contentEditable=true]", "[tabindex]", "a[href]", "area[href]", "button:not([disabled])", "iframe", "input:not([disabled])", "select:not([disabled])", "textarea:not([disabled])"].map((e) => `${e}:not([tabindex='-1'])`).join(",");
var dt = ((e) => (e[e.First = 1] = "First", e[e.Previous = 2] = "Previous", e[e.Next = 4] = "Next", e[e.Last = 8] = "Last", e[e.WrapAround = 16] = "WrapAround", e[e.NoScroll = 32] = "NoScroll", e))(dt || {}), Fi = ((e) => (e[e.Error = 0] = "Error", e[e.Overflow = 1] = "Overflow", e[e.Success = 2] = "Success", e[e.Underflow = 3] = "Underflow", e))(Fi || {}), Fl = ((e) => (e[e.Previous = -1] = "Previous", e[e.Next = 1] = "Next", e))(Fl || {});
function Ll(e = document.body) {
  return e == null ? [] : Array.from(e.querySelectorAll(hr));
}
var Li = ((e) => (e[e.Strict = 0] = "Strict", e[e.Loose = 1] = "Loose", e))(Li || {});
function jl(e, t = 0) {
  var r;
  return e === ((r = Ze(e)) == null ? void 0 : r.body) ? false : Y(t, { [0]() {
    return e.matches(hr);
  }, [1]() {
    let n = e;
    for (; n !== null; ) {
      if (n.matches(hr))
        return true;
      n = n.parentElement;
    }
    return false;
  } });
}
function lt(e) {
  e == null || e.focus({ preventScroll: true });
}
let Bl = ["textarea", "input"].join(",");
function kl(e) {
  var t, r;
  return (r = (t = e == null ? void 0 : e.matches) == null ? void 0 : t.call(e, Bl)) != null ? r : false;
}
function Rl(e, t = (r) => r) {
  return e.slice().sort((r, n) => {
    let i = t(r), a = t(n);
    if (i === null || a === null)
      return 0;
    let s = i.compareDocumentPosition(a);
    return s & Node.DOCUMENT_POSITION_FOLLOWING ? -1 : s & Node.DOCUMENT_POSITION_PRECEDING ? 1 : 0;
  });
}
function mr(e, t, r = true, n = null) {
  var i;
  let a = (i = Array.isArray(e) ? e.length > 0 ? e[0].ownerDocument : document : e == null ? void 0 : e.ownerDocument) != null ? i : document, s = Array.isArray(e) ? r ? Rl(e) : e : Ll(e);
  n = n != null ? n : a.activeElement;
  let o = (() => {
    if (t & 5)
      return 1;
    if (t & 10)
      return -1;
    throw new Error("Missing Focus.First, Focus.Previous, Focus.Next or Focus.Last");
  })(), l = (() => {
    if (t & 1)
      return 0;
    if (t & 2)
      return Math.max(0, s.indexOf(n)) - 1;
    if (t & 4)
      return Math.max(0, s.indexOf(n)) + 1;
    if (t & 8)
      return s.length - 1;
    throw new Error("Missing Focus.First, Focus.Previous, Focus.Next or Focus.Last");
  })(), u = t & 32 ? { preventScroll: true } : {}, c = 0, p = s.length, f;
  do {
    if (c >= p || c + p <= 0)
      return 0;
    let d = l + c;
    if (t & 16)
      d = (d + p) % p;
    else {
      if (d < 0)
        return 3;
      if (d >= p)
        return 1;
    }
    f = s[d], f == null || f.focus(u), c += o;
  } while (f !== a.activeElement);
  return t & 6 && kl(f) && f.select(), f.hasAttribute("tabindex") || f.setAttribute("tabindex", "0"), 2;
}
function or(e, t, r) {
  zt || watchEffect((n) => {
    document.addEventListener(e, t, r), n(() => document.removeEventListener(e, t, r));
  });
}
function Ml(e, t, r = computed(() => true)) {
  function n(a, s) {
    if (!r.value || a.defaultPrevented)
      return;
    let o = s(a);
    if (o === null || !o.getRootNode().contains(o))
      return;
    let l = function u(c) {
      return typeof c == "function" ? u(c()) : Array.isArray(c) || c instanceof Set ? c : [c];
    }(e);
    for (let u of l) {
      if (u === null)
        continue;
      let c = u instanceof HTMLElement ? u : he(u);
      if (c != null && c.contains(o))
        return;
    }
    return !jl(o, Li.Loose) && o.tabIndex !== -1 && a.preventDefault(), t(a, o);
  }
  let i = ref(null);
  or("mousedown", (a) => {
    var s, o;
    r.value && (i.value = ((o = (s = a.composedPath) == null ? void 0 : s.call(a)) == null ? void 0 : o[0]) || a.target);
  }, true), or("click", (a) => {
    !i.value || (n(a, () => i.value), i.value = null);
  }, true), or("blur", (a) => n(a, () => window.document.activeElement instanceof HTMLIFrameElement ? window.document.activeElement : null), true);
}
var Lt = ((e) => (e[e.None = 1] = "None", e[e.Focusable = 2] = "Focusable", e[e.Hidden = 4] = "Hidden", e))(Lt || {});
let vr = defineComponent({ name: "Hidden", props: { as: { type: [Object, String], default: "div" }, features: { type: Number, default: 1 } }, setup(e, { slots: t, attrs: r }) {
  return () => {
    let { features: n, ...i } = e, a = { "aria-hidden": (n & 2) === 2 ? true : void 0, style: { position: "fixed", top: 1, left: 1, width: 1, height: 0, padding: 0, margin: -1, overflow: "hidden", clip: "rect(0, 0, 0, 0)", whiteSpace: "nowrap", borderWidth: "0", ...(n & 4) === 4 && (n & 2) !== 2 && { display: "none" } } };
    return z({ ourProps: a, theirProps: i, slot: {}, attrs: r, slots: t, name: "Hidden" });
  };
} });
function Nl(e, t, r) {
  zt || watchEffect((n) => {
    window.addEventListener(e, t, r), n(() => window.removeEventListener(e, t, r));
  });
}
var gr = ((e) => (e[e.Forwards = 0] = "Forwards", e[e.Backwards = 1] = "Backwards", e))(gr || {});
function Vl() {
  let e = ref(0);
  return Nl("keydown", (t) => {
    t.key === "Tab" && (e.value = t.shiftKey ? 1 : 0);
  }), e;
}
function ji(e, t, r, n) {
  zt || watchEffect((i) => {
    e = e != null ? e : window, e.addEventListener(t, r, n), i(() => e.removeEventListener(t, r, n));
  });
}
function Hl(e) {
  typeof queueMicrotask == "function" ? queueMicrotask(e) : Promise.resolve().then(e).catch((t) => setTimeout(() => {
    throw t;
  }));
}
var Bi = ((e) => (e[e.None = 1] = "None", e[e.InitialFocus = 2] = "InitialFocus", e[e.TabLock = 4] = "TabLock", e[e.FocusLock = 8] = "FocusLock", e[e.RestoreFocus = 16] = "RestoreFocus", e[e.All = 30] = "All", e))(Bi || {});
let at = Object.assign(defineComponent({ name: "FocusTrap", props: { as: { type: [Object, String], default: "div" }, initialFocus: { type: Object, default: null }, features: { type: Number, default: 30 }, containers: { type: Object, default: ref(/* @__PURE__ */ new Set()) } }, inheritAttrs: false, setup(e, { attrs: t, slots: r, expose: n }) {
  let i = ref(null);
  n({ el: i, $el: i });
  let a = computed(() => Ze(i));
  Ul({ ownerDocument: a }, computed(() => Boolean(e.features & 16)));
  let s = Wl({ ownerDocument: a, container: i, initialFocus: computed(() => e.initialFocus) }, computed(() => Boolean(e.features & 2)));
  zl({ ownerDocument: a, container: i, containers: e.containers, previousActiveElement: s }, computed(() => Boolean(e.features & 8)));
  let o = Vl();
  function l() {
    let u = he(i);
    !u || Y(o.value, { [gr.Forwards]: () => mr(u, dt.First), [gr.Backwards]: () => mr(u, dt.Last) });
  }
  return () => {
    let u = {}, c = { ref: i }, { features: p, initialFocus: f, containers: d, ...h$1 } = e;
    return h(Fragment, [Boolean(p & 4) && h(vr, { as: "button", type: "button", onFocus: l, features: Lt.Focusable }), z({ ourProps: c, theirProps: { ...t, ...h$1 }, slot: u, attrs: t, slots: r, name: "FocusTrap" }), Boolean(p & 4) && h(vr, { as: "button", type: "button", onFocus: l, features: Lt.Focusable })]);
  };
} }), { features: Bi });
function Ul({ ownerDocument: e }, t) {
  let r = ref(null);
  function n() {
    var a;
    r.value || (r.value = (a = e.value) == null ? void 0 : a.activeElement);
  }
  function i() {
    !r.value || (lt(r.value), r.value = null);
  }
  onMounted(() => {
    watch(t, (a, s) => {
      a !== s && (a ? n() : i());
    }, { immediate: true });
  }), onUnmounted(i);
}
function Wl({ ownerDocument: e, container: t, initialFocus: r }, n) {
  let i = ref(null), a = ref(false);
  return onMounted(() => a.value = true), onUnmounted(() => a.value = false), onMounted(() => {
    watch([t, r, n], (s, o) => {
      if (s.every((u, c) => (o == null ? void 0 : o[c]) === u) || !n.value)
        return;
      let l = he(t);
      !l || Hl(() => {
        var u, c;
        if (!a.value)
          return;
        let p = he(r), f = (u = e.value) == null ? void 0 : u.activeElement;
        if (p) {
          if (p === f) {
            i.value = f;
            return;
          }
        } else if (l.contains(f)) {
          i.value = f;
          return;
        }
        p ? lt(p) : mr(l, dt.First | dt.NoScroll) === Fi.Error && console.warn("There are no focusable elements inside the <FocusTrap />"), i.value = (c = e.value) == null ? void 0 : c.activeElement;
      });
    }, { immediate: true, flush: "post" });
  }), i;
}
function zl({ ownerDocument: e, container: t, containers: r, previousActiveElement: n }, i) {
  var a;
  ji((a = e.value) == null ? void 0 : a.defaultView, "focus", (s) => {
    if (!i.value)
      return;
    let o = new Set(r == null ? void 0 : r.value);
    o.add(t);
    let l = n.value;
    if (!l)
      return;
    let u = s.target;
    u && u instanceof HTMLElement ? Gl(o, u) ? (n.value = u, lt(u)) : (s.preventDefault(), s.stopPropagation(), lt(l)) : lt(n.value);
  }, true);
}
function Gl(e, t) {
  var r;
  for (let n of e)
    if ((r = n.value) != null && r.contains(t))
      return true;
  return false;
}
let xn = "body > *", Ue = /* @__PURE__ */ new Set(), be = /* @__PURE__ */ new Map();
function _n(e) {
  e.setAttribute("aria-hidden", "true"), e.inert = true;
}
function Tn(e) {
  let t = be.get(e);
  !t || (t["aria-hidden"] === null ? e.removeAttribute("aria-hidden") : e.setAttribute("aria-hidden", t["aria-hidden"]), e.inert = t.inert);
}
function Kl(e, t = ref(true)) {
  watchEffect((r) => {
    if (!t.value || !e.value)
      return;
    let n = e.value, i = Ze(n);
    if (i) {
      Ue.add(n);
      for (let a of be.keys())
        a.contains(n) && (Tn(a), be.delete(a));
      i.querySelectorAll(xn).forEach((a) => {
        if (a instanceof HTMLElement) {
          for (let s of Ue)
            if (a.contains(s))
              return;
          Ue.size === 1 && (be.set(a, { "aria-hidden": a.getAttribute("aria-hidden"), inert: a.inert }), _n(a));
        }
      }), r(() => {
        if (Ue.delete(n), Ue.size > 0)
          i.querySelectorAll(xn).forEach((a) => {
            if (a instanceof HTMLElement && !be.has(a)) {
              for (let s of Ue)
                if (a.contains(s))
                  return;
              be.set(a, { "aria-hidden": a.getAttribute("aria-hidden"), inert: a.inert }), _n(a);
            }
          });
        else
          for (let a of be.keys())
            Tn(a), be.delete(a);
      });
    }
  });
}
let ki = Symbol("ForcePortalRootContext");
function Xl() {
  return inject(ki, false);
}
let yr = defineComponent({ name: "ForcePortalRoot", props: { as: { type: [Object, String], default: "template" }, force: { type: Boolean, default: false } }, setup(e, { slots: t, attrs: r }) {
  return provide(ki, e.force), () => {
    let { force: n, ...i } = e;
    return z({ theirProps: i, ourProps: {}, slot: {}, slots: t, attrs: r, name: "ForcePortalRoot" });
  };
} });
function Ql(e) {
  let t = Ze(e);
  if (!t) {
    if (e === null)
      return null;
    throw new Error(`[Headless UI]: Cannot find ownerDocument for contextElement: ${e}`);
  }
  let r = t.getElementById("headlessui-portal-root");
  if (r)
    return r;
  let n = t.createElement("div");
  return n.setAttribute("id", "headlessui-portal-root"), t.body.appendChild(n);
}
let Ri = defineComponent({ name: "Portal", props: { as: { type: [Object, String], default: "div" } }, setup(e, { slots: t, attrs: r }) {
  let n = ref(null), i = computed(() => Ze(n)), a = Xl(), s = inject(Mi, null), o = ref(a === true || s == null ? Ql(n.value) : s.resolveTarget());
  return watchEffect(() => {
    a || s != null && (o.value = s.resolveTarget());
  }), onUnmounted(() => {
    var l, u;
    let c = (l = i.value) == null ? void 0 : l.getElementById("headlessui-portal-root");
    !c || o.value === c && o.value.children.length <= 0 && ((u = o.value.parentElement) == null || u.removeChild(o.value));
  }), () => {
    if (o.value === null)
      return null;
    let l = { ref: n, "data-headlessui-portal": "" };
    return h(Teleport, { to: o.value }, z({ ourProps: l, theirProps: e, slot: {}, attrs: r, slots: t, name: "Portal" }));
  };
} }), Mi = Symbol("PortalGroupContext"), Jl = defineComponent({ name: "PortalGroup", props: { as: { type: [Object, String], default: "template" }, target: { type: Object, default: null } }, setup(e, { attrs: t, slots: r }) {
  let n = reactive({ resolveTarget() {
    return e.target;
  } });
  return provide(Mi, n), () => {
    let { target: i, ...a } = e;
    return z({ theirProps: a, ourProps: {}, slot: {}, attrs: t, slots: r, name: "PortalGroup" });
  };
} }), Ni = Symbol("StackContext");
var br = ((e) => (e[e.Add = 0] = "Add", e[e.Remove = 1] = "Remove", e))(br || {});
function Yl() {
  return inject(Ni, () => {
  });
}
function Zl({ type: e, enabled: t, element: r, onUpdate: n }) {
  let i = Yl();
  function a(...s) {
    n == null || n(...s), i(...s);
  }
  onMounted(() => {
    watch(t, (s, o) => {
      s ? a(0, e, r) : o === true && a(1, e, r);
    }, { immediate: true, flush: "sync" });
  }), onUnmounted(() => {
    t.value && a(1, e, r);
  }), provide(Ni, a);
}
let Vi = Symbol("DescriptionContext");
function eu() {
  let e = inject(Vi, null);
  if (e === null)
    throw new Error("Missing parent");
  return e;
}
function tu({ slot: e = ref({}), name: t = "Description", props: r = {} } = {}) {
  let n = ref([]);
  function i(a) {
    return n.value.push(a), () => {
      let s = n.value.indexOf(a);
      s !== -1 && n.value.splice(s, 1);
    };
  }
  return provide(Vi, { register: i, slot: e, name: t, props: r }), computed(() => n.value.length > 0 ? n.value.join(" ") : void 0);
}
defineComponent({ name: "Description", props: { as: { type: [Object, String], default: "p" } }, setup(e, { attrs: t, slots: r }) {
  let n = eu(), i = `headlessui-description-${Ne()}`;
  return onMounted(() => onUnmounted(n.register(i))), () => {
    let { name: a = "Description", slot: s = ref({}), props: o = {} } = n, l = e, u = { ...Object.entries(o).reduce((c, [p, f]) => Object.assign(c, { [p]: unref(f) }), {}), id: i };
    return z({ ourProps: u, theirProps: l, slot: s.value, attrs: t, slots: r, name: a });
  };
} });
function Gr() {
  let e = [], t = [], r = { enqueue(n) {
    t.push(n);
  }, addEventListener(n, i, a, s) {
    return n.addEventListener(i, a, s), r.add(() => n.removeEventListener(i, a, s));
  }, requestAnimationFrame(...n) {
    let i = requestAnimationFrame(...n);
    r.add(() => cancelAnimationFrame(i));
  }, nextFrame(...n) {
    r.requestAnimationFrame(() => {
      r.requestAnimationFrame(...n);
    });
  }, setTimeout(...n) {
    let i = setTimeout(...n);
    r.add(() => clearTimeout(i));
  }, add(n) {
    e.push(n);
  }, dispose() {
    for (let n of e.splice(0))
      n();
  }, async workQueue() {
    for (let n of t.splice(0))
      await n();
  } };
  return r;
}
function ru() {
  return /iPhone/gi.test(window.navigator.platform) || /Mac/gi.test(window.navigator.platform) && window.navigator.maxTouchPoints > 0;
}
var nu = ((e) => (e[e.Open = 0] = "Open", e[e.Closed = 1] = "Closed", e))(nu || {});
let wr = Symbol("DialogContext");
function gt(e) {
  let t = inject(wr, null);
  if (t === null) {
    let r = new Error(`<${e} /> is missing a parent <Dialog /> component.`);
    throw Error.captureStackTrace && Error.captureStackTrace(r, gt), r;
  }
  return t;
}
let _t = "DC8F892D-2EBD-447C-A4C8-A03058436FF4", Kr = defineComponent({ name: "Dialog", inheritAttrs: false, props: { as: { type: [Object, String], default: "div" }, static: { type: Boolean, default: false }, unmount: { type: Boolean, default: true }, open: { type: [Boolean, String], default: _t }, initialFocus: { type: Object, default: null } }, emits: { close: (e) => true }, setup(e, { emit: t, attrs: r, slots: n, expose: i }) {
  var a;
  let s = ref(false);
  onMounted(() => {
    s.value = true;
  });
  let o = ref(0), l = zr(), u = computed(() => e.open === _t && l !== null ? Y(l.value, { [Be.Open]: true, [Be.Closed]: false }) : e.open), c = ref(/* @__PURE__ */ new Set()), p = ref(null), f = ref(null), d = computed(() => Ze(p));
  if (i({ el: p, $el: p }), !(e.open !== _t || l !== null))
    throw new Error("You forgot to provide an `open` prop to the `Dialog`.");
  if (typeof u.value != "boolean")
    throw new Error(`You provided an \`open\` prop to the \`Dialog\`, but the value is not a boolean. Received: ${u.value === _t ? void 0 : e.open}`);
  let h$1 = computed(() => s.value && u.value ? 0 : 1), g = computed(() => h$1.value === 0), w = computed(() => o.value > 1), T = inject(wr, null) !== null, A = computed(() => w.value ? "parent" : "leaf");
  Kl(p, computed(() => w.value ? g.value : false)), Zl({ type: "Dialog", enabled: computed(() => h$1.value === 0), element: p, onUpdate: (b, S, x) => {
    if (S === "Dialog")
      return Y(b, { [br.Add]() {
        c.value.add(x), o.value += 1;
      }, [br.Remove]() {
        c.value.delete(x), o.value -= 1;
      } });
  } });
  let I = tu({ name: "DialogDescription", slot: computed(() => ({ open: u.value })) }), E = `headlessui-dialog-${Ne()}`, O = ref(null), v = { titleId: O, panelRef: ref(null), dialogState: h$1, setTitleId(b) {
    O.value !== b && (O.value = b);
  }, close() {
    t("close", false);
  } };
  return provide(wr, v), Ml(() => {
    var b, S, x;
    return [...Array.from((S = (b = d.value) == null ? void 0 : b.querySelectorAll("body > *, [data-headlessui-portal]")) != null ? S : []).filter((_) => !(!(_ instanceof HTMLElement) || _.contains(he(f)) || v.panelRef.value && _.contains(v.panelRef.value))), (x = v.panelRef.value) != null ? x : p.value];
  }, (b, S) => {
    v.close(), nextTick(() => S == null ? void 0 : S.focus());
  }, computed(() => h$1.value === 0 && !w.value)), ji((a = d.value) == null ? void 0 : a.defaultView, "keydown", (b) => {
    b.defaultPrevented || b.key === Di.Escape && h$1.value === 0 && (w.value || (b.preventDefault(), b.stopPropagation(), v.close()));
  }), watchEffect((b) => {
    var S;
    if (h$1.value !== 0 || T)
      return;
    let x = d.value;
    if (!x)
      return;
    let _ = Gr();
    function $(B, V, R) {
      let M = B.style.getPropertyValue(V);
      return Object.assign(B.style, { [V]: R }), _.add(() => {
        Object.assign(B.style, { [V]: M });
      });
    }
    let C = x == null ? void 0 : x.documentElement, F = ((S = x.defaultView) != null ? S : window).innerWidth - C.clientWidth;
    if ($(C, "overflow", "hidden"), F > 0) {
      let B = C.clientWidth - C.offsetWidth, V = F - B;
      $(C, "paddingRight", `${V}px`);
    }
    if (ru()) {
      let B = window.pageYOffset;
      $(C, "position", "fixed"), $(C, "marginTop", `-${B}px`), $(C, "width", "100%"), _.add(() => window.scrollTo(0, B));
    }
    b(_.dispose);
  }), watchEffect((b) => {
    if (h$1.value !== 0)
      return;
    let S = he(p);
    if (!S)
      return;
    let x = new IntersectionObserver((_) => {
      for (let $ of _)
        $.boundingClientRect.x === 0 && $.boundingClientRect.y === 0 && $.boundingClientRect.width === 0 && $.boundingClientRect.height === 0 && v.close();
    });
    x.observe(S), b(() => x.disconnect());
  }), () => {
    let b = { ...r, ref: p, id: E, role: "dialog", "aria-modal": h$1.value === 0 ? true : void 0, "aria-labelledby": O.value, "aria-describedby": I.value }, { open: S, initialFocus: x, ..._ } = e, $ = { open: h$1.value === 0 };
    return h(yr, { force: true }, () => [h(Ri, () => h(Jl, { target: p.value }, () => h(yr, { force: false }, () => h(at, { initialFocus: x, containers: c, features: g.value ? Y(A.value, { parent: at.features.RestoreFocus, leaf: at.features.All & ~at.features.FocusLock }) : at.features.None }, () => z({ ourProps: b, theirProps: _, slot: $, attrs: r, slots: n, visible: h$1.value === 0, features: Ft.RenderStrategy | Ft.Static, name: "Dialog" }))))), h(vr, { features: Lt.Hidden, ref: f })]);
  };
} });
defineComponent({ name: "DialogOverlay", props: { as: { type: [Object, String], default: "div" } }, setup(e, { attrs: t, slots: r }) {
  let n = gt("DialogOverlay"), i = `headlessui-dialog-overlay-${Ne()}`;
  function a(s) {
    s.target === s.currentTarget && (s.preventDefault(), s.stopPropagation(), n.close());
  }
  return () => z({ ourProps: { id: i, "aria-hidden": true, onClick: a }, theirProps: e, slot: { open: n.dialogState.value === 0 }, attrs: t, slots: r, name: "DialogOverlay" });
} });
defineComponent({ name: "DialogBackdrop", props: { as: { type: [Object, String], default: "div" } }, inheritAttrs: false, setup(e, { attrs: t, slots: r, expose: n }) {
  let i = gt("DialogBackdrop"), a = `headlessui-dialog-backdrop-${Ne()}`, s = ref(null);
  return n({ el: s, $el: s }), onMounted(() => {
    if (i.panelRef.value === null)
      throw new Error("A <DialogBackdrop /> component is being used, but a <DialogPanel /> component is missing.");
  }), () => {
    let o = e, l = { id: a, ref: s, "aria-hidden": true };
    return h(yr, { force: true }, () => h(Ri, () => z({ ourProps: l, theirProps: { ...t, ...o }, slot: { open: i.dialogState.value === 0 }, attrs: t, slots: r, name: "DialogBackdrop" })));
  };
} });
let Xr = defineComponent({ name: "DialogPanel", props: { as: { type: [Object, String], default: "div" } }, setup(e, { attrs: t, slots: r, expose: n }) {
  let i = gt("DialogPanel"), a = `headlessui-dialog-panel-${Ne()}`;
  n({ el: i.panelRef, $el: i.panelRef });
  function s(o) {
    o.stopPropagation();
  }
  return () => {
    let o = { id: a, ref: i.panelRef, onClick: s };
    return z({ ourProps: o, theirProps: e, slot: { open: i.dialogState.value === 0 }, attrs: t, slots: r, name: "DialogPanel" });
  };
} });
defineComponent({ name: "DialogTitle", props: { as: { type: [Object, String], default: "h2" } }, setup(e, { attrs: t, slots: r }) {
  let n = gt("DialogTitle"), i = `headlessui-dialog-title-${Ne()}`;
  return onMounted(() => {
    n.setTitleId(i), onUnmounted(() => n.setTitleId(null));
  }), () => z({ ourProps: { id: i }, theirProps: e, slot: { open: n.dialogState.value === 0 }, attrs: t, slots: r, name: "DialogTitle" });
} });
function iu(e) {
  let t = { called: false };
  return (...r) => {
    if (!t.called)
      return t.called = true, e(...r);
  };
}
function lr(e, ...t) {
  e && t.length > 0 && e.classList.add(...t);
}
function Tt(e, ...t) {
  e && t.length > 0 && e.classList.remove(...t);
}
var Sr = ((e) => (e.Finished = "finished", e.Cancelled = "cancelled", e))(Sr || {});
function au(e, t) {
  let r = Gr();
  if (!e)
    return r.dispose;
  let { transitionDuration: n, transitionDelay: i } = getComputedStyle(e), [a, s] = [n, i].map((o) => {
    let [l = 0] = o.split(",").filter(Boolean).map((u) => u.includes("ms") ? parseFloat(u) : parseFloat(u) * 1e3).sort((u, c) => c - u);
    return l;
  });
  return a !== 0 ? r.setTimeout(() => t("finished"), a + s) : t("finished"), r.add(() => t("cancelled")), r.dispose;
}
function An(e, t, r, n, i, a) {
  let s = Gr(), o = a !== void 0 ? iu(a) : () => {
  };
  return Tt(e, ...i), lr(e, ...t, ...r), s.nextFrame(() => {
    Tt(e, ...r), lr(e, ...n), s.add(au(e, (l) => (Tt(e, ...n, ...t), lr(e, ...i), o(l))));
  }), s.add(() => Tt(e, ...t, ...r, ...n, ...i)), s.add(() => o("cancelled")), s.dispose;
}
function Ce(e = "") {
  return e.split(" ").filter((t) => t.trim().length > 1);
}
let Qr = Symbol("TransitionContext");
var su = ((e) => (e.Visible = "visible", e.Hidden = "hidden", e))(su || {});
function ou() {
  return inject(Qr, null) !== null;
}
function lu() {
  let e = inject(Qr, null);
  if (e === null)
    throw new Error("A <TransitionChild /> is used but it is missing a parent <TransitionRoot />.");
  return e;
}
function uu() {
  let e = inject(Jr, null);
  if (e === null)
    throw new Error("A <TransitionChild /> is used but it is missing a parent <TransitionRoot />.");
  return e;
}
let Jr = Symbol("NestingContext");
function Gt(e) {
  return "children" in e ? Gt(e.children) : e.value.filter(({ state: t }) => t === "visible").length > 0;
}
function Hi(e) {
  let t = ref([]), r = ref(false);
  onMounted(() => r.value = true), onUnmounted(() => r.value = false);
  function n(a, s = we.Hidden) {
    let o = t.value.findIndex(({ id: l }) => l === a);
    o !== -1 && (Y(s, { [we.Unmount]() {
      t.value.splice(o, 1);
    }, [we.Hidden]() {
      t.value[o].state = "hidden";
    } }), !Gt(t) && r.value && (e == null || e()));
  }
  function i(a) {
    let s = t.value.find(({ id: o }) => o === a);
    return s ? s.state !== "visible" && (s.state = "visible") : t.value.push({ id: a, state: "visible" }), () => n(a, we.Unmount);
  }
  return { children: t, register: i, unregister: n };
}
let Ui = Ft.RenderStrategy, et = defineComponent({ props: { as: { type: [Object, String], default: "div" }, show: { type: [Boolean], default: null }, unmount: { type: [Boolean], default: true }, appear: { type: [Boolean], default: false }, enter: { type: [String], default: "" }, enterFrom: { type: [String], default: "" }, enterTo: { type: [String], default: "" }, entered: { type: [String], default: "" }, leave: { type: [String], default: "" }, leaveFrom: { type: [String], default: "" }, leaveTo: { type: [String], default: "" } }, emits: { beforeEnter: () => true, afterEnter: () => true, beforeLeave: () => true, afterLeave: () => true }, setup(e, { emit: t, attrs: r, slots: n, expose: i }) {
  if (!ou() && Dl())
    return () => h(tt, { ...e, onBeforeEnter: () => t("beforeEnter"), onAfterEnter: () => t("afterEnter"), onBeforeLeave: () => t("beforeLeave"), onAfterLeave: () => t("afterLeave") }, n);
  let a = ref(null), s = ref("visible"), o = computed(() => e.unmount ? we.Unmount : we.Hidden);
  i({ el: a, $el: a });
  let { show: l, appear: u } = lu(), { register: c, unregister: p } = uu(), f = { value: true }, d = Ne(), h$1 = { value: false }, g = Hi(() => {
    h$1.value || (s.value = "hidden", p(d), t("afterLeave"));
  });
  onMounted(() => {
    let S = c(d);
    onUnmounted(S);
  }), watchEffect(() => {
    if (o.value === we.Hidden && !!d) {
      if (l && s.value !== "visible") {
        s.value = "visible";
        return;
      }
      Y(s.value, { hidden: () => p(d), visible: () => c(d) });
    }
  });
  let w = Ce(e.enter), T = Ce(e.enterFrom), A = Ce(e.enterTo), I = Ce(e.entered), E = Ce(e.leave), O = Ce(e.leaveFrom), v = Ce(e.leaveTo);
  onMounted(() => {
    watchEffect(() => {
      if (s.value === "visible") {
        let S = he(a);
        if (S instanceof Comment && S.data === "")
          throw new Error("Did you forget to passthrough the `ref` to the actual DOM node?");
      }
    });
  });
  function b(S) {
    let x = f.value && !u.value, _ = he(a);
    !_ || !(_ instanceof HTMLElement) || x || (h$1.value = true, l.value && t("beforeEnter"), l.value || t("beforeLeave"), S(l.value ? An(_, w, T, A, I, ($) => {
      h$1.value = false, $ === Sr.Finished && t("afterEnter");
    }) : An(_, E, O, v, I, ($) => {
      h$1.value = false, $ === Sr.Finished && (Gt(g) || (s.value = "hidden", p(d), t("afterLeave")));
    })));
  }
  return onMounted(() => {
    watch([l], (S, x, _) => {
      b(_), f.value = false;
    }, { immediate: true });
  }), provide(Jr, g), ql(computed(() => Y(s.value, { visible: Be.Open, hidden: Be.Closed }))), () => {
    let { appear: S, show: x, enter: _, enterFrom: $, enterTo: C, entered: F, leave: B, leaveFrom: V, leaveTo: R, ...M } = e;
    return z({ theirProps: M, ourProps: { ref: a }, slot: {}, slots: n, attrs: r, features: Ui, visible: s.value === "visible", name: "TransitionChild" });
  };
} }), cu = et, tt = defineComponent({ inheritAttrs: false, props: { as: { type: [Object, String], default: "div" }, show: { type: [Boolean], default: null }, unmount: { type: [Boolean], default: true }, appear: { type: [Boolean], default: false }, enter: { type: [String], default: "" }, enterFrom: { type: [String], default: "" }, enterTo: { type: [String], default: "" }, entered: { type: [String], default: "" }, leave: { type: [String], default: "" }, leaveFrom: { type: [String], default: "" }, leaveTo: { type: [String], default: "" } }, emits: { beforeEnter: () => true, afterEnter: () => true, beforeLeave: () => true, afterLeave: () => true }, setup(e, { emit: t, attrs: r, slots: n }) {
  let i = zr(), a = computed(() => e.show === null && i !== null ? Y(i.value, { [Be.Open]: true, [Be.Closed]: false }) : e.show);
  watchEffect(() => {
    if (![true, false].includes(a.value))
      throw new Error('A <Transition /> is used but it is missing a `:show="true | false"` prop.');
  });
  let s = ref(a.value ? "visible" : "hidden"), o = Hi(() => {
    s.value = "hidden";
  }), l = ref(true), u = { show: a, appear: computed(() => e.appear || !l.value) };
  return onMounted(() => {
    watchEffect(() => {
      l.value = false, a.value ? s.value = "visible" : Gt(o) || (s.value = "hidden");
    });
  }), provide(Jr, o), provide(Qr, u), () => {
    let c = Ci(e, ["show", "appear", "unmount", "onBeforeEnter", "onBeforeLeave", "onAfterEnter", "onAfterLeave"]), p = { unmount: e.unmount };
    return z({ ourProps: { ...p, as: "template" }, theirProps: {}, slot: {}, slots: { ...n, default: () => [h(cu, { onBeforeEnter: () => t("beforeEnter"), onAfterEnter: () => t("afterEnter"), onBeforeLeave: () => t("beforeLeave"), onAfterLeave: () => t("afterLeave"), ...r, ...p, ...c }, n.default)] }, attrs: {}, features: Ui, visible: s.value === "visible", name: "Transition" });
  };
} });
const fu = {
  props: {
    defaultTitle: {
      type: String,
      required: false,
      default: ""
    },
    defaultText: {
      type: String,
      required: false,
      default: ""
    },
    defaultConfirmButton: {
      type: String,
      required: false,
      default: ""
    },
    defaultCancelButton: {
      type: String,
      required: false,
      default: ""
    }
  },
  data() {
    return {
      isOpen: false
    };
  },
  computed: {
    hasConfirmModal: () => !!m.confirmModal.value,
    title: function() {
      var e;
      return (e = m.confirmModal.value) != null && e.title ? m.confirmModal.value.title : this.defaultTitle;
    },
    text: function() {
      var e;
      return (e = m.confirmModal.value) != null && e.text ? m.confirmModal.value.text : this.defaultText;
    },
    confirmButton: function() {
      var e;
      return (e = m.confirmModal.value) != null && e.confirmButton ? m.confirmModal.value.confirmButton : this.defaultConfirmButton;
    },
    cancelButton: function() {
      var e;
      return (e = m.confirmModal.value) != null && e.cancelButton ? m.confirmModal.value.cancelButton : this.defaultCancelButton;
    }
  },
  watch: {
    hasConfirmModal(e) {
      e && (this.isOpen = true);
    }
  },
  methods: {
    cancel() {
      m.confirmModal.value.rejectPromise(), this.setIsOpen(false);
    },
    confirm() {
      m.confirmModal.value.resolvePromise(), this.setIsOpen(false);
    },
    setIsOpen(e) {
      this.isOpen = e;
    },
    emitClose() {
      m.clearConfirmModal();
    }
  },
  render() {
    return this.$slots.default({
      title: this.title,
      text: this.text,
      confirmButton: this.confirmButton,
      cancelButton: this.cancelButton,
      isOpen: this.isOpen,
      setIsOpen: this.setIsOpen,
      cancel: this.cancel,
      confirm: this.confirm,
      emitClose: this.emitClose,
      Dialog: Kr,
      DialogPanel: Xr,
      TransitionRoot: tt,
      TransitionChild: et
    });
  }
};
function Wi(e, t) {
  t = Wr(t, e);
  for (var r = 0, n = t.length; e != null && r < n; )
    e = e[vt(t[r++])];
  return r && r == n ? e : void 0;
}
function pt(e, t, r) {
  var n = e == null ? void 0 : Wi(e, t);
  return n === void 0 ? r : n;
}
var du = function() {
  try {
    var e = Me(Object, "defineProperty");
    return e({}, "", {}), e;
  } catch {
  }
}();
const In = du;
function zi(e, t, r) {
  t == "__proto__" && In ? In(e, t, {
    configurable: true,
    enumerable: true,
    value: r,
    writable: true
  }) : e[t] = r;
}
var pu = Object.prototype, hu = pu.hasOwnProperty;
function mu(e, t, r) {
  var n = e[t];
  (!(hu.call(e, t) && Vr(n, r)) || r === void 0 && !(t in e)) && zi(e, t, r);
}
function vu(e, t, r, n) {
  if (!te(e))
    return e;
  t = Wr(t, e);
  for (var i = -1, a = t.length, s = a - 1, o = e; o != null && ++i < a; ) {
    var l = vt(t[i]), u = r;
    if (l === "__proto__" || l === "constructor" || l === "prototype")
      return e;
    if (i != s) {
      var c = o[l];
      u = n ? n(c, l, o) : void 0, u === void 0 && (u = te(c) ? c : Dr(t[i + 1]) ? [] : {});
    }
    mu(o, l, u), o = o[l];
  }
  return e;
}
function Gi(e, t, r) {
  return e == null ? e : vu(e, t, r);
}
const gu = {
  props: {
    default: {
      type: Object,
      default: () => ({}),
      required: false
    },
    remember: {
      type: String,
      default: null,
      required: false
    },
    localStorage: {
      type: Boolean,
      default: false,
      required: false
    }
  },
  data() {
    return {
      values: {}
    };
  },
  mounted() {
    if (this.remember) {
      let e = m.restore(this.remember, this.localStorage);
      e || (e = {}), this.values = Object.assign({}, { ...this.default, ...e });
    } else
      this.values = Object.assign({}, { ...this.default });
  },
  updated() {
    this.remember && m.remember(this.remember, { ...this.values }, this.localStorage);
  },
  render() {
    const e = this;
    return this.$slots.default(
      new Proxy(this.values, {
        ownKeys() {
          return Object.keys(e.values);
        },
        get(t, r) {
          return pt(e.values, r);
        },
        set(t, r, n) {
          Gi(e.values, r, n);
        }
      })
    );
  }
};
var yu = function() {
  return le.Date.now();
};
const ur = yu;
var bu = /\s/;
function wu(e) {
  for (var t = e.length; t-- && bu.test(e.charAt(t)); )
    ;
  return t;
}
var Su = /^\s+/;
function Ou(e) {
  return e && e.slice(0, wu(e) + 1).replace(Su, "");
}
var Pn = 0 / 0, $u = /^[-+]0x[0-9a-f]+$/i, Eu = /^0b[01]+$/i, xu = /^0o[0-7]+$/i, _u = parseInt;
function Or(e) {
  if (typeof e == "number")
    return e;
  if (Vt(e))
    return Pn;
  if (te(e)) {
    var t = typeof e.valueOf == "function" ? e.valueOf() : e;
    e = te(t) ? t + "" : t;
  }
  if (typeof e != "string")
    return e === 0 ? e : +e;
  e = Ou(e);
  var r = Eu.test(e);
  return r || xu.test(e) ? _u(e.slice(2), r ? 2 : 8) : $u.test(e) ? Pn : +e;
}
var Tu = "Expected a function", Au = Math.max, Iu = Math.min;
function Yr(e, t, r) {
  var n, i, a, s, o, l, u = 0, c = false, p = false, f = true;
  if (typeof e != "function")
    throw new TypeError(Tu);
  t = Or(t) || 0, te(r) && (c = !!r.leading, p = "maxWait" in r, a = p ? Au(Or(r.maxWait) || 0, t) : a, f = "trailing" in r ? !!r.trailing : f);
  function d(v) {
    var b = n, S = i;
    return n = i = void 0, u = v, s = e.apply(S, b), s;
  }
  function h2(v) {
    return u = v, o = setTimeout(T, t), c ? d(v) : s;
  }
  function g(v) {
    var b = v - l, S = v - u, x = t - b;
    return p ? Iu(x, a - S) : x;
  }
  function w(v) {
    var b = v - l, S = v - u;
    return l === void 0 || b >= t || b < 0 || p && S >= a;
  }
  function T() {
    var v = ur();
    if (w(v))
      return A(v);
    o = setTimeout(T, g(v));
  }
  function A(v) {
    return o = void 0, f && n ? d(v) : (n = i = void 0, s);
  }
  function I() {
    o !== void 0 && clearTimeout(o), u = 0, n = l = i = o = void 0;
  }
  function E() {
    return o === void 0 ? s : A(ur());
  }
  function O() {
    var v = ur(), b = w(v);
    if (n = arguments, i = this, l = v, b) {
      if (o === void 0)
        return h2(l);
      if (p)
        return clearTimeout(o), o = setTimeout(T, t), d(l);
    }
    return o === void 0 && (o = setTimeout(T, t)), s;
  }
  return O.cancel = I, O.flush = E, O;
}
const Pu = {
  props: {
    url: {
      type: String,
      required: true
    },
    method: {
      type: String,
      required: false,
      default: "GET"
    },
    acceptHeader: {
      type: String,
      required: false,
      default: "application/json"
    },
    poll: {
      type: Number,
      required: false,
      default: null
    },
    default: {
      type: Object,
      required: false,
      default: () => ({})
    },
    request: {
      type: Object,
      required: false,
      default: () => ({})
    },
    manual: {
      type: Boolean,
      required: false,
      default: false
    },
    watchDebounce: {
      type: Number,
      required: false,
      default: 0
    },
    watchValue: {
      validator() {
        return true;
      },
      required: false,
      default: null
    }
  },
  data() {
    return {
      response: Object.assign({}, { ...this.default }),
      processing: false,
      debounceFunction: null
    };
  },
  watch: {
    watchValue: {
      deep: true,
      handler() {
        this.processing = true, this.watchDebounce ? this.debounceFunction() : this.performRequest();
      }
    }
  },
  mounted() {
    this.manual || this.$nextTick(this.performRequest);
  },
  created() {
    this.debounceFunction = Yr(() => {
      this.performRequest();
    }, this.watchDebounce);
  },
  methods: {
    performRequest() {
      this.processing = true;
      const e = {
        url: this.url,
        method: this.method,
        headers: {
          Accept: this.acceptHeader
        }
      };
      Object.keys(this.request).length > 0 && (e.data = this.request), ze(e).then((t) => {
        this.response = t.data, this.processing = false;
      }).catch(() => {
        this.processing = false;
      }), this.poll && setTimeout(() => {
        this.performRequest();
      }, this.poll);
    }
  },
  render() {
    return this.$slots.default({
      processing: this.processing,
      response: this.response,
      reload: this.performRequest
    });
  }
}, Cu = {
  data() {
    return {
      isActivated: true
    };
  },
  deactivated() {
    this.isActivated = false;
  },
  activated() {
    this.isActivated = true;
  },
  render() {
    return this.$slots.default({
      Dialog: Kr,
      DialogPanel: Xr,
      isActivated: this.isActivated
    });
  }
}, Ki = {
  __name: "OnClickOutside",
  props: {
    do: {
      type: Function,
      required: true
    },
    opened: {
      type: Boolean,
      required: true
    },
    closeOnEscape: {
      type: Boolean,
      required: false,
      default: true
    },
    ignoreInnerTargets: {
      type: Boolean,
      required: false,
      default: false
    }
  },
  setup(e) {
    const t = e, r = ref(null), n = ref(null), i = ref(null);
    return onMounted(() => {
      r.value = (a) => {
        n.value.children[0].contains(a.target) || t.ignoreInnerTargets && n.value.contains(a.target) || t.do();
      }, document.addEventListener("click", r.value), document.addEventListener("touchstart", r.value), t.closeOnEscape && (i.value = (a) => {
        t.opened && a.key === "Escape" && t.do();
      }, document.addEventListener("keydown", i.value));
    }), onBeforeUnmount(() => {
      document.removeEventListener("click", r.value), document.removeEventListener("touchstart", r.value), t.closeOnEscape && document.removeEventListener("keydown", i.value);
    }), (a, s) => (openBlock(), createElementBlock("div", {
      ref_key: "root",
      ref: n
    }, [
      renderSlot(a.$slots, "default")
    ], 512));
  }
};
function Q(e) {
  if (e == null)
    return window;
  if (e.toString() !== "[object Window]") {
    var t = e.ownerDocument;
    return t && t.defaultView || window;
  }
  return e;
}
function ke(e) {
  var t = Q(e).Element;
  return e instanceof t || e instanceof Element;
}
function X(e) {
  var t = Q(e).HTMLElement;
  return e instanceof t || e instanceof HTMLElement;
}
function Zr(e) {
  if (typeof ShadowRoot > "u")
    return false;
  var t = Q(e).ShadowRoot;
  return e instanceof t || e instanceof ShadowRoot;
}
var Fe = Math.max, jt = Math.min, Ke = Math.round;
function $r() {
  var e = navigator.userAgentData;
  return e != null && e.brands ? e.brands.map(function(t) {
    return t.brand + "/" + t.version;
  }).join(" ") : navigator.userAgent;
}
function Xi() {
  return !/^((?!chrome|android).)*safari/i.test($r());
}
function Xe(e, t, r) {
  t === void 0 && (t = false), r === void 0 && (r = false);
  var n = e.getBoundingClientRect(), i = 1, a = 1;
  t && X(e) && (i = e.offsetWidth > 0 && Ke(n.width) / e.offsetWidth || 1, a = e.offsetHeight > 0 && Ke(n.height) / e.offsetHeight || 1);
  var s = ke(e) ? Q(e) : window, o = s.visualViewport, l = !Xi() && r, u = (n.left + (l && o ? o.offsetLeft : 0)) / i, c = (n.top + (l && o ? o.offsetTop : 0)) / a, p = n.width / i, f = n.height / a;
  return {
    width: p,
    height: f,
    top: c,
    right: u + p,
    bottom: c + f,
    left: u,
    x: u,
    y: c
  };
}
function en(e) {
  var t = Q(e), r = t.pageXOffset, n = t.pageYOffset;
  return {
    scrollLeft: r,
    scrollTop: n
  };
}
function Du(e) {
  return {
    scrollLeft: e.scrollLeft,
    scrollTop: e.scrollTop
  };
}
function qu(e) {
  return e === Q(e) || !X(e) ? en(e) : Du(e);
}
function se(e) {
  return e ? (e.nodeName || "").toLowerCase() : null;
}
function Te(e) {
  return ((ke(e) ? e.ownerDocument : e.document) || window.document).documentElement;
}
function tn(e) {
  return Xe(Te(e)).left + en(e).scrollLeft;
}
function re(e) {
  return Q(e).getComputedStyle(e);
}
function rn(e) {
  var t = re(e), r = t.overflow, n = t.overflowX, i = t.overflowY;
  return /auto|scroll|overlay|hidden/.test(r + i + n);
}
function Fu(e) {
  var t = e.getBoundingClientRect(), r = Ke(t.width) / e.offsetWidth || 1, n = Ke(t.height) / e.offsetHeight || 1;
  return r !== 1 || n !== 1;
}
function Lu(e, t, r) {
  r === void 0 && (r = false);
  var n = X(t), i = X(t) && Fu(t), a = Te(t), s = Xe(e, i, r), o = {
    scrollLeft: 0,
    scrollTop: 0
  }, l = {
    x: 0,
    y: 0
  };
  return (n || !n && !r) && ((se(t) !== "body" || rn(a)) && (o = qu(t)), X(t) ? (l = Xe(t, true), l.x += t.clientLeft, l.y += t.clientTop) : a && (l.x = tn(a))), {
    x: s.left + o.scrollLeft - l.x,
    y: s.top + o.scrollTop - l.y,
    width: s.width,
    height: s.height
  };
}
function Qi(e) {
  var t = Xe(e), r = e.offsetWidth, n = e.offsetHeight;
  return Math.abs(t.width - r) <= 1 && (r = t.width), Math.abs(t.height - n) <= 1 && (n = t.height), {
    x: e.offsetLeft,
    y: e.offsetTop,
    width: r,
    height: n
  };
}
function Kt(e) {
  return se(e) === "html" ? e : e.assignedSlot || e.parentNode || (Zr(e) ? e.host : null) || Te(e);
}
function Ji(e) {
  return ["html", "body", "#document"].indexOf(se(e)) >= 0 ? e.ownerDocument.body : X(e) && rn(e) ? e : Ji(Kt(e));
}
function ut(e, t) {
  var r;
  t === void 0 && (t = []);
  var n = Ji(e), i = n === ((r = e.ownerDocument) == null ? void 0 : r.body), a = Q(n), s = i ? [a].concat(a.visualViewport || [], rn(n) ? n : []) : n, o = t.concat(s);
  return i ? o : o.concat(ut(Kt(s)));
}
function ju(e) {
  return ["table", "td", "th"].indexOf(se(e)) >= 0;
}
function Cn(e) {
  return !X(e) || re(e).position === "fixed" ? null : e.offsetParent;
}
function Bu(e) {
  var t = /firefox/i.test($r()), r = /Trident/i.test($r());
  if (r && X(e)) {
    var n = re(e);
    if (n.position === "fixed")
      return null;
  }
  var i = Kt(e);
  for (Zr(i) && (i = i.host); X(i) && ["html", "body"].indexOf(se(i)) < 0; ) {
    var a = re(i);
    if (a.transform !== "none" || a.perspective !== "none" || a.contain === "paint" || ["transform", "perspective"].indexOf(a.willChange) !== -1 || t && a.willChange === "filter" || t && a.filter && a.filter !== "none")
      return i;
    i = i.parentNode;
  }
  return null;
}
function Xt(e) {
  for (var t = Q(e), r = Cn(e); r && ju(r) && re(r).position === "static"; )
    r = Cn(r);
  return r && (se(r) === "html" || se(r) === "body" && re(r).position === "static") ? t : r || Bu(e) || t;
}
var Z = "top", oe = "bottom", Ee = "right", ce = "left", Qt = "auto", Jt = [Z, oe, Ee, ce], Qe = "start", ht = "end", ku = "clippingParents", Yi = "viewport", st = "popper", Ru = "reference", Dn = /* @__PURE__ */ Jt.reduce(function(e, t) {
  return e.concat([t + "-" + Qe, t + "-" + ht]);
}, []), Mu = /* @__PURE__ */ [].concat(Jt, [Qt]).reduce(function(e, t) {
  return e.concat([t, t + "-" + Qe, t + "-" + ht]);
}, []), Nu = "beforeRead", Vu = "read", Hu = "afterRead", Uu = "beforeMain", Wu = "main", zu = "afterMain", Gu = "beforeWrite", Ku = "write", Xu = "afterWrite", Er = [Nu, Vu, Hu, Uu, Wu, zu, Gu, Ku, Xu];
function Qu(e) {
  var t = /* @__PURE__ */ new Map(), r = /* @__PURE__ */ new Set(), n = [];
  e.forEach(function(a) {
    t.set(a.name, a);
  });
  function i(a) {
    r.add(a.name);
    var s = [].concat(a.requires || [], a.requiresIfExists || []);
    s.forEach(function(o) {
      if (!r.has(o)) {
        var l = t.get(o);
        l && i(l);
      }
    }), n.push(a);
  }
  return e.forEach(function(a) {
    r.has(a.name) || i(a);
  }), n;
}
function Ju(e) {
  var t = Qu(e);
  return Er.reduce(function(r, n) {
    return r.concat(t.filter(function(i) {
      return i.phase === n;
    }));
  }, []);
}
function Yu(e) {
  var t;
  return function() {
    return t || (t = new Promise(function(r) {
      Promise.resolve().then(function() {
        t = void 0, r(e());
      });
    })), t;
  };
}
function ye(e) {
  for (var t = arguments.length, r = new Array(t > 1 ? t - 1 : 0), n = 1; n < t; n++)
    r[n - 1] = arguments[n];
  return [].concat(r).reduce(function(i, a) {
    return i.replace(/%s/, a);
  }, e);
}
var De = 'Popper: modifier "%s" provided an invalid %s property, expected %s but got %s', Zu = 'Popper: modifier "%s" requires "%s", but "%s" modifier is not available', qn = ["name", "enabled", "phase", "fn", "effect", "requires", "options"];
function ec(e) {
  e.forEach(function(t) {
    [].concat(Object.keys(t), qn).filter(function(r, n, i) {
      return i.indexOf(r) === n;
    }).forEach(function(r) {
      switch (r) {
        case "name":
          typeof t.name != "string" && console.error(ye(De, String(t.name), '"name"', '"string"', '"' + String(t.name) + '"'));
          break;
        case "enabled":
          typeof t.enabled != "boolean" && console.error(ye(De, t.name, '"enabled"', '"boolean"', '"' + String(t.enabled) + '"'));
          break;
        case "phase":
          Er.indexOf(t.phase) < 0 && console.error(ye(De, t.name, '"phase"', "either " + Er.join(", "), '"' + String(t.phase) + '"'));
          break;
        case "fn":
          typeof t.fn != "function" && console.error(ye(De, t.name, '"fn"', '"function"', '"' + String(t.fn) + '"'));
          break;
        case "effect":
          t.effect != null && typeof t.effect != "function" && console.error(ye(De, t.name, '"effect"', '"function"', '"' + String(t.fn) + '"'));
          break;
        case "requires":
          t.requires != null && !Array.isArray(t.requires) && console.error(ye(De, t.name, '"requires"', '"array"', '"' + String(t.requires) + '"'));
          break;
        case "requiresIfExists":
          Array.isArray(t.requiresIfExists) || console.error(ye(De, t.name, '"requiresIfExists"', '"array"', '"' + String(t.requiresIfExists) + '"'));
          break;
        case "options":
        case "data":
          break;
        default:
          console.error('PopperJS: an invalid property has been provided to the "' + t.name + '" modifier, valid properties are ' + qn.map(function(n) {
            return '"' + n + '"';
          }).join(", ") + '; but "' + r + '" was provided.');
      }
      t.requires && t.requires.forEach(function(n) {
        e.find(function(i) {
          return i.name === n;
        }) == null && console.error(ye(Zu, String(t.name), n, n));
      });
    });
  });
}
function tc(e, t) {
  var r = /* @__PURE__ */ new Set();
  return e.filter(function(n) {
    var i = t(n);
    if (!r.has(i))
      return r.add(i), true;
  });
}
function fe(e) {
  return e.split("-")[0];
}
function rc(e) {
  var t = e.reduce(function(r, n) {
    var i = r[n.name];
    return r[n.name] = i ? Object.assign({}, i, n, {
      options: Object.assign({}, i.options, n.options),
      data: Object.assign({}, i.data, n.data)
    }) : n, r;
  }, {});
  return Object.keys(t).map(function(r) {
    return t[r];
  });
}
function nc(e, t) {
  var r = Q(e), n = Te(e), i = r.visualViewport, a = n.clientWidth, s = n.clientHeight, o = 0, l = 0;
  if (i) {
    a = i.width, s = i.height;
    var u = Xi();
    (u || !u && t === "fixed") && (o = i.offsetLeft, l = i.offsetTop);
  }
  return {
    width: a,
    height: s,
    x: o + tn(e),
    y: l
  };
}
function ic(e) {
  var t, r = Te(e), n = en(e), i = (t = e.ownerDocument) == null ? void 0 : t.body, a = Fe(r.scrollWidth, r.clientWidth, i ? i.scrollWidth : 0, i ? i.clientWidth : 0), s = Fe(r.scrollHeight, r.clientHeight, i ? i.scrollHeight : 0, i ? i.clientHeight : 0), o = -n.scrollLeft + tn(e), l = -n.scrollTop;
  return re(i || r).direction === "rtl" && (o += Fe(r.clientWidth, i ? i.clientWidth : 0) - a), {
    width: a,
    height: s,
    x: o,
    y: l
  };
}
function ac(e, t) {
  var r = t.getRootNode && t.getRootNode();
  if (e.contains(t))
    return true;
  if (r && Zr(r)) {
    var n = t;
    do {
      if (n && e.isSameNode(n))
        return true;
      n = n.parentNode || n.host;
    } while (n);
  }
  return false;
}
function xr(e) {
  return Object.assign({}, e, {
    left: e.x,
    top: e.y,
    right: e.x + e.width,
    bottom: e.y + e.height
  });
}
function sc(e, t) {
  var r = Xe(e, false, t === "fixed");
  return r.top = r.top + e.clientTop, r.left = r.left + e.clientLeft, r.bottom = r.top + e.clientHeight, r.right = r.left + e.clientWidth, r.width = e.clientWidth, r.height = e.clientHeight, r.x = r.left, r.y = r.top, r;
}
function Fn(e, t, r) {
  return t === Yi ? xr(nc(e, r)) : ke(t) ? sc(t, r) : xr(ic(Te(e)));
}
function oc(e) {
  var t = ut(Kt(e)), r = ["absolute", "fixed"].indexOf(re(e).position) >= 0, n = r && X(e) ? Xt(e) : e;
  return ke(n) ? t.filter(function(i) {
    return ke(i) && ac(i, n) && se(i) !== "body";
  }) : [];
}
function lc(e, t, r, n) {
  var i = t === "clippingParents" ? oc(e) : [].concat(t), a = [].concat(i, [r]), s = a[0], o = a.reduce(function(l, u) {
    var c = Fn(e, u, n);
    return l.top = Fe(c.top, l.top), l.right = jt(c.right, l.right), l.bottom = jt(c.bottom, l.bottom), l.left = Fe(c.left, l.left), l;
  }, Fn(e, s, n));
  return o.width = o.right - o.left, o.height = o.bottom - o.top, o.x = o.left, o.y = o.top, o;
}
function Je(e) {
  return e.split("-")[1];
}
function Zi(e) {
  return ["top", "bottom"].indexOf(e) >= 0 ? "x" : "y";
}
function ea(e) {
  var t = e.reference, r = e.element, n = e.placement, i = n ? fe(n) : null, a = n ? Je(n) : null, s = t.x + t.width / 2 - r.width / 2, o = t.y + t.height / 2 - r.height / 2, l;
  switch (i) {
    case Z:
      l = {
        x: s,
        y: t.y - r.height
      };
      break;
    case oe:
      l = {
        x: s,
        y: t.y + t.height
      };
      break;
    case Ee:
      l = {
        x: t.x + t.width,
        y: o
      };
      break;
    case ce:
      l = {
        x: t.x - r.width,
        y: o
      };
      break;
    default:
      l = {
        x: t.x,
        y: t.y
      };
  }
  var u = i ? Zi(i) : null;
  if (u != null) {
    var c = u === "y" ? "height" : "width";
    switch (a) {
      case Qe:
        l[u] = l[u] - (t[c] / 2 - r[c] / 2);
        break;
      case ht:
        l[u] = l[u] + (t[c] / 2 - r[c] / 2);
        break;
    }
  }
  return l;
}
function ta() {
  return {
    top: 0,
    right: 0,
    bottom: 0,
    left: 0
  };
}
function uc(e) {
  return Object.assign({}, ta(), e);
}
function cc(e, t) {
  return t.reduce(function(r, n) {
    return r[n] = e, r;
  }, {});
}
function nn(e, t) {
  t === void 0 && (t = {});
  var r = t, n = r.placement, i = n === void 0 ? e.placement : n, a = r.strategy, s = a === void 0 ? e.strategy : a, o = r.boundary, l = o === void 0 ? ku : o, u = r.rootBoundary, c = u === void 0 ? Yi : u, p = r.elementContext, f = p === void 0 ? st : p, d = r.altBoundary, h2 = d === void 0 ? false : d, g = r.padding, w = g === void 0 ? 0 : g, T = uc(typeof w != "number" ? w : cc(w, Jt)), A = f === st ? Ru : st, I = e.rects.popper, E = e.elements[h2 ? A : f], O = lc(ke(E) ? E : E.contextElement || Te(e.elements.popper), l, c, s), v = Xe(e.elements.reference), b = ea({
    reference: v,
    element: I,
    strategy: "absolute",
    placement: i
  }), S = xr(Object.assign({}, I, b)), x = f === st ? S : v, _ = {
    top: O.top - x.top + T.top,
    bottom: x.bottom - O.bottom + T.bottom,
    left: O.left - x.left + T.left,
    right: x.right - O.right + T.right
  }, $ = e.modifiersData.offset;
  if (f === st && $) {
    var C = $[i];
    Object.keys(_).forEach(function(F) {
      var B = [Ee, oe].indexOf(F) >= 0 ? 1 : -1, V = [Z, oe].indexOf(F) >= 0 ? "y" : "x";
      _[F] += C[V] * B;
    });
  }
  return _;
}
var Ln = "Popper: Invalid reference or popper argument provided. They must be either a DOM element or virtual element.", fc = "Popper: An infinite loop in the modifiers cycle has been detected! The cycle has been interrupted to prevent a browser crash.", jn = {
  placement: "bottom",
  modifiers: [],
  strategy: "absolute"
};
function Bn() {
  for (var e = arguments.length, t = new Array(e), r = 0; r < e; r++)
    t[r] = arguments[r];
  return !t.some(function(n) {
    return !(n && typeof n.getBoundingClientRect == "function");
  });
}
function dc(e) {
  e === void 0 && (e = {});
  var t = e, r = t.defaultModifiers, n = r === void 0 ? [] : r, i = t.defaultOptions, a = i === void 0 ? jn : i;
  return function(o, l, u) {
    u === void 0 && (u = a);
    var c = {
      placement: "bottom",
      orderedModifiers: [],
      options: Object.assign({}, jn, a),
      modifiersData: {},
      elements: {
        reference: o,
        popper: l
      },
      attributes: {},
      styles: {}
    }, p = [], f = false, d = {
      state: c,
      setOptions: function(T) {
        var A = typeof T == "function" ? T(c.options) : T;
        g(), c.options = Object.assign({}, a, c.options, A), c.scrollParents = {
          reference: ke(o) ? ut(o) : o.contextElement ? ut(o.contextElement) : [],
          popper: ut(l)
        };
        var I = Ju(rc([].concat(n, c.options.modifiers)));
        if (c.orderedModifiers = I.filter(function($) {
          return $.enabled;
        }), process.env.NODE_ENV !== "production") {
          var E = tc([].concat(I, c.options.modifiers), function($) {
            var C = $.name;
            return C;
          });
          if (ec(E), fe(c.options.placement) === Qt) {
            var O = c.orderedModifiers.find(function($) {
              var C = $.name;
              return C === "flip";
            });
            O || console.error(['Popper: "auto" placements require the "flip" modifier be', "present and enabled to work."].join(" "));
          }
          var v = re(l), b = v.marginTop, S = v.marginRight, x = v.marginBottom, _ = v.marginLeft;
          [b, S, x, _].some(function($) {
            return parseFloat($);
          }) && console.warn(['Popper: CSS "margin" styles cannot be used to apply padding', "between the popper and its reference element or boundary.", "To replicate margin, use the `offset` modifier, as well as", "the `padding` option in the `preventOverflow` and `flip`", "modifiers."].join(" "));
        }
        return h2(), d.update();
      },
      forceUpdate: function() {
        if (!f) {
          var T = c.elements, A = T.reference, I = T.popper;
          if (!Bn(A, I)) {
            process.env.NODE_ENV !== "production" && console.error(Ln);
            return;
          }
          c.rects = {
            reference: Lu(A, Xt(I), c.options.strategy === "fixed"),
            popper: Qi(I)
          }, c.reset = false, c.placement = c.options.placement, c.orderedModifiers.forEach(function($) {
            return c.modifiersData[$.name] = Object.assign({}, $.data);
          });
          for (var E = 0, O = 0; O < c.orderedModifiers.length; O++) {
            if (process.env.NODE_ENV !== "production" && (E += 1, E > 100)) {
              console.error(fc);
              break;
            }
            if (c.reset === true) {
              c.reset = false, O = -1;
              continue;
            }
            var v = c.orderedModifiers[O], b = v.fn, S = v.options, x = S === void 0 ? {} : S, _ = v.name;
            typeof b == "function" && (c = b({
              state: c,
              options: x,
              name: _,
              instance: d
            }) || c);
          }
        }
      },
      update: Yu(function() {
        return new Promise(function(w) {
          d.forceUpdate(), w(c);
        });
      }),
      destroy: function() {
        g(), f = true;
      }
    };
    if (!Bn(o, l))
      return process.env.NODE_ENV !== "production" && console.error(Ln), d;
    d.setOptions(u).then(function(w) {
      !f && u.onFirstUpdate && u.onFirstUpdate(w);
    });
    function h2() {
      c.orderedModifiers.forEach(function(w) {
        var T = w.name, A = w.options, I = A === void 0 ? {} : A, E = w.effect;
        if (typeof E == "function") {
          var O = E({
            state: c,
            name: T,
            instance: d,
            options: I
          }), v = function() {
          };
          p.push(O || v);
        }
      });
    }
    function g() {
      p.forEach(function(w) {
        return w();
      }), p = [];
    }
    return d;
  };
}
var At = {
  passive: true
};
function pc(e) {
  var t = e.state, r = e.instance, n = e.options, i = n.scroll, a = i === void 0 ? true : i, s = n.resize, o = s === void 0 ? true : s, l = Q(t.elements.popper), u = [].concat(t.scrollParents.reference, t.scrollParents.popper);
  return a && u.forEach(function(c) {
    c.addEventListener("scroll", r.update, At);
  }), o && l.addEventListener("resize", r.update, At), function() {
    a && u.forEach(function(c) {
      c.removeEventListener("scroll", r.update, At);
    }), o && l.removeEventListener("resize", r.update, At);
  };
}
const hc = {
  name: "eventListeners",
  enabled: true,
  phase: "write",
  fn: function() {
  },
  effect: pc,
  data: {}
};
function mc(e) {
  var t = e.state, r = e.name;
  t.modifiersData[r] = ea({
    reference: t.rects.reference,
    element: t.rects.popper,
    strategy: "absolute",
    placement: t.placement
  });
}
const vc = {
  name: "popperOffsets",
  enabled: true,
  phase: "read",
  fn: mc,
  data: {}
};
var gc = {
  top: "auto",
  right: "auto",
  bottom: "auto",
  left: "auto"
};
function yc(e) {
  var t = e.x, r = e.y, n = window, i = n.devicePixelRatio || 1;
  return {
    x: Ke(t * i) / i || 0,
    y: Ke(r * i) / i || 0
  };
}
function kn(e) {
  var t, r = e.popper, n = e.popperRect, i = e.placement, a = e.variation, s = e.offsets, o = e.position, l = e.gpuAcceleration, u = e.adaptive, c = e.roundOffsets, p = e.isFixed, f = s.x, d = f === void 0 ? 0 : f, h2 = s.y, g = h2 === void 0 ? 0 : h2, w = typeof c == "function" ? c({
    x: d,
    y: g
  }) : {
    x: d,
    y: g
  };
  d = w.x, g = w.y;
  var T = s.hasOwnProperty("x"), A = s.hasOwnProperty("y"), I = ce, E = Z, O = window;
  if (u) {
    var v = Xt(r), b = "clientHeight", S = "clientWidth";
    if (v === Q(r) && (v = Te(r), re(v).position !== "static" && o === "absolute" && (b = "scrollHeight", S = "scrollWidth")), v = v, i === Z || (i === ce || i === Ee) && a === ht) {
      E = oe;
      var x = p && v === O && O.visualViewport ? O.visualViewport.height : v[b];
      g -= x - n.height, g *= l ? 1 : -1;
    }
    if (i === ce || (i === Z || i === oe) && a === ht) {
      I = Ee;
      var _ = p && v === O && O.visualViewport ? O.visualViewport.width : v[S];
      d -= _ - n.width, d *= l ? 1 : -1;
    }
  }
  var $ = Object.assign({
    position: o
  }, u && gc), C = c === true ? yc({
    x: d,
    y: g
  }) : {
    x: d,
    y: g
  };
  if (d = C.x, g = C.y, l) {
    var F;
    return Object.assign({}, $, (F = {}, F[E] = A ? "0" : "", F[I] = T ? "0" : "", F.transform = (O.devicePixelRatio || 1) <= 1 ? "translate(" + d + "px, " + g + "px)" : "translate3d(" + d + "px, " + g + "px, 0)", F));
  }
  return Object.assign({}, $, (t = {}, t[E] = A ? g + "px" : "", t[I] = T ? d + "px" : "", t.transform = "", t));
}
function bc(e) {
  var t = e.state, r = e.options, n = r.gpuAcceleration, i = n === void 0 ? true : n, a = r.adaptive, s = a === void 0 ? true : a, o = r.roundOffsets, l = o === void 0 ? true : o;
  if (process.env.NODE_ENV !== "production") {
    var u = re(t.elements.popper).transitionProperty || "";
    s && ["transform", "top", "right", "bottom", "left"].some(function(p) {
      return u.indexOf(p) >= 0;
    }) && console.warn(["Popper: Detected CSS transitions on at least one of the following", 'CSS properties: "transform", "top", "right", "bottom", "left".', `

`, 'Disable the "computeStyles" modifier\'s `adaptive` option to allow', "for smooth transitions, or remove these properties from the CSS", "transition declaration on the popper element if only transitioning", "opacity or background-color for example.", `

`, "We recommend using the popper element as a wrapper around an inner", "element that can have any CSS property transitioned for animations."].join(" "));
  }
  var c = {
    placement: fe(t.placement),
    variation: Je(t.placement),
    popper: t.elements.popper,
    popperRect: t.rects.popper,
    gpuAcceleration: i,
    isFixed: t.options.strategy === "fixed"
  };
  t.modifiersData.popperOffsets != null && (t.styles.popper = Object.assign({}, t.styles.popper, kn(Object.assign({}, c, {
    offsets: t.modifiersData.popperOffsets,
    position: t.options.strategy,
    adaptive: s,
    roundOffsets: l
  })))), t.modifiersData.arrow != null && (t.styles.arrow = Object.assign({}, t.styles.arrow, kn(Object.assign({}, c, {
    offsets: t.modifiersData.arrow,
    position: "absolute",
    adaptive: false,
    roundOffsets: l
  })))), t.attributes.popper = Object.assign({}, t.attributes.popper, {
    "data-popper-placement": t.placement
  });
}
const wc = {
  name: "computeStyles",
  enabled: true,
  phase: "beforeWrite",
  fn: bc,
  data: {}
};
function Sc(e) {
  var t = e.state;
  Object.keys(t.elements).forEach(function(r) {
    var n = t.styles[r] || {}, i = t.attributes[r] || {}, a = t.elements[r];
    !X(a) || !se(a) || (Object.assign(a.style, n), Object.keys(i).forEach(function(s) {
      var o = i[s];
      o === false ? a.removeAttribute(s) : a.setAttribute(s, o === true ? "" : o);
    }));
  });
}
function Oc(e) {
  var t = e.state, r = {
    popper: {
      position: t.options.strategy,
      left: "0",
      top: "0",
      margin: "0"
    },
    arrow: {
      position: "absolute"
    },
    reference: {}
  };
  return Object.assign(t.elements.popper.style, r.popper), t.styles = r, t.elements.arrow && Object.assign(t.elements.arrow.style, r.arrow), function() {
    Object.keys(t.elements).forEach(function(n) {
      var i = t.elements[n], a = t.attributes[n] || {}, s = Object.keys(t.styles.hasOwnProperty(n) ? t.styles[n] : r[n]), o = s.reduce(function(l, u) {
        return l[u] = "", l;
      }, {});
      !X(i) || !se(i) || (Object.assign(i.style, o), Object.keys(a).forEach(function(l) {
        i.removeAttribute(l);
      }));
    });
  };
}
const $c = {
  name: "applyStyles",
  enabled: true,
  phase: "write",
  fn: Sc,
  effect: Oc,
  requires: ["computeStyles"]
};
var Ec = [hc, vc, wc, $c], xc = /* @__PURE__ */ dc({
  defaultModifiers: Ec
});
function _c(e) {
  return e === "x" ? "y" : "x";
}
function Pt(e, t, r) {
  return Fe(e, jt(t, r));
}
function Tc(e, t, r) {
  var n = Pt(e, t, r);
  return n > r ? r : n;
}
function Ac(e) {
  var t = e.state, r = e.options, n = e.name, i = r.mainAxis, a = i === void 0 ? true : i, s = r.altAxis, o = s === void 0 ? false : s, l = r.boundary, u = r.rootBoundary, c = r.altBoundary, p = r.padding, f = r.tether, d = f === void 0 ? true : f, h2 = r.tetherOffset, g = h2 === void 0 ? 0 : h2, w = nn(t, {
    boundary: l,
    rootBoundary: u,
    padding: p,
    altBoundary: c
  }), T = fe(t.placement), A = Je(t.placement), I = !A, E = Zi(T), O = _c(E), v = t.modifiersData.popperOffsets, b = t.rects.reference, S = t.rects.popper, x = typeof g == "function" ? g(Object.assign({}, t.rects, {
    placement: t.placement
  })) : g, _ = typeof x == "number" ? {
    mainAxis: x,
    altAxis: x
  } : Object.assign({
    mainAxis: 0,
    altAxis: 0
  }, x), $ = t.modifiersData.offset ? t.modifiersData.offset[t.placement] : null, C = {
    x: 0,
    y: 0
  };
  if (!!v) {
    if (a) {
      var F, B = E === "y" ? Z : ce, V = E === "y" ? oe : Ee, R = E === "y" ? "height" : "width", M = v[E], bt = M + w[B], Ae = M - w[V], wt = d ? -S[R] / 2 : 0, Zt = A === Qe ? b[R] : S[R], rt = A === Qe ? -S[R] : -b[R], St = t.elements.arrow, He = d && St ? Qi(St) : {
        width: 0,
        height: 0
      }, ge = t.modifiersData["arrow#persistent"] ? t.modifiersData["arrow#persistent"].padding : ta(), nt = ge[B], Ot = ge[V], Ie = Pt(0, b[R], He[R]), er = I ? b[R] / 2 - wt - Ie - nt - _.mainAxis : Zt - Ie - nt - _.mainAxis, ha = I ? -b[R] / 2 + wt + Ie + Ot + _.mainAxis : rt + Ie + Ot + _.mainAxis, tr = t.elements.arrow && Xt(t.elements.arrow), ma = tr ? E === "y" ? tr.clientTop || 0 : tr.clientLeft || 0 : 0, on = (F = $ == null ? void 0 : $[E]) != null ? F : 0, va = M + er - on - ma, ga = M + ha - on, ln = Pt(d ? jt(bt, va) : bt, M, d ? Fe(Ae, ga) : Ae);
      v[E] = ln, C[E] = ln - M;
    }
    if (o) {
      var un, ya = E === "x" ? Z : ce, ba = E === "x" ? oe : Ee, Pe = v[O], $t = O === "y" ? "height" : "width", cn = Pe + w[ya], fn = Pe - w[ba], rr = [Z, ce].indexOf(T) !== -1, dn = (un = $ == null ? void 0 : $[O]) != null ? un : 0, pn = rr ? cn : Pe - b[$t] - S[$t] - dn + _.altAxis, hn = rr ? Pe + b[$t] + S[$t] - dn - _.altAxis : fn, mn = d && rr ? Tc(pn, Pe, hn) : Pt(d ? pn : cn, Pe, d ? hn : fn);
      v[O] = mn, C[O] = mn - Pe;
    }
    t.modifiersData[n] = C;
  }
}
const Ic = {
  name: "preventOverflow",
  enabled: true,
  phase: "main",
  fn: Ac,
  requiresIfExists: ["offset"]
};
var Pc = {
  left: "right",
  right: "left",
  bottom: "top",
  top: "bottom"
};
function Ct(e) {
  return e.replace(/left|right|bottom|top/g, function(t) {
    return Pc[t];
  });
}
var Cc = {
  start: "end",
  end: "start"
};
function Rn(e) {
  return e.replace(/start|end/g, function(t) {
    return Cc[t];
  });
}
function Dc(e, t) {
  t === void 0 && (t = {});
  var r = t, n = r.placement, i = r.boundary, a = r.rootBoundary, s = r.padding, o = r.flipVariations, l = r.allowedAutoPlacements, u = l === void 0 ? Mu : l, c = Je(n), p = c ? o ? Dn : Dn.filter(function(h2) {
    return Je(h2) === c;
  }) : Jt, f = p.filter(function(h2) {
    return u.indexOf(h2) >= 0;
  });
  f.length === 0 && (f = p, process.env.NODE_ENV !== "production" && console.error(["Popper: The `allowedAutoPlacements` option did not allow any", "placements. Ensure the `placement` option matches the variation", "of the allowed placements.", 'For example, "auto" cannot be used to allow "bottom-start".', 'Use "auto-start" instead.'].join(" ")));
  var d = f.reduce(function(h2, g) {
    return h2[g] = nn(e, {
      placement: g,
      boundary: i,
      rootBoundary: a,
      padding: s
    })[fe(g)], h2;
  }, {});
  return Object.keys(d).sort(function(h2, g) {
    return d[h2] - d[g];
  });
}
function qc(e) {
  if (fe(e) === Qt)
    return [];
  var t = Ct(e);
  return [Rn(e), t, Rn(t)];
}
function Fc(e) {
  var t = e.state, r = e.options, n = e.name;
  if (!t.modifiersData[n]._skip) {
    for (var i = r.mainAxis, a = i === void 0 ? true : i, s = r.altAxis, o = s === void 0 ? true : s, l = r.fallbackPlacements, u = r.padding, c = r.boundary, p = r.rootBoundary, f = r.altBoundary, d = r.flipVariations, h2 = d === void 0 ? true : d, g = r.allowedAutoPlacements, w = t.options.placement, T = fe(w), A = T === w, I = l || (A || !h2 ? [Ct(w)] : qc(w)), E = [w].concat(I).reduce(function(He, ge) {
      return He.concat(fe(ge) === Qt ? Dc(t, {
        placement: ge,
        boundary: c,
        rootBoundary: p,
        padding: u,
        flipVariations: h2,
        allowedAutoPlacements: g
      }) : ge);
    }, []), O = t.rects.reference, v = t.rects.popper, b = /* @__PURE__ */ new Map(), S = true, x = E[0], _ = 0; _ < E.length; _++) {
      var $ = E[_], C = fe($), F = Je($) === Qe, B = [Z, oe].indexOf(C) >= 0, V = B ? "width" : "height", R = nn(t, {
        placement: $,
        boundary: c,
        rootBoundary: p,
        altBoundary: f,
        padding: u
      }), M = B ? F ? Ee : ce : F ? oe : Z;
      O[V] > v[V] && (M = Ct(M));
      var bt = Ct(M), Ae = [];
      if (a && Ae.push(R[C] <= 0), o && Ae.push(R[M] <= 0, R[bt] <= 0), Ae.every(function(He) {
        return He;
      })) {
        x = $, S = false;
        break;
      }
      b.set($, Ae);
    }
    if (S)
      for (var wt = h2 ? 3 : 1, Zt = function(ge) {
        var nt = E.find(function(Ot) {
          var Ie = b.get(Ot);
          if (Ie)
            return Ie.slice(0, ge).every(function(er) {
              return er;
            });
        });
        if (nt)
          return x = nt, "break";
      }, rt = wt; rt > 0; rt--) {
        var St = Zt(rt);
        if (St === "break")
          break;
      }
    t.placement !== x && (t.modifiersData[n]._skip = true, t.placement = x, t.reset = true);
  }
}
const Lc = {
  name: "flip",
  enabled: true,
  phase: "main",
  fn: Fc,
  requiresIfExists: ["offset"],
  data: {
    _skip: false
  }
}, Ve = (e, t) => {
  const r = e.__vccOpts || e;
  for (const [n, i] of t)
    r[n] = i;
  return r;
}, jc = {
  components: {
    OnClickOutside: Ki
  },
  props: {
    spladeId: {
      type: String,
      required: true
    },
    placement: {
      type: String,
      default: "bottom-start",
      required: false
    },
    strategy: {
      type: String,
      default: "absolute",
      required: false
    },
    inline: {
      type: Boolean,
      default: false,
      required: false
    },
    disabled: {
      type: Boolean,
      default: false,
      required: false
    },
    teleport: {
      type: Boolean,
      default: false,
      required: false
    },
    closeOnClick: {
      type: Boolean,
      default: false,
      required: false
    }
  },
  data() {
    return {
      opened: false,
      popper: null
    };
  },
  computed: {
    buttonStyle() {
      return this.inline ? { display: "inline" } : {};
    },
    wrapperStyle() {
      const e = { position: "relative" };
      return this.inline && (e.display = "inline"), e;
    }
  },
  watch: {
    opened() {
      this.popper.update();
    }
  },
  mounted: async function() {
    this.teleport && await nextTick();
    const e = this.teleport ? document.querySelector(`div[data-splade-dropdown-id="${this.spladeId}"]`) : this.$refs.tooltip.children[0];
    this.popper = xc(this.$refs.button, e, {
      placement: this.placement,
      modifiers: [Lc, Ic],
      strategy: this.strategy
    });
  },
  methods: {
    toggle() {
      this.opened = !this.opened;
    },
    hide() {
      this.opened = false;
    }
  }
}, Bc = { ref: "tooltip" };
function kc(e, t, r, n, i, a) {
  const s = resolveComponent("OnClickOutside");
  return openBlock(), createBlock(s, {
    style: normalizeStyle(a.wrapperStyle),
    do: a.hide,
    opened: i.opened,
    "ignore-inner-targets": !r.closeOnClick
  }, {
    default: withCtx(() => [
      createElementVNode("div", {
        ref: "button",
        style: normalizeStyle(a.buttonStyle)
      }, [
        renderSlot(e.$slots, "button", {
          toggle: a.toggle,
          disabled: r.disabled
        })
      ], 4),
      createElementVNode("div", Bc, [
        renderSlot(e.$slots, "default", {
          hide: a.hide,
          opened: i.opened
        })
      ], 512)
    ]),
    _: 3
  }, 8, ["style", "do", "opened", "ignore-inner-targets"]);
}
const Rc = /* @__PURE__ */ Ve(jc, [["render", kc]]), Mc = {
  __name: "DynamicHtml",
  props: {
    keepAliveKey: {
      type: String,
      required: true
    },
    name: {
      type: String,
      required: true
    }
  },
  setup(e) {
    const t = inject("$splade") || {}, r = inject("$spladeOptions") || {};
    return (n, i) => unref(t).isSsr ? (openBlock(), createBlock(ue, {
      key: e.keepAliveKey,
      html: unref(t).htmlForDynamicComponent(e.name)
    }, null, 8, ["html"])) : (openBlock(), createBlock(KeepAlive, {
      key: 0,
      max: unref(r).max_keep_alive
    }, [
      (openBlock(), createBlock(ue, {
        key: e.keepAliveKey,
        html: unref(t).htmlForDynamicComponent(e.name)
      }, null, 8, ["html"]))
    ], 1032, ["max"]));
  }
};
function ra(e) {
  return e && e.length ? e[0] : void 0;
}
const Nc = {
  inject: ["stack"],
  computed: {
    values() {
      return m.validationErrors(this.stack);
    }
  },
  render() {
    const e = this;
    return this.$slots.default({
      has(t) {
        return G(e.values, t);
      },
      first(t) {
        return ra(e.values[t] || []);
      },
      all: { ...this.values },
      ...this.values
    });
  }
}, Vc = {
  props: {
    private: {
      type: Boolean,
      required: false,
      default: false
    },
    channel: {
      type: String,
      required: true
    },
    listeners: {
      type: Array,
      required: true
    }
  },
  data() {
    return {
      subscribed: false,
      subscription: null,
      subscriptions: [],
      events: []
    };
  },
  beforeUnmount() {
    this.subscription && (window.Echo.leave(this.subscription.subscription.name), this.subscription = null, this.subscriptions = []);
  },
  mounted() {
    this.subscription = this.private ? window.Echo.private(this.channel) : window.Echo.channel(this.channel), this.subscription.on("pusher:subscription_succeeded", () => {
      this.subscribed = true;
    }), this.listeners.forEach((e) => {
      const t = this.subscription.listen(e, (r) => {
        const n = "splade.redirect", i = "splade.refresh", a = "splade.toast";
        let s = null, o = false, l = [];
        J(r, (u) => {
          !te(u) || (n in u && (s = u[n]), i in u && (o = u[i]), a in u && l.push(u));
        }), s ? m.visit(s) : o ? m.refresh() : this.events.push({ name: e, data: r }), l.length > 0 && l.forEach((u) => {
          m.pushToast(u);
        }), this.$root.$emit(`event.${e}`, r);
      });
      this.subscriptions.push(t);
    });
  },
  render() {
    return this.$slots.default({
      subscribed: this.subscribed,
      events: this.events
    });
  }
};
function Hc() {
  this.__data__ = new me(), this.size = 0;
}
function Uc(e) {
  var t = this.__data__, r = t.delete(e);
  return this.size = t.size, r;
}
function Wc(e) {
  return this.__data__.get(e);
}
function zc(e) {
  return this.__data__.has(e);
}
var Gc = 200;
function Kc(e, t) {
  var r = this.__data__;
  if (r instanceof me) {
    var n = r.__data__;
    if (!ft || n.length < Gc - 1)
      return n.push([e, t]), this.size = ++r.size, this;
    r = this.__data__ = new ve(n);
  }
  return r.set(e, t), this.size = r.size, this;
}
function de(e) {
  var t = this.__data__ = new me(e);
  this.size = t.size;
}
de.prototype.clear = Hc;
de.prototype.delete = Uc;
de.prototype.get = Wc;
de.prototype.has = zc;
de.prototype.set = Kc;
var Xc = "__lodash_hash_undefined__";
function Qc(e) {
  return this.__data__.set(e, Xc), this;
}
function Jc(e) {
  return this.__data__.has(e);
}
function Bt(e) {
  var t = -1, r = e == null ? 0 : e.length;
  for (this.__data__ = new ve(); ++t < r; )
    this.add(e[t]);
}
Bt.prototype.add = Bt.prototype.push = Qc;
Bt.prototype.has = Jc;
function Yc(e, t) {
  for (var r = -1, n = e == null ? 0 : e.length; ++r < n; )
    if (t(e[r], r, e))
      return true;
  return false;
}
function Zc(e, t) {
  return e.has(t);
}
var ef = 1, tf = 2;
function na(e, t, r, n, i, a) {
  var s = r & ef, o = e.length, l = t.length;
  if (o != l && !(s && l > o))
    return false;
  var u = a.get(e), c = a.get(t);
  if (u && c)
    return u == t && c == e;
  var p = -1, f = true, d = r & tf ? new Bt() : void 0;
  for (a.set(e, t), a.set(t, e); ++p < o; ) {
    var h2 = e[p], g = t[p];
    if (n)
      var w = s ? n(g, h2, p, t, e, a) : n(h2, g, p, e, t, a);
    if (w !== void 0) {
      if (w)
        continue;
      f = false;
      break;
    }
    if (d) {
      if (!Yc(t, function(T, A) {
        if (!Zc(d, A) && (h2 === T || i(h2, T, r, n, a)))
          return d.push(A);
      })) {
        f = false;
        break;
      }
    } else if (!(h2 === g || i(h2, g, r, n, a))) {
      f = false;
      break;
    }
  }
  return a.delete(e), a.delete(t), f;
}
var rf = le.Uint8Array;
const Mn = rf;
function nf(e) {
  var t = -1, r = Array(e.size);
  return e.forEach(function(n, i) {
    r[++t] = [i, n];
  }), r;
}
function af(e) {
  var t = -1, r = Array(e.size);
  return e.forEach(function(n) {
    r[++t] = n;
  }), r;
}
var sf = 1, of = 2, lf = "[object Boolean]", uf = "[object Date]", cf = "[object Error]", ff = "[object Map]", df = "[object Number]", pf = "[object RegExp]", hf = "[object Set]", mf = "[object String]", vf = "[object Symbol]", gf = "[object ArrayBuffer]", yf = "[object DataView]", Nn = Se ? Se.prototype : void 0, cr = Nn ? Nn.valueOf : void 0;
function bf(e, t, r, n, i, a, s) {
  switch (r) {
    case yf:
      if (e.byteLength != t.byteLength || e.byteOffset != t.byteOffset)
        return false;
      e = e.buffer, t = t.buffer;
    case gf:
      return !(e.byteLength != t.byteLength || !a(new Mn(e), new Mn(t)));
    case lf:
    case uf:
    case df:
      return Vr(+e, +t);
    case cf:
      return e.name == t.name && e.message == t.message;
    case pf:
    case mf:
      return e == t + "";
    case ff:
      var o = nf;
    case hf:
      var l = n & sf;
      if (o || (o = af), e.size != t.size && !l)
        return false;
      var u = s.get(e);
      if (u)
        return u == t;
      n |= of, s.set(e, t);
      var c = na(o(e), o(t), n, i, a, s);
      return s.delete(e), c;
    case vf:
      if (cr)
        return cr.call(e) == cr.call(t);
  }
  return false;
}
function wf(e, t) {
  for (var r = -1, n = t.length, i = e.length; ++r < n; )
    e[i + r] = t[r];
  return e;
}
function Sf(e, t, r) {
  var n = t(e);
  return j(e) ? n : wf(n, r(e));
}
function ia(e, t) {
  for (var r = -1, n = e == null ? 0 : e.length, i = 0, a = []; ++r < n; ) {
    var s = e[r];
    t(s, r, e) && (a[i++] = s);
  }
  return a;
}
function Of() {
  return [];
}
var $f = Object.prototype, Ef = $f.propertyIsEnumerable, Vn = Object.getOwnPropertySymbols, xf = Vn ? function(e) {
  return e == null ? [] : (e = Object(e), ia(Vn(e), function(t) {
    return Ef.call(e, t);
  }));
} : Of;
const _f = xf;
function Hn(e) {
  return Sf(e, Mt, _f);
}
var Tf = 1, Af = Object.prototype, If = Af.hasOwnProperty;
function Pf(e, t, r, n, i, a) {
  var s = r & Tf, o = Hn(e), l = o.length, u = Hn(t), c = u.length;
  if (l != c && !s)
    return false;
  for (var p = l; p--; ) {
    var f = o[p];
    if (!(s ? f in t : If.call(t, f)))
      return false;
  }
  var d = a.get(e), h2 = a.get(t);
  if (d && h2)
    return d == t && h2 == e;
  var g = true;
  a.set(e, t), a.set(t, e);
  for (var w = s; ++p < l; ) {
    f = o[p];
    var T = e[f], A = t[f];
    if (n)
      var I = s ? n(A, T, f, t, e, a) : n(T, A, f, e, t, a);
    if (!(I === void 0 ? T === A || i(T, A, r, n, a) : I)) {
      g = false;
      break;
    }
    w || (w = f == "constructor");
  }
  if (g && !w) {
    var E = e.constructor, O = t.constructor;
    E != O && "constructor" in e && "constructor" in t && !(typeof E == "function" && E instanceof E && typeof O == "function" && O instanceof O) && (g = false);
  }
  return a.delete(e), a.delete(t), g;
}
var Cf = Me(le, "DataView");
const _r = Cf;
var Df = Me(le, "Promise");
const Tr = Df;
var qf = Me(le, "Set");
const Ar = qf;
var Ff = Me(le, "WeakMap");
const Ir = Ff;
var Un = "[object Map]", Lf = "[object Object]", Wn = "[object Promise]", zn = "[object Set]", Gn = "[object WeakMap]", Kn = "[object DataView]", jf = Re(_r), Bf = Re(ft), kf = Re(Tr), Rf = Re(Ar), Mf = Re(Ir), qe = _e;
(_r && qe(new _r(new ArrayBuffer(1))) != Kn || ft && qe(new ft()) != Un || Tr && qe(Tr.resolve()) != Wn || Ar && qe(new Ar()) != zn || Ir && qe(new Ir()) != Gn) && (qe = function(e) {
  var t = _e(e), r = t == Lf ? e.constructor : void 0, n = r ? Re(r) : "";
  if (n)
    switch (n) {
      case jf:
        return Kn;
      case Bf:
        return Un;
      case kf:
        return Wn;
      case Rf:
        return zn;
      case Mf:
        return Gn;
    }
  return t;
});
const Xn = qe;
var Nf = 1, Qn = "[object Arguments]", Jn = "[object Array]", It = "[object Object]", Vf = Object.prototype, Yn = Vf.hasOwnProperty;
function Hf(e, t, r, n, i, a) {
  var s = j(e), o = j(t), l = s ? Jn : Xn(e), u = o ? Jn : Xn(t);
  l = l == Qn ? It : l, u = u == Qn ? It : u;
  var c = l == It, p = u == It, f = l == u;
  if (f && dr(e)) {
    if (!dr(t))
      return false;
    s = true, c = false;
  }
  if (f && !c)
    return a || (a = new de()), s || ci(e) ? na(e, t, r, n, i, a) : bf(e, t, l, r, n, i, a);
  if (!(r & Nf)) {
    var d = c && Yn.call(e, "__wrapped__"), h2 = p && Yn.call(t, "__wrapped__");
    if (d || h2) {
      var g = d ? e.value() : e, w = h2 ? t.value() : t;
      return a || (a = new de()), i(g, w, r, n, a);
    }
  }
  return f ? (a || (a = new de()), Pf(e, t, r, n, i, a)) : false;
}
function Yt(e, t, r, n, i) {
  return e === t ? true : e == null || t == null || !Oe(e) && !Oe(t) ? e !== e && t !== t : Hf(e, t, r, n, Yt, i);
}
var Uf = 1, Wf = 2;
function zf(e, t, r, n) {
  var i = r.length, a = i, s = !n;
  if (e == null)
    return !a;
  for (e = Object(e); i--; ) {
    var o = r[i];
    if (s && o[2] ? o[1] !== e[o[0]] : !(o[0] in e))
      return false;
  }
  for (; ++i < a; ) {
    o = r[i];
    var l = o[0], u = e[l], c = o[1];
    if (s && o[2]) {
      if (u === void 0 && !(l in e))
        return false;
    } else {
      var p = new de();
      if (n)
        var f = n(u, c, l, e, t, p);
      if (!(f === void 0 ? Yt(c, u, Uf | Wf, n, p) : f))
        return false;
    }
  }
  return true;
}
function aa(e) {
  return e === e && !te(e);
}
function Gf(e) {
  for (var t = Mt(e), r = t.length; r--; ) {
    var n = t[r], i = e[n];
    t[r] = [n, i, aa(i)];
  }
  return t;
}
function sa(e, t) {
  return function(r) {
    return r == null ? false : r[e] === t && (t !== void 0 || e in Object(r));
  };
}
function Kf(e) {
  var t = Gf(e);
  return t.length == 1 && t[0][2] ? sa(t[0][0], t[0][1]) : function(r) {
    return r === e || zf(r, e, t);
  };
}
function Xf(e, t) {
  return e != null && t in Object(e);
}
function Qf(e, t) {
  return e != null && Ii(e, t, Xf);
}
var Jf = 1, Yf = 2;
function Zf(e, t) {
  return Nr(e) && aa(t) ? sa(vt(e), t) : function(r) {
    var n = pt(r, e);
    return n === void 0 && n === t ? Qf(r, e) : Yt(t, n, Jf | Yf);
  };
}
function ed(e) {
  return function(t) {
    return t == null ? void 0 : t[e];
  };
}
function td(e) {
  return function(t) {
    return Wi(t, e);
  };
}
function rd(e) {
  return Nr(e) ? ed(vt(e)) : td(e);
}
function yt(e) {
  return typeof e == "function" ? e : e == null ? di : typeof e == "object" ? j(e) ? Zf(e[0], e[1]) : Kf(e) : rd(e);
}
function nd(e) {
  return function(t, r, n) {
    var i = Object(t);
    if (!Rt(t)) {
      var a = yt(r);
      t = Mt(t), r = function(o) {
        return a(i[o], o, i);
      };
    }
    var s = e(t, r, n);
    return s > -1 ? i[a ? t[s] : s] : void 0;
  };
}
function id(e, t, r, n) {
  for (var i = e.length, a = r + (n ? 1 : -1); n ? a-- : ++a < i; )
    if (t(e[a], a, e))
      return a;
  return -1;
}
var Zn = 1 / 0, ad = 17976931348623157e292;
function sd(e) {
  if (!e)
    return e === 0 ? e : 0;
  if (e = Or(e), e === Zn || e === -Zn) {
    var t = e < 0 ? -1 : 1;
    return t * ad;
  }
  return e === e ? e : 0;
}
function an(e) {
  var t = sd(e), r = t % 1;
  return t === t ? r ? t - r : t : 0;
}
var od = Math.max;
function ld(e, t, r) {
  var n = e == null ? 0 : e.length;
  if (!n)
    return -1;
  var i = r == null ? 0 : an(r);
  return i < 0 && (i = od(n + i, 0)), id(e, yt(t), i);
}
var ud = nd(ld);
const sn = ud, cd = {
  props: {
    form: {
      type: Object,
      required: true
    },
    field: {
      type: String,
      required: true
    },
    multiple: {
      type: Boolean,
      required: true
    },
    filepond: {
      type: [Boolean, Object],
      required: false,
      default: true
    },
    jsFilepondOptions: {
      type: Object,
      required: false,
      default: () => ({})
    },
    placeholder: {
      type: String,
      required: false,
      default: ""
    },
    preview: {
      type: Boolean,
      required: false,
      default: false
    },
    server: {
      type: [Boolean, String],
      required: false,
      default: false
    },
    accept: {
      type: Array,
      required: false,
      default: () => []
    },
    minFileSize: {
      type: [Boolean, Number, String],
      required: false,
      default: false
    },
    maxFileSize: {
      type: [Boolean, Number, String],
      required: false,
      default: false
    },
    minImageWidth: {
      type: [Boolean, Number],
      required: false,
      default: false
    },
    maxImageWidth: {
      type: [Boolean, Number],
      required: false,
      default: false
    },
    minImageHeight: {
      type: [Boolean, Number],
      required: false,
      default: false
    },
    maxImageHeight: {
      type: [Boolean, Number],
      required: false,
      default: false
    },
    minImageResolution: {
      type: [Boolean, Number],
      required: false,
      default: false
    },
    maxImageResolution: {
      type: [Boolean, Number],
      required: false,
      default: false
    }
  },
  emits: ["start-uploading", "stop-uploading"],
  data() {
    return {
      inputElement: null,
      filepondInstance: null,
      filenames: [],
      uploadedFiles: []
    };
  },
  mounted() {
    this.inputElement = this.$refs.file.querySelector('input[type="file"]'), this.form.$put(this.field, this.multiple ? [] : null), this.filepond && this.initFilepond();
  },
  methods: {
    loadFilepondPlugins() {
      const e = [];
      return this.preview && (e.push(import("filepond-plugin-image-preview")), e.push(import("filepond-plugin-image-exif-orientation"))), this.accept.length > 0 && e.push(import("filepond-plugin-file-validate-type")), (this.minFileSize || this.maxFileSize) && e.push(import("filepond-plugin-file-validate-size")), (this.minImageWidth || this.maxImageWidth || this.minImageHeight || this.maxImageHeight || this.minImageResolution || this.maxImageResolution) && e.push(import("filepond-plugin-image-validate-size")), Promise.all(e);
    },
    initFilepond() {
      const e = this;
      import("filepond").then((t) => {
        const r = Object.assign({}, e.filepond, e.jsFilepondOptions, {
          onaddfile(n, i) {
            n || (e.server ? e.$emit("start-uploading", [i.id]) : e.addFiles([i.file]));
          },
          onremovefile(n, i) {
            n || e.removeFile(i.file);
          },
          onprocessfile(n, i) {
            n || (e.uploadedFiles.push({
              file: i.file,
              id: i.serverId
            }), e.addFiles([i.serverId]), e.$emit("stop-uploading", [i.id]));
          }
        });
        this.accept.length > 0 && (r.acceptedFileTypes = this.accept), this.minFileSize && (r.minFileSize = this.minFileSize), this.maxFileSize && (r.maxFileSize = this.maxFileSize), this.minImageWidth && (r.imageValidateSizeMinWidth = this.minImageWidth), this.maxImageWidth && (r.imageValidateSizeMaxWidth = this.maxImageWidth), this.minImageHeight && (r.imageValidateSizeMinHeight = this.minImageHeight), this.maxImageHeight && (r.imageValidateSizeMaxHeight = this.maxImageHeight), this.minImageResolution && (r.imageValidateSizeMinResolution = this.minImageResolution), this.maxImageResolution && (r.imageValidateSizeMaxResolution = this.maxImageResolution), this.server && (r.server = {
          process: (n, i, a, s, o, l, u) => {
            const c = new FormData();
            c.append("file", i, i.name);
            const f = ze.CancelToken.source();
            ze({
              url: e.server,
              method: "POST",
              data: c,
              cancelToken: f.token,
              onUploadProgress: (d) => {
                l(d.lengthComputable, d.loaded, d.total);
              }
            }).then((d) => {
              d.status >= 200 && d.status < 300 ? s(d.data) : o(d.statusText);
            }).catch(function(d) {
              var h2;
              axios.isCancel(d) ? u() : o((h2 = d.response) == null ? void 0 : h2.statusText);
            });
          },
          revert: (n, i, a) => {
            ze({
              url: e.server,
              method: "POST",
              data: { _method: "DELETE", file: n }
            }).then(() => {
              i();
            }).catch(function(s) {
              var o;
              a((o = s.response) == null ? void 0 : o.statusText);
            });
          }
        }), this.loadFilepondPlugins(t).then((n) => {
          n.length > 0 && t.registerPlugin(...n.map((i) => i.default)), this.filepondInstance = t.create(this.inputElement, r);
        });
      });
    },
    removeFile(e) {
      this.server && (e = sn(this.uploadedFiles, (t) => t.file === e).serverId), this.form.$put(this.field, this.multiple ? this.form[this.field].filter((t) => t !== e) : null);
    },
    addFiles(e) {
      if (this.multiple) {
        const t = this.form[this.field];
        e.forEach((r) => {
          t.push(r);
        }), this.form.$put(this.field, t);
      } else
        this.form.$put(this.field, e[0]);
      this.filepond || this.updateFilenames();
    },
    updateFilenames() {
      this.filenames = [];
      const e = this.form[this.field];
      this.multiple ? e.forEach((t) => {
        this.filenames.push(t.name);
      }) : e && this.filenames.push(e.name);
    },
    handleFileInput(e) {
      this.form.$put(this.field, this.multiple ? [] : null);
      const t = Object.values(e.target.files);
      this.addFiles(t);
    }
  }
}, fd = { ref: "file" };
function dd(e, t, r, n, i, a) {
  return openBlock(), createElementBlock("div", fd, [
    renderSlot(e.$slots, "default", {
      handleFileInput: a.handleFileInput,
      filenames: i.filenames
    })
  ], 512);
}
const pd = /* @__PURE__ */ Ve(cd, [["render", dd]]), hd = {
  inject: ["stack"],
  computed: {
    values() {
      return m.flashData(this.stack);
    }
  },
  render() {
    const e = this;
    return this.$slots.default({
      has(t) {
        return G(e.values, t);
      },
      ...this.values
    });
  }
};
function oa(e, t, r) {
  e = e || {}, t = t || new FormData(), r = r || null;
  for (const n in e)
    Object.prototype.hasOwnProperty.call(e, n) && ua(t, la(r, n), e[n]);
  return t;
}
function la(e, t) {
  return e ? e + "[" + t + "]" : t;
}
function ua(e, t, r) {
  if (Array.isArray(r))
    return Array.from(r.keys()).forEach((n) => ua(e, la(t, n.toString()), r[n]));
  if (r instanceof Date)
    return e.append(t, r.toISOString());
  if (r instanceof File)
    return e.append(t, r, r.name);
  if (r instanceof Blob)
    return e.append(t, r);
  if (typeof r == "boolean")
    return e.append(t, r ? "1" : "0");
  if (typeof r == "string")
    return e.append(t, r);
  if (typeof r == "number")
    return e.append(t, `${r}`);
  if (r == null)
    return e.append(t, "");
  oa(r, e, t);
}
var md = "[object Boolean]";
function ca(e) {
  return e === true || e === false || Oe(e) && _e(e) == md;
}
function fa(e, t) {
  var r = {};
  return t = yt(t), Fr(e, function(n, i, a) {
    zi(r, i, t(n, i, a));
  }), r;
}
function da(e, t, r) {
  return e === e && (r !== void 0 && (e = e <= r ? e : r), t !== void 0 && (e = e >= t ? e : t)), e;
}
function We(e, t, r) {
  return e = Ur(e), r = r == null ? 0 : da(an(r), 0, e.length), t = Wt(t), e.slice(r, r + t.length) == t;
}
const vd = {
  inject: ["stack"],
  props: {
    spladeId: {
      type: String,
      required: true,
      default: ""
    },
    action: {
      type: String,
      required: false,
      default() {
        return m.isSsr ? "" : location.href;
      }
    },
    method: {
      type: String,
      required: false,
      default: "POST"
    },
    default: {
      type: Object,
      required: false,
      default: () => ({})
    },
    confirm: {
      type: [Boolean, String],
      required: false,
      default: false
    },
    confirmText: {
      type: String,
      required: false,
      default: ""
    },
    confirmButton: {
      type: String,
      required: false,
      default: ""
    },
    cancelButton: {
      type: String,
      required: false,
      default: ""
    },
    stay: {
      type: Boolean,
      require: false,
      default: false
    },
    restoreOnSuccess: {
      type: Boolean,
      required: false,
      default: true
    },
    resetOnSuccess: {
      type: Boolean,
      required: false,
      default: false
    },
    scrollOnError: {
      type: Boolean,
      required: false,
      default: true
    },
    submitOnChange: {
      type: [Boolean, Array],
      required: false,
      default: false
    }
  },
  emits: ["success", "error"],
  data() {
    return {
      isMounted: false,
      missingAttributes: [],
      values: Object.assign({}, { ...this.default }),
      processing: false,
      wasSuccessful: false,
      recentlySuccessful: false,
      recentlySuccessfulTimeoutId: null,
      formElement: null,
      elementsUploading: []
    };
  },
  computed: {
    $all() {
      return this.values;
    },
    $uploading() {
      return this.elementsUploading.length > 0;
    },
    rawErrors() {
      return m.validationErrors(this.stack);
    },
    errors() {
      return fa(this.rawErrors, (e) => e.join(`
`));
    }
  },
  mounted() {
    let e = document.querySelector(`form[data-splade-id="${this.spladeId}"]`);
    e || (e = document), this.formElement = e, this.missingAttributes.forEach((t) => {
      let r = "";
      const n = e.querySelector(`[name="${t}"]`);
      n ? r = n.type === "checkbox" ? false : "" : e.querySelector(`[name="${t}[]"]`) ? r = [] : (e.querySelector(`[name^="${t}."]`) || e.querySelector(`[name^="${t}["]`)) && (r = {}), this.$put(t, r);
    }), this.missingAttributes = [], this.submitOnChange === true ? this.$watch("values", () => {
      this.$nextTick(() => this.request());
    }, { deep: true }) : j(this.submitOnChange) && this.submitOnChange.forEach((t) => {
      this.$watch(`values.${t}`, () => {
        this.$nextTick(() => this.request());
      }, { deep: true });
    }), this.isMounted = true;
  },
  methods: {
    $startUploading(e) {
      this.elementsUploading.push(e[0]);
    },
    $stopUploading(e) {
      this.elementsUploading = this.elementsUploading.filter((t) => t != e[0]);
    },
    hasError(e) {
      return e in this.errors;
    },
    reset() {
      this.values = {};
    },
    restore() {
      this.values = Object.assign({}, { ...this.default });
    },
    $put(e, t) {
      return Gi(this.values, e, t);
    },
    focusAndScrollToElement(e) {
      let t = true;
      if (e._flatpickr && (t = false), e.tagName === "SELECT" && e.getAttribute("data-choice") && (t = false), t) {
        const r = new IntersectionObserver((n) => {
          let [i] = n;
          i.isIntersecting && (setTimeout(() => i.target.focus(), 150), r.disconnect());
        });
        r.observe(e);
      }
      e.scrollIntoView({
        behavior: "smooth",
        block: "end",
        inline: "nearest"
      });
    },
    submit(e) {
      if (!this.$uploading) {
        if (e) {
          const t = e.submitter;
          t && t.name && this.$put(t.name, t.value);
        }
        if (!this.confirm)
          return this.request();
        m.confirm(
          ca(this.confirm) ? "" : this.confirm,
          this.confirmText,
          this.confirmButton,
          this.cancelButton
        ).then(() => {
          this.request();
        }).catch(() => {
        });
      }
    },
    async request() {
      if (this.$uploading)
        return;
      await this.$nextTick(), this.processing = true, this.wasSuccessful = false, this.recentlySuccessful = false, clearTimeout(this.recentlySuccessfulTimeoutId);
      const e = this.values instanceof FormData ? this.values : oa(this.values), t = { Accept: "application/json" };
      this.stay && (t["X-Splade-Prevent-Refresh"] = true);
      let r = this.method.toUpperCase();
      r !== "GET" && r !== "POST" && (e.append("_method", r), r = "POST"), m.request(this.action, r, e, t).then((n) => {
        this.$emit("success", n), this.restoreOnSuccess && this.restore(), this.resetOnSuccess && this.reset(), this.processing = false, this.wasSuccessful = true, this.recentlySuccessful = true, this.recentlySuccessfulTimeoutId = setTimeout(() => this.recentlySuccessful = false, 2e3);
      }).catch(async (n) => {
        if (this.processing = false, this.$emit("error", n), !this.scrollOnError)
          return;
        await this.$nextTick();
        const i = sn(Object.keys(this.errors), (a) => this.formElement.querySelector(`[data-validation-key="${a}"]`));
        i && this.focusAndScrollToElement(
          this.formElement.querySelector(`[data-validation-key="${i}"]`)
        );
      });
    }
  },
  render() {
    const e = this;
    return this.$slots.default(
      new Proxy(
        {},
        {
          ownKeys() {
            return Object.keys(e.values);
          },
          get(t, r) {
            return [
              "$all",
              "$attrs",
              "$put",
              "$startUploading",
              "$stopUploading",
              "$processing",
              "$uploading",
              "errors",
              "restore",
              "reset",
              "hasError",
              "processing",
              "rawErrors",
              "submit",
              "wasSuccessful",
              "recentlySuccessful"
            ].includes(r) || We(r, "__v_") ? e[r] : (!e.isMounted && !G(e.values, r) && (e.missingAttributes.push(r), e.$put(r, "")), pt(e.values, r));
          },
          set(t, r, n) {
            return e.$put(r, n);
          }
        }
      )
    );
  }
}, gd = {
  props: {
    flatpickr: {
      type: [Boolean, Object],
      required: false,
      default: false
    },
    jsFlatpickrOptions: {
      type: Object,
      required: false,
      default: () => ({})
    },
    modelValue: {
      type: [String, Number],
      required: false
    }
  },
  emits: ["update:modelValue"],
  data() {
    return {
      disabled: false,
      element: null,
      flatpickrInstance: null,
      observer: null
    };
  },
  watch: {
    modelValue(e) {
      this.flatpickrInstance && this.flatpickrInstance.setDate(e);
    }
  },
  mounted() {
    this.element = this.$refs.input.querySelector("input"), this.flatpickr && this.initFlatpickr(this.element), this.disabled = this.element.disabled;
    const e = this;
    this.observer = new MutationObserver(function(t) {
      t.forEach(function(r) {
        r.attributeName === "disabled" && (e.disabled = r.target.disabled);
      });
    }), this.observer.observe(this.element, { attributes: true });
  },
  beforeUnmount() {
    this.observer.disconnect(), this.flatpickrInstance && this.flatpickrInstance.destroy();
  },
  methods: {
    initFlatpickr(e) {
      import("flatpickr").then((t) => {
        this.flatpickrInstance = t.default(
          e,
          Object.assign({}, this.flatpickr, this.jsFlatpickrOptions, {
            onChange: (r, n) => {
              this.flatpickrInstance.config.mode === "range" && this.flatpickrInstance.selectedDates.length < 2 || n != this.modelValue && this.$emit("update:modelValue", n);
            }
          })
        ), this.modelValue && this.flatpickrInstance.setDate(this.modelValue);
      });
    }
  }
}, yd = { ref: "input" };
function bd(e, t, r, n, i, a) {
  return openBlock(), createElementBlock("div", yd, [
    renderSlot(e.$slots, "default", { disabled: i.disabled })
  ], 512);
}
const wd = /* @__PURE__ */ Ve(gd, [["render", bd]]), Sd = {
  components: { Render: ue },
  props: {
    name: {
      type: String,
      required: true
    },
    url: {
      type: String,
      required: false,
      default() {
        return m.isSsr ? "" : window.location.href;
      }
    },
    show: {
      type: Boolean,
      required: false,
      default: true
    }
  },
  data() {
    return {
      html: null
    };
  },
  watch: {
    show(e) {
      e ? this.request() : this.html = null;
    }
  },
  mounted() {
    this.show && this.request();
  },
  methods: {
    async request() {
      this.html = null, m.lazy(this.url, this.name).then((e) => {
        this.html = e.data.html;
      });
    }
  }
};
function Od(e, t, r, n, i, a) {
  const s = resolveComponent("Render");
  return i.html ? (openBlock(), createBlock(s, {
    key: 0,
    html: i.html
  }, null, 8, ["html"])) : r.show ? renderSlot(e.$slots, "default", { key: 1 }) : createCommentVNode("", true);
}
const $d = /* @__PURE__ */ Ve(Sd, [["render", Od]]), Ed = ["href", "onClick"], xd = {
  __name: "Link",
  props: {
    href: {
      type: String,
      required: false,
      default: "#"
    },
    replace: {
      type: Boolean,
      required: false,
      default: false
    },
    confirm: {
      type: [Boolean, String],
      required: false,
      default: false
    },
    confirmText: {
      type: String,
      required: false,
      default: ""
    },
    confirmButton: {
      type: String,
      required: false,
      default: ""
    },
    cancelButton: {
      type: String,
      required: false,
      default: ""
    },
    modal: {
      type: Boolean,
      required: false,
      default: false
    },
    slideover: {
      type: Boolean,
      required: false,
      default: false
    },
    away: {
      type: Boolean,
      required: false,
      default: false
    }
  },
  setup(e) {
    const t = e;
    function r() {
      if (!t.confirm)
        return n();
      m.confirm(
        ca(t.confirm) ? "" : t.confirm,
        t.confirmText,
        t.confirmButton,
        t.cancelButton
      ).then(() => {
        n();
      }).catch(() => {
      });
    }
    function n() {
      if (t.away)
        return window.location = t.href;
      if (t.modal)
        return m.modal(t.href);
      if (t.slideover)
        return m.slideover(t.href);
      if (We(t.href, "#")) {
        if (m.openPreloadedModal(t.href.substring(1)))
          return;
        console.log("No preloaded modal found for " + t.href);
      }
      t.replace ? m.replace(t.href) : m.visit(t.href);
    }
    return (i, a) => (openBlock(), createElementBlock("a", {
      href: e.href,
      onClick: withModifiers(r, ["prevent"])
    }, [
      renderSlot(i.$slots, "default")
    ], 8, Ed));
  }
}, _d = {
  provide() {
    return {
      stack: this.stack
    };
  },
  props: {
    closeButton: {
      type: Boolean,
      required: false,
      default: true
    },
    type: {
      type: String,
      required: true
    },
    stack: {
      type: Number,
      required: true
    },
    onTopOfStack: {
      type: Boolean,
      required: false,
      default: false
    },
    maxWidth: {
      type: String,
      required: false,
      default: (e) => e.type === "modal" ? "2xl" : "md"
    },
    name: {
      type: String,
      required: false,
      default: null
    }
  },
  emits: ["close"],
  data() {
    return {
      isOpen: false
    };
  },
  mounted() {
    this.setIsOpen(true);
  },
  methods: {
    emitClose() {
      this.$emit("close");
    },
    close() {
      this.setIsOpen(false);
    },
    setIsOpen(e) {
      this.isOpen = e;
    }
  },
  render() {
    return this.$slots.default({
      type: this.type,
      isOpen: this.isOpen,
      setIsOpen: this.setIsOpen,
      close: this.close,
      stack: this.stack,
      onTopOfStack: this.onTopOfStack,
      maxWidth: this.maxWidth,
      emitClose: this.emitClose,
      closeButton: this.closeButton,
      Dialog: Kr,
      DialogPanel: Xr,
      TransitionRoot: tt,
      TransitionChild: et
    });
  }
}, Td = {
  __name: "PreloadedModal",
  props: {
    name: {
      type: String,
      required: true
    },
    html: {
      type: String,
      required: true
    },
    type: {
      type: String,
      required: false,
      default: "modal"
    }
  },
  setup(e) {
    const t = e;
    return m.registerPreloadedModal(t.name, t.html, t.type), () => {
    };
  }
};
function Ad(e, t) {
  var r = -1, n = Rt(e) ? Array(e.length) : [];
  return Lr(e, function(i, a, s) {
    n[++r] = t(i, a, s);
  }), n;
}
function pa(e, t) {
  var r = j(e) ? Ai : Ad;
  return r(e, yt(t));
}
const Id = {
  inject: ["stack"],
  props: {
    choices: {
      type: [Boolean, Object],
      required: false,
      default: false
    },
    jsChoicesOptions: {
      type: Object,
      required: false,
      default: () => ({})
    },
    multiple: {
      type: Boolean,
      required: false,
      default: false
    },
    modelValue: {
      type: [String, Number, Array],
      required: false
    },
    placeholder: {
      type: [Boolean, Object],
      required: false,
      default: false
    },
    dusk: {
      type: String,
      required: false,
      default: null
    },
    remoteUrl: {
      type: String,
      required: false,
      default: null
    },
    optionValue: {
      type: String,
      required: false,
      default: null
    },
    optionLabel: {
      type: String,
      required: false,
      default: null
    }
  },
  emits: ["update:modelValue"],
  data() {
    return {
      choicesInstance: null,
      element: null,
      placeholderText: null,
      headlessListener: null,
      selectChangeListener: null,
      selectShowDropdownListener: null,
      loading: false
    };
  },
  computed: {
    hasSelection() {
      return this.multiple ? Array.isArray(this.modelValue) ? this.modelValue.length > 0 : false : !(this.modelValue === null || this.modelValue === "" || this.modelValue === void 0);
    }
  },
  watch: {
    modelValue(e, t) {
      if (!this.choicesInstance && this.multiple && j(e)) {
        const r = e.filter((n) => n !== "" && n !== null && n !== void 0);
        if (JSON.stringify(r) != JSON.stringify(e)) {
          this.$emit("update:modelValue", r);
          return;
        }
      }
      if (this.choicesInstance) {
        if (JSON.stringify(e) == JSON.stringify(t))
          return;
        this.setValueOnChoices(e);
      }
    },
    remoteUrl: {
      handler() {
        this.loadRemoteOptions();
      }
    }
  },
  mounted() {
    if (this.element = this.$refs.select.querySelector("select"), this.choices)
      return this.initChoices(this.element).then(() => {
        this.loadRemoteOptions();
      });
    this.loadRemoteOptions();
  },
  beforeUnmount() {
    this.destroyChoicesInstance();
  },
  methods: {
    loadRemoteOptions() {
      !this.remoteUrl || (this.loading = true, ze({
        url: this.remoteUrl,
        method: "GET",
        headers: {
          Accept: "application/json"
        }
      }).then((e) => {
        this.destroyChoicesInstance();
        let t = [];
        this.placeholder && t.push(this.placeholder), t = this.normalizeOptions(e.data, t);
        var r, n = this.element.options.length - 1;
        for (r = n; r >= 0; r--)
          this.element.remove(r);
        let i = false;
        if (J(t, (a) => {
          var s = document.createElement("option");
          s.value = a.value, s.text = a.label, a.value === this.modelValue && (i = true), a.disabled && (s.disabled = a.disabled), a.placeholder && (s.placeholder = a.placeholder), this.element.appendChild(s);
        }), i || this.$emit("update:modelValue", this.multiple ? [] : ""), this.choices)
          return this.initChoices(this.element).then(() => {
            this.loading = false;
          });
        i ? this.element.value = this.modelValue : this.$nextTick(() => {
          this.element.selectedIndex = 0;
        }), this.loading = false;
      }).catch(() => {
        this.loading = false;
      }));
    },
    destroyChoicesInstance() {
      var e;
      this.choices && this.choicesInstance && (this.headlessListener && ((e = document.querySelector("#headlessui-portal-root")) == null || e.removeEventListener("click", this.headlessListener)), this.selectChangeListener && this.element.removeEventListener("change", this.selectChangeListener), this.selectShowDropdownListener && this.element.removeEventListener("showDropdown", this.selectShowDropdownListener), this.choicesInstance.destroy(), this.choicesInstance = null);
    },
    normalizeOptions(e, t) {
      const r = j(e);
      return !r && te(e) ? this.optionValue && this.optionLabel ? t.push({
        value: pt(e, this.optionValue),
        label: pt(e, this.optionLabel)
      }) : J(e, (n, i) => {
        t.push({ label: n, value: i });
      }) : r && e.forEach((n) => {
        this.normalizeOptions(n, t);
      }), t;
    },
    setValueOnChoices(e) {
      Array.isArray(e) && (e = pa(e, (t) => `${t}`), this.choicesInstance.removeActiveItems()), e == null ? e = "" : Array.isArray(e) || (e = `${e}`), this.choicesInstance.setChoiceByValue(e), this.updateHasSelectionAttribute(), this.handlePlaceholderVisibility();
    },
    getItemOfCurrentModel() {
      const e = this.modelValue;
      return sn(this.choicesInstance._store.choices, (t) => t.value == e);
    },
    handlePlaceholderVisibility() {
      if (!this.multiple)
        return;
      const e = this.choicesInstance.containerInner.element.querySelector(
        "input.choices__input"
      );
      this.placeholderText = e.placeholder ? e.placeholder : this.placeholderText;
      const t = this.choicesInstance.getValue().length;
      e.placeholder = t ? "" : this.placeholderText ? this.placeholderText : "", e.style.minWidth = "0", e.style.width = t ? "1px" : "auto", e.style.paddingTop = t ? "0px" : "1px", e.style.paddingBottom = t ? "0px" : "1px";
    },
    initChoices(e) {
      return new Promise((t) => {
        const r = Array.from(
          e.querySelectorAll("option:not([placeholder])")
        ).length, n = this;
        import("choices.js").then((i) => {
          const a = Object.assign({}, this.choices, this.jsChoicesOptions, {
            callbackOnInit: function() {
              const s = this;
              n.stack > 0 && (n.headlessListener = function(o) {
                const l = n.choicesInstance.dropdown.isActive;
                !l && o.target === e ? n.choicesInstance.showDropdown() : l && o.target !== e && n.choicesInstance.hideDropdown();
              }, document.querySelector("#headlessui-portal-root").addEventListener("click", n.headlessListener, { capture: true })), s.containerInner.element.setAttribute(
                "data-select-name",
                e.name
              ), e.hasAttribute("dusk") && e.removeAttribute("dusk"), n.dusk && (s.containerInner.element.setAttribute("dusk", n.dusk), s.choiceList.element.setAttribute("dusk", `${n.dusk}-listbox`)), n.selectChangeListener = function() {
                let o = s.getValue(true);
                if (o == null && (o = ""), n.$emit("update:modelValue", o), !n.multiple || r < 1)
                  return;
                s.getValue().length >= r && s.hideDropdown();
              }, e.addEventListener("change", n.selectChangeListener), s.containerInner.element.addEventListener("hideDropdownFromDusk", function() {
                s.hideDropdown();
              }), n.selectShowDropdownListener = function() {
                if (n.multiple || !n.modelValue)
                  return;
                const o = n.getItemOfCurrentModel(), l = s.dropdown.element.querySelector(
                  `.choices__item[data-id="${o.id}"]`
                );
                s.choiceList.scrollToChildElement(l, 1), s._highlightChoice(l);
              }, e.addEventListener("showDropdown", n.selectShowDropdownListener), n.choicesInstance = s, n.setValueOnChoices(n.modelValue), t();
            }
          });
          new i.default(e, a);
        });
      });
    },
    updateHasSelectionAttribute() {
      this.choicesInstance.containerInner.element.setAttribute(
        "data-has-selection",
        this.hasSelection
      );
    }
  }
}, Pd = { ref: "select" };
function Cd(e, t, r, n, i, a) {
  return openBlock(), createElementBlock("div", Pd, [
    renderSlot(e.$slots, "default", { loading: i.loading })
  ], 512);
}
const Dd = /* @__PURE__ */ Ve(Id, [["render", Cd]]), qd = {
  inject: ["stack"],
  render() {
    const e = m.validationErrors(this.stack), t = m.flashData(this.stack), r = m.sharedData.value, n = fa(e, (i) => i.join(`
`));
    return this.$slots.default({
      flash: t,
      errors: n,
      rawErrors: e,
      shared: r,
      hasError(i) {
        return i in e;
      },
      hasFlash(i) {
        return G(t, i);
      },
      hasShared(i) {
        return G(r, i);
      },
      hasErrors: Object.keys(e).length > 0
    });
  }
};
function Fd(e, t, r) {
  e = Ur(e), t = Wt(t);
  var n = e.length;
  r = r === void 0 ? n : da(an(r), 0, n);
  var i = r;
  return r -= t.length, r >= 0 && e.slice(r, i) == t;
}
function Ld(e, t) {
  var r = [];
  return Lr(e, function(n, i, a) {
    t(n, i, a) && r.push(n);
  }), r;
}
function jd(e, t) {
  var r = j(e) ? ia : Ld;
  return r(e, yt(t));
}
function ei(e, t) {
  return Yt(e, t);
}
const Bd = {
  props: {
    striped: {
      type: Boolean,
      required: false,
      default: false
    },
    columns: {
      type: Object,
      required: true
    },
    defaultVisibleToggleableColumns: {
      type: Array,
      required: true
    },
    searchDebounce: {
      type: Number,
      required: false,
      default: 350
    },
    itemsOnThisPage: {
      type: Number,
      required: false,
      default: 0
    },
    itemsOnAllPages: {
      type: Number,
      required: false,
      default: 0
    }
  },
  data() {
    return {
      selectedItems: [],
      visibleColumns: [],
      forcedVisibleSearchInputs: [],
      debounceUpdateQuery: null,
      isLoading: false,
      processingAction: false
    };
  },
  computed: {
    columnsAreToggled() {
      return !ei(this.visibleColumns, this.defaultVisibleToggleableColumns);
    },
    hasForcedVisibleSearchInputs() {
      return this.forcedVisibleSearchInputs.length > 0;
    },
    allItemsFromAllPagesAreSelected() {
      return this.selectedItems.length === 1 && this.selectedItems[0] === "*";
    },
    allVisibleItemsAreSelected() {
      const e = this.selectedItems.length;
      return e === 1 && this.selectedItems[0] === "*" || e > 0 && e === this.itemsOnThisPage;
    },
    hasSelectedItems() {
      return this.selectedItems.length > 0;
    },
    totalSelectedItems() {
      const e = this.selectedItems.length;
      return e === 1 && this.selectedItems[0] === "*" ? this.itemsOnAllPages : e;
    }
  },
  created() {
    this.debounceUpdateQuery = Yr(function(e, t, r) {
      this.updateQuery(e, t, r);
    }, this.searchDebounce);
  },
  mounted() {
    const e = this.getCurrentQuery(), t = e.columns || [];
    J(e, (r, n) => {
      if (We(n, "filter[") && !r) {
        const i = n.split("["), a = i[1].substring(0, i[1].length - 1);
        this.forcedVisibleSearchInputs = [...this.forcedVisibleSearchInputs, a];
      }
    }), t.length === 0 ? this.visibleColumns = this.defaultVisibleToggleableColumns : this.visibleColumns = t;
  },
  methods: {
    visitLink(e, t) {
      return t === "modal" ? m.modal(e) : t === "slideover" ? m.slideover(e) : m.visit(e);
    },
    reset() {
      this.forcedVisibleSearchInputs = [], this.visibleColumns = this.defaultVisibleToggleableColumns;
      let e = this.getCurrentQuery();
      e.columns = [], e.page = null, e.perPage = null, e.sort = null, J(e, (t, r) => {
        We(r, "filter[") && (e[r] = null);
      }), this.visitWithQueryObject(e, null, true);
    },
    columnIsVisible(e) {
      return this.visibleColumns.includes(e);
    },
    toggleColumn(e) {
      const t = !this.columnIsVisible(e), r = jd(this.columns, (i) => i.can_be_hidden ? i.key === e ? t : this.visibleColumns.includes(i.key) : true);
      let n = pa(r, (i) => i.key).sort();
      ei(n, this.defaultVisibleToggleableColumns) && (n = []), this.visibleColumns = n.length === 0 ? this.defaultVisibleToggleableColumns : n, this.updateQuery("columns", n, null, false);
    },
    disableSearchInput(e) {
      this.forcedVisibleSearchInputs = this.forcedVisibleSearchInputs.filter((t) => t != e), this.updateQuery(`filter[${e}]`, null);
    },
    showSearchInput(e) {
      this.forcedVisibleSearchInputs = [...this.forcedVisibleSearchInputs, e], nextTick(() => {
        document.querySelector(`[name="searchInput-${e}"]`).focus();
      });
    },
    isForcedVisible(e) {
      return this.forcedVisibleSearchInputs.includes(e);
    },
    getCurrentQuery() {
      const e = window.location.search;
      if (!e)
        return {};
      let t = {};
      return e.substring(1).split("&").forEach((r) => {
        const n = decodeURIComponent(r).split("=");
        let i = n[0];
        if (!Fd(i, "]")) {
          t[i] = n[1];
          return;
        }
        const a = i.split("["), s = a[1].substring(0, a[1].length - 1);
        parseInt(s) == s ? (i = a[0], j(t[i]) || (t[i] = []), t[i].push(n[1])) : t[i] = n[1];
      }), t;
    },
    updateQuery(e, t, r, n) {
      typeof n > "u" && (n = true);
      let i = this.getCurrentQuery();
      i[e] = t, (We(e, "perPage") || We(e, "filter[")) && delete i.page, this.visitWithQueryObject(i, r, n);
    },
    visitWithQueryObject(e, t, r) {
      var o;
      typeof r > "u" && (r = true);
      let n = {};
      J(e, (l, u) => {
        if (!j(l)) {
          n[u] = l;
          return;
        }
        l.length !== 0 && l.forEach((c, p) => {
          n[`${u}[${p}]`] = c;
        });
      });
      let i = "";
      J(n, (l, u) => {
        l === null || l === [] || (i && (i += "&"), i += `${u}=${l}`);
      }), i && (i = "?" + i);
      const a = window.location.pathname + i;
      if (!r)
        return m.replaceUrlOfCurrentPage(a);
      this.isLoading = true;
      let s = null;
      typeof t < "u" && t && (s = (o = document.querySelector(`[name="${t.name}"]`)) == null ? void 0 : o.value), m.replace(a).then(() => {
        this.isLoading = false, typeof t < "u" && t && nextTick(() => {
          const l = document.querySelector(`[name="${t.name}"]`);
          l.focus(), s && (l.value = s);
        });
      });
    },
    async performBulkAction(e, t, r, n, i) {
      if (t)
        try {
          await m.confirm(t === true ? "" : t, r, n, i);
        } catch {
          return false;
        }
      this.isLoading = true, m.request(e, "POST", { ids: this.selectedItems }, {}, false).then((a) => {
        a.data;
      }).catch(() => {
        this.isLoading = false;
      });
    },
    setSelectedItems(e) {
      this.selectedItems = j(e) ? e : [];
    },
    itemIsSelected(e) {
      return this.selectedItems.length == 1 && this.selectedItems[0] == "*" ? true : this.selectedItems.includes(e);
    },
    setSelectedItem(e, t) {
      t ? this.selectedItems.push(e) : this.selectedItems = this.selectedItems.filter((r) => r !== e);
    }
  },
  render() {
    return this.$slots.default({
      columnIsVisible: this.columnIsVisible,
      columnsAreToggled: this.columnsAreToggled,
      debounceUpdateQuery: this.debounceUpdateQuery,
      disableSearchInput: this.disableSearchInput,
      hasForcedVisibleSearchInputs: this.hasForcedVisibleSearchInputs,
      isForcedVisible: this.isForcedVisible,
      reset: this.reset,
      showSearchInput: this.showSearchInput,
      striped: this.striped,
      toggleColumn: this.toggleColumn,
      updateQuery: this.updateQuery,
      visit: this.visitLink,
      totalSelectedItems: this.totalSelectedItems,
      allItemsFromAllPagesAreSelected: this.allItemsFromAllPagesAreSelected,
      allVisibleItemsAreSelected: this.allVisibleItemsAreSelected,
      hasSelectedItems: this.hasSelectedItems,
      setSelectedItems: this.setSelectedItems,
      itemIsSelected: this.itemIsSelected,
      setSelectedItem: this.setSelectedItem,
      performBulkAction: this.performBulkAction,
      processingAction: this.processingAction,
      isLoading: this.isLoading
    });
  }
}, kd = {
  data() {
    return {
      isMounted: false
    };
  },
  mounted() {
    this.isMounted = true;
  }
};
function Rd(e, t, r, n, i, a) {
  return i.isMounted ? (openBlock(), createBlock(Teleport, normalizeProps(mergeProps({ key: 0 }, e.$attrs)), [
    renderSlot(e.$slots, "default")
  ], 16)) : createCommentVNode("", true);
}
const Md = /* @__PURE__ */ Ve(kd, [["render", Rd]]), Nd = {
  props: {
    autosize: {
      type: Boolean,
      required: false,
      default: false
    },
    modelValue: {
      type: [String, Number],
      required: false
    }
  },
  data() {
    return {
      autosizeInstance: null,
      element: null
    };
  },
  watch: {
    modelValue() {
      !this.autosize || !this.autosizeInstance || import("autosize").then((e) => {
        nextTick(() => e.default.update(this.element));
      });
    }
  },
  mounted() {
    this.element = this.$refs.textarea.querySelector("textarea"), this.autosize && import("autosize").then((e) => {
      this.autosizeInstance = e.default(this.element);
    });
  },
  beforeUnmount() {
    this.autosize && this.autosizeInstance && import("autosize").then((e) => {
      e.default.destroy(this.element);
    });
  }
}, Vd = { ref: "textarea" };
function Hd(e, t, r, n, i, a) {
  return openBlock(), createElementBlock("div", Vd, [
    renderSlot(e.$slots, "default")
  ], 512);
}
const Ud = /* @__PURE__ */ Ve(Nd, [["render", Hd]]), Wd = {
  props: {
    toastKey: {
      type: Number,
      required: true
    },
    autoDismiss: {
      type: Number,
      required: false,
      default: 0
    }
  },
  emits: ["dismiss"],
  data() {
    return {
      show: true
    };
  },
  mounted() {
    this.autoDismiss && setTimeout(() => {
      this.setShow(false);
    }, this.autoDismiss * 1e3);
  },
  methods: {
    setShow(e) {
      this.show = e;
    },
    emitDismiss() {
      this.$emit("dismiss");
    }
  },
  render() {
    return this.$slots.default({
      key: this.toastKey,
      show: this.show,
      setShow: this.setShow,
      emitDismiss: this.emitDismiss,
      TransitionRoot: tt,
      TransitionChild: et
    });
  }
}, zd = [
  "left-top",
  "center-top",
  "right-top",
  "left-center",
  "center-center",
  "right-center",
  "left-bottom",
  "center-bottom",
  "right-bottom"
], Gd = {
  computed: {
    toasts: function() {
      return m.toastsReversed.value;
    },
    hasBackdrop: function() {
      return m.toasts.value.filter((e) => !e.dismissed && e.backdrop && e.html).length > 0;
    }
  },
  methods: {
    dismissToast(e) {
      m.dismissToast(e);
    }
  },
  render() {
    return this.$slots.default({
      positions: zd,
      toasts: this.toasts,
      dismissToast: this.dismissToast,
      hasBackdrop: this.hasBackdrop,
      Render: ue,
      TransitionRoot: tt,
      TransitionChild: et
    });
  }
}, Kd = {
  props: {
    default: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      toggles: { ...this.default }
    };
  },
  methods: {
    toggled(e) {
      var t;
      return (t = this.toggles[e]) != null ? t : false;
    },
    toggle(e) {
      this.setToggle(e, !this.toggled(e));
    },
    setToggle(e, t) {
      this.toggles[e] = t;
    }
  },
  render() {
    const e = this;
    return this.$slots.default(
      new Proxy(
        {},
        {
          ownKeys() {
            return Object.keys(e.toggles);
          },
          get(t, r) {
            const n = Object.keys(e.toggles);
            if (n.length === 1 && ra(n) === "default") {
              if (r === "toggled")
                return e.toggled("default");
              if (r === "setToggle")
                return (i) => {
                  e.setToggle("default", i);
                };
              if (r === "toggle")
                return () => {
                  e.toggle("default");
                };
            }
            return r === "setToggle" ? (i, a) => {
              e.setToggle(i, a);
            } : r === "toggle" ? (i) => {
              e.toggle(i);
            } : e.toggled(r);
          }
        }
      )
    );
  }
}, Xd = {
  render() {
    return this.$slots.default({
      TransitionRoot: tt,
      TransitionChild: et
    });
  }
}, Qd = {
  created: (e, t) => {
    if (m.isSsr)
      return;
    const r = `preserveScroll-${t.arg}`, n = m.restore(r);
    n && nextTick(() => {
      typeof e.scrollTo == "function" ? e.scrollTo(n.left, n.top) : (e.scrollTop = n.top, e.scrollLeft = n.left);
    });
    const i = function() {
      m.remember(r, {
        top: e.scrollTop,
        left: e.scrollLeft
      });
    };
    e.addEventListener("scroll", Yr(i, 100)), i();
  }
}, Pr = {
  injectCSS(e) {
    const t = document.createElement("style");
    t.type = "text/css", t.textContent = `
    #nprogress {
      pointer-events: none;
    }
    #nprogress .bar {
      background: ${e};
      position: fixed;
      z-index: 1031;
      top: 0;
      left: 0;
      width: 100%;
      height: 2px;
    }
    #nprogress .peg {
      display: block;
      position: absolute;
      right: 0px;
      width: 100px;
      height: 100%;
      box-shadow: 0 0 10px ${e}, 0 0 5px ${e};
      opacity: 1.0;
      -webkit-transform: rotate(3deg) translate(0px, -4px);
          -ms-transform: rotate(3deg) translate(0px, -4px);
              transform: rotate(3deg) translate(0px, -4px);
    }
    #nprogress .spinner {
      display: block;
      position: fixed;
      z-index: 1031;
      top: 15px;
      right: 15px;
    }
    #nprogress .spinner-icon {
      width: 18px;
      height: 18px;
      box-sizing: border-box;
      border: solid 2px transparent;
      border-top-color: ${e};
      border-left-color: ${e};
      border-radius: 50%;
      -webkit-animation: nprogress-spinner 400ms linear infinite;
              animation: nprogress-spinner 400ms linear infinite;
    }
    .nprogress-custom-parent {
      overflow: hidden;
      position: relative;
    }
    .nprogress-custom-parent #nprogress .spinner,
    .nprogress-custom-parent #nprogress .bar {
      position: absolute;
    }
    @-webkit-keyframes nprogress-spinner {
      0%   { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }
    @keyframes nprogress-spinner {
      0%   { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
  `, document.head.appendChild(t);
  },
  timeout: null,
  start(e, t, r) {
    Pr.timeout = setTimeout(() => r.start(), t);
  },
  progress(e, t) {
    t.isStarted() && e.detail.progress.percentage && t.set(Math.max(t.status, e.detail.progress.percentage / 100 * 0.9));
  },
  stop(e, t) {
    clearTimeout(Pr.timeout), t.done(), t.remove();
  },
  init(e) {
    const t = this;
    import("nprogress").then((r) => {
      document.addEventListener("splade:request", (n) => t.start(n, e.delay, r.default)), document.addEventListener("splade:request-progress", (n) => t.progress(n, r.default)), document.addEventListener("splade:request-response", (n) => t.stop(n, r.default)), document.addEventListener("splade:request-error", (n) => t.stop(n, r.default)), r.default.configure({ showSpinner: e.spinner }), e.css && this.injectCSS(e.color);
    });
  }
}, tp = {
  install: (e, t) => {
    t = t || {}, t.max_keep_alive = G(t, "max_keep_alive") ? t.max_keep_alive : 10, t.prefix = G(t, "prefix") ? t.prefix : "Splade", t.transform_anchors = G(t, "transform_anchors") ? t.transform_anchors : false, t.link_component = G(t, "link_component") ? t.link_component : "Link", t.progress_bar = G(t, "progress_bar") ? t.progress_bar : false, t.components = G(t, "components") ? t.components : {};
    const r = t.prefix;
    if (e.component(`${r}Confirm`, fu).component(`${r}Data`, gu).component(`${r}Defer`, Pu).component(`${r}Dialog`, Cu).component(`${r}Dropdown`, Rc).component(`${r}DynamicHtml`, Mc).component(`${r}Errors`, Nc).component(`${r}Event`, Vc).component(`${r}File`, pd).component(`${r}Flash`, hd).component(`${r}Form`, vd).component(`${r}Input`, wd).component(`${r}Lazy`, $d).component(`${r}Modal`, _d).component(`${r}OnClickOutside`, Ki).component(`${r}PreloadedModal`, Td).component(`${r}Render`, ue).component(`${r}Select`, Dd).component(`${r}State`, qd).component(`${r}Table`, Bd).component(`${r}Teleport`, Md).component(`${r}Textarea`, Ud).component(`${r}Toast`, Wd).component(`${r}Toasts`, Gd).component(`${r}Toggle`, Kd).component(`${r}Transition`, Xd).component(t.link_component, xd).directive(`${r}PreserveScroll`, Qd), Object.defineProperty(e.config.globalProperties, "$splade", { get: () => m }), Object.defineProperty(e.config.globalProperties, "$spladeOptions", { get: () => Object.assign({}, { ...t }) }), e.provide("$splade", e.config.globalProperties.$splade), e.provide("$spladeOptions", e.config.globalProperties.$spladeOptions), t.progress_bar) {
      const n = {
        delay: 250,
        color: "#4B5563",
        css: true,
        spinner: false
      };
      te(t.progress_bar) || (t.progress_bar = {}), ["delay", "color", "css", "spinner"].forEach((i) => {
        G(t.progress_bar, i) || (t.progress_bar[i] = n[i]);
      }), Pr.init(t.progress_bar);
    }
    J(t.components, (n, i) => {
      e.component(i, n);
    });
  }
};
function rp(e, t, r) {
  const n = {};
  process.argv.slice(2).forEach((a) => {
    const s = a.replace(/^-+/, "").split("=");
    n[s[0]] = s.length === 2 ? s[1] : true;
  });
  const i = n.port || 9e3;
  e(async (a, s) => {
    if (a.method == "POST") {
      let o = "";
      a.on("data", (l) => o += l), a.on("end", async () => {
        const l = JSON.parse(o), u = r({
          components: l.components,
          initialDynamics: l.dynamics,
          initialHtml: l.html,
          initialSpladeData: l.splade
        }), c = await t(u);
        s.writeHead(200, { "Content-Type": "application/json", Server: "Splade SSR" }), s.write(JSON.stringify({ body: c })), s.end();
      });
    }
  }).listen(i, () => console.log(`Splade SSR server started on port ${i}.`));
}
rp(createServer, renderToString, (props) => {
  return createSSRApp({
    render: Zd(props)
  }).use(tp);
});
