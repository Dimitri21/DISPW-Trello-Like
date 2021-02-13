//HUMBURGER ACTIVATION
const nav_humburger = document.querySelector('.nav-humburger-js');
const main_humburger = document.querySelector('.main-humburger');
let body = document.querySelector('body');

nav_humburger.addEventListener('click', e => {
    if (e.currentTarget) {
        if (e.currentTarget.classList.contains('open')) {
            e.currentTarget.classList.remove('open');
            body.classList.remove('overflow');
            main_humburger.classList.remove('show-js');
        } else {
            e.currentTarget.classList.add('open');
            e.currentTarget.style.zIndex = "2";
            main_humburger.classList.add('show-js');
            if (body) {
                body.classList.add('overflow');
            }
        }
    }
});

const $_ = (element, all = false) => {
    if (all) {
        return document.querySelectorAll(element);
    } else {
        return document.querySelector(element);
    }
}

//CALL PLAGE-------------------------------------------
dropdown("#dropdown_js");
reduceAside("#setting_chevron_js");
asideListeItemSelected('.dashboard-inner-aside-list li');
setEventForAddCardOnList("#list_add_js");
setEventProjectAdd('#project_add_js');
setEventOnCloseAddTaskForm("#task_add_close_js"); //close form
setTaskAddEvent('.project_list_task_add_js');//for btn add
//-----------------------------------------------------


//Definition of functions------------------------------

function setEventProjectShowHover(element_p) {
    const element_v = $_(element_p);
    if (element_v) {
        element_v.classList.add('hover');
        setTimeout(e => {
            element_v.classList.remove('hover');
        }, 5000);
    }
}

function setEventProjectAdd(element_) {
    const element = $_(element_);
    const element_container_bg = $_('.project-add');
    const element_container_annuler = $_('#project_annuler_js');
    const project_element = $_('#project_js');
    if (element) {
        element.addEventListener('click', e => {
            e.preventDefault();
            if (element_container_bg) {
                element_container_bg.classList.add('active');
                project_element.classList.add('active');
            }
        })

        element_container_annuler.addEventListener('click', e => {
            project_element.classList.remove('active');
            element_container_bg.classList.remove('active');
        })
    }
}

function setEventForAddCardOnList(element) {
    const add_btn = $_(element);
    if (add_btn) {
        add_btn.addEventListener('click', e => {
            let form = $_(".dashboard-list-add");
            let form_container = $_(".dashboard-list");
            if (form) {
                form_container.classList.add('show');
                form.classList.add('add');

                //Cross - to remove event
                let cross = $_('#list_add_close_js');
                cross.addEventListener("click", e => {
                    form_container.classList.remove('show');
                    form.classList.remove('add');
                });

                //submit form
                let form_element = $_('#dashboard-list-add-form');
                if (form_element) {
                    form_element.addEventListener('submit', e => {
                        e.preventDefault();

                        //Form fields
                        const list_name = $_('#listname');
                        const list_description = $_('#description');
                        const url = $_(".projecr_list_add_js");

                        if (list_name.value && list_description.value && url.dataset.url) {
                            const list_container = $_('#tasks_js');
                            const data = {
                                name: list_name.value,
                                description: list_description.value,
                            };

                            //send AJAX Message
                            $.ajax({
                                type: "POST",
                                url: url.dataset.url,
                                data: data,
                                cache: false,
                                success: function (data_get) {
                                    //Remise de string en object JSON
                                    const returnValue = JSON.parse(data_get);
                                    if (returnValue == "success") {
                                        //Clean fields
                                        list_name.textContent = "";
                                        list_description.textContent = "";
                                        createList(list_name.value, list_container);

                                        //Remove container  and form
                                        form_container.classList.remove('show');
                                        form.classList.remove('add');
                                    }
                                },
                                error: function (error_get) {
                                    console.error("FATAL : ", error_get);
                                }
                            });

                        } else {
                            list_name.style.border = "1px solid red";
                            list_description.style.border = "1px solid red";
                        }
                    })
                }
            }
        })
    }
}

/**
 * @precond : Must check the max number for list on the projects ou tableau
 * @param {*} name
 * @param {*} container 
 */
