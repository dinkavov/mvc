<div class="modal-header">
    <h4 class="modal-title" id="ProfileModalLongTitle">User ID: <?= $user_info['id'] ?></h4>
</div>

<div class="modal-body">
    <table class="table table-responsive">
        <thead>
            <th>Title</th>
            <th>User info</th>
        </thead>
        <tbody>
            <tr>
                <td><strong>Photo</strong></td>
                <td>
                    <img class="img img-circle profile-img" src="<?= !empty($user_info['photo']) ? $user_info['photo'] : 'img/no-image.png' ?>" alt="user_photo">
                </td>
            </tr>
            <tr>
                <td><strong>First name</strong></td>
                <td><?= $user_info['first_name'] ?></td>
            </tr>
            <tr>
                <td><strong>Last name</strong></td>
                <td><?= $user_info['last_name'] ?></td>
            </tr>
            <tr>
                <td><strong>Birthday</strong></td>
                <td><?= date('Y-m-d', strtotime($user_info['birthday'])) ?></td>
            </tr>
            <tr>
                <td><strong>Country</strong></td>
                <td><?= $user_info['country'] ?></td>
            </tr>
            <tr>
                <td><strong>Phone</strong></td>
                <td><?= $user_info['phone'] ?></td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td>
                    <a href="mailto:<?= $user_info['email'] ?>"><?= $user_info['email'] ?></a>
                </td>
            </tr>
            <tr>
                <td><strong>Company</strong></td>
                <td><?= $user_info['company'] ?></td>
            </tr>
            <tr>
                <td><strong>Position</strong></td>
                <td><?= $user_info['position'] ?></td>
            </tr>
            <tr>
                <td><strong>About me</strong></td>
                <td><?= $user_info['about_me'] ?></td>
            </tr>
            <tr>
                <td><strong>Registered at</strong></td>
                <td><?= date('Y-m-d H:i:s', strtotime($user_info['created_at'])) ?></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
