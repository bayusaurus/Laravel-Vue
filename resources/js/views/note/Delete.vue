<template>
  <button ref="deleteNote" @click="destroyNotes" class="btn btn-sm btn-danger">
    Delete
  </button>
</template>

<script>
export default {
  props: ["noteSlug", "subjectSlug"],
  methods: {
    async destroyNotes() {
      let q = window.confirm("Are you sure?");
      if (q == true) {
        try {
          let response = await axios.delete(
            `/api/notes/${this.subjectSlug}/${this.noteSlug}/delete`
          );
          if (response.status == 200) {
            this.$toasted.show(response.data.message, {
              position: "top-center",
              duration: 3000,
              type: "success",
              icon: "done",
            });
            this.$refs.deleteNote.parentNode.parentNode.remove();
          }
        } catch (e) {
          this.$toasted.show("Something went wrong....", {
            position: "top-center",
            duration: 3000,
            type: "error",
            icon: "warning",
          });
        }
      }
    },
  },
};
</script>