function createList(name, container) {
    let project_list_tasks = $_('.projects-list-tasks', true);
    console.log("il me faut créer une liste");
    //TODO - Must check the max List number
    const index = project_list_tasks.length + 1;
    let div_tasks = document.createElement('div');
    div_tasks.classList.add('projects-list-tasks');
    div_tasks.innerHTML = `
        <!--TASK FRONT-->
        <div class="project-list-tasks-task">

            <!--LIST TITLE-->
            <div class="project-list-tasks-task-title">
                <span class="project-list-tasks-task-title-js"  id="list-${index}">${name}</span>

                <div class="project-list-tasks-task-title-right">

                    <div>
                        <i class="far fa-clipboard-list"></i>
                        <span class="nb_task_js">0</span>
                    </div>

                    <!--//TODO event for btn-dodo-->
                    <button onclick="showAddTaskForm(${index})"  class="project-list-title-right-add" id="add-${index}">
                        <i class="far fa-plus"></i>
                    </button>

                    <!--//TODO event for btn-dodo-->
                    <button onclick="listConfigEvent('list-${index}')" class="project-list-title-right-config" id="config-${index}">
                        <i class="fas fa-tools"></i>
                    </button>

                </div>
            </div>

            <!--LIST BODY-->
            <div class="project-list-tasks-task-body" id="tasks_container_js_${index}">

            </div>

        </div>

    `;

    if (container) {
        container.appendChild(div_tasks);
    }
    // let add_btn = $_(`#add-${index}`);
    // let config_btn = $_(`#config-${index}`);
    //Add event on list button add
}

function setEventOnCloseAddTaskForm(element) {
    let cross_btn = $_(element);
    if (cross_btn) {
        cross_btn.addEventListener('click', e => {
            $_('.dashboard-task').classList.remove('show');
            $_('.dashboard-task-add').classList.remove('add');
        });
    }
}

/**
 * 
 * @param {*} element 
 */
function setTaskAddEvent(element) {
    const task_form = $_(element);
    if (task_form) {
        task_form.addEventListener('submit', e => {

            e.preventDefault();
            let task_name = $_("#task_name");
            let task_description = $_("#taskdescription");

            if (task_name.value && task_description.value) {
                let task_container = $_(".dashboard-task");
                let task_container_form = $_(".dashboard-task-add");


                //Form fields
                const list_name = $_('#task_name');
                const list_description = $_('#taskdescription');
                let current_task_container = $_('.list_activate');
                let id = current_list_id = null;
                if (current_task_container) {
                    let id_temp = current_task_container.id.split("_");
                    id = parseInt(id_temp[id_temp.length - 1]);
                }

                if (list_name.value && list_description.value && task_form.dataset.url) {
                    const data = {
                        name: list_name.value,
                        description: list_description.value,
                        list_id :id
                    };
                    //send AJAX Message
                    $.ajax({
                        type: "POST",
                        url: task_form.dataset.url + id,
                        data: data,
                        cache: false,
                        success: function (data_get) {
                            //Remise de string en object JSON
                            const returnValue = JSON.parse(data_get);
                            if (returnValue.status == "success") {
                                //Clean fields
                                list_name.textContent = "";
                                list_description.textContent = "";

                                createTask(returnValue,current_task_container);
                                let nb_tasks_ = $_(`#nb_task_js_${id}`);
                                if (nb_tasks_) {
                                    nb_tasks_.textContent = parseInt(nb_tasks_.textContent) + 1;
                                }
                                //Clean up fields
                                if (task_container && task_container_form) {
                                    task_container.classList.remove('show')
                                    task_container_form.classList.remove('add')
                                }

                            }
                        },
                        error: function (error_get) {
                            console.error("FATAL : ", error_get);
                        }
                    });

                } else {
                    list_name.style.border = "1px solid red";
                    list_description.style.border = "1px solid red";
                }


            } else {
                task_name.style.border = "1px solid red";
                task_description.style.border = "1px solid red";
            }
        })
    }
}

function showAddTaskForm(index) {
    let add_task_container = $_('.dashboard-task');
    let add_task_form = $_('.dashboard-task-add');
    let current_container_to_set_new_task = $_(`#tasks_container_js_${index}`);

    //Old list activate
    let old_list_activate = $_('.list_activate');

    if (old_list_activate) {
        old_list_activate.classList.remove('list_activate');
    }

    //Activate a new list where the new task will be set
    if (current_container_to_set_new_task) {
        current_container_to_set_new_task.classList.add("list_activate");
    }

    //show the formular for adding a new task
    if (add_task_container && add_task_form) {
        add_task_container.classList.add('show');
        add_task_form.classList.add('add');
    }
}

