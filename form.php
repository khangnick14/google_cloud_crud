<div class="InputForm">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <h2 id="formTitle">
                CREAT NEW PROJECT
            </h2>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-md-5" >
            <form id="project-form" class="form row g-3" action="/" method="POST" role="form">
                <div class="form-group col-md-6" style="display: none;">
                    <label class="form-label" for="id">Project ID:</label>
                    <input type="text" class="form-control" id="id" name="id" tabindex="1" value="" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label" for="form1">Project Name</label>
                    <input type="text" class="form-control" id="form1" name="form1" tabindex="1" value="" required>
                </div>
                <div class="form-group col-md-6" >
                    <label class="form-label" for="form2">Subtype</label>
                    <input type="text" class="form-control" id="form2" name="form2" tabindex="2">
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label" for="form3">Current Status</label>
                    <input type="text" class="form-control" id="form3" name="form3" tabindex="3">
                </div>
                <div class="form-group col-md-6" >
                    <label class="form-label" for="form4">Capacity (MW)</label>
                    <input type="text" class="form-control" id="form4" name="form4" tabindex="4">
                </div>
                <div class="form-group col-md-6" >
                    <label class="form-label" for="form5">Year of Completion</label>
                    <input type="text" class="form-control" id="form5" name="form5" tabindex="5">
                </div>
                <div class="form-group col-md-12" >
                    <label class="form-label" for="form6">Country list of Sponsor/Developer</label>
                    <textarea rows="5" cols="50" class="form-control" id="form6" name="form6"
                                tabindex="6"></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label class="form-label" for="form7">Sponsor/Developer Company</label>
                    <textarea rows="5" cols="50" name="form7" class="form-control" id="form7"
                                  tabindex="7"></textarea>
                </div>
                <div class="col-md-12 text-center" id="buttonFields">
                    <button id="formButton" type='submit' value="1" name='addNew' class="btn btn-primary btn-block">SAVE
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    var updatingID = null;

    function updateForm(event, id) {
        event.preventDefault();
        event.stopPropagation();
        if (updatingID !== id) {
            updatingID = id;
            //retrieve data from inpy
            var data = $(`tr[data-id=${id}] td.info`);
            project = {
                'id':data.eq(0),
                'form1': data.eq(1),
                'form2': data.eq(2),
                'form3': data.eq(3),
                'form4': data.eq(4),
                'form5': data.eq(5),
                'form6': data.eq(6),
            };
            $.map(project, function (val, i) {
                $(`#${i}`).val(val.html());
            });
            formTitle.innerText = 'Updating Project: ' + id;
            formButton.name = 'editProject';
            formButton.value = id;
            document.getElementById("buttonFields").innerHTML=`<button id="formButton" type='submit' value="`+id+`" name='editProject' class="btn btn-primary btn-block">SAVE
                    </button>
                     <button id="formButton" onclick="Window.location='/'" type='submit' class="btn btn-danger btn-block">Cancel
                    </button> `;
        } else {
            updatingID = null;
            $('#InputForm').find("input.form-control,select").val("");
            $("#InputForm").attr('action', 'home.php');
            formTitle.innerText = "New Project";
            formButton.name = 'addNew';
            document.getElementById("buttonFields").innerHTML=`<button id="formButton" type='submit' value="1" name='addNew' class="btn btn-primary btn-block">ADD
                    </button>`;
        }
    }
</script>