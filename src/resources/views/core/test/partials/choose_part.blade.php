<div class="choose_wrapper">
    <div class="text_wrap">
        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($paragraph->transitions as $transition)
                <tr>
                    <td class="w-100"><?=$transition->title?></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
