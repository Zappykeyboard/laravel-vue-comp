<script type="text/x-template" id='post-box'>
  <div class="the-post">
    <div v-show="!showEditForm" class="post-content">
      <h2>@{{title}}</h2>
      <p>@{{author}}</p>
      <p v-show="content" >@{{content}}</p>
      <p v-show="likes" v-bind:class="heartIcon">@{{likes}}</p>
    </div>

    <div v-show="showEditForm" class="edit-area">
      <div class="">
        <label for="author">Edit Author: </label>
        <input type="text" name="title" v-model="postAuthor">
      </div>
      <div class="">
        <label for="title">Edit Title: </label>
        <input type="text" name="author" v-model="postTitle">
      </div>
      <div class="">
        <textarea cols='23' rows ='4' type="text" v-model="postContent"></textarea>
      </div>
    </div>
    <button v-show="!showEditForm" @click="edit()" type="button" >Edit post...</button>
    <button v-show="showEditForm" @click="edit()" type="button" >Close edit form</button>
    <button v-show="showEditForm" @click="save()" type="button" >Save</button>
    <hr>
  </div>
</script>


<script type="text/javascript">
  Vue.component('post-box',{
    template:'#post-box',
    data: function(){
      return {
        editField: '',
        postContent:this.content,
        postTitle: this.title,
        postAuthor: this.author,
        showEditForm: false
      }
    },
    props: {
      id: String,
      title: String,
      author: String,
      content: String,
      likes: Number
    },
    computed: {
      heartIcon(){
        return 'far';
      }

    },
    methods: {
      edit(){
        this.showEditForm = !this.showEditForm;
      },
      save(){

        //i campi da inviare
        let post = {
          _token: token,
          title: this.postTitle,
          author: this.postAuthor,
          content: this.postContent
        };
        console.log('post/' + this.id);
        //invio i dati
        axios.put('http://localhost:8888/post/' + this.id, post)
            .then(function(res){console.log(res);})
            .catch(function(err){console.log(err);});

        //aggiorno i campi
        this.updateValues();
        //chiudo il form
        this.edit();
      },
      updateValues(){
        this.title = this.postTitle;
        this.author = this.postAuthor;
        this.content = this.postContent;
      }
    }
  })
</script>
