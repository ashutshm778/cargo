<div>
    <div class="modal fade" id="delivery_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                </div>
                <div class="modal-body" id="modal_data">
                    <form class="row" method="post" action="#">
                        @csrf

                        <div class="col-md-12">
                            <label for="fullname" class="form-label">Status<span>*</span></label>
                            <select id='status' wire:model="status" class="form-control" required onchange="status_remark()">
                                <option value=''>-- Select Status--</option>
                                <option value="ndr" >NDR</option>
                                <option value="delivered" >Delivered</option>
                            </select>
                        </div>
                        <div class="col-md-12" id="remark_ndr" style="display:none;">
                            <label for="mobile_no" class="form-label">Remark<span>*</span></label>
                            <select id='remark_n' wire:model="remarks" class="form-control">
                                <option value=''>-- Select Remark--</option>
                                <option value="TOPAY / COD / CLEARANCE / PENALTY AMOUNT NOT READY">TOPAY / COD / CLEARANCE / PENALTY AMOUNT NOT READY</option>
                                <option value="REFUSED TO PAY COD / TOPAY AMOUNT">REFUSED TO PAY COD / TOPAY AMOUNT</option>
                                <option value="RECEIVER RESCHEDULED DELIVERY DATE">RECEIVER RESCHEDULED DELIVERY DATE</option>
                                <option value="POLITICAL DISTURBANCE / BANDH /STRIKE (UNS)">POLITICAL DISTURBANCE / BANDH /STRIKE (UNS)</option>
                                <option value="PARTIAL DELIVERED">PARTIAL DELIVERED</option>
                                <option value="OUT OF DELIVERY AREA (ODA)">OUT OF DELIVERY AREA (ODA)</option>
                                <option value="OFFICE/INWARD CLOSED OR DOOR LOCKED / TIME OVER">OFFICE/INWARD CLOSED OR DOOR LOCKED / TIME OVER</option>
                                <option value="NO SERVICE">NO SERVICE</option>
                                <option value="NO ENTRY / RESTRICTED AREA MISROUTE">NO ENTRY / RESTRICTED AREA MISROUTE</option>
                                <option value="LATE ARRIVAL OF LOAD">LATE ARRIVAL OF LOAD</option>
                                <option value="INWARD CLOSED / BANK TIME OVER">INWARD CLOSED / BANK TIME OVER</option>
                                <option value="EWAY BILL DISPUTE / WITHOUT GST INVOICE DECLARATION">EWAY BILL DISPUTE / WITHOUT GST INVOICE DECLARATION</option>
                                <option value="DETAINED BY GOVERNMENT / SALES TAX/AIRPORT AUTHORITY">DETAINED BY GOVERNMENT / SALES TAX/AIRPORT AUTHORITY</option>
                                <option value="DELIVERY ISSUE DUE TO HEAVY RAIN / NATURAL CALAMITY">DELIVERY ISSUE DUE TO HEAVY RAIN / NATURAL CALAMITY</option>
                                <option value="CONTACT NAME/DEPT NOT MENTIONED / NO SUCH PERSON">CONTACT NAME/DEPT NOT MENTIONED / NO SUCH PERSON</option>
                                <option value="CONSIGNOR / AGENT REQUESTED TO HOLD">CONSIGNOR / AGENT REQUESTED TO HOLD</option>
                                <option value="CONSIGNMENT LOST">CONSIGNMENT LOST</option>
                                <option value="CONSIGNEE WILL COLLECT FROM OFFICE">CONSIGNEE WILL COLLECT FROM OFFICE</option>
                                <option value="CONSIGNEE OUT OF STATION OR NOT AVAILABLE">CONSIGNEE OUT OF STATION OR NOT AVAILABLE</option>
                                <option value="CONSIGNEE NOT RESPONDING TO PHONE COMPANY/PERSON SHIFTED">CONSIGNEE NOT RESPONDING TO PHONE COMPANY/PERSON SHIFTED</option>
                                <option value="ADDRESS NOT FOUND / IN-COMPLETE / REQUIRE PHONE NO">ADDRESS NOT FOUND / IN-COMPLETE / REQUIRE PHONE NO</option>
                                <option value="OTHER" >OTHER</option>
                            </select>
                            </span>
                        </div>
                        <div class="col-md-12" id="remark_delivery" style="display:none;">
                            <label for="mobile_no" class="form-label">Remark<span>*</span></label>
                            <select id='remark_d' wire:model="remark" class="form-control">
                                <option value=''>-- Select Remark--</option>
                                <option value="SIGNATURE" >SIGNATURE</option>
                                <option value="SIGN WITH STAMP" >SIGN WITH STAMP</option>
                                <option value="DROP IN BOX" >DROP IN BOX</option>
                                <option value="DROP DELIVERY" >DOOR DELIVERY</option>
                                <option value="SELF RECIVE" >SELF RECIVE</option>
                                <option value="COMPANY STAMP" >COMPANY STAMP</option>
                                <option value="OTHER" >OTHER</option>
                            </select>
                            </span>
                        </div>
                        <div class="col-12">
                            <div class="text-end">
                                <button type="button" class="btn btn-primary" wire:click="booking_status_update()">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
