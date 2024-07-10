@push('css')
    <style>
        /* INICIO TELA DE ATRIBUIÇÃO DE PERMISSÕES E REGRAS */
        .group-main,
        .group {
            list-style: none;
        }

        .group {
            display: none;
        }

        .group-flex {
            display: flex;
            flex-wrap: wrap;
        }

        .group-title {
            cursor: pointer;
        }

        .treeview-title,
        .group-title,
        .permission-name {
            user-select: none;
        }

        .active {
            display: block;
        }

        input:checked {
            accent-color: grey;
        }

        .expand-all,
        .tag-all {
            font-size: 10px;
            width: 130px;
        }

        /* FIM TELA DE ATRIBUIÇÃO DE PERMISSÕES E REGRAS */
    </style>
@endpush

<div class="row mb-3">
    <div class="col-md-9">
        <div class="form-group">
            {{ Form::label('description', 'Descrição') }}
            {{ Form::text('description', null, [
                'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''),
                'required',
            ]) }}
            <x-input-error field="description" />
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {{ Form::label('name', 'Alias') }}
            {{ Form::text('name', null, [
                'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
                'required',
            ]) }}
            <x-input-error field="name" />
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-12">
        <div class="form-group">
            <div class="treeview border rounded p-3">
                <h5 class="treeview-title m-0">Permissões</h5>
                <ul class="group-main p-0 m-0">
                    <li class="group-item my-2">
                        <button type="button" class="expand-all btn-secondary btn btn-sm my-1">
                            Expandir Tudo
                        </button>
                        <button type="button" class="tag-all btn-secondary btn btn-sm my-1">
                            Marcar Todos
                        </button>
                    </li>
                    @include('roles._treeview-permissions', ['permissions' => $permissions, 'item' => $item ?? null])
                </ul>
            </div>
        </div>
    </div>
</div>


@push('js')
<script>
    $('.tag-all-below').each(function () {
        if($(this).closest('li').find(':checked').length){
            $(this).prop('checked', true);
            $('.tag-all').text('Desmarcar Todos');
        }
    });

    $('.expand-all').on('click', function () {
        let groups = $('.group');

        if (this.innerText == 'Expandir Tudo') {
            this.innerText = 'Recolher Tudo';
            groups.each(function () {
                if (!$(this).hasClass('group-flex')) {
                    $(this).addClass('active');
                } else {
                    $(this).addClass('active-flex');
                }
            });
        } else {
            this.innerText = 'Expandir Tudo';
            groups.each(function () {
                if (!$(this).hasClass('group-flex')) {
                    $(this).removeClass('active');
                } else {
                    $(this).removeClass('active-flex');
                }
            });
        }
    });

    $('.tag-all').on('click', function () {
        if (this.innerText == 'Marcar Todos') {
            $('.treeview').find(':checkbox').prop('checked', true);
            this.innerText = 'Desmarcar Todos';
        } else {
            $('.treeview').find(':checkbox').prop('checked', false);
            this.innerText = 'Marcar Todos';
        }
    });

    $('.group-title').on("click", function() {
        let group =  $(this.parentElement.querySelector(".group"));

        if (!group.hasClass('group-flex')) {
            group.toggleClass('active');
        } else {
            group.toggleClass('active-flex');
        }

        var caret = $(this).find('i');
        if(caret.hasClass('bx-chevron-down')){
            caret.removeClass('bx-chevron-down');
            caret.addClass('bx-chevron-up');
        } else {
            caret.removeClass('bx-chevron-up');
            caret.addClass('bx-chevron-down');
        }
    });

    $('.tag-all-below').on('click', function () {
        var inputs = $(this).next().next().find('input');
        if ($(this).prop('checked')) {
            inputs.each(function () {
                $(this).prop('checked', true);
            });
        } else {
            inputs.each(function () {
                $(this).prop('checked', false);
            });
        }
    });
</script>
@endpush
