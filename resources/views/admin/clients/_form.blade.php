<!-- Form Input -->

<div class="form-group">
    {!! Form::label('Nome','Nome:') !!}
    {!! Form::text('user[name]',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Email','Email:') !!}
    {!! Form::text('user[email]',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Telefone','Telefone:') !!}
    {!! Form::text('phone',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Endereco','Endereco:') !!}
    {!! Form::textarea('address',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Cidade','Cidade:') !!}
    {!! Form::text('city',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Estado','Estado:') !!}
    {!! Form::text('state',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Cep','Cep:') !!}
    {!! Form::text('zipcode',null,['class'=>'form-control']) !!}
</div>
