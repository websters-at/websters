<form action="{!! $url !!}" {!! $attributes !!}>
    @csrf
    <!-- class="{!! $basename !!}__link -->
    <button type="submit" class="btn btn-primary w-full font-poppins afont-semibold">
        <span class="{!! $basename !!}__label">{{ $label }}</span>
    </button>
</form>

