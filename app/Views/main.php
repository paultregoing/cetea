<div class="container">
    <h1 class="display-5"><small class="text-muted">Anyone fancy a brew?</small></h1>
</div>

<div class="container">
    <div class="row gx-5">
        <div class="col">
            <h2 class="h2">Who's not made one yet? <span class="badge bg-secondary">drinkers of tea</span></h2>
            <ul class="list-group" id="drinkers">
                <?php
                    foreach ($people as $p) {
                        print "<li class='list-group-item'>{$p['name']}</li>";
                    }
                ?>
            </ul>
        </div>
        <div class="col">
            <h2 class="h2">Hall of fame. <span class="badge bg-secondary">makers of tea</span></h2>
            <ul class="list-group">
                <?php
                foreach ($heroes as $h) {
                    print "<li class='list-group-item'>{$h['name']}</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<div class="container">
    <div class="row gy-5">
        <div class="col">
            <button id="show-main" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-main">Who is brewing?</button>
        </div>
        <div class="col">
            <button id="show-add" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add">Add a brewer.</button>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-main">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p>The lucky winner is...</p>
            </div>
            <div class="modal-body">
                <p id="chosen-one">placeholder</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p>Add a brewer</p>
            </div>

            <div class="modal-body">

                <form id="add-victim">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="yournamehere">
                        <label for="name">Name</label>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-secondary">Submit</button>
                    </div>
                </form>                    

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
     $("#show-main").click(function (e) {
         console.log("FORM SUBMITTED");
         $.get("/getTeaMinion", function (data) {
            console.log("chosen victim is...");
            console.log(data);
            $("#chosen-one").text(data.name)
         })
     });

     $("#modal-main .modal-footer button").click(function () {
        if ($("#drinkers li").length == 1) {
            $.post("/resetTeaMinions");
        }

        location.reload();
     })

     $("#add-victim").submit(function (e) {
        e.preventDefault();

        if ($('#add-victim #name').val() != "") {
            console.log(this);
            $.post(
                "/addTeaMinion",
                $(this).serialize()
            ).always(function () {
                location.reload();
            });
        }
     });
</script>
