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
        add_buttons.click(function (event) {
            let id = $(`#${this.id}`);
            myprint(id);
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
            } else {
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

    //Add a new list on the project
    const list_add_btn = $("#list-add-js");
    if (list_add_btn) {

        list_add_btn.click(event => {
            let dashboard_list = $('.dashboard-list');
            if (dashboard_list.length) {
                dashboard_list.addClass("show")
                myprint(dashboard_list.classList);

                //Click sur le bouton ajouter
                let create_List_btn = $('#dashboard-list-add-form');
                if (create_List_btn.length) {
                    create_List_btn.submit(event => {
                        event.preventDefault();
                        //TODO traitement de requete

                        //TODO faire une requete post

                        //TODO Ajout de la nouvelle liste
                        let tasks_js = $('#tasks_js');
                        let form = $('#dashboard-list-add-form');
                        let list_name = form.find('input').val();
                        let list_textarea = form.find('textarea').val();
                        let list_element_clone = tasks_js.find('.project-list-tasks').eq(0).clone();
                        list_element_clone.removeClass('todo');
                        let btn_id = `btn-${list_name}`;
                        list_element_clone.find('.project-list-title-right-add')[0].id = `${btn_id}`;

                        list_element_clone.find('.project-list-tasks-task-title-js').text(list_name);
                        list_element_clone.find('.nb_task_js').text(0);

                        tasks_js.append(list_element_clone[0]);
                        //setEvent
                        setClickEvent(list_element_clone.find('.project-list-title-right-add')[0])

                        //TODO cacher le pop up. Done
                        dashboard_list.removeClass("show");
                    });
                }

                //Bouton close de pop up
                let close_btn = $('#list_add-close-js');
                console.log(close_btn);

                if (close_btn.length) {
                    close_btn.click(event => {
                        dashboard_list.removeClass("show");
                    });
                }
            }
        })

    }

    //DROPDOWN
    const dropdown = $('#dropdown_js');

    //TODO - refactoring = trop de répétition pour la vérification de l'existance
    if (dropdown.length) {
        dropdown.click(event => {
            $("#profile_dropdown_js").toggleClass('show');
        })
    }

    //ASIDE - SETTING CLOSE OR CHEVRON
    const setting_chevron_js = $("#setting_chevron_js");
    if (setting_chevron_js.length) {
        let dashboard_inner_aside = $("#dashboard_inner_aside_js");
        let dashboard_inner_js = $("#dashboard_inner_js");

        setting_chevron_js.click(event => {

            setting_chevron_js.toggleClass(function () {
                if (setting_chevron_js.hasClass('fa-chevron-double-left')) {
                    return "fa-chevron-double-right";
                } else {
                    return "fa-chevron-double-left";
                }
            });

            if (dashboard_inner_js.hasClass('reduce')) {
                dashboard_inner_js.removeClass("reduce");
            } else {
                dashboard_inner_js.addClass("reduce");
            }
        })
    }

});


function setClickEvent(element) {
    //ajouter une tâche dans une liste
    console.log("Ici");
    const add_buttons = element;
    if (add_buttons) {
        console.log("Ici");
        console.log(add_buttons);
        //on click - add task element
        add_buttons.click(function (event) {
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
            } else {
                console.log("Pas de tache");
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

}

function createTask() {
    const task = null;


    return task;
}
function myprint(element) {
    console.log(element);
}