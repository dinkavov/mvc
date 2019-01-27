<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="text-center">All members</h1>
        </div>
    </div>

    <?php if (isset($users)): ?>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Report subject</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $key => $user): ?>
                        <tr>
                            <th scope="row"><?= ++$key ?></th>
                            <td>
                                <img class="img img-circle profile-img" src="<?= !empty($user['photo']) ? $user['photo'] : 'img/no-image.png' ?>" alt="user_photo">
                            </td>
                            <td><?= $user['first_name'] ?> <?= $user['last_name'] ?></td>
                            <td><?= $user['report_subject'] ?></td>
                            <td><a href="mailto:<?= $user['email'] ?>"><?= $user['email'] ?></a></td>
                            <td>
                                <a class="btn btn-info btn-view-profile" href="#" data-user="<?= $user['id'] ?>" data-toggle="modal" data-target="#ProfileModal">View</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php else: ?>
        <div class="row">
            <div class="col">
                <div class="alert alert-danger text-center" role="alert">
                    <strong>Members not found!</strong>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col">
            <a href="/" class="btn btn-default pull-right">Back to main page</a>
        </div>
    </div>
</div>

<div class="modal fade" id="ProfileModal" tabindex="-1" role="dialog" aria-labelledby="ProfileModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="profile-modal-content"></div>
    </div>
</div>