function createTask(infos, element) {
    const task_container = element;
    //TODO - update the tasks number on the current list title

    let task_element = document.createElement('div');
    task_element.classList.add('project-list-tasks-task-body-task');
    task_element.innerHTML = `
        <!--TASK TITLE-->
        <p class="project-list-tasks-task-body-task-title">
            <i class="fal fa-book-open"></i>
            <span class="task-title">${infos.name}</span>
        </p>
                
        <!--TASK LEAD-->
        <div class="project-list-tasks-task-body-task-lead">
            <div class="project-list-tasks-task-body-task-lead-picture">
                <img src="images/profile/${infos.picture}"
                    alt="user profile avatar">
            </div>
            <span>${infos.user}</span>
        </div>

        <!--TASK STATE-->
        <div class="project-list-tasks-task-body-task-state">
            <span>Etat</span>
            <span>
                <span></span>
                <span>${infos.sticker}</span>
            </span>

        </div>

        <!--TASK MEMBERS-->
        <div class="project-list-tasks-task-body-task-members">
            <!--TODO have to make a loop here-->
            <div class="project-list-tasks-task-body-task-members-item success">
                <span>${infos.members[0]}</span>
            </div>

        </div>
    `;
    task_container.appendChild(task_element)
}

function listAddEvent(tasks_container_js_id) {
    let task_container = $_(`#tasks_container_js_${tasks_container_js_id}`);
    //let task_container = $_(".dashboard-task");
    let task_container_form = $_(".dashboard-task-add");
    createList(task_name.value, task_container);

    //Clean up fields
    task_name.value = "";
    task_description.value = "";
    if (task_container && task_container_form) {
        task_container.classList.remove('show')
        task_container_form.classList.remove('add')
    }

}

function listConfigEvent(element) {
    const list_name = $_(`#${element}`);
    if (list_name) {
        let value = prompt("Changer le nom de la liste");
        if (value && value.length) {
            list_name.textContent = value;
        }
    }
}

/**
 * @brief set event for list item
 * when a item is selected
 * @param {*} element 
 */
function asideListeItemSelected(element) {
    const list_item = $_(element, true);

    for (let i = 0; i < list_item.length; i++) {
        list_item[i].addEventListener('click', e => {
            //e.preventDefault();
            //Remove de old actived element
            let old_active_element = $_('.dashboard-inner-aside-list li.active');
            if (old_active_element) {
                $_('.dashboard-inner-aside-list li.active').classList.remove('active');
            }
            //TODO - Faire une requete Ajax afin d'afficher le contenu par rapport à ceci
            const url = list_item[i].dataset.url;
            console.info("Faire le requete AJAX avec ce url : ", url);
            list_item[i].classList.add("active");
        });
    }
}

function reduceAside(element) {
    const reduce_element = $_(element);
    const reduce_element_container = $_('#dashboard_inner_js');
    if (reduce_element) {
        reduce_element.addEventListener('click', e => {
            if (reduce_element_container.classList.contains('reduce')) {
                reduce_element_container.classList.remove('reduce');

                //change chevron element
                reduce_element.classList.add('fa-chevron-double-left');
                reduce_element.classList.remove('fa-chevron-double-right');
            } else {
                reduce_element_container.classList.add('reduce');
                reduce_element.classList.remove('fa-chevron-double-left');
                reduce_element.classList.add('fa-chevron-double-right');
            }
        });
    }
}

function dropdown(element) {
    const dropdown_element = $_(element);
    if (dropdown_element) {
        dropdown_element.addEventListener('click', e => {
            console.log(e.currentTarget)
            const dropdown = $_('.main-dropdown');
            if (dropdown) {
                if (dropdown.classList.contains('show')) {
                    dropdown.classList.remove('show');
                } else {
                    dropdown.classList.add('show');
                }
            }
        });

        dropdown_element.addEventListener('click', e => {
        });
    }
}

//-----------------------------------------------------