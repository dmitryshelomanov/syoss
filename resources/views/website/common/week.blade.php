<div class="week">
    <div class="text">
        <div>
            <span>неделя</span>
        </div>
        @php
            $week = request()->week ? request()->week : DateHelper::currentStep();
        @endphp
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
                        @if ($type === "week")
                            <a href="?week={{ $i + 1 }}" class="@if($week == $i + 1) active-week @endif()">
                                {{ $i + 1 }}
                            </a>
                        @elseif($type === "room")
                            <a href="{{ route("view", ["week" => $i + 1]) }}" class="@if($week == $i + 1) active-week @endif() ">
                            {{ $i + 1 }}
                        </a>
                        @elseif($type === "winners")
                            <a href="#" data-week="{{ $i + 1 }}" class="getWinners @if($week == $i + 1) active-week @endif() ">
                                {{ $i + 1 }}
                            </a>
                        @endif
                    </span>
                </div>
           @endif
        @endfor
    </div>
</div>