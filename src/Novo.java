import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.select.Elements;
import org.jsoup.nodes.Element;

import java.io.IOException;
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
    public static void main(String[] args) throws IOException, InstantiationException, IllegalAccessException, ClassNotFoundException {
        int prof_ID = 0;
        int counter = 0;
        String url1 = "https://novoed.com/courses";
        
<<<<<<< HEAD
        String sFileName = "Novo.csv";
                
        String sFileProf = "NovoProf.csv";
=======
        String sFileName = "/Users/parthvyas/Desktop/Parth/cs160/Novo.csv";
                
        String sFileProf = "/Users/parthvyas/Desktop/Parth/cs160/NovoProf.csv";
>>>>>>> FETCH_HEAD
        
        FileWriter writer = new FileWriter(sFileName);
        FileWriter writer_prof = new FileWriter(sFileProf);
        
       
        
        ArrayList pgcrs = new ArrayList<String>(); //Array which will store each course URLs
        pgcrs.add(url1);
        for(int a=0; a<pgcrs.size();a++)
        {
            String furl = (String) pgcrs.get(a);
            Document doc = Jsoup.connect(furl).get();
            Elements university = doc.select("div.university");
            Elements prices = doc.select("figure.pricetag");
            Elements links = doc.select("h2[class][style]").select("a");
            Elements startDates = doc.select("div[class=timeline independent-text]");
            Elements shortDescription = doc.select("p[class][style]");
<<<<<<< HEAD
            Elements img = doc.select("div[class=course-cover][style=width: 100%]").select("img[src]");
=======
            Elements img = doc.select("div[class=course-cover]").select("img[src]");
>>>>>>> FETCH_HEAD
        
            for (int i=0; i<links.size(); i++)
            {
                String innerUrl = (String) links.get(i).attr("abs:href");
                Document innerDoc = Jsoup.connect(innerUrl).get();
                
                String course_title = innerDoc.select("h1").first().text();
                course_title = course_title.replace(",", "");
                
                String short_desc = shortDescription.get(i).text();
                short_desc = short_desc.replace(",", "");
                
                String long_desc = innerDoc.select("article[class][style]").select("p").text();
                long_desc = long_desc.replace(",", "");
                
<<<<<<< HEAD
                String courseLink = (String) links.get(i).attr("abs:href").replace(",", "");
                
                
                String video_link = (String) innerDoc.select("iframe[src]").attr("abs:src").replace(",", "");
                
                String start = innerDoc
                        .select("div[class=timeline inline-block]").first().text();
                start = start.replace(",", "");
=======
                String courseLink = (String) links.get(i).attr("abs:href");
                
                
                String video_link = (String) innerDoc.select("iframe[src]").attr("abs:src");
                
            	String start = innerDoc
						.select("div[class=timeline inline-block]").first()
						.text();
				start = start.replace(",", "");
>>>>>>> FETCH_HEAD
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
                //    System.out.print(start+"\n");

                    }
                }

                else {

<<<<<<< HEAD
                    String month = start.substring(0, start.indexOf(" ")).replace(",", "");
                    String day = start.substring(start.indexOf(" ") + 1,
                            start.indexOf(" ") + 3).replace(",", "");
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
                            start.length()).replace(",", "");
                    start = year+"-"+month +"-"+day;}
                
                String duration = "5";
=======
					String year = start.substring(start.length() - 4,
							start.length());
					start = year+"-"+month +"-"+day;}
				
				String duration = "5";
>>>>>>> FETCH_HEAD
                
                String courseIMG = (String) img.get(i).attr("abs:src");
                
                String category = "N/A";
                
               
                Elements site = innerDoc.select("div[class=center][style=margin-top:40px]").select("a");
                String siteURL = "https://novoed.com/";
                
                String price = prices.get(i).text();
<<<<<<< HEAD
                  if (price.contains("Free") ||price.contains("$"))  {price = "0"; };
=======
				  if (price.contains("Free") ||price.contains("$"))  {price = "0"; };
>>>>>>> FETCH_HEAD
                
                String language = "English";
                
                String certificate = "no";
                
                String university2 = university.get(i).text();
                
                String timeScraped = new SimpleDateFormat("MM-dd-yyyy").format(new Date());
                
                Elements prof = innerDoc.select("span[class=instructor_name]");
                Elements profIMG = innerDoc.select("div[class=span3]").select("img[src]");
                
                String i_value = Integer.toString(i+1);
                String counts = Integer.toString(counter++);
                writer.append(counts);
                writer.append(',');
                
                
                for (int j=0; j<prof.size(); j++)
                {
                    String prof_Name = prof.get(j).text().replace(",", "");
                    String prof_ing = (String) profIMG.get(j).attr("abs:src");
                    
                    String prof_ID_value = Integer.toString(prof_ID);
             
                    
                    writer_prof.append(prof_ID_value);
                    writer_prof.append(',');
                    writer_prof.append(prof_Name);
                    writer_prof.append(',');
                    writer_prof.append(prof_ing);
                    writer_prof.append(',');
                    writer_prof.append(i_value);
                    
                    writer_prof.append('\n');
                    //System.out.println(prof_Name);
                    //System.out.println(prof_ing);
                }
                
                
                
                //System.out.println(course_title);
                writer.append(course_title);
                writer.append(',');
                //System.out.println(short_desc);
                writer.append(short_desc);
                writer.append(',');
                //System.out.println(long_desc);
                writer.append(long_desc);
                writer.append(',');
                //System.out.println(siteUrl);
                writer.append(courseLink);
                writer.append(',');
                //System.out.println(video_link);
                writer.append(video_link);
                writer.append(',');
                //System.out.println(start);
                writer.append(start);
                writer.append(',');
                //System.out.println(end);
                writer.append(duration);
                writer.append(',');
                //System.out.println(courseIMG);
                writer.append(courseIMG);
                writer.append(',');
                writer.append(category);
                writer.append(',');
                //System.out.println(siteUrl2);
                writer.append(siteURL);
                writer.append(',');
                //System.out.println(price);
                writer.append(price);
                writer.append(',');
                writer.append(language);
                writer.append(',');
                writer.append(certificate);
                writer.append(',');
                //System.out.println(university2);
                writer.append(university2);
                writer.append(',');
                //System.out.println(timeScraped);
                writer.append(timeScraped);
                writer.append('\n');
                
            }
            writer.flush();
            writer_prof.flush();
            writer.close();
            writer_prof.close();
        }
    }
}
<<<<<<< HEAD

=======
>>>>>>> FETCH_HEAD


