<template>
    <input :v-model="query" class="ais-input" placeholder="Search...">
</template>

<script>
export default {
  name: 'app',
  data() {
    return {
      query: '',
    };
  },
};
</script>