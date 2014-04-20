import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.select.Elements;
import org.jsoup.nodes.Element;

import java.io.IOException;
import java.sql.SQLException;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.io.FileWriter;
import java.io.IOException;

public class Novo {

	
	/**
	 * @param args
	 * @throws IOException 
	 * @throws ClassNotFoundException 
	 * @throws IllegalAccessException 
	 * @throws InstantiationException 
	 * @throws SQLException 
	 */
	
	public static void main(String[] args) throws IOException,
			InstantiationException, IllegalAccessException,
			ClassNotFoundException {
		String url1 = "https://novoed.com/courses";
		
		 String sFileName = "Novo_" + new
		 SimpleDateFormat("MM-dd-yyyy").format(new Date()) + ".csv";
		 
		 FileWriter writer = new FileWriter(sFileName);

		 
		ArrayList pgcrs = new ArrayList<String>(); // Array which will store
													// each course URLs
		pgcrs.add(url1);
		for (int a = 0; a < pgcrs.size(); a++) {
			String furl = (String) pgcrs.get(a);
			Document doc = Jsoup.connect(furl).get();
			Elements university = doc.select("div.university");
			Elements prices = doc.select("figure.pricetag");
			Elements links = doc.select("h2[class][style]").select("a");
			Elements startDates = doc
					.select("div[class=timeline independent-text]");
			Elements shortDescription = doc.select("p[class][style]");
			Elements img = doc.select("div[class=course-cover]").select(
					"img[src]");

			for (int i = 0; i < links.size(); i++) {
				String innerUrl = (String) links.get(i).attr("abs:href");
				Document innerDoc = Jsoup.connect(innerUrl).get();

				 String course_title = innerDoc.select("h1").first().text();
				 course_title = course_title.replace(",", "");

			 String short_desc = shortDescription.get(i).text();
				 short_desc = short_desc.replace(",", "");

				 String long_desc =
				 innerDoc.select("article[class][style]").select("p").text();
				 long_desc = long_desc.replace(",", "");

				 String siteUrl = (String) links.get(i).attr("abs:href");

				 String video_link = (String)
				 innerDoc.select("iframe[src]").attr("abs:src");
				 
				 
				 
				String start = innerDoc
						.select("div[class=timeline inline-block]").first()
						.text();
				start = start.replace(",", "");
                start = start.trim();

				if (start.contains("Starting")) {
					if (start.length() < 10) {
						DateFormat dateFormat = new SimpleDateFormat(
								"yyyy-MM-dd ");
						Calendar cal = Calendar.getInstance();
						start = dateFormat.format(cal.getTime());
					} else {
						String str = start.substring(0, start.indexOf(" "));
						String sem = start.substring(start.indexOf(" ") + 1,
								start.indexOf(" ") + 5);
						if (sem.contains("Fall")) {
							sem = "08";
						} else {
							sem = "03";
						}
						String year = start.substring(start.length() - 4,
								start.length());

						start = year+"-"+sem +"-"+"01";
				//	System.out.print(start+"\n");

					}
				}

				else {

					String month = start.substring(0, start.indexOf(" "));
					String day = start.substring(start.indexOf(" ") + 1,
							start.indexOf(" ") + 3);
					switch (month) {

					case "December":
						month = "12";
						break;
					case "November":
						month = "11";
						break;
					case "October":
						month = "10";
						break;
					case "September":
						month = "09";
						break;
					case "August":
						month = "08";
						break;
					case "July":
						month = "07";
						break;
					case "June":
						month = "06";
						break;
					case "May":
						month = "05";
						break;
					case "April":
						month = "04";
						break;
					case "March":
						month = "03";
						break;
					case "February":
						month = "02";
						break;
					case "January":
						month = "01";
						break;
					}

					String year = start.substring(start.length() - 4,
							start.length());
					start = year+"-"+month +"-"+day;}
				

					
				//	 String end =
					//innerDoc.select("div[class=timeline inline-block]").last().text(); end = end.replace(",", "");
				
              String courseIMG = (String) img.get(i).attr("abs:src");
					
				String category = "N/A";
				String duration = "5";
					 
					 
				 Elements site =
					innerDoc.select("div[class=center][style=margin-top:40px]"
					  ).select("a"); String siteUrl2 = (String)
					  site.attr("abs:href");
					  
					  String price = prices.get(i).text();
					  if (price.contains("Free") ||price.contains("$"))  {price = "0"; };
					  
					 String language = "English";
					  
					  String certificate = "no";
					  
					 String university2 = university.get(i).text();
					  
					  String timeScraped = new
					  SimpleDateFormat("MM-dd-yyyy").format(new Date());
					  
					  
					  
					  
					 
					  writer.append(course_title);
					  writer.append(',');
					 
					  writer.append(short_desc); 
					  writer.append(',');
					 
					  writer.append(long_desc); 
					  writer.append(',');
					 

					  writer.append(siteUrl);
					  writer.append(','); 
					  
					  writer.append(video_link); 
					  writer.append(',');
					
					  writer.append(start);
					  writer.append(',');
					  
					//  writer.append(end); 
					//  writer.append(',');
					  
					  writer.append(duration); 
				      writer.append(',');
			
					  writer.append(courseIMG); 
					  writer.append(',');
					  
					 writer.append(category); 
					 writer.append(',');
					
					 writer.append(siteUrl2);
					  writer.append(','); 
					  
					  writer.append(price); 
					  writer.append(',');
					  
					  writer.append(language);
					  writer.append(',');
					  
					  writer.append(certificate); 
					  writer.append(',');
					  
					  writer.append(university2); 
					  writer.append(',');
					  
					  writer.append(timeScraped); 
					  writer.append('\n');
					 
				}
			}
		}
	}

// writer.flush();
// writer.close();

// }

