<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $student['Student']['first_name'];?>'s Details</h1>
    </div>
</div>

<?php echo $this->Session->flash(); ?>

<div class="row">
    <div class="col-lg-6">
        <div class="col-sm-6">
            <strong>
                First Name:
            </strong>
        </div>
        <div class="col-lg-6">
            <?php echo $student['Student']['first_name'];?>
        </div>
        <div class="col-lg-6">
            <strong>
                Last Name:
            </strong>
        </div>
        <div class="col-lg-6">
            <?php echo $student['Student']['last_name'];?>
        </div>
        <div class="col-lg-6">
            <strong>
                Date Of Birth:
            </strong>
        </div>
        <div class="col-lg-6">
            <?php echo $this->Time->format(
                'M j, Y',
                $student['Student']['date_of_birth']);
            ?>
        </div>
        <div class="col-lg-6">
            <strong>
                Class:
            </strong>
        </div>
        <div class="col-lg-6">
            <?php echo $student['Class']['title'];?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="col-lg-6">
            <strong>
                Phone:
            </strong>
        </div>
        <div class="col-lg-6">
            <?php echo $student['Student']['phone'];?>
        </div>
        <div class="col-lg-6">
            <strong>
                Email Address:
            </strong>
        </div>
        <div class="col-lg-6">
            <?php echo $student['Student']['email'];?>
        </div>
        <div class="col-lg-6">
            <strong>
                Address:
            </strong>
        </div>
        <div class="col-lg-6">
            <?php echo $student['Student']['address'];?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Courses</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 1;
            foreach ($student['Class']['Course'] as $course): ?>
                <tr>
                    <td><?php echo $count;
                        $count++; ?>
                    </td>
                    <td><?php echo $course['title'];
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Attendance Details</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 1;
            foreach ($student['Attendance'] as $attendance): ?>
                <tr>
                    <td><?php echo $count;
                        $count++; ?>
                    </td>
                    <td><?php echo $this->Time->format(
                            'M j, Y',
                            $attendance['created']);
                        ?>
                    </td>
                    <td><?php echo $attendance['status'];
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Grades</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Course Title</th>
                <th>Total Marks</th>
                <th>Obtained Marks</th>
                <th>Uploaded Date</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 1;
            foreach ($grades as $grade): ?>
                <tr>
                    <td><?php echo $count;
                        $count++; ?>
                    </td>
                    <td>
                        <?php echo $grade['ClassesCourse']['Course']['title'];
                        ?>
                    </td>
                    <td>
                        <?php echo $grade['Grade']['total_marks'];
                        ?>
                    </td>
                    <td>
                        <?php echo $grade['Grade']['marks'];
                        ?>
                    </td>
                    <td><?php echo $this->Time->format(
                            'M j, Y h:i:s A',
                            $grade['Grade']['created']);
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>