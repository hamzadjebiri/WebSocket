<template>
    <div class="container" >
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <h4>Liste des posts : </h4>

                    

                           <ul class="panel-heading" v-for="post in posts">
                                       
                                           
                                <li style="border:solid 3px black; padding:2%">
                                    
                                 <h5> id  post : {{post.id}} <strong> id author :{{post.author_id}}</strong> {{post.title}} </h5> 
       
                                 <p> contenu :  <strong>{{post.content}} </strong> </p> 
                                 
                                 <h6> <button @click="ReadOnePost(post.id)"> Lire la suite </button> </h6>
                                 
                                 </li>
       
                           </ul>

                           <div class="panel-body" v-if="posts.length != 0 ">
                        
                               <div>
                                    
                                    <label for="send">new Post :</label>
       
                                     <textarea name="NewPost" id="NewPost" cols="30" rows="5" v-model="NewPost"></textarea>
       
                                     <button @click="SendPost">Envoyer</button> 
           
                              </div>
                    
                           </div>

                    
      
                       
                       <ul class="panel-heading"  v-for="post in OnePost">
   
                            <li style="border:solid 3px black; padding:2%">
                                
                               <h5> <strong>{{post.author_id}}</strong> {{post.title}} </h5> 
     
                               <p> contenu :  <strong>{{post.content}} </strong> </p> 
                               
                               <h6> <button @click="getPost"> Afficher tout les posts  </button> </h6>
                               
                            </li>   
   
                       </ul>
                       
                       <div v-if="OnePost.length != 0 ">
                       
                             <ul class="panel-heading"  v-for="comment in comments">
         
                                  <li style="padding:2%">
                                      
                                     <h5> <strong>post id : {{comment.post_id}}</strong>  </h5> 
           
                                     <p> contenu :  <strong>{{comment.comment_content}} </strong> </p> 
                                     
                                     
                                  </li>   
         
                             </ul>

                             <textarea name="comment_content" id="comment_content" cols="30" rows="5" v-model="comment_content"></textarea>
                             
                             <button @click="AddNewComments()">Envoyer</button> 

                             
                       </div>

                    

                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        
        props:['userid','usertoken']  ,

        data(){
            
            return {

                messages : [],

                Message :'',

                posts : [] ,

                NewPost : '' ,

                OnePost : [] ,

                comments : [] ,

                comment_content :'' ,

                postid :'' , 

                author_id :''
            }

        },

        mounted() {

            this.getPost();
/*

            Echo.private('App.User.' + this.userid)
               .notification((notification) => {
                   console.log(notification);
   
                          alert('its work ! ') ;
           });
*/

           Echo.private('post.'+this.userid) //private

            .listen('comments', (e) => {

              console.log(e);

               this.messages.push(e[0]) ; // hnaya rani ndire e[0] lkn dakhel el event nktb return 
                                          //[ 'data' =>$this->comment ]
                                         // lzm hna ndire e['data']  
              

         });

       

       
    
   } ,

     methods : {

       GetComments($post_id){

           console.log('get comment ! ') ;

           axios.get('/getComments/'+$post_id)
           
           .then(response =>{

                 console.log(' comment success ! ') ;
         
                 console.log('comment:'+response) ;
                 
                 this.comments.push(response.data) ;

                 
           }).catch(error => {
               
               console.log(error) ;

           });

           
       },

        AddNewComments(){
           

           console.log('AddNewComments  ! '+this.author_id) ;

           axios.post('/AddNewComments',{

               post_id : this.postid ,

               comment_content : this.comment_content , 

               author_id : this.author_id
           })
           
           .then(response =>{

                  this.comment_content ='' , 

                 console.log(' comment add success ! ') ;
         
                 console.log('comment add :'+response) ;
                 
                 this.comments.push(response.data) ;

                 
           }).catch(error => {
               
               console.log(error) ;

           });

           
       },

       ReadOnePost($post_id){

          // alert("function clicked : "+$post_id) ; 
           
            this.posts = [] ;
   
            axios.get('/ReadOnePost/'+$post_id)
   
            .then(response =>{

                // alert($post_id) ; 
           
                 console.log(response);
                 
                 this.OnePost.push(response.data) ;

                 this.GetComments($post_id);

                 this.postid = response.data.id ; 

                 this.author_id = response.data.author_id ; 

                  
            }).catch(error =>{


         });


         },

      SendPost(){
         
         

         axios.post('/SendPosts',{
               
               title :'test',

               content : this.NewPost ,

         }) .then(response =>{

               console.log(response.data) ;

               this.posts.push( response.data ) ;

         }).catch(error =>{


         });
 
      },  
      getPost(){
         
          this.OnePost = [] ; this.comments = [] ;

         axios.get('/GetPosts')

         .then(response =>{

               console.log(response.data) ;

               this.posts = response.data ;

                 this.postid = '' ;  this.author_id = ''

         }).catch(error =>{


         });
 
      },

        sendMessage(){

        
              //alert(this.Message) ;

               axios.post('/sendMessage',{

                   Message : this.Message                       

               }).then(response =>{
                  

                   console.log("your data has been send "+response.data) ;

                  // console.log(response.data) ;

                   this.Message= '' ;

                  // this.messages.push(response.data) ;

               }).catch( error =>{
                    
                    console.log(error.data) ;
               })

               
        }


        }
    }
</script>
