<div class="week">
    <div class="text">
        <div>
            <span>неделя</span>
        </div>
        @for($i = 0; $i < env('APP_LONG'); $i++)
           @if (DateHelper::currentStep() <= $i)
                <div>
                    <span>
                        {{ $i + 1 }}
                        <i class='fa fa-lock fw'></i>
                    </span>
                </div>
           @else
                <div class="heart">
                    <span>
                        <a href="{{ route('view', ['week' => $i + 1]) }}">
                            {{ $i + 1 }}
                        </a>
                    </span>
                </div>
           @endif
        @endfor
    </div>
</div>