<template>
<div>
    <ais-instant-search
      :search-client="searchClient"
      index-name="dev_TAGS"
    >
      <ais-search-box v-model="query" />

      <ais-configure
        :hitsPerPage="8"
      />

      <br>
      <h2 class="title is-2">Tags</h2>
      <ais-hits>
        <template slot="item" slot-scope="{ item }">
          <h3>
            <a :href="'/' + item.name">
              <ais-highlight :hit="item" attribute="name" />
            </a>
          </h3>
        </template>
      </ais-hits>

    </ais-instant-search>
    <hr />
    <ais-instant-search
      :search-client="searchClient"
      index-name="dev_CONTENT"
    >
      <ais-configure
        :query="query"
        :hitsPerPage="8"
      />

      <h2 class="title is-2">Inhalte</h2>
      <ais-hits>
        <template slot="item" slot-scope="{ item }">
          <h3><ais-highlight :hit="item" attribute="title" /></h3>
        </template>
      </ais-hits>
    </ais-instant-search>
  </div>
</template>

<script>
import algoliasearch from 'algoliasearch/lite';
import 'instantsearch.css/themes/algolia-min.css';

export default {
  data() {
    return {
      searchClient: algoliasearch(
        window.env.ALGOLIA_APPLICATION_ID,
        window.env.ALGOLIA_SEARCH_API_KEY,
      ),
      query: '',
    };
  },
};
</script>


