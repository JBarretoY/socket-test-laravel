<template>
    <div class="fre-page-wrapper tabs-credits" id="credits">
        <div class="fre-page-title">
            <div class="container">
                <h2>Mi Crédito</h2>
            </div>
        </div>
        <div class="fre-page-section">
            <!-- <pre>
                {{ user }}
            </pre> -->
            <div class="container">
                <div class="fre-credit-wrap">
                    <ul class="fre-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#fre-credit-balance" aria-expanded="true">Balance</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#fre-credit-transaction" aria-expanded="false">Transacciones</a>
                        </li>
                    </ul>
                    <div class="fre-tab-content">
                        <div id="fre-credit-balance" class="fre-panel-tab active">
                            <div class="fre-credit-box">
                                <div class="credit-balance-info">
                                    <div class="row">
	                                    <div class="col-sm-3 col-xs-6">
                                            <div class="balance-info-item">
                                                <p>Working Project</p>
                                                <p><b>${{ user.balance.working }}</b></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-xs-6">
                                            <div class="balance-info-item">
                                                <p>Crédito disponible</p>
                                                <p><b>${{ user.balance.available }}</b></p>
                                            </div>
                                        </div> 
                                        <div class="col-sm-3 col-xs-6">
                                            <div class="balance-info-item">
                                                <p>Pendiente por retiro
                                                    <span data-toggle="tooltip" data-placement="top" title="" data-original-title="Tu solicitud de retiro esta en proceso de revision">
                                                        <i class="fa fa-info-circle"></i>
                                                    </span>
                                                </p>
                                                <p><b id="pending_withdraw_number" data-number="0">${{ user.balance.pending }}</b></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-xs-6">
                                            <div class="balance-info-item">
                                                <p>Crédito total</p>
                                                <p><b>${{ totalCredit }}</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="fre-credit-box">
                                <div class="credit-balance-wrap">
                                    <div class="credit-recharge">
                                        <h2>Deposita tu Balance</h2>
                                        <p>Deposita créditos para poder pagar a tu consultor</p>
                                        <div class="credit-recharge-btn-wrap">
                                            <a class="fre-normal-btn-o" href="#">Depositar</a>
                                        </div>
                                    </div>
                                    <div class="credit-withdraw">
                                        <h2>Retiro de credito</h2>
                                        <p>Retirar crédito de su saldo disponible. Puede usar cualquiera de los métodos de pago siguientes:</p>
                                        <div class="withdraw-account-table fre-table">
                                            <div class="fre-table-row">
                                                <div class="fre-table-col"><i>Cuenta PayPal</i></div>
                                                    <div class="fre-table-col">
                                                        <span><i>No configurada</i></span>
                                                        <a href="#" class="fre-skin-color btn-edit-email-credit" data-toggle="modal" data-target="#"> Actualizar</a>
                                                    </div>
                                                </div>
                                                <div class="fre-table-row">
                                                    <div class="fre-table-col"><i>Cuenta bancaria</i></div>
                                                    <div class="fre-table-col">
                                                        <span><i>No configurada</i></span>
                                                        <a href="#" class="fre-skin-color btn-update-bank" data-toggle="modal" data-target="#">Actualizar</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="credit-withdraw-btn-wrap not-money">
		                                        <a href="javascript:void(0)" class="fre-normal-btn-disable" data-toggle="tooltip" data-placement="top" data-original-title="Cannot withdraw money. Your available credit must be greater than or equal to 50">Retirar</a>
		                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="fre-credit-transaction" class="fre-panel-tab fre-credit-history-wrapper">
                                <div class="fre-credit-box fre-credit-filter-box">
                                    <div class="transaction-filter-header visible-xs">
                                        <a class="transaction-filter-title" href="">Filter Transaction</a>
                                    </div>
                                    <form class="credit-transaction-filter">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-6">
                                                <div class="fre-input-field">
                                                    <label class="fre-field-title" for="">Tipo de transacción</label>
                                                    <select class="fre-chosen-single fre-credit-history-filter-type" style="display: none;">
                                                        <option value="">Todo</option>
                                                        <option value="deposit">Depositos</option>
                                                        <option value="withdraw">Retiros</option>
                                                        <option value="transfer">Recibidos</option>
                                                        <option value="charge">Pagados</option>
                                                        <option value="refund">Reembolsado</option>
                                                    </select>
                                                    <div class="chosen-container chosen-container-single fre-chosen-single fre-credit-history-filter-type" title="" style="width: 100%;">
                                                        <a class="chosen-single">
                                                            <input class="chosen-search-input" type="text" autocomplete="off">
                                                            <span>Todo</span>
                                                            <div><b></b></div>
                                                        </a>
                                                        <div class="chosen-drop">
                                                            <div class="chosen-search"></div>
                                                            <ul class="chosen-results"></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="fre-input-field">
                                                    <label class="fre-field-title" for="">Estado</label>
                                                    <select class="fre-chosen-single fre-credit-history-filter-status" style="display: none;">
                                                        <option value="">Todos</option>
                                                        <option value="completed">Completado</option>
                                                        <option value="cancelled">Cancelado</option>
                                                        <option value="pending">Pendiente</option>
                                                    </select>
                                                    <a class="chosen-single">
                                                        <input class="chosen-search-input" type="text" autocomplete="off">
                                                        <span>Todos</span>
                                                        <div><b></b></div>
                                                    </a>
                                                    <div class="chosen-drop">
                                                        <div class="chosen-search"></div>
                                                        <ul class="chosen-results"></ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="fre-input-field fre-period-field">
                                                <label class="fre-field-title" for="">Periodo</label>
                                                <div class="period-min-wrap">
                                                    <input class="filter-period-min" id="fre_credit_from" type="text" placeholder="Formulario">
                                                </div>
                                                <span>-</span>
                                                <div class="period-max-wrap">
                                                    <input class="filter-period-max" id="fre_credit_to" type="text" placeholder="A">
                                                </div>
                                            </div>
                                        </div>
                                        <a class="transaction-filter-clear" href="javascript:void(0)">Despejar filtros</a>
                                    </form>
                                </div>
                                <div class="fre-credit-box">
                                    <div class="credit-transaction-wrap change-log-list">
                                        <div class="fre-table list-histories">
                                            <div class="fre-table-head">
                                                <div class="fre-table-col">TIPO</div>
                                                <div class="fre-table-col">CANTIDAD</div>
                                                <div class="fre-table-col">ACCION</div>
                                                <div class="fre-table-col">METODO DE PAGO</div>
                                                <div class="fre-table-col">ESTADO</div>
                                                <div class="fre-table-col">TIEMPO</div>
                                            </div>
	                                    </div>
	                                    <div class="no-transaction">
                                            <span>No hay ninguna transacción!</span>
                                        </div>
	                                </div>
                                </div>
                                <div class="fre-paginations paginations-wrapper">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</template>

<script>
export default {
    props: {
        user: { required: true, type: Object }
    },
    computed: {
        totalCredit() {
            let working = parseInt(this.user.balance.working)
            let pending = parseInt(this.user.balance.pending)
            let available = parseInt(this.user.balance.available)
            return working + pending + available
        }
    }
}
</script>