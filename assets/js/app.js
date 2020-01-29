

// const searchClient = algoliasearch(window.env.ALGOLIA_APPLICATION_ID, window.env.ALGOLIA_SEARCH_API_KEY);



	

import Vue from 'vue';
import InstantSearch from 'vue-instantsearch';
import VueInstantSearch from './VueInstantSearch.vue';
import vanillaSearch from './vanillaSearch';

Vue.use(InstantSearch);



if (window.location.href.includes('vue-instant-search')) {
  new Vue({
    el: '#vue-instant-search',
    render: h => h(VueInstantSearch),
  });
}
 

if (window.location.href.includes('vanilla-search')) {
  vanillaSearch.init();
}
 