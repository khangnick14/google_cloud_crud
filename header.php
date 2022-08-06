<div id="table-scroll" class="table-scroll">
    <div class="table-responsive">
        <table class="table" >
            <thead class="thead-dark">
            <tr>
                <th scope="col">&nbsp;</th>
                <th scope="col" class="text-uppercase text-center">Index</th>
                <th scope="col" class="text-uppercase text-center" >Project Name</th>
                <th scope="col" class="text-uppercase text-center">Subtype</th>
                <th scope="col" class="text-uppercase text-center">Current Status</th>
                <th scope="col" class="text-uppercase text-center">Capacity (MW)</th>
                <th scope="col" class="text-uppercase text-center">Year of Completion</th>
                <th scope="col" class="text-uppercase text-center">Country list of Sponsor/Developer</th>
                <th scope="col" class="text-uppercase text-center">Sponsor/Developer Company</th>
            </tr>
            </thead>
            <tbody>
            <?php
            readData();
            ?>
            </tbody>
        </table>
    </div>
</div>