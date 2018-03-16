<ul class="media-list">
@foreach ($histories as $history)
    <?php $user = $history->user; ?>
    <li class="media">
        <div class="media-body">
            <div>
                @foreach ($histories as $history)
                    <tr>
                        <td>{!! link_to_route('histories.show', $history->id, ['id' => $history->id]) !!}</td>
                        <td>{{ $history->crop }}</td>
                        <td>{{ $history->cultivar }}</td>
                    </tr>
                @endforeach
            </div>
            <div>
                <p>{!! nl2br(e($history->crop)) !!}</p>
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $histories->render() !!}