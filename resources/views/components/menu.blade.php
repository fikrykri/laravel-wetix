<div>
    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
    {{ $active }}
    <br />
    {{ $nama }}
    @foreach($list AS $row)
    {{ $row }}
    @endforeach
</div>