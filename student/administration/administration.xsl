<?xml version="1.0" encoding = "UTF-8"?>
<xsl:stylesheet version="1.0"
   xmlns:xsl = "http://www.w3.org/1999/XSL/Transform">
   <xsl:template match="/">
   <html>
        <body>
        	<a href="../everyone.php" class="btn btn-danger btn-block">Back</a>
		    <h2>SENATE OF UPZ:</h2>
			<table border="1">
			   <tr bgcolor="#9acd32">
			      <th>Number</th>
				  <th>Grade</th>
				  <th>First name</th>
				  <th>Last name</th>
				  <th>Position</th>
				  <th>Faculty</th>
				  <th>City</th>
				</tr>
				
				<xsl:for-each select="class/student">
				     <tr>
					    <td><xsl:value-of select = "@rollno"/></td>
						<td><xsl:value-of select = "grade"/></td>
						<td><xsl:value-of select = "firstname"/></td>
						<td><xsl:value-of select = "lastname"/></td>
						<td><xsl:value-of select = "position"/></td>
						<td><xsl:value-of select = "faculty"/></td>
						<td><xsl:value-of select = "city"/></td>
					 </tr>
				</xsl:for-each>
				
			</table>
			
		</body>
	</html>
</xsl:template>
</xsl:stylesheet>		
						
				
				
				
				