	

import algoliasearch from 'algoliasearch';
import debounce from 'lodash/debounce';

const client = algoliasearch(window.env.ALGOLIA_APPLICATION_ID, window.env.ALGOLIA_SEARCH_API_KEY);
const index = client.initIndex('Search Terms');

export default {

  results: null,
  input: null,
  debouncedSearch: null,

  init() {
    this.results = document.querySelector('.js-results');
    this.input = document.querySelector('.js-searchField');
    this.debouncedSearch = debounce(this.search.bind(this), 400);
    this.input.addEventListener('input', this.debouncedSearch)
 
    document.querySelector('.js-showResults').addEventListener('click', () => {
      window.location.href = `/results?categories=${this.input.value}`;
    })

    index.search('').then(({ hits }) => {
      this.showResults(hits);
    });
  },

  search() {
    index.search(this.input.value).then(({ hits }) => {
      this.showResults(hits);
    });
  },

  showResults(hits) {
    this.results.innerHTML = '';
    hits.forEach((hit) => {
      this.results.insertAdjacentHTML('beforeEnd', `<div class="column is-4"><div class="box"><a href="/results?categories=${hit.name}">${hit.name}</a></div></div>`);
    });
  }
}