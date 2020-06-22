<?php

salesInvoiceId = this . salesInvoiceRepository . nextIdentity();
salesInvoice = SalesInvoice . create(salesInvoiceId);
this . salesInvoiceRepository . save(salesInvoice);

salesInvoice = this . salesInvoiceRepository . getBy(salesInvoiceId);
salesInvoice . addLine(/* ... */);
this . salesInvoiceRepository . save(salesInvoice);
