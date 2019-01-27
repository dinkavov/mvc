<div class="panel panel-info">
    <div class="panel-heading">
        <strong>Share with your friends</strong>
    </div>
    <div class="panel-body">
        <div class="row text-center">
            <a href="https://www.facebook.com/sharer.php?u=<?= $config['link'] ?>" target="_blank">
                <img src="/img/facebook.png" alt="facebook">
            </a>

            <a href="https://twitter.com/share?url=<?= $config['link'] ?>&amp;text=<?= $config['text'] ?>" target="_blank">
                <img src="/img/twitter.png" alt="twitter">
            </a>

            <a href="https://plus.google.com/share?url=<?= $config['link'] ?>" target="_blank">
                <img src="/img/google-plus.png" alt="google-plus">
            </a>
        </div>
        <div class="row">
            <div class="col">
                <a href="/allmembers" class="btn btn-primary pull-right" style="margin-right: 20px">All members (<?= $total_users['total'] ?>)</a>
            </div>
        </div>
    </div>
</div>