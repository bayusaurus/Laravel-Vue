<template>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card square">
          <div class="card-header">Add Note</div>
          <div class="card-body">
            <form action="#" method="post" @submit.prevent="update">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" v-model="form.title" id="title" class="form-control square" />
                <div v-if="theErrors.title" class="text-danger mt-2">
                  {{ theErrors.title[0] }}
                </div>
              </div>

              <div class="form-group">
                <label for="subject">Subject</label>
                <select @change="selectedSubject" id="subject" class="form-control square" >
                  <option :value="form.subjectId" v-text="form.subject"></option>
                  <template  v-for="subject in subjects">
                        <option v-if="form.subjectId !== subject.id" :key="subject.id" :value="subject.id" >
                            {{ subject.name }}
                        </option>
                  </template>
                </select>
                <div v-if="theErrors.subject" class="text-danger mt-2">
                  {{ theErrors.subject[0] }}
                </div>
              </div>

              <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" v-model="form.description" id="description" rows="5" class="form-control square" ></textarea>
                <div v-if="theErrors.description" class="text-danger mt-2">
                  {{ theErrors.description[0] }}
                </div>
              </div>

              <button type="submit" class="btn btn-primary square">
                Update
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {},
      subjects: [],
      theErrors: [],
      selected:'',
      selectedText:'',
    };
  },

  mounted() {
    this.getSubjects();
    this.getNote();
  },

  methods: {
    async getSubjects() {
      let response = await axios.get("/api/subjects");
      if (response.status === 200) {
        this.subjects = response.data;
      }
    },

    async getNote() {
        let response = await axios.get(`/api/notes/${this.$route.params.subjectSlug}/${this.$route.params.noteSlug}`)
        this.form = response.data.data;
    },

    async update(){
        try{
            this.form['subjectId'] = this.selected || this.form.subjectId;
            this.form['subject'] = this.selectedText || this.form.subject;
            console.log(this.form);
            console.log(this.form['subject']);
            console.log(this.form['subjectId']);
            
            let response = await axios.patch(`/api/notes/${this.$route.params.subjectSlug}/${this.$route.params.noteSlug}/edit`, this.form);
            if(response.status == 200){
                this.theErrors = [];
                this.$toasted.show(response.data.message, {
                    position: 'top-center',
                    duration: 3000,
                    type: 'success',
                    icon: 'done',
                });
                this.$router.push('/notes/table');
            }
        }catch(e){
            this.theErrors = e.response.data.errors;
            this.$toasted.show('Something went wrong....', {
                position: 'top-center',
                duration: 3000,
                type: 'error',
                icon: 'warning', 
            });
        }
    },
    selectedSubject(e){
        this.selected = e.target.value;
        this.selectedText = e.target.options[e.target.options.selectedIndex].text;
    }
  },
};
</script>

<style>
</style>