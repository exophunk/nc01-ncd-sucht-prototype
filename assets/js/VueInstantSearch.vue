<template>
<div>
    <ais-instant-search
      :search-client="searchClient"
      index-name="Search Terms"
    >
      <ais-search-box v-model="query" />

      <ais-configure
        :hitsPerPage="8"
      />

      <br>
      <h2 class="title is-2">Search Terms</h2>
      <ais-hits>
        <template slot="item" slot-scope="{ item }">
          <h3>
            <a :href="`/results/?categories=${item.name}`">
              {{ item.name }}
            </a>
          </h3>
        </template>
      </ais-hits>

    </ais-instant-search>
    <hr />
    <ais-instant-search
      :search-client="searchClient"
      index-name="Content"
    >
      <ais-configure
        :query="query"
        :hitsPerPage="8"
      />

      <h2 class="title is-2">Inhalte</h2>
      <ais-hits>
        <template slot="item" slot-scope="{ item }">
          <h3>
            <a :href="`/${item.type}/${item.slug}`">
              {{ item.title }}
            </a>
          </h3>
          <p v-if="item.text" v-html="item.text.substr(0, 100)"></p>

          <br>
          <ul class="topics">
            <li class="tag" v-for="topic in item.topics" :key="topic">{{ topic }}</li>
          </ul>
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

      useAlgoliaResults: false,
    };
  },

  computed: {

  },

  mounted() {
    this.useAlgoliaResults = window.location.href.includes('algolia-based');
  },
};
</script>


