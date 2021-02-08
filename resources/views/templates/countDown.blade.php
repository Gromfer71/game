
<div class="uk-grid-small uk-child-width-auto" uk-grid
     uk-countdown="date: {{ \Illuminate\Support\Carbon::createFromTimestamp($time)->toIso8601String() }}">
    <div>
        <div class="uk-countdown-number uk-countdown-days uk-text-large"></div>
    </div>
    <div class="uk-countdown-separator uk-text-large">:</div>
    <div>
        <div class="uk-countdown-number uk-countdown-hours uk-text-large"></div>
    </div>
    <div class="uk-countdown-separator uk-text-large">:</div>
    <div>
        <div class="uk-countdown-number uk-countdown-minutes uk-text-large"></div>
    </div>
    <div class="uk-countdown-separator uk-text-large">:</div>
    <div>
        <div class="uk-countdown-number uk-countdown-seconds uk-text-large"></div>
    </div>
</div>
