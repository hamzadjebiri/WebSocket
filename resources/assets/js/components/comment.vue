<template>
    <div class="container" >
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <ul class="panel-heading" v-for="message in messages">
                        
                       
                                    
                         <li> <strong> User said : </strong> {{message}} </li>

                    </ul>

                    <div class="panel-body">
                        
                        <div>
                             
                             <label for="send">Message</label>

                              <textarea name="sendMessage" id="sendMessage" cols="30" rows="5" v-model="Message"></textarea>

                              <button @click="sendMessage">Envoyer</button> 
    
                       </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        
        props:['userid']  ,
        data(){
            
            return {

                messages : [],

                Message :'',
            }

        },

        mounted() {

           
          window.Echo.channel('chat') //private

            .listen('MessagePushedd', (e) => {

              console.log(e);

               this.messages.push(e) ;
  
                   //console.log(this.messages) ;

         });
   } ,
     methods : {

     
        sendMessage(){

        
              this.Message ='' ;

               axios.post('/sendMessage',{

                   Message : this.Message ,                      

               }).then(response =>{


                  // console.log("your data has been send "+response.data) ;

                  // this.messages.push(response.data) ;

               }).catch( error =>{
                    
                    console.log(error.data) ;
               })

               
        }


        }
    }
</script>
