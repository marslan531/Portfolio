import{e as a}from"./links.da3be5e7.js";import{a as n}from"./addons.1640e0f5.js";import{R as c,a as m}from"./RequiresUpdate.15ef4626.js";const p={methods:{getExcludedActivationTabs(r){if(!a().isUnlicensed&&n.isActive(r)&&!n.requiresUpgrade(r))return[];const t=[];return this.$router.options.routes.forEach(e=>{if(!e.meta||!e.meta.middleware)return;(Array.isArray(e.meta.middleware)?e.meta.middleware:[e.meta.middleware]).some(s=>s===c)&&t.push(e.name)}),t}}},f={methods:{getExcludedUpdateTabs(r){if(!a().isUnlicensed&&n.hasMinimumVersion(r)&&!n.requiresUpgrade(r))return[];const t=[];return this.$router.options.routes.forEach(e=>{if(!e.meta||!e.meta.middleware)return;(Array.isArray(e.meta.middleware)?e.meta.middleware:[e.meta.middleware]).some(s=>s===m)&&t.push(e.name)}),t}}};export{p as R,f as a};