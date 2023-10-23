import{o as m,c as L,r as n,b as u,w as a,a as r,D as l,z as c,d as i,f as b}from"./vue.runtime.esm-bundler.c297bd08.js";import{_ as g}from"./_plugin-vue_export-helper.8a32e791.js";import{e as B}from"./links.da3be5e7.js";import{_ as t,s as V}from"./default-i18n.3881921e.js";import{C as w}from"./Blur.f86c14ff.js";import{C as M}from"./SettingsRow.5327053b.js";import{S as I}from"./External.e7677bf7.js";import{B as A}from"./RadioToggle.2004a807.js";import{R as G}from"./RequiredPlans.eed634df.js";import{C as R}from"./Card.173e6e4f.js";import{C as N}from"./ProBadge.55f2290c.js";import{C as D}from"./Index.7d0ce25e.js";import{A as P}from"./AddonConditions.b9f54572.js";import"./constants.44daa6bb.js";import"./TruSeoHighlighter.271256b4.js";/* empty css                                              */import"./isArrayLikeObject.10b615a9.js";import"./Row.b4141467.js";/* empty css                                            */import"./addons.1640e0f5.js";import"./upperFirst.d65414ba.js";import"./_stringToArray.a4422725.js";import"./license.9b17b7f1.js";import"./index.6d5de07f.js";import"./Caret.8cc4e863.js";import"./Tooltip.42b4f815.js";import"./Slide.d2bcb99c.js";/* empty css                                              */import"./postContent.d84eb650.js";import"./cleanForSlug.a67f7e84.js";import"./Ellipse.404f2a7a.js";import"./toFinite.c2274946.js";const s="all-in-one-seo-pack",$=()=>({strings:{customFieldSupport:t("Custom Field Support",s),exclude:t("Exclude Pages/Posts",s),video:t("Video Sitemap",s),description:t("The Video Sitemap generates an XML Sitemap for video content on your site. Search engines use this information to display rich snippet information in search results.",s),extendedDescription:t("The Video Sitemap works in much the same way as the XML Sitemap module, it generates an XML Sitemap specifically for video content on your site. Search engines use this information to display rich snippet information in search results.",s),enableSitemap:t("Enable Sitemap",s),openSitemap:t("Open Video Sitemap",s),noIndexDisplayed:t("Noindexed content will not be displayed in your sitemap.",s),doYou404:t("Do you get a blank sitemap or 404 error?",s),ctaButtonText:t("Unlock Video Sitemaps",s),ctaHeader:V(t("Video Sitemaps is a %1$s Feature",s),"PRO"),linksPerSitemap:t("Links Per Sitemap",s),maxLinks:t("Allows you to specify the maximum number of posts in a sitemap (up to 50,000).",s),enableSitemapIndexes:t("Enable Sitemap Indexes",s)}}),H={};function O(e,S){return m(),L("div")}const U=g(H,[["render",O]]),E={setup(){const{strings:e}=$();return{strings:e}},components:{CoreBlur:w,CoreSettingsRow:M,SvgExternal:I,BaseRadioToggle:A}},F={class:"aioseo-settings-row aioseo-section-description"},q=["innerHTML"],z={class:"aioseo-sitemap-preview"},X={class:"aioseo-description"},Y=r("br",null,null,-1),j=["innerHTML"],J={class:"aioseo-description"},K=["innerHTML"],Q={class:"aioseo-description"},W=["innerHTML"];function Z(e,S,v,o,k,y){const d=n("base-toggle"),p=n("core-settings-row"),_=n("svg-external"),f=n("base-button"),h=n("base-radio-toggle"),T=n("base-input"),C=n("core-blur");return m(),u(C,null,{default:a(()=>[r("div",F,[l(c(o.strings.extendedDescription)+" ",1),r("span",{innerHTML:e.$links.getDocLink(e.$constants.GLOBAL_STRINGS.learnMore,"videoSitemaps",!0)},null,8,q)]),i(p,{name:o.strings.enableSitemap},{content:a(()=>[i(d,{modelValue:!0})]),_:1},8,["name"]),i(p,{name:e.$constants.GLOBAL_STRINGS.preview},{content:a(()=>[r("div",z,[i(f,{size:"medium",type:"blue"},{default:a(()=>[i(_),l(" "+c(o.strings.openSitemap),1)]),_:1})]),r("div",X,[l(c(o.strings.noIndexDisplayed)+" ",1),Y,l(" "+c(o.strings.doYou404)+" ",1),r("span",{innerHTML:e.$links.getDocLink(e.$constants.GLOBAL_STRINGS.learnMore,"blankSitemap",!0)},null,8,j)])]),_:1},8,["name"]),i(p,{name:o.strings.enableSitemapIndexes},{content:a(()=>[i(h,{name:"sitemapIndexes",options:[{label:e.$constants.GLOBAL_STRINGS.disabled,value:!1,activeClass:"dark"},{label:e.$constants.GLOBAL_STRINGS.enabled,value:!0}]},null,8,["options"]),r("div",J,[l(c(o.strings.sitemapIndexes)+" ",1),r("span",{innerHTML:e.$links.getDocLink(e.$constants.GLOBAL_STRINGS.learnMore,"sitemapIndexes",!0)},null,8,K)])]),_:1},8,["name"]),i(p,{name:o.strings.linksPerSitemap},{content:a(()=>[i(T,{class:"aioseo-links-per-site",type:"number",size:"medium",min:1,max:5e4}),r("div",Q,[l(c(o.strings.maxLinks)+" ",1),r("span",{innerHTML:e.$links.getDocLink(e.$constants.GLOBAL_STRINGS.learnMore,"maxLinks",!0)},null,8,W)])]),_:1},8,["name"])]),_:1})}const ee=g(E,[["render",Z]]);const oe={setup(){const{strings:e}=$();return{licenseStore:B(),strings:e}},components:{Blur:ee,RequiredPlans:G,CoreCard:R,CoreProBadge:N,Cta:D}},ne={class:"aioseo-video-sitemap-lite"};function te(e,S,v,o,k,y){const d=n("core-pro-badge"),p=n("blur"),_=n("required-plans"),f=n("cta"),h=n("core-card");return m(),L("div",ne,[i(h,{slug:"videoSitemap",noSlide:!0},{header:a(()=>[r("span",null,c(o.strings.video),1),i(d)]),default:a(()=>[i(p),i(f,{"feature-list":[o.strings.customFieldSupport,o.strings.exclude],"cta-link":e.$links.getPricingUrl("video-sitemap","video-sitemap-upsell"),"button-text":o.strings.ctaButtonText,"learn-more-link":e.$links.getUpsellUrl("video-sitemap",null,e.$isPro?"pricing":"liteUpgrade"),"hide-bonus":!o.licenseStore.isUnlicensed},{"header-text":a(()=>[l(c(o.strings.ctaHeader),1)]),description:a(()=>[i(_,{addon:"aioseo-video-sitemap"}),l(" "+c(o.strings.description),1)]),_:1},8,["feature-list","cta-link","button-text","learn-more-link","hide-bonus"])]),_:1})])}const x=g(oe,[["render",te]]);const se={mixins:[P],components:{Cta:U,Lite:x,VideoSitemap:x},data(){return{addonSlug:"aioseo-video-sitemap"}}},ie={class:"aioseo-video-sitemap"};function re(e,S,v,o,k,y){const d=n("video-sitemap",!0),p=n("cta"),_=n("lite");return m(),L("div",ie,[e.shouldShowMain?(m(),u(d,{key:0})):b("",!0),e.shouldShowUpdate||e.shouldShowActivate?(m(),u(p,{key:1})):b("",!0),e.shouldShowLite?(m(),u(_,{key:2})):b("",!0)])}const He=g(se,[["render",re]]);export{He as default};