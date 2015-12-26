<div class="container-fluid">
    <h1>The Bee Game</h1>
    <a href="start" class="btn btn-primary">Play a new game</a>
    <a href="end" class="btn btn-primary">Quit</a>
    <form method="post">
        <button type="submit" class="btn btn-danger">Hit a bee</button>
    </form>
    <?php if($param['randomBeeId'] >= 0 ) { ?>
    <h3>You have hit bee With Id <?= $param['randomBeeId'] ?></h3>
    <?php } ?>
    <pre>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Type</th>
                <th>Hit points</th>
            </tr>
        <?php foreach($param['beesList'] as $key => $bee) { ?>
            <tr 
                <?= ($key == $param['randomBeeId'])? 'style="background-color:yellow;"': '' ?>
                <?= ($bee->getLifeSpan() <= 0)? 'style="background-color:red;"': '' ?>
                >
                <td><?= $key ?></td>
                <td><?= $bee->getBeeType() ?></td>
                <td><?= ($bee->getLifeSpan() <= 0)? 'Dead': $bee->getLifeSpan() ?></td>
            </tr>
        <?php } ?>
        </table>    
    </pre>
</div>