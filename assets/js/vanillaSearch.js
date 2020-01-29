	

import algoliasearch from 'algoliasearch';
import debounce from 'lodash/debounce';

const client = algoliasearch(window.env.ALGOLIA_APPLICATION_ID, window.env.ALGOLIA_SEARCH_API_KEY);
const index = client.initIndex('dev_TAGS');

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
      window.location.href = `/${this.input.value}`;
    })
  },

  search() {
    index.search({
      query: this.input.value
    },
    (err, { hits } = {}) => {
      if (err) throw err;
      this.showResults(hits);
    });
  },

  showResults(hits) {
    this.results.innerHTML = '';
    hits.forEach((hit) => {
      this.results.insertAdjacentHTML('beforeEnd', `<div class="column is-4"><div class="box"><a href="/${hit.name}">${hit.name}</a></div></div>`);
    });
  }
}


// // only query string
// index.search({
//   query: 'query string'
//   },
//   (err, { hits } = {}) => {
//     if (err) throw err;

//     console.log(hits);
//   }
// );

// // with params
// index.search(
//   {
//     query: 'query string',
//     attributesToRetrieve: ['firstname', 'lastname'],
//     hitsPerPage: 50,
//   },
//   (err, { hits } = {}) => {
//     if (err) throw err;

//     console.log(hits);
//   }
// );
