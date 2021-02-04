//TODO à faire avec jQuery
const tasks = document.querySelectorAll(".task-js");
var mousedown = false;
var mousemove = false;

if (tasks) {
    var offset = [];
    tasks.forEach(task => {
        offset.push(task);
        task.addEventListener("mousedown", e => {
            task.style.cursor = "move";
            mousedown = true;
            console.log("down");
        });

        task.addEventListener("mouseup", e => {
            task.style.cursor = "grab";
            mousedown = false;
            console.log("up");
        });

        task.addEventListener('mousemove', e => {
            if (mousedown) {
                offset.find(element => {
                    if (element.offsetTop == e.clientY) {
                        task.style.cursor = "move";
                        element.style.border = "1px solid red";
                        task.remove();
                        element.append(task);
                    } else {
                        element.style.border = "none";
                        task.style.cursor = "not-allowed";
                    }
                    //console.log("Matched ", task.offsetTop, element.offsetTop);
                })
            }
        })
    });
}

//Listes

//TODO - test
$(document).ready(function () {
    //ajouter une tâche dans une liste
    const add_buttons = $('.project-list-title-right-add');
    if (add_buttons) {
        //on click - add task element
        add_buttons.click(function (event){
            let id = $(`#${this.id}`);
            let parent = id.parents(".project-list-tasks-task-task");
            let list_container = parent.children(".project-list-tasks-task-body");

            //Cloner
            if (list_container.children().length) {
                let clone = list_container.children().eq(0).clone();
                if (clone.find('.task-title').length === 1) {
                    clone.find('.task-title').text("Title de tâche modifié");
                    list_container.prepend(clone)
                    myprint(clone.find('.task-title').text());
                }
            }else{
                //TODO - création d'une tâche
                let task = ` 
                            <div class="project-list-tasks-task-body-task prop task-js">
                                 <div class="project-list-tasks-task-body-task-front">
                                    <!--TASK TITLE-->
                                    <p class="project-list-tasks-task-body-task-front-title">
                                        <i class="fal fa-book-open"></i>
                                        <span class="task-title">Faire la bare de navigation</span>
                                    </p>

                                    <!--TASK LEAD-->
                                    <div class="project-list-tasks-task-body-task-front-lead">
                                        <div
                                            class="project-list-tasks-task-body-task-front-lead-picture">
                                            <img src="public/images/profile/photo_passe.jpg"
                                                alt="user profile avatar">
                                        </div>
                                        <span>John DOE</span>
                                    </div>

                                    <!--TASK STATE-->
                                    <div class="project-list-tasks-task-body-task-front-state">
                                        <span>Etat</span>

                                        <span>
                                            <span></span>
                                            <span>Proposée</span>
                                        </span>

                                    </div>

                                    <!--TASK MEMBERS-->
                                    <div class="project-list-tasks-task-body-task-front-members">

                                        <div
                                            class="project-list-tasks-task-body-task-front-members-item success">
                                            <span>Jean D.</span>
                                        </div>

                                        <div
                                            class="project-list-tasks-task-body-task-front-members-item danger">
                                            <span>Pierre P.</span>
                                        </div>

                                        <div
                                            class="project-list-tasks-task-body-task-front-members-item primary">
                                            <span>Pierre P.</span>
                                        </div>

                                    </div>

                                </div>
                            </div>`;
            }
        });
    }
});

function createTask() {
    const task = null;


    return task;
}
function myprint(element) {
    console.log(element);
}