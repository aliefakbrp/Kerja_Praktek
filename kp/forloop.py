# a=['LOT','ITEM_CODE','MACHINE','NEXT_PROSES','SUPPLIER_COIL_NO','IMR_COIL_NO','GRADE','FINISH','FROM_THICK','TO_THICK','ACT_THICK_MIN','ACT_THICK_MAX','WIDTH','WEIGHT','OUTPUT_WEIGHT','BABY_COIL','SCRAP_SHEET','SALES_CONTRAK','CUSTOMER_NAME','PROSES_CPL','PROSES_MILL','PROSES_BAL','PROSES_SLT','PROSES_CTL','REMARK_PPC','SUPPLIER','INVOICE','DATE_INVOICE','DATE_INCOMING','DATE_ROLL','TODAY','WIP_AGING','RM_AGING','CONTAINER_NO','HEAT_NO','NET_WEIGHT_INCOMING','GROSS_INCOMING','NETT_IMR','GROSS_IMR']
a=['LOT','ITEM_CODE','MACHINE','NEXT_PROSES','SUPPLIER_COIL_NO','IMR_COIL_NO','GRADE','FINISH','FROM_THICK','TO_THICK','ACT_THICK_MIN','ACT_THICK_MAX','WIDTH','WEIGHT','OUTPUT_WEIGHT','BABY_COIL','SCRAP_SHEET','SALES_CONTRAK','CUSTOMER_NAME','PROSES_CPL','PROSES_MILL','PROSES_BAL','PROSES_SLT','PROSES_CTL','REMARK_PPC','SUPPLIER','INVOICE','DATE_INVOICE','DATE_INCOMING','DATE_ROLL','TODAY','WIP_AGING','RM_AGING','CONTAINER_NO','HEAT_NO','NET_WEIGHT_INCOMING','GROSS_INCOMING','NETT_IMR','GROSS_IMR']
u=0
# for i in a:
#       print("$"+i," = '' ;");
#       print(' if (isset('+'$'+'spreadSheetAry[$i][',u,'])) {')
#       print('     $'+i,' = mysqli_real_escape_string('+'$'+'conn, '+'$'+'spreadSheetAry[$i][',u,']);')
#       print(' }')
#       u+=1

for i in a:
      print("<td>",i,"</td>")
# for i in a:
#       print("<td><?php echo $row['"+i+"'] ?></td>")

