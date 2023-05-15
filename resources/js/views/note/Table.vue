<template>
  <div class="bg-evening text-white content py-4 px-2">
    <div id="page-content-wrapper" class="">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="text-center">Table of Notes</h3>
      <hr />
      <div>
        <table class="table text-white">
          <thead>
            <tr>
              <th>Title</th>
              <th>Subject</th>
              <th>Published</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="note in notes" :key="note.id">
              <td> <router-link :to="{ name: 'notes.show', params: { subjectSlug: note.subjectSlug, noteSlug: note.slug, }, }" >{{ note.title }}</router-link > </td>
              <td>{{ note.subject }}</td>
              <td>{{ note.published }}</td>
              <td> <router-link :to="{ name: 'notes.edit', params: { subjectSlug: note.subjectSlug, noteSlug: note.slug, }, }" >Edit</router-link > </td>
              <td> <DeleteNote :noteSlug="note.slug" :subjectSlug="note.subjectSlug" /> </td>
            </tr>
          </tbody>
        </table>
      </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import DeleteNote from "./Delete";
export default {
  components: {
    DeleteNote: DeleteNote,
  },
  data() {
    return {
      notes: [],
    };
  },
  mounted() {
    this.getNotes();
    // axios.get('/api/notes').then((response) => {
    //     this.notes = response.data.data;
    // });
  },
  methods: {
    async getNotes() {
      let { data } = await axios.get("/api/notes");
      this.notes = data.data;
    },
  },
};
</script>