//HUMBURGER ACTIVATION
const nav_humburger = document.querySelector('.nav-humburger-js');
const main_humburger = document.querySelector('.main-humburger');
let body = document.querySelector('body');
var users = null;

nav_humburger.addEventListener('click', e => {
    if (e.currentTarget) {
        if (e.currentTarget.classList.contains('open')) {
            e.currentTarget.classList.remove('open');
            body.classList.remove('overflow');
            main_humburger.classList.remove('show-js');
        } else {
            e.currentTarget.classList.add('open');
            e.currentTarget.style.zIndex = "3";
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
setEventOnCloseAddMemberForm("#member_add_close_js"); //close form
setTaskAddEvent('.project_list_task_add_js');//for btn add
createList('#dashboard-list-add-form');
sendComment('#task_comment_js');
setContactEvent('#btn_contact_form_js');
checkPassword("#profile_password_js", "#profile_password_confi_js");
setEventOnUploadPicture('#profile_avatar_js');
showMembersList("#member_name");// need jquery
setEventToAddMember('#member_add_js');
//-----------------------------------------------------

//---------------DRAG AND DROP and SORT AREA-----------
$(document).ready(function () {
    var lists = $_(".project-list-tasks-task-body", true);
    var options = {
        group: 'share',
        animation: 150
    };

    events = [
        'onChoose',
        'onStart',
        'onEnd',
        'onAdd',
        'onUpdate',
        'onSort',
        'onRemove',
        'onChange',
        'onUnchoose'
    ].forEach(function (name) {
        options[name] = function (evt) {
            let data_ajax = {
                task_id: evt.item.dataset.task,
                task_from: evt.oldIndex,
                task_to: evt.newIndex,
                list_from: evt.from.dataset.list,
                list_to: evt.to.dataset.list,
            };
            if (name == "onEnd") {
                changerOrderDB(data_ajax);
            } else if (name == "onRemove") {
                changerListAndOrderDB(data_ajax);
            }

        };
    });

    lists.forEach(list => {
        Sortable.create(list, options);
    });
    var nb = 0;

    function changerOrderDB(data_ajax) {
        $.ajax({
            type: "POST",
            url: "?path=admin-tasks-orders",
            data: data_ajax,
            cache: false,
            success: function (response) {
                let data_converted = JSON.parse(response);
                console.info(response);
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

    function changerListAndOrderDB(data_ajax) {
        $.ajax({
            type: "POST",
            url: "?path=admin-tasks-ordersandlist",
            data: data_ajax,
            cache: false,
            success: function (response) {
                let data_converted = JSON.parse(response);
                console.info(response);
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
});
//-----------------------------------------------------
//Definition of functions------------------------------

function showMembersList(element_p) {
    let element_v = $(element_p);
    //TODO - request to do once to SQL => avoid many statement to the database
    let members = $(".members_name_js");
    if (element_v) {

        element_v.click(e => {
            $('.members_list').toggleClass("show");
        });
        element_v.keydown(e => {
            search(".members_name_js", e.currentTarget.value);
        });
    }
}

function setEventToAddMember(element_p) {
    let element_v = $(element_p);
    let container_members = $_(".members_list");
    if (element_v) {
        element_v.click(e => {


            //AJax request to get all user from database
            $.ajax({
                type: "POST",
                url: "?path=admin-projects-all",
                data: { message: "ajax" },
                cache: false,
                success: function (response) {
                    let data_converted = JSON.parse(response);
                    if (data_converted.status == "success") {
                        data_converted.users.forEach(user => {
                            //TODO create elements on DOM
                            let user_div = document.createElement('div');
                            user_div.innerHTML = `
                                <label for="member_chosen_${user.id}" class="members_name_js">${user.name}</label>
                                <input type="checkbox" value="${user.id}" name="member_chosen_${user.id}" id="member_chosen_${user.id}">
                            `;
                            container_members.appendChild(user_div);
                        });

                        $_('.dashboard-member').classList.add('show');
                        $_('.dashboard-member-add').classList.add('add');
                    }

                },
                error: function (error) {
                    console.error(error);
                }
            });
        });
    }
}

function search(element_p, text) {
    let articles = $_(element_p, true);

    articles.forEach(element => {

        if (element.textContent.toLowerCase().indexOf(text.toLowerCase()) !== -1) {
            element.parentElement.style.display = "flex";
        }
        else {
            console.log("not found");
            element.parentElement.style.display = "none";
        }
    })
}

function setEventOnUploadPicture(picture_js_p) {
    let element_v = $_(picture_js_p);
    let element_btn_on_picture = $_("#profile_button_js");
    if (element_v) {
        element_v.addEventListener('change', e => {
            console.log(element_v)
            if (element_btn_on_picture) {
                element_btn_on_picture.classList.add('show');
            }
        });
    }
}

function checkPassword(password_p, password_conf_p) {
    let password_v = $_(password_p);
    let password_conf_v = $_(password_conf_p);

    if (password_v && password_conf_v) {
        password_conf_v.addEventListener('keyup', e => {
            if (password_v.value !== e.currentTarget.value) {
                e.currentTarget.style.border = "1px solid red"
            } else {
                e.currentTarget.style.border = "1px solid #004b7b"
            }
        });
    }
}

function sendComment(element_p) {
    let comment_form_v = $_(element_p);
    if (comment_form_v) {
        comment_form_v.addEventListener('submit', e => {
            e.preventDefault();
            let comment = $_("#comment");
            let url = comment_form_v.action;
            if (comment.value) {
                const data_comment = {
                    comment: comment.value
                }
                //Send Ajax
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data_comment,
                    cache: false,
                    success: function (response) {
                        let responseConverted = JSON.parse(response);
                        let comments_list_container = $_('#comments_list_js');
                        console.log(responseConverted)
                        if (responseConverted.status == "success") {
                            comment.value = "";
                            //Update comments list
                            createComment(responseConverted, comments_list_container);
                        } else {
                            console.error("Erreur ", responseConverted.message);
                        }
                    },
                    error: function (errors) {
                        console.error(errors);
                    }
                });
            }
        })
    }
}

function createComment(infos_p, container_p) {

    let comment = document.createElement('div');
    comment.classList.add('comment-item');
    comment.innerHTML = `
       <div class="comment-item-author">
           <p><span> ${infos_p.user}</span></p>
       </div>
       <div class="comment-item-message">
           <p>${infos_p.comment}</p>
           <div>
               <span><i class="far fa-calendar-alt"> </i>${infos_p.date} - </span>
               <span><i class="far fa-clock"> </i>${infos_p.time} </span>
           </div>
       </div>
    `;
    container_p.appendChild(comment);
}

function setContactEvent(element) {
    let element_btn = $_(element);
    if (element_btn) {
        element_btn.addEventListener('click', e => {
            let formName = $_('#form-name');
            let formEmail = $_('#form-email');
            let formMessage = $_('#form-message');
            let formDivError = $_('#form-danger-js')
            e.preventDefault();

            if (formName.value && formEmail.value && formMessage.value) {
                let formObject = {
                    name: formName.value,
                    email: formEmail.value,
                    message: formMessage.value
                };

                $.ajax({
                    type: "POST",
                    url: "?path=home-contact",
                    data: formObject,
                    cache: false,
                    success: function (response) {
                        let responseConvert = JSON.parse(response);
                        if (responseConvert.status == "success") {
                            formName.value      = "";
                            formEmail.value     = "";
                            formMessage.value   = "";
                            formDivError.style.display = "block";
                            formDivError.classList.add('alert','alert-success');
                            formDivError.innerHTML = responseConvert.message;

                            setTimeout(()=>{
                                formDivError.style.display  = "none";
                                formDivError.classList.remove('alert','alert-success');
                                formDivError.innerHTML      = "";
                            },5000);
                        }
                    },
                    error: function (errors) {
                        console.error(errors);
                    }
                });
            }else {
                formDivError.innerHTML = "<span>Veuillez remplir tous les champs</span>";
                formDivError.style.display = "block";
                formDivError.classList.add('alert' ,'alert-danger');

                setTimeout(()=>{
                    formDivError.style.display = "none";
                    formDivError.classList.remove('alert','alert-danger');
                    formDivError.innerHTML = "";
                },5000);
            }
        })


    }

}

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

        //Set Event
        add_btn.addEventListener('click', e => {

            //Select list form to show
            let form = $_(".dashboard-list-add");
            let form_container = $_(".dashboard-list");

            if (form) {
                //Added css class to cover the current page where form will be.
                form_container.classList.add('show');

                //Added css class to show list form
                form.classList.add('add');

                //Cross - to remove event
                let cross = $_('#list_add_close_js');
                cross.addEventListener("click", e => {
                    form_container.classList.remove('show');
                    form.classList.remove('add');
                });
                //------------------------------------------

            }
        })
    }
}

function createList(element_p) {

    //submit form
    let form_element = $_(element_p);
    if (form_element) {
        form_element.addEventListener('submit', e => {
            e.preventDefault();

            //Form fields
            const list_name = $_('#listname');
            const list_description = $_('#description');
            const url = $_(".projecr_list_add_js");
            let form = $_(".dashboard-list-add");
            let form_container = $_(".dashboard-list");

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
                        if (returnValue.status == "success") {

                            //Updateing css grid
                            buildList(list_name.value, list_container, returnValue.id);

                            //Clean fields
                            list_name.value = "";
                            list_description.value = "";

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
/**
 * @precond : Must check the max number for list on the projects ou tableau
 * @param {*} name
 * @param {*} container 
 */
function buildList(name, container, id) {
    let project_list_tasks = $_('.project-list-tasks', true);
    //TODO - Must check the max List number
    const index = project_list_tasks.length + 1;

    //Updating css grid for lists container
    container.style.gridTemplateColumns = `repeat(${index}, 300px)`;

    //create a new div element
    let div_tasks = document.createElement('div');
    div_tasks.classList.add('project-list-tasks');
    div_tasks.innerHTML = `
        <!--TASK FRONT-->
        <div class="project-list-tasks-task">

            <!--LIST TITLE-->
            <div class="project-list-tasks-task-title">
                <span class="project-list-tasks-task-title-js"  id="list-${id}">${name}</span>

                <div class="project-list-tasks-task-title-right">

                    <div>
                        <i class="far fa-clipboard-list"></i>
                        <span class="nb_task_js">0</span>
                    </div>
                    
                    <!--//TODO event for btn-todo-->
                    <div>
                        <!--//TODO event for btn-dodo-->
                        <button onclick="showAddTaskForm(${id})"  class="project-list-title-right-add" id="add-${id}">
                            <i class="far fa-plus"></i>
                        </button>

                        <!--//TODO event for btn-todo-->
                        <a href="?path=admin-lists-edit&id=${id}"><i class="fas fa-tools"></i></a>

                    </div>

                </div>
            </div>

            <!--LIST BODY-->
            <div class="project-list-tasks-task-body" id="tasks_container_js_${id}">

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

function setEventOnCloseAddMemberForm(element) {
    let cross_btn = $_(element);
    if (cross_btn) {
        cross_btn.addEventListener('click', e => {
            $_('.dashboard-member').classList.remove('show');
            $_('.dashboard-member-add').classList.remove('add');
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
            //Getting values from form fields
            let task_name = $_("#task_name");
            let task_description = $_("#taskdescription");
            let sticker = $_("#sticker");

            if (task_name.value && task_description.value) {
                let task_container = $_(".dashboard-task");
                let task_container_form = $_(".dashboard-task-add");


                //Form fields
                const list_name = $_('#task_name');
                const list_description = $_('#taskdescription');
                let current_task_container = $_('.list_activate');
                let project_id = $_('#project_id_js');

                let id = current_list_id = null;
                if (current_task_container) {
                    let id_temp = current_task_container.id.split("_");
                    id = parseInt(id_temp[id_temp.length - 1]);
                }
                if (list_name.value && list_description.value && task_form.dataset.url && sticker.value) {
                    const data = {
                        name: list_name.value,
                        description: list_description.value,
                        sticker: sticker.value,
                        list_id: id,
                        project_id: project_id.value
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
                                list_name.value = "";
                                list_description.value = "";
                                sticker.value = "";//TODO to personalize
                                createTask(returnValue, current_task_container);
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
    task_element.classList.add(infos.sticker);
    let picture = "default/man.jpg";
    if (infos.picture) {
        picture = infos.picture;
    }
    task_element.innerHTML = `

        <div class="project-list-tasks-task-body-task-front">
            <!--TASK TITLE-->
            <p class="project-list-tasks-task-body-task-front-title">
                <i class="fal fa-book-open"></i>
                <span class="task-title">${infos.name}</span>
            </p>

            <!--TASK LEAD-->
            <div class="project-list-tasks-task-body-task-front-lead">
                <div class="project-list-tasks-task-body-task-front-lead-picture">
                    <img src="images/profile/${picture}" alt="user profile avatar">
                </div>
                <span>${infos.user}</span>
            </div>

            <!--TASK STATE-->
            <div class="project-list-tasks-task-body-task-front-state">
                <span>Etat</span>

                <span>
                    <span></span>
                    <span>${infos.sticker}</span>
                </span>

            </div>

            <!--TASK MEMBERS-->
            <!--TODO loop for printing members of this task-->
            <div class="project-list-tasks-task-body-task-front-members">

                <div class="project-list-tasks-task-body-task-front-members-item success">
                    <span>${infos.members[0]}</span>
                </div>

            </div>
        </div>

        <div class="project-list-tasks-task-body-task-hover">
            <a href="?path=admin-tasks-edit&id=${infos.task_id}&proj=${infos.project_id}"><i class="far fa-edit"></i></a>
            <form action="?path=admin-tasks-delete" method="POST" onsubmit="confirm('Etes-vous de vouloir supprimer cette tâche?')">
                <input type="text" name="task_id" value="${infos.task_id}" hidden>
                <input type="text" name="project_id" value="${infos.project_id}" hidden>
                <button class="btn btn-danger" type="submit">
                    <i class="far fa-trash-alt"></i>
                </button>
            </form>
        </div>

    `;
    task_container.appendChild(task_element)
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