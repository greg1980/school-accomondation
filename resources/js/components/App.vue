<template>
  <div class="app-component">
      <p>Listing</p>
      <table class="table">
          <thead>
              <tr>
                  <th>Task Id</th>
                  <th>Task Title</th>
                  <th>Priority Level</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              <task-component v-for="task in tasks" :key="task.id" :task="task"></task-component>
              <tr>
                 <td><input type="text" id="task" class="form-control"> </td>
                 <td>
                     <select id="select" class="form-control">
                         <option>LOW</option>
                         <option>MEDIUM</option>
                         <option>HIGH</option>

                 </select>
                 </td>
                 <td><button class="btn btn-primary">Submit</button></td>
              </tr>
              
          </tbody>
      </table>
  </div>
</template>

<script>
    import TaskComponent from './Task.vue';
        export default{
            data(){
                return{

                    tasks:[ ],
                    message: 'Thanks...'
                 
                }
            },

            methods:{

                getTasks(){
                    window.axios.get('task').then(({data})=> {
                      data.forEach(task => {
                          this.tasks.push(task)
  
                      });
                    });
                }
       
            },
        
            created(){
                this.getTasks();
            },
            components:{TaskComponent}
        }
</script>

<style>
    
</style>