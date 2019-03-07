<template>
  <div class="app-component">
      <loading :active.sync="isLoading"></loading>
      <p>Listing</p>
      <table class="table">
          <thead>
              <tr>
                  <th>Task Id</th>
                   <th>Notes</th>
                  <th>Task Title</th>
                  <th>Priority Level</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              <task-component v-for="task in tasks" :key="task.id" :task="task" @delete="remove"></task-component>
              <tr>
                  <td><input v-model="task.note" type="textarea" id="notes" class="form-control"></td>
                  <td><input v-model="task.title" type="text" id="task" class="form-control"></td>
                 <td>
                     <select v-model="task.priority" id="select" class="form-control">
                         <option>LOW</option>
                         <option>MEDIUM</option>
                         <option>HIGH</option>
                      </select>
                 </td>
                 <td><button @click="store" class="btn btn-primary">Submit</button></td>
              </tr>
              
          </tbody>
      </table>
      <!-- donughts -->
        <div class="container">
            <div class="form-group col-lg-8 col-sm-12">
            <div id="chart" class="col-lg-4 col-sm-4">
                <h5>Notes</h5>
            </div>
            <div id="Chart1" class="col-lg-4 col-sm-4">
                <h5>Topics</h5>
            </div>
            <div id="donuts" class="col-lg-4 col-sm-14">
                <div class="innerpie">
                    <h5>Total</h5>
                    <span class="total">{{total+title}}</span>
                </div>
            </div>
          </div>
        </div>
      <!-- end of donughts -->

  </div>
</template>

<script>
    import TaskComponent from './Task.vue';
    import Loading from 'vue-loading-overlay';
    // Import stylesheet
    import 'vue-loading-overlay/dist/vue-loading.css';
        export default{
            data(){
                return{
                    isLoading:false,
                    tasks:[],
                    task: {title: '', priority: '', note: '' },
                    total: 0,
                    title:0,
                    notes:0
                
                }
            },

            methods:{

                getTasks(){
                    window.axios.get('task').then(({data})=> {
                      data.forEach(task => {
                          this.tasks.push(task)
                      });
                    });
                },
                store(){

                    if(this.checkInputs()) {
                    this.isLoading = true;
                    window.axios.post('task', this.task).then(savedTask =>{
                        this.tasks.push(savedTask.data);
                        this.task.title = '';
                        this.task.note= '';
                        this.isLoading = false;
                    })


                  }
                },

                checkInputs(){

                    if(this.task.title && this.task.priority && this.task.note) return true;
                },
               
                remove(id) {
                    
                    this.isLoading = true;
                    window.axios.delete(`task/${id}`).then(({data}) =>{
                       let index = this.tasks.findIndex(task => task.id === id);
                       this.tasks.splice(index, 1);

                       this.isLoading = false;
                     
                    });
                    
                },
            
            },
        
            created(){
                this.getTasks();
            },
            components:{TaskComponent, Loading}
        }
</script>

<style>
    
</style>