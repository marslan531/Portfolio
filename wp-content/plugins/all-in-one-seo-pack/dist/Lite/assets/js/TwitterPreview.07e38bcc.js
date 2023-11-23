import{b as h,u as f,t as v}from"./links.28fcc512.js";import{B as S}from"./Img.d2b67bc1.js";import{C as w}from"./Caret.4d98c50a.js";import{S as y}from"./Book.75d79ad5.js";import{S as C}from"./Profile.4ff0415c.js";import{r as a,o as i,c as b,a as e,d as c,z as r,n as I,A as k,b as d,f as l,M as B,N as x,e as N,D as A,K as D,L}from"./vue.runtime.esm-bundler.588d3a9f.js";import{_ as P}from"./_plugin-vue_export-helper.a6f24833.js";const T={setup(){return{optionsStore:h(),rootStore:f()}},components:{BaseImg:S,CoreLoader:w,SvgBook:y,SvgDannieProfile:C},props:{card:String,description:{type:String,required:!0},image:String,loading:{type:Boolean,default:!1},title:{type:String,required:!0}},data(){return{canShowImage:!1}},computed:{appName(){return"All in One SEO"},getCard(){return this.card==="default"?this.optionsStore.options.social.twitter.general.defaultCardType:this.card}},methods:{maybeCanShow(o){this.canShowImage=o},truncate:v}},V=o=>(D("data-v-4b78a9ed"),o=o(),L(),o),z={class:"aioseo-twitter-preview"},O={class:"twitter-post"},q={class:"twitter-header"},E={class:"profile-photo"},R={class:"poster"},K={class:"poster-name"},M=V(()=>e("div",{class:"poster-username"}," @aioseopack ",-1)),U={class:"twitter-content"},j={class:"twitter-site-description"},F={class:"site-domain"},G={class:"site-title"},H={class:"site-description"};function J(o,Q,t,_,n,s){const m=a("svg-dannie-profile"),u=a("svg-book"),p=a("core-loader"),g=a("base-img");return i(),b("div",z,[e("div",O,[e("div",q,[e("div",E,[c(m)]),e("div",R,[e("div",K,r(s.appName),1),M])]),e("div",{class:I(["twitter-container",t.image?s.getCard:"summary"])},[e("div",U,[e("div",{class:"twitter-image-preview",style:k({backgroundImage:s.getCard==="summary"&&n.canShowImage?`url('${t.image}')`:""})},[!t.loading&&(!t.image||!n.canShowImage)?(i(),d(u,{key:0})):l("",!0),t.loading?(i(),d(p,{key:1})):l("",!0),B(c(g,{src:t.image,debounce:!1,onCanShow:s.maybeCanShow},null,8,["src","onCanShow"]),[[x,s.getCard==="summary_large_image"&&n.canShowImage]])],4),e("div",j,[e("div",F,[N(o.$slots,"site-url",{},()=>[A(r(_.rootStore.aioseo.urls.domain),1)],!0)]),e("div",G,r(s.truncate(t.title,70)),1),e("div",H,r(s.truncate(t.description,105)),1)])])],2)])])}const oe=P(T,[["render",J],["__scopeId","data-v-4b78a9ed"]]);export{oe as C